import SwiftUI

struct SubscriptionBannerView: View {
    var body: some View {
        VStack(spacing: 20) {
            ModernCard(
                title: "Premium Features",
                subtitle: "Unlock all content",
                systemImage: "star.fill",
                color: .yellow
            ) {
                VStack(spacing: 12) {
                    HStack {
                        FeatureItem(icon: "checkmark.circle.fill", text: "All topics")
                        FeatureItem(icon: "checkmark.circle.fill", text: "No ads")
                        FeatureItem(icon: "checkmark.circle.fill", text: "Offline mode")
                    }
                }
            }
            
            // Subscribe Button
            Button(action: {
                // Present subscription view
            }) {
                Text("Subscribe Now")
                    .font(.headline)
                    .foregroundColor(.white)
                    .frame(maxWidth: .infinity)
                    .padding()
                    .background(Color.blue)
                    .cornerRadius(12)
            }
        }
        .padding()
    }
}

struct FeatureItem: View {
    let icon: String
    let text: String
    
    var body: some View {
        HStack {
            Image(systemName: icon)
                .foregroundColor(.green)
            Text(text)
                .font(.caption)
        }
    }
} 
