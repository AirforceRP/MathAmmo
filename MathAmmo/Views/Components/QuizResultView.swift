import SwiftUI

struct QuizResultView: View {
    let score: Int
    let total: Int
    let onRestart: () -> Void
    
    var percentage: Int {
        Int((Double(score) / Double(total)) * 100)
    }
    
    var body: some View {
        VStack(spacing: 20) {
            Text("Quiz Complete!")
                .font(.largeTitle)
                .bold()
            
            Text("🎯 Score: \(score)/\(total)")
                .font(.title)
            
            Text("\(percentage)%")
                .font(.system(size: 60, weight: .bold))
                .foregroundColor(scoreColor)
            
            Text(feedbackMessage)
                .font(.title2)
                .multilineTextAlignment(.center)
                .padding()
            
            Button("Try Again") {
                onRestart()
            }
            .buttonStyle(.borderedProminent)
        }
    }
    
    private var scoreColor: Color {
        switch percentage {
        case 90...100: return .green
        case 70..<90: return .blue
        case 50..<70: return .orange
        default: return .red
        }
    }
    
    private var feedbackMessage: String {
        switch percentage {
        case 90...100: return "Excellent! You're a math genius! 🌟"
        case 70..<90: return "Great job! Keep practicing! 👏"
        case 50..<70: return "Good effort! Room for improvement! 💪"
        default: return "Keep practicing! You'll get better! ��"
        }
    }
} 