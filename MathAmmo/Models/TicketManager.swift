import Foundation

class TicketManager: ObservableObject {
    @Published var tickets: [SupportTicket] = [] {
        didSet {
            print("Tickets updated in TicketManager: \(tickets.count) tickets")
        }
    }
    
    func loadTickets(forUser userId: String) {
        print("Loading tickets for user: \(userId)")
        DispatchQueue.main.async {
            self.tickets = DatabaseService.shared.getTickets(forUser: userId)
            print("Loaded \(self.tickets.count) tickets")
        }
    }
    
    func addTicket(_ ticket: SupportTicket) {
        print("Adding new ticket: \(ticket.subject)")
        if let ticketId = DatabaseService.shared.createTicket(ticket: ticket) {
            var newTicket = ticket
            newTicket.id = ticketId
            DispatchQueue.main.async {
                self.tickets.insert(newTicket, at: 0)
                print("Added ticket #\(ticketId) to list. Total tickets: \(self.tickets.count)")
            }
        } else {
            print("Failed to create ticket in database")
        }
    }
    
    func updateTicketStatus(ticketId: Int, status: SupportTicket.TicketStatus) {
        if DatabaseService.shared.updateTicketStatus(ticketId: ticketId, status: status) {
            if let index = tickets.firstIndex(where: { $0.id == ticketId }) {
                DispatchQueue.main.async {
                    self.tickets[index].status = status
                }
            }
        }
    }
} 