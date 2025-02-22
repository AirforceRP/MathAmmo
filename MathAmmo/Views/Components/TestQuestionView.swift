import SwiftUI

struct TestQuestionView: View {
    let question: MathQuestion
    @Binding var userAnswer: Int?
    
    var body: some View {
        VStack(spacing: 24) {
            // Question Display
            ModernCard(
                title: "Question",
                subtitle: "Test your knowledge",
                systemImage: "questionmark.circle.fill",
                color: .blue
            ) {
                Text(question.questionText)
                    .font(.system(size: 40, weight: .bold))
                    .padding()
            }
            
            // Answer Input
            VStack(spacing: 12) {
                TextField(
                    "Enter your answer",
                    value: $userAnswer,
                    format: .number
                )
                .keyboardType(.numberPad)
                .textFieldStyle(RoundedBorderTextFieldStyle())
                .font(.title2)
                .multilineTextAlignment(.center)
                .frame(width: 150)
                
                Text("Tap to enter your answer")
                    .font(.caption)
                    .foregroundColor(.secondary)
            }
            .padding()
            .background(Color(.systemBackground))
            .cornerRadius(12)
            .shadow(color: Color.black.opacity(0.05), radius: 5, x: 0, y: 2)
        }
        .padding()
    }
}

// Preview Provider
struct TestQuestionView_Previews: PreviewProvider {
    static var previews: some View {
        TestQuestionView(
            question: MathQuestion(
                number1: 12,
                number2: 5,
                operation: "+",
                correctAnswer: 17
            ),
            userAnswer: .constant(nil)
        )
        .padding()
        .previewLayout(.sizeThatFits)
    }
} 