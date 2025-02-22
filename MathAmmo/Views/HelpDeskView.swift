import SwiftUI

struct HelpDeskView: View {
    @StateObject private var ticketManager = TicketManager()
    @State private var searchText = ""
    @State private var selectedCategory: HelpCategory = .gettingStarted
    @State private var showingTicketForm = false
    @State private var selectedTab = 0
    @AppStorage("userId") private var userId = UUID().uuidString
    
    enum HelpCategory: String, CaseIterable {
        case gettingStarted = "Getting Started"
        case learning = "Learning"
        case technical = "Technical"
        case account = "Account & Data"
    }
    
    var filteredArticles: [HelpArticle] {
        if searchText.isEmpty {
            return helpArticles.filter { $0.category == selectedCategory }
        }
        return helpArticles.filter { article in
            article.title.localizedCaseInsensitiveContains(searchText) ||
            article.content.localizedCaseInsensitiveContains(searchText)
        }
    }
    
    var body: some View {
        VStack(spacing: 0) {
            // Tab Selector
            Picker("View", selection: $selectedTab) {
                Text("Help Articles").tag(0)
                Text("My Tickets").tag(1)
            }
            .pickerStyle(.segmented)
            .padding()
            
            if selectedTab == 0 {
                // Help Articles View
                ScrollView {
                    VStack(spacing: 24) {
                        // Search Bar
                        HStack {
                            Image(systemName: "magnifyingglass")
                                .foregroundColor(.secondary)
                            TextField("Search help articles...", text: $searchText)
                        }
                        .padding()
                        .background(Color(.systemGray6))
                        .cornerRadius(12)
                        
                        // Category Selector
                        ScrollView(.horizontal, showsIndicators: false) {
                            HStack(spacing: 12) {
                                ForEach(HelpCategory.allCases, id: \.self) { category in
                                    CategoryButton(
                                        title: category.rawValue,
                                        isSelected: category == selectedCategory,
                                        action: { selectedCategory = category }
                                    )
                                }
                            }
                            .padding(.horizontal)
                        }
                        
                        // Help Articles
                        LazyVStack(spacing: 16) {
                            ForEach(filteredArticles) { article in
                                HelpArticleCard(article: article)
                            }
                        }
                        
                        // Support Options
                        VStack(spacing: 16) {
                            Text("Still Need Help?")
                                .font(.title2)
                                .bold()
                            
                            // Create Ticket Button
                            Button(action: { showingTicketForm = true }) {
                                HStack {
                                    Image(systemName: "ticket.fill")
                                    Text("Create Support Ticket")
                                }
                                .frame(maxWidth: .infinity)
                                .padding()
                                .background(Color.blue)
                                .foregroundColor(.white)
                                .cornerRadius(12)
                            }
                            
                            // Email Support Button
                            Link(destination: URL(string: "mailto:support@airforcerp.com")!) {
                                HStack {
                                    Image(systemName: "envelope.fill")
                                    Text("Email Support")
                                }
                                .frame(maxWidth: .infinity)
                                .padding()
                                .background(Color.green)
                                .foregroundColor(.white)
                                .cornerRadius(12)
                            }
                        }
                        .padding()
                        .background(Color(.systemBackground))
                        .cornerRadius(16)
                    }
                    .padding()
                }
            } else {
                // Tickets View
                TicketListView()
                    .environmentObject(ticketManager)
                    .padding()
            }
        }
        .navigationTitle("Help Center")
        .sheet(isPresented: $showingTicketForm) {
            SupportTicketForm()
                .environmentObject(ticketManager)
                .onDisappear {
                    selectedTab = 1
                    ticketManager.loadTickets(forUser: userId)
                }
        }
        .environmentObject(ticketManager)
    }
}

struct HelpArticle: Identifiable {
    let id = UUID()
    let title: String
    let content: String
    let category: HelpDeskView.HelpCategory
}

struct HelpArticleCard: View {
    let article: HelpArticle
    @State private var isExpanded = false
    
    var body: some View {
        DisclosureGroup(
            isExpanded: $isExpanded,
            content: {
                Text(article.content)
                    .font(.body)
                    .foregroundColor(.secondary)
                    .padding(.vertical, 8)
            },
            label: {
                Text(article.title)
                    .font(.headline)
            }
        )
        .padding()
        .background(Color(.systemGray6))
        .cornerRadius(12)
    }
}

struct CategoryButton: View {
    let title: String
    let isSelected: Bool
    let action: () -> Void
    
    var body: some View {
        Button(action: action) {
            Text(title)
                .padding(.horizontal, 16)
                .padding(.vertical, 8)
                .background(isSelected ? Color.blue : Color(.systemGray6))
                .foregroundColor(isSelected ? .white : .primary)
                .cornerRadius(20)
        }
    }
}

#Preview {
    NavigationView {
        HelpDeskView()
    }
}
