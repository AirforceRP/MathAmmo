import SwiftUI

struct SupportView: View {
    @State private var showingHelpDesk = false
    let faqs = [
        // Getting Started
        FAQ(
            question: "How do I track my progress?",
            answer: "Your progress is automatically tracked in the Profile section. You can see your completion rates, achievements, and recent activity there."
        ),
        FAQ(
            question: "Can I practice offline?",
            answer: "Yes! Download lessons in the Offline Content section to practice without an internet connection."
        ),
        FAQ(
            question: "How do achievements work?",
            answer: "Achievements are unlocked by completing lessons, maintaining streaks, and reaching accuracy milestones."
        ),
        
        // Learning Experience
        FAQ(
            question: "What if I get stuck on a problem?",
            answer: "Take your time and try different approaches. Each problem has hints available. If you're still stuck, you can skip the problem and come back to it later."
        ),
        FAQ(
            question: "How does the difficulty progression work?",
            answer: "Each topic starts with basic concepts and gradually increases in difficulty. You need to master the current level before moving to more challenging problems."
        ),
        FAQ(
            question: "Can I review completed lessons?",
            answer: "Yes! You can always go back to review any lesson you've completed. This is great for refreshing your knowledge or practicing concepts you find challenging."
        ),
        
        // Technical
        FAQ(
            question: "How do I reset my progress?",
            answer: "Go to Settings > Reset Progress. Note that this will permanently delete all your progress data."
        ),
        FAQ(
            question: "Does MathAmmo work without internet?",
            answer: "Yes, but you need to download content first. Go to the Offline Content section to download topics you want to access offline."
        ),
        FAQ(
            question: "How do I update my profile?",
            answer: "Tap the Profile icon, then tap 'Edit Profile' to update your name, avatar, and other settings."
        ),
        
        // Content & Learning
        FAQ(
            question: "What math topics are covered?",
            answer: "MathAmmo currently covers Addition, Subtraction, Multiplication, Division, Fractions, and Decimals. More topics are being added regularly."
        ),
        FAQ(
            question: "How long should I practice each day?",
            answer: "We recommend 15-20 minutes of daily practice for best results. Consistency is more important than long sessions."
        ),
        FAQ(
            question: "Can I skip to advanced topics?",
            answer: "While topics are designed to build on each other, you can choose any topic to start with. However, we recommend following the suggested progression."
        ),
        
        // Account & Data
        FAQ(
            question: "Is my progress saved?",
            answer: "Yes, your progress is automatically saved to your account and syncs across devices when you're online."
        ),
        FAQ(
            question: "How secure is my data?",
            answer: "We take data security seriously. All personal information and progress data is encrypted and stored securely."
        ),
        FAQ(
            question: "Can I use MathAmmo on multiple devices?",
            answer: "Yes! Sign in with your account on any device to access your progress and continue learning."
        )
    ]
    
    var body: some View {
        ScrollView {
            VStack(spacing: 24) {
                // Header
                ModernCard(
                    title: "Need Help?",
                    subtitle: "We're here to support you",
                    systemImage: "questionmark.circle.fill",
                    color: .blue
                ) {
                    Button(action: { showingHelpDesk = true }) {
                        HStack {
                            Text("Visit Help Center")
                            Spacer()
                            Image(systemName: "arrow.right")
                        }
                        .padding()
                        .background(Color.blue)
                        .foregroundColor(.white)
                        .cornerRadius(12)
                    }
                }
                
                // FAQs Section
                VStack(alignment: .leading, spacing: 16) {
                    Text("Frequently Asked Questions")
                        .font(.title2)
                        .bold()
                    
                    VStack(spacing: 16) {
                        ForEach(faqs) { faq in
                            FAQView(faq: faq)
                        }
                    }
                }
                .padding()
                .background(Color(.systemBackground))
                .cornerRadius(16)
                
                // Contact Support
                ModernCard(
                    title: "Still Need Help?",
                    subtitle: "Contact our support team",
                    systemImage: "envelope.fill",
                    color: .green
                ) {
                    Link(destination: URL(string: "mailto:support@airforcerp.com")!) {
                        HStack {
                            Text("Email Support")
                            Spacer()
                            Image(systemName: "envelope.fill")
                        }
                        .padding()
                        .background(Color.green)
                        .foregroundColor(.white)
                        .cornerRadius(12)
                    }
                }
            }
            .padding()
        }
        .navigationTitle("Support")
        .background(Color(.systemGroupedBackground))
        .sheet(isPresented: $showingHelpDesk) {
            NavigationView {
                HelpDeskView()
            }
        }
    }
}

struct FAQ: Identifiable {
    let id = UUID()
    let question: String
    let answer: String
}

struct FAQView: View {
    let faq: FAQ
    @State private var isExpanded = false
    
    var body: some View {
        DisclosureGroup(
            isExpanded: $isExpanded,
            content: {
                Text(faq.answer)
                    .font(.body)
                    .foregroundColor(.secondary)
                    .padding(.vertical, 8)
            },
            label: {
                Text(faq.question)
                    .font(.headline)
            }
        )
        .padding()
        .background(Color(.systemGray6))
        .cornerRadius(12)
    }
}

#Preview {
    NavigationView {
        SupportView()
    }
} 