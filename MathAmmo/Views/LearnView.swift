import SwiftUI

struct LearnView: View {
    let topics = [
        Topic(name: "Addition", icon: "plus", color: .blue),
        Topic(name: "Subtraction", icon: "minus", color: .green),
        Topic(name: "Multiplication", icon: "multiply", color: .orange),
        Topic(name: "Division", icon: "divide", color: .purple),
        Topic(name: "Fractions", icon: "number", color: .pink),
        Topic(name: "Decimals", icon: "number.circle", color: .cyan),
        Topic(name: "Algebra", icon: "", color: .brown)
    ]
    
    var body: some View {
        ScrollView {
            VStack(spacing: 20) {
                // Header Card
                ModernCard(
                    title: "Learn Mathematics",
                    subtitle: "Choose a topic to start learning",
                    systemImage: "book.fill",
                    color: .blue
                ) {
                    Text("Track your progress and master each topic")
                        .font(.caption)
                        .foregroundColor(.secondary)
                }
                
                // Topics Grid
                LazyVGrid(columns: [
                    GridItem(.flexible()),
                    GridItem(.flexible())
                ], spacing: 16) {
                    ForEach(topics) { topic in
                        NavigationLink(destination: TopicDetailView(topic: topic.name)) {
                            TopicCard(title: topic.name, icon: topic.icon, color: topic.color)
                        }
                    }
                }
            }
            .padding()
        }
        .navigationTitle("Learn")
    }
}

struct Topic: Identifiable {
    let id = UUID()
    let name: String
    let icon: String
    let color: Color
}

#Preview {
    NavigationView {
        LearnView()
            .environmentObject(ProgressManager())
    }
} 
