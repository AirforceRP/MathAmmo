import SwiftUI

struct SupportTicketForm: View {
    @Environment(\.dismiss) var dismiss
    @EnvironmentObject var ticketManager: TicketManager
    @AppStorage("userEmail") private var userEmail = ""
    @AppStorage("userId") private var userId = UUID().uuidString
    @State private var subject = ""
    @State private var description = ""
    @State private var category = "Technical Support"
    @State private var showingConfirmation = false
    @State private var showingError = false
    @State private var errorMessage = ""
    
    let categories = ["Technical Support", "Account Help", "Learning Support", "Other"]
    
    var body: some View {
        NavigationView {
            Form {
                Section(header: Text("Ticket Details")) {
                    TextField("Email", text: $userEmail)
                        .textContentType(.emailAddress)
                        .keyboardType(.emailAddress)
                        .autocapitalization(.none)
                    
                    Picker("Category", selection: $category) {
                        ForEach(categories, id: \.self) { category in
                            Text(category)
                        }
                    }
                    
                    TextField("Subject", text: $subject)
                    
                    TextEditor(text: $description)
                        .frame(height: 150)
                }
                
                Section(header: Text("Additional Information")) {
                    Text("Please provide as much detail as possible to help us assist you better.")
                        .font(.caption)
                        .foregroundColor(.secondary)
                }
            }
            .navigationTitle("New Support Ticket")
            .navigationBarTitleDisplayMode(.inline)
            .toolbar {
                ToolbarItem(placement: .cancellationAction) {
                    Button("Cancel") { dismiss() }
                }
                ToolbarItem(placement: .confirmationAction) {
                    Button("Submit") {
                        submitTicket()
                    }
                    .disabled(subject.isEmpty || description.isEmpty || !isValidEmail(userEmail))
                }
            }
            .alert("Ticket Submitted", isPresented: $showingConfirmation) {
                Button("OK") { dismiss() }
            } message: {
                Text("We'll send updates to \(userEmail)")
            }
            .alert("Error", isPresented: $showingError) {
                Button("OK", role: .cancel) { }
            } message: {
                Text(errorMessage)
            }
        }
    }
    
    private func submitTicket() {
        print("Submitting ticket: \(subject)")
        let ticket = SupportTicket(
            id: nil,
            userId: userId,
            category: category,
            subject: subject,
            description: description,
            status: .open,
            createdAt: Date(),
            updatedAt: Date(),
            email: userEmail
        )
        
        ticketManager.addTicket(ticket)
        print("Ticket submitted, showing confirmation")
        
        showingConfirmation = true
        DispatchQueue.main.asyncAfter(deadline: .now() + 1.5) {
            print("Dismissing ticket form")
            dismiss()
        }
    }
    
    private func isValidEmail(_ email: String) -> Bool {
        let emailRegex = "[A-Z0-9a-z._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,64}"
        let emailPredicate = NSPredicate(format: "SELF MATCHES %@", emailRegex)
        return emailPredicate.evaluate(with: email)
    }
}

#Preview {
    SupportTicketForm()
} 