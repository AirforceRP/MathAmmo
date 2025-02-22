import SwiftUI

struct TermsAndPrivacyView: View {
    @Environment(\.dismiss) private var dismiss
    @Environment(\.colorScheme) var colorScheme
    let isPrivacyPolicy: Bool
    
    var body: some View {
        NavigationView {
            ScrollView {
                VStack(alignment: .leading, spacing: 20) {
                    if isPrivacyPolicy {
                        privacyContent
                    } else {
                        termsContent
                    }
                }
                .padding()
            }
            .background(colorScheme == .dark ? Color.black : Color(.systemGroupedBackground))
            .navigationTitle(isPrivacyPolicy ? "Privacy Policy" : "Terms of Service")
            .navigationBarTitleDisplayMode(.inline)
            .toolbar {
                ToolbarItem(placement: .navigationBarTrailing) {
                    Button("Done") {
                        dismiss()
                    }
                }
            }
        }
    }
    
    private var privacyContent: some View {
        VStack(alignment: .leading, spacing: 16) {
            Text("Last Updated: 11/12/2023")
                .font(.caption)
                .foregroundColor(.secondary)
            
            Group {
                sectionTitle("1. INFORMATION WE COLLECT")
                Text("By using MathAmmo's services, you agree to the collection and use of information as outlined in this Privacy Policy.")
                
                sectionTitle("2. PERSONAL INFORMATION")
                Text("We may collect personal information, including your name and email address when you use the Service. This information is used to provide and improve the Service.")
                
                sectionTitle("3. INFORMATION SHARING")
                Text("We do not sell, trade, or transfer your personal information to third parties without your consent.")
                
                sectionTitle("4. CHILDREN'S PRIVACY")
                Text("Our Service is not intended for children under the age of 13. We do not knowingly collect personal information from children.")
            }
            
            // Add more sections from the privacy policy...
        }
    }
    
    private var termsContent: some View {
        VStack(alignment: .leading, spacing: 16) {
            Text("Last Updated: 11/13/24")
                .font(.caption)
                .foregroundColor(.secondary)
            
            Group {
                sectionTitle("Acceptance of Terms")
                Text("By using MathAmmo, you agree to comply with this Agreement and our Privacy Policy.")
                
                sectionTitle("Privacy")
                Text("Your privacy is important to us. Please review our Privacy Policy for information on how we collect, use, and protect your personal data.")
                
                sectionTitle("Permitted Use")
                Text("Use our app for its intended purpose. Don't engage in illegal activities or misuse our platform.")
                
                sectionTitle("Features")
                bulletPoint("Engaging Math Challenges")
                bulletPoint("Brain-Boosting Exercises")
                bulletPoint("Progress Tracking")
            }
            
            // Add more sections from the terms...
        }
    }
    
    private func sectionTitle(_ text: String) -> some View {
        Text(text)
            .font(.headline)
            .padding(.top, 8)
    }
    
    private func bulletPoint(_ text: String) -> some View {
        HStack(alignment: .top) {
            Text("•")
            Text(text)
        }
    }
} 