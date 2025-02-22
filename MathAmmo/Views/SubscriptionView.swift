import SwiftUI
import StoreKit

struct SubscriptionView: View {
    @State private var selectedPlan: SubscriptionPlan = .monthly
    @State private var isRestoring = false
    @State private var showingAlert = false
    @State private var alertMessage = ""
    @Environment(\.dismiss) private var dismiss
    
    enum SubscriptionPlan {
        case monthly
        case yearly
        case lifetime
        
        var price: String {
            switch self {
            case .monthly: return "$2.99"
            case .yearly: return "$29.99"
            case .lifetime: return "$199.99"
            }
        }
        
        var title: String {
            switch self {
            case .monthly: return "Monthly"
            case .yearly: return "Yearly"
            case .lifetime: return "Lifetime"
            }
        }
        
        var description: String {
            switch self {
            case .monthly: return "Full features for short-term use."
            case .yearly: return "Save with annual billing."
            case .lifetime: return "Pay once for lifetime access."
            }
        }
        
        var savings: String? {
            switch self {
            case .yearly: return "Save 17%"
            case .lifetime: return "Best Value"
            default: return nil
            }
        }
        
        var highlight: Bool {
            self == .lifetime
        }
    }
    
    let plans: [SubscriptionPlan] = [.monthly, .yearly, .lifetime]
    
    var body: some View {
        ScrollView {
            VStack(spacing: 20) {
                Text("Affordable Pricing Plans")
                    .font(.title)
                    .bold()
                    .foregroundColor(.indigo)
                    .padding(.top)
                
                // Subscription Plans List
                VStack(spacing: 16) {
                    ForEach(plans, id: \.title) { plan in
                        PlanCard(
                            plan: plan,
                            isSelected: selectedPlan == plan,
                            action: { selectedPlan = plan }
                        )
                    }
                }
                .padding(.horizontal)
                
                // Features Overview
                Text("Features Overview")
                    .font(.title2)
                    .bold()
                    .foregroundColor(.indigo)
                    .padding(.top, 30)
                
                VStack(alignment: .leading, spacing: 16) {
                    FeatureRow(icon: "star.fill", text: "All math topics and lessons", color: .yellow)
                    FeatureRow(icon: "arrow.down.circle.fill", text: "Offline access", color: .blue)
                    FeatureRow(icon: "hand.raised.fill", text: "Ad-free experience", color: .purple)
                    FeatureRow(icon: "chart.line.uptrend.xyaxis", text: "Progress tracking", color: .green)
                    FeatureRow(icon: "person.2.fill", text: "Family sharing", color: .orange)
                    FeatureRow(icon: "infinity", text: "Unlimited practice", color: .red)
                }
                .padding()
                .background(Color(.systemBackground))
                .cornerRadius(16)
                .shadow(color: Color.black.opacity(0.1), radius: 10)
                .padding(.horizontal)
                
                // Subscribe Button
                Button(action: subscribe) {
                    if isRestoring {
                        ProgressView()
                            .progressViewStyle(CircularProgressViewStyle(tint: .white))
                    } else {
                        Text(selectedPlan == .lifetime ? "Purchase Lifetime" : "Subscribe Now")
                            .font(.headline)
                    }
                }
                .frame(maxWidth: .infinity)
                .padding()
                .background(Color.blue)
                .foregroundColor(.white)
                .cornerRadius(25)
                .padding(.horizontal)
                .disabled(isRestoring)
                
                // Restore Purchases Button
                Button(action: restorePurchases) {
                    Text("Restore Purchases")
                        .font(.subheadline)
                        .foregroundColor(.blue)
                }
                .padding(.top, 8)
                
                // Terms
                VStack(spacing: 4) {
                    if selectedPlan != .lifetime {
                        Text("Cancel anytime. Terms apply.")
                            .font(.caption)
                            .foregroundColor(.secondary)
                    }
                    
                    HStack(spacing: 4) {
                        Text("By continuing you agree to our")
                            .font(.caption2)
                        Button("Terms of Service") {
                            // Show terms
                        }
                        .font(.caption2)
                    }
                    .foregroundColor(.secondary)
                }
                .padding()
            }
        }
        .alert("Restore Purchases", isPresented: $showingAlert) {
            Button("OK") { }
        } message: {
            Text(alertMessage)
        }
        .navigationBarTitleDisplayMode(.inline)
    }
    
    private func subscribe() {
        // Implement StoreKit purchase logic here
        isRestoring = true
        // Simulate network request
        DispatchQueue.main.asyncAfter(deadline: .now() + 1.5) {
            isRestoring = false
            alertMessage = "Subscription successful!"
            showingAlert = true
        }
    }
    
    private func restorePurchases() {
        isRestoring = true
        // Implement StoreKit restore purchases logic here
        DispatchQueue.main.asyncAfter(deadline: .now() + 1.5) {
            isRestoring = false
            alertMessage = "Your purchases have been restored!"
            showingAlert = true
        }
    }
}

struct PlanCard: View {
    let plan: SubscriptionView.SubscriptionPlan
    let isSelected: Bool
    let action: () -> Void
    
    var body: some View {
        Button(action: action) {
            HStack(alignment: .center, spacing: 16) {
                // Left side - Title and Description
                VStack(alignment: .leading, spacing: 4) {
                    HStack {
                        Text(plan.title)
                            .font(.headline)
                        
                        if plan.highlight {
                            Text("Lifetime")
                                .font(.caption)
                                .padding(.horizontal, 8)
                                .padding(.vertical, 4)
                                .background(Color.blue.opacity(0.2))
                                .cornerRadius(12)
                        }
                    }
                    
                    Text(plan.description)
                        .font(.caption)
                        .foregroundColor(.secondary)
                }
                
                Spacer()
                
                // Right side - Price and Savings
                VStack(alignment: .trailing, spacing: 4) {
                    Text(plan.price)
                        .font(.title3)
                        .bold()
                        .foregroundColor(.indigo)
                    
                    if let savings = plan.savings {
                        Text(savings)
                            .font(.caption)
                            .foregroundColor(plan == .lifetime ? .blue : .green)
                            .padding(.horizontal, 8)
                            .padding(.vertical, 4)
                            .background(
                                (plan == .lifetime ? Color.blue : Color.green)
                                    .opacity(0.2)
                            )
                            .cornerRadius(8)
                    }
                }
            }
            .padding()
            .frame(maxWidth: .infinity)
            .background(isSelected ? Color.blue.opacity(0.1) : Color(.systemGray6))
            .cornerRadius(16)
            .overlay(
                RoundedRectangle(cornerRadius: 16)
                    .stroke(isSelected ? Color.blue : Color.clear, lineWidth: 2)
            )
        }
    }
}

struct FeatureRow: View {
    let icon: String
    let text: String
    let color: Color
    
    var body: some View {
        HStack(spacing: 12) {
            Image(systemName: icon)
                .font(.title2)
                .foregroundColor(color)
                .frame(width: 32)
            
            Text(text)
                .font(.body)
        }
    }
}

#Preview {
    NavigationView {
        SubscriptionView()
    }
} 
