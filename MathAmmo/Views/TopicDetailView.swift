import SwiftUI

struct TopicDetailView: View {
    let topic: String
    @State private var selectedLevel = 0
    @EnvironmentObject var progressManager: ProgressManager
    
    var levels: [(String, String, String, Color)] {
        switch topic {
        case "Addition":
            return [
                ("Basics", "Numbers 1-10", "1️⃣", .blue),
                ("Adding Tens", "Numbers up to 100", "2️⃣", .green),
                ("Advanced", "Multi-digit numbers", "3️⃣", .orange),
                ("Word Problems", "Real-world applications", "📝", .purple)
            ]
        case "Multiplication":
            return [
                ("Times Tables", "Learn multiplication tables", "📊", .orange),
                ("Properties", "Commutative & Associative", "🔄", .blue),
                ("Word Problems", "Real-world applications", "📝", .green),
                ("Advanced", "Multiple steps", "🎯", .purple)
            ]
        case "Division":
            return [
                ("Basic Division", "Understanding division", "➗", .purple),
                ("Long Division", "Step by step process", "📝", .blue),
                ("Word Problems", "Real-world applications", "🌍", .green),
                ("Advanced", "Complex problems", "⭐️", .orange)
            ]
        // Add more cases for other topics...
        default:
            return [
                ("Level 1", "Getting Started", "1️⃣", .blue),
                ("Level 2", "Practice", "2️⃣", .green),
                ("Level 3", "Advanced", "3️⃣", .orange)
            ]
        }
    }
    
    var body: some View {
        ScrollView {
            VStack(spacing: 24) {
                // Topic Header
                VStack(spacing: 8) {
                    Text(topic)
                        .font(.system(size: 34, weight: .bold))
                    Text("Master \(topic.lowercased()) with interactive lessons")
                        .font(.subheadline)
                        .foregroundColor(.secondary)
                }
                .padding(.top)
                
                // Progress Overview
                ModernCard(
                    title: "Your Progress",
                    subtitle: "Keep going!",
                    systemImage: "chart.line.uptrend.xyaxis",
                    color: .purple
                ) {
                    VStack(spacing: 12) {
                        HStack {
                            Text("Overall Progress")
                            Spacer()
                            Text("\(Int(progressManager.getProgress(for: topic) * 100))%")
                        }
                        ProgressView(value: progressManager.getProgress(for: topic))
                            .tint(.purple)
                        
                        HStack(spacing: 20) {
                            StatItem(value: "\(progressManager.getStars(for: topic))/3", title: "Stars")
                            StatItem(value: "\(Int(progressManager.getAccuracy(for: topic) * 100))%", title: "Accuracy")
                            StatItem(value: "\(progressManager.getBestStreak(for: topic))", title: "Best Streak")
                        }
                        .padding(.top, 8)
                    }
                }
                
                // Course Levels
                ForEach(Array(levels.enumerated()), id: \.offset) { index, level in
                    NavigationLink(destination: LessonView(level: level.0, topic: topic)) {
                        CourseLevelCard(
                            title: level.0,
                            subtitle: level.1,
                            emoji: level.2,
                            color: level.3,
                            isLocked: index > progressManager.getStars(for: topic),
                            progress: index <= progressManager.getStars(for: topic) ? 1.0 : 0.0
                        )
                    }
                    .disabled(index > progressManager.getStars(for: topic))
                }
            }
            .padding()
        }
        .navigationBarTitleDisplayMode(.inline)
        .background(Color(.systemGroupedBackground))
    }
}

struct CourseLevelCard: View {
    let title: String
    let subtitle: String
    let emoji: String
    let color: Color
    let isLocked: Bool
    let progress: Double
    
    var body: some View {
        HStack(spacing: 16) {
            // Emoji Circle
            Text(emoji)
                .font(.title)
                .frame(width: 50, height: 50)
                .background(color.opacity(0.2))
                .clipShape(Circle())
            
            // Content
            VStack(alignment: .leading, spacing: 4) {
                Text(title)
                    .font(.headline)
                Text(subtitle)
                    .font(.caption)
                    .foregroundColor(.secondary)
                
                ProgressView(value: progress)
                    .tint(color)
            }
            
            Spacer()
            
            // Lock/Unlock indicator
            Image(systemName: isLocked ? "lock.fill" : "chevron.right")
                .foregroundColor(isLocked ? .secondary : color)
        }
        .padding()
        .background(Color(.systemBackground))
        .cornerRadius(16)
        .shadow(color: Color.black.opacity(0.1), radius: 10, x: 0, y: 5)
        .opacity(isLocked ? 0.7 : 1.0)
    }
}

#Preview {
    NavigationView {
        TopicDetailView(topic: "Addition")
            .environmentObject(ProgressManager())
    }
} 