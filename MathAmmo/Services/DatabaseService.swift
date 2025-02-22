import Foundation
import SQLite3

class DatabaseService {
    static let shared = DatabaseService()
    private var db: OpaquePointer?
    
    private init() {
        setupDatabase()
    }
    
    private func setupDatabase() {
        let fileURL = try! FileManager.default
            .url(for: .documentDirectory, in: .userDomainMask, appropriateFor: nil, create: false)
            .appendingPathComponent("support.sqlite")
        
        if sqlite3_open(fileURL.path, &db) != SQLITE_OK {
            print("Error opening database")
            return
        }
        
        let createTableQuery = """
        CREATE TABLE IF NOT EXISTS support_tickets (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id TEXT NOT NULL,
            category TEXT NOT NULL,
            subject TEXT NOT NULL,
            description TEXT NOT NULL,
            status TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            email TEXT NOT NULL
        );
        """
        
        if sqlite3_exec(db, createTableQuery, nil, nil, nil) != SQLITE_OK {
            print("Error creating table")
            return
        }
    }
    
    func createTicket(ticket: SupportTicket) -> Int? {
        let insertQuery = """
        INSERT INTO support_tickets (user_id, category, subject, description, status, email)
        VALUES (?, ?, ?, ?, ?, ?);
        """
        
        var statement: OpaquePointer?
        if sqlite3_prepare_v2(db, insertQuery, -1, &statement, nil) == SQLITE_OK {
            sqlite3_bind_text(statement, 1, (ticket.userId as NSString).utf8String, -1, nil)
            sqlite3_bind_text(statement, 2, (ticket.category as NSString).utf8String, -1, nil)
            sqlite3_bind_text(statement, 3, (ticket.subject as NSString).utf8String, -1, nil)
            sqlite3_bind_text(statement, 4, (ticket.description as NSString).utf8String, -1, nil)
            sqlite3_bind_text(statement, 5, (ticket.status.rawValue as NSString).utf8String, -1, nil)
            sqlite3_bind_text(statement, 6, (ticket.email as NSString).utf8String, -1, nil)
            
            if sqlite3_step(statement) == SQLITE_DONE {
                let ticketId = Int(sqlite3_last_insert_rowid(db))
                sqlite3_finalize(statement)
                return ticketId
            }
        }
        sqlite3_finalize(statement)
        return nil
    }
    
    func getTickets(forUser userId: String) -> [SupportTicket] {
        var tickets: [SupportTicket] = []
        let query = "SELECT * FROM support_tickets WHERE user_id = ? ORDER BY created_at DESC;"
        
        var statement: OpaquePointer?
        if sqlite3_prepare_v2(db, query, -1, &statement, nil) == SQLITE_OK {
            sqlite3_bind_text(statement, 1, (userId as NSString).utf8String, -1, nil)
            
            while sqlite3_step(statement) == SQLITE_ROW {
                let id = sqlite3_column_int(statement, 0)
                let userId = String(cString: sqlite3_column_text(statement, 1))
                let category = String(cString: sqlite3_column_text(statement, 2))
                let subject = String(cString: sqlite3_column_text(statement, 3))
                let description = String(cString: sqlite3_column_text(statement, 4))
                let status = String(cString: sqlite3_column_text(statement, 5))
                let email = String(cString: sqlite3_column_text(statement, 8))
                
                let ticket = SupportTicket(
                    id: Int(id),
                    userId: userId,
                    category: category,
                    subject: subject,
                    description: description,
                    status: SupportTicket.TicketStatus(rawValue: status) ?? .open,
                    createdAt: Date(),
                    updatedAt: Date(),
                    email: email
                )
                tickets.append(ticket)
            }
        }
        sqlite3_finalize(statement)
        return tickets
    }
    
    func updateTicketStatus(ticketId: Int, status: SupportTicket.TicketStatus) -> Bool {
        let query = "UPDATE support_tickets SET status = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?;"
        
        var statement: OpaquePointer?
        if sqlite3_prepare_v2(db, query, -1, &statement, nil) == SQLITE_OK {
            sqlite3_bind_text(statement, 1, (status.rawValue as NSString).utf8String, -1, nil)
            sqlite3_bind_int(statement, 2, Int32(ticketId))
            
            if sqlite3_step(statement) == SQLITE_DONE {
                sqlite3_finalize(statement)
                return true
            }
        }
        sqlite3_finalize(statement)
        return false
    }
} 