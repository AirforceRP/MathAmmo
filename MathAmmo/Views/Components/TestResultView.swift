import SwiftUI

struct TestResultView: View {
    let questions: [MathQuestion]
    let userAnswers: [Int?]
    let timeSpent: Int
    let onRestart: () -> Void
    
    var correctAnswers: Int {
        zip(questions, userAnswers).filter { question, answer in
            answer == question.correctAnswer
        }.count
    }
    
    var percentage: Int {
        Int((Double(correctAnswers) / Double(questions.count)) * 100)
    }
    
    var body: some View {
        ScrollView {
            VStack(spacing: 20) {
                Text("Test Complete!")
                    .font(.largeTitle)
                    .bold()
                
                VStack {
                    Text("\(percentage)%")
                        .font(.system(size: 60, weight: .bold))
                        .foregroundColor(scoreColor)
                    
                    Text("Score: \(correctAnswers)/\(questions.count)")
                        .font(.title2)
                    
                    Text("Time: \(timeString(from: timeSpent))")
                        .font(.title2)
                }
                .padding()
                
                // Question Review
                VStack(alignment: .leading, spacing: 15) {
                    Text("Question Review:")
                        .font(.title3)
                        .padding(.bottom)
                    
                    ForEach(Array(questions.enumerated()), id: \.element.id) { index, question in
                        QuestionReviewRow(
                            number: index + 1,
                            question: question,
                            userAnswer: userAnswers[index],
                            isCorrect: userAnswers[index] == question.correctAnswer
                        )
                    }
                }
                .padding()
                
                Button("Try Again") {
                    onRestart()
                }
                .buttonStyle(.borderedProminent)
            }
            .padding()
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
    
    private func timeString(from seconds: Int) -> String {
        let minutes = seconds / 60
        let remainingSeconds = seconds % 60
        return String(format: "%02d:%02d", minutes, remainingSeconds)
    }
}

struct QuestionReviewRow: View {
    let number: Int
    let question: MathQuestion
    let userAnswer: Int?
    let isCorrect: Bool
    
    var body: some View {
        HStack {
            Text("\(number).")
                .font(.headline)
                .frame(width: 30)
            
            Text(question.questionText)
            
            Spacer()
            
            if let userAnswer = userAnswer {
                Text("\(userAnswer)")
                    .foregroundColor(isCorrect ? .green : .red)
            } else {
                Text("No answer")
                    .foregroundColor(.gray)
            }
            
            if !isCorrect {
                Text("(\(question.correctAnswer))")
                    .foregroundColor(.green)
                    .font(.caption)
            }
        }
    }
} 