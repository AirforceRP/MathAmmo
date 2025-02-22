import SwiftUI

struct QuestionView: View {
    let question: MathQuestion
    
    var body: some View {
        VStack(spacing: 20) {
            Text("Solve:")
                .font(.title3)
            
            Text(question.questionText)
                .font(.system(size: 40, weight: .bold))
        }
        .padding()
    }
} 