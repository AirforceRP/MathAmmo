import Foundation

struct SupportTicket: Identifiable, Codable, Equatable {
    var id: Int?
    let userId: String
    let category: String
    let subject: String
    let description: String
    var status: TicketStatus
    let createdAt: Date
    let updatedAt: Date
    let email: String
    
    enum TicketStatus: String, Codable, Equatable {
        case open = "Open"
        case inProgress = "In Progress"
        case resolved = "Resolved"
        case closed = "Closed"
    }
} 