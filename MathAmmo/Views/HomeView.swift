import SwiftUI

struct HomeView: View {
    var body: some View {
        NavigationView {
            VStack(spacing: 25) {
                Text("MathAmmo 🎯")
                    .font(.system(size: 40, weight: .bold))
                
                VStack(spacing: 20) {
                    NavigationLink(destination: LearnView()) {
                        HomeButtonView(title: "Learn", icon: "book.fill", color: .blue)
                    }
                    
                    NavigationLink(destination: QuizView()) {
                        HomeButtonView(title: "Quiz", icon: "questionmark.circle.fill", color: .green)
                    }
                    
                    NavigationLink(destination: TestView()) {
                        HomeButtonView(title: "Test", icon: "checkmark.circle.fill", color: .orange)
                    }
                    
                    NavigationLink(destination: OfflineContentView()) {
                        HomeButtonView(title: "Offline Content", icon: "arrow.down.circle.fill", color: .purple)
                    }
                }
                
                Spacer()
                
                if !UserDefaults.standard.bool(forKey: "isPremium") {
                    SubscriptionBannerView()
                }
            }
            .padding()
            .toolbar {
                ToolbarItem(placement: .navigationBarLeading) {
                    NavigationLink(destination: ProfileView()) {
                        Image(systemName: "person.circle")
                            .font(.title2)
                    }
                }
                
                ToolbarItem(placement: .navigationBarTrailing) {
                    NavigationLink(destination: SettingsView()) {
                        Image(systemName: "gear")
                            .font(.title2)
                    }
                }
            }
        }
    }
} 