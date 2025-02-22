import SwiftUI

struct ProfileView: View {
    @AppStorage("userName") private var userName = ""
    @AppStorage("userAvatar") private var userAvatar = "person.circle.fill"
    @State private var isEditingProfile = false
    
    var body: some View {
        ScrollView {
            VStack(spacing: 24) {
                // Profile Header
                VStack(spacing: 16) {
                    Image(systemName: userAvatar)
                        .font(.system(size: 80))
                        .foregroundColor(.blue)
                    
                    Text(userName.isEmpty ? "Math Student" : userName)
                        .font(.title)
                        .bold()
                    
                    Button("Edit Profile") {
                        isEditingProfile = true
                    }
                    .buttonStyle(.bordered)
                }
                .padding()
                
                // Stats Section
                ModernCard(
                    title: "Progress Overview",
                    subtitle: "Track your learning journey",
                    systemImage: "chart.bar.fill",
                    color: .blue
                ) {
                    HStack(spacing: 20) {
                        StatItem(value: "85%", title: "Accuracy")
                        StatItem(value: "42", title: "Quizzes")
                        StatItem(value: "12", title: "Tests")
                    }
                }
                
                // Achievements
                ModernCard(
                    title: "Achievements",
                    subtitle: "Your earned badges",
                    systemImage: "trophy.fill",
                    color: .yellow
                ) {
                    ScrollView(.horizontal, showsIndicators: false) {
                        HStack(spacing: 16) {
                            AchievementItem(icon: "star.fill", title: "Math Star")
                            AchievementItem(icon: "flame.fill", title: "On Fire")
                            AchievementItem(icon: "bolt.fill", title: "Quick Solver")
                        }
                    }
                }
                
                // Recent Activity
                ModernCard(
                    title: "Recent Activity",
                    subtitle: "Your learning journey",
                    systemImage: "clock.fill",
                    color: .green
                ) {
                    VStack(alignment: .leading, spacing: 12) {
                        ActivityItem(title: "Completed Addition Quiz", time: "2h ago")
                        ActivityItem(title: "Mastered Multiplication", time: "1d ago")
                        ActivityItem(title: "Started Division", time: "2d ago")
                    }
                }
            }
            .padding()
        }
        .navigationTitle("Profile")
        .sheet(isPresented: $isEditingProfile) {
            EditProfileView(userName: $userName, userAvatar: $userAvatar)
        }
    }
}

struct AchievementItem: View {
    let icon: String
    let title: String
    
    var body: some View {
        VStack {
            Image(systemName: icon)
                .font(.title)
                .foregroundColor(.yellow)
            Text(title)
                .font(.caption)
        }
        .padding()
        .background(Color(.systemGray6))
        .cornerRadius(12)
    }
}

struct ActivityItem: View {
    let title: String
    let time: String
    
    var body: some View {
        HStack {
            Text(title)
                .font(.subheadline)
            Spacer()
            Text(time)
                .font(.caption)
                .foregroundColor(.secondary)
        }
    }
}

#Preview {
    NavigationView {
        ProfileView()
            .environmentObject(ProgressManager())
    }
} 