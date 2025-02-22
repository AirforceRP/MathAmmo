import Foundation
import MessageUI

class EmailService {
    static let shared = EmailService()
    
    func sendTicketConfirmation(to email: String, ticketId: Int, subject: String) {
        let emailContent = """
        Thank you for contacting MathAmmo Support!
        
        Your support ticket (#\(ticketId)) has been received and our team will review it shortly.
        
        Ticket Details:
        Subject: \(subject)
        Status: Open
        
        We'll notify you of any updates via email.
        
        Best regards,
        MathAmmo Support Team
        """
        
        sendEmail(to: email, subject: "Support Ticket #\(ticketId) Confirmation", body: emailContent)
    }
    
    private func sendEmail(to recipient: String, subject: String, body: String) {
        // Configure email settings
        let smtpServer = "smtp.yourserver.com"
        let smtpPort = 587
        let username = "support@airforcerp.com"
        let password = "your_secure_password" // Use secure storage in production
        
        // Implementation would use a proper SMTP library
        // For demo purposes, just print the email
        print("Sending email to: \(recipient)")
        print("Subject: \(subject)")
        print("Body: \(body)")
    }
} 