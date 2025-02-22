import SwiftUI

struct SettingsView: View {
    @AppStorage("isDarkMode") private var isDarkMode = false
    @AppStorage("notifications") private var notifications = true
    @AppStorage("soundEffects") private var soundEffects = true
    @State private var showingPrivacy = false
    @State private var showingTerms = false
    
    var body: some View {
        Form {
            Section(header: Text("Appearance")) {
                Toggle("Dark Mode", isOn: $isDarkMode)
            }
            
            Section(header: Text("Notifications")) {
                Toggle("Enable Notifications", isOn: $notifications)
            }
            
            Section(header: Text("Sound")) {
                Toggle("Sound Effects", isOn: $soundEffects)
            }
            
            Section(header: Text("Subscription")) {
                NavigationLink("Manage Subscription") {
                    SubscriptionView()
                }
            }
            
            Section(header: Text("Legal")) {
                Button("Privacy Policy") {
                    showingPrivacy = true
                }
                
                Button("Terms of Service") {
                    showingTerms = true
                }
                
                Text("Version 1.0.0")
                    .foregroundColor(.secondary)
            }
            
            Section(header: Text("Help")) {
                NavigationLink(destination: SupportView()) {
                    Label("Support & FAQs", systemImage: "questionmark.circle.fill")
                }
            }
            
            Section {
                VStack(spacing: 4) {
                    Text("Made with ❤️ by")
                        .foregroundColor(.secondary)
                    Text("Luc François Sun")
                        .font(.headline)
                }
                .frame(maxWidth: .infinity, alignment: .center)
                .listRowBackground(Color.clear)
            }
        }
        .navigationTitle("Settings")
        .sheet(isPresented: $showingPrivacy) {
            TermsAndPrivacyView(isPrivacyPolicy: true)
        }
        .sheet(isPresented: $showingTerms) {
            TermsAndPrivacyView(isPrivacyPolicy: false)
        }
    }
} 