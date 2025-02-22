import SwiftUI

struct TicketListView: View {
    @EnvironmentObject var ticketManager: TicketManager
    @State private var selectedFilter: TicketFilter = .active
    @AppStorage("userId") private var userId = UUID().uuidString
    
    enum TicketFilter: String, CaseIterable {
        case active = "Active"
        case archived = "Archived"
    }
    
    var body: some View {
        VStack(spacing: 16) {
            // Filter Selector
            Picker("Filter", selection: $selectedFilter) {
                ForEach(TicketFilter.allCases, id: \.self) { filter in
                    Text(filter.rawValue)
                }
            }
            .pickerStyle(.segmented)
            
            ScrollView {
                if filteredTickets.isEmpty {
                    EmptyTicketView(isActive: selectedFilter == .active)
                } else {
                    LazyVStack(spacing: 12) {
                        ForEach(filteredTickets) { ticket in
                            TicketCard(ticket: ticket)
                        }
                    }
                }
            }
        }
        .onAppear {
            print("TicketListView appeared")
            ticketManager.loadTickets(forUser: userId)
        }
        .onReceive(ticketManager.$tickets) { tickets in
            print("Tickets updated: \(tickets.count) tickets")
        }
    }
    
    private var filteredTickets: [SupportTicket] {
        let filtered = switch selectedFilter {
        case .active:
            ticketManager.tickets.filter { $0.status == .open || $0.status == .inProgress }
        case .archived:
            ticketManager.tickets.filter { $0.status == .resolved || $0.status == .closed }
        }
        print("Filtered tickets (\(selectedFilter)): \(filtered.count)")
        return filtered
    }
}

struct EmptyTicketView: View {
    let isActive: Bool
    
    var body: some View {
        VStack(spacing: 12) {
            Image(systemName: isActive ? "ticket" : "archivebox")
                .font(.largeTitle)
                .foregroundColor(.secondary)
            Text(isActive ? "No active tickets" : "No archived tickets")
                .foregroundColor(.secondary)
        }
        .frame(maxWidth: .infinity, minHeight: 200)
        .background(Color(.systemGray6))
        .cornerRadius(12)
    }
}

struct TicketCard: View {
    let ticket: SupportTicket
    
    var statusColor: Color {
        switch ticket.status {
        case .open: return .blue
        case .inProgress: return .orange
        case .resolved: return .green
        case .closed: return .gray
        }
    }
    
    var body: some View {
        VStack(alignment: .leading, spacing: 12) {
            HStack {
                Text("#\(ticket.id ?? 0)")
                    .font(.caption)
                    .foregroundColor(.secondary)
                Spacer()
                Text(ticket.status.rawValue)
                    .font(.caption)
                    .padding(.horizontal, 8)
                    .padding(.vertical, 4)
                    .background(statusColor.opacity(0.1))
                    .foregroundColor(statusColor)
                    .cornerRadius(8)
            }
            
            Text(ticket.subject)
                .font(.headline)
            
            Text(ticket.category)
                .font(.subheadline)
                .foregroundColor(.secondary)
            
            HStack {
                Image(systemName: "clock")
                    .foregroundColor(.secondary)
                Text(ticket.createdAt, style: .relative)
                    .font(.caption)
                    .foregroundColor(.secondary)
            }
        }
        .padding()
        .background(Color(.systemBackground))
        .cornerRadius(12)
        .shadow(color: Color.black.opacity(0.1), radius: 5, x: 0, y: 2)
    }
} 