import SwiftUI
import Foundation

struct PracticeProblem: View {
    let problem: String
    @State private var answer = ""
    @State private var isCorrect: Bool?
    @State private var showingExplanation = false
    
    var body: some View {
        VStack(alignment: .leading, spacing: 16) {
            // Problem
            Text(problem)
                .font(.system(size: 24, weight: .medium))
            
            // Answer input and check button
            HStack(spacing: 12) {
                TextField("Your answer", text: $answer)
                    .textFieldStyle(.roundedBorder)
                    .keyboardType(.numberPad)
                    .frame(maxWidth: 120)
                    .font(.system(size: 18))
                
                Button(action: checkAnswer) {
                    Text("Check")
                        .foregroundColor(.white)
                        .padding(.horizontal, 20)
                        .padding(.vertical, 8)
                        .background(Color.blue)
                        .cornerRadius(20)
                }
                
                if let isCorrect = isCorrect {
                    Image(systemName: isCorrect ? "checkmark.circle.fill" : "xmark.circle.fill")
                        .foregroundColor(isCorrect ? .green : .red)
                }
            }
            
            // Explanation
            if showingExplanation && !(isCorrect ?? false) {
                Text(getExplanation())
                    .font(.subheadline)
                    .foregroundColor(.red)
            }
        }
    }
    
    private func checkAnswer() {
        guard let userInt = Int(answer) else {
            isCorrect = false
            showingExplanation = true
            return
        }
        
        isCorrect = userInt == expectedAnswer
        showingExplanation = true
    }
    
    private var expectedAnswer: Int {
        let parts = problem.components(separatedBy: "+").map { $0.trimmingCharacters(in: .whitespaces) }
        if parts.count == 2 {
            let firstNumber = Int(parts[0]) ?? 0
            let secondNumber = Int(parts[1].components(separatedBy: "=")[0].trimmingCharacters(in: .whitespaces)) ?? 0
            return firstNumber + secondNumber
        }
        return 0
    }
    
    private func getExplanation() -> String {
        let parts = problem.components(separatedBy: "+").map { $0.trimmingCharacters(in: .whitespaces) }
        if parts.count == 2 {
            let firstNumber = Int(parts[0]) ?? 0
            let secondNumber = Int(parts[1].components(separatedBy: "=")[0].trimmingCharacters(in: .whitespaces)) ?? 0
            return "Let's break it down: \(firstNumber) + \(secondNumber) = \(firstNumber + secondNumber). Try counting step by step!"
        }
        return "Let's try again!"
    }
}

#Preview {
    VStack(spacing: 20) {
        PracticeProblem(problem: "2 + 3 = ?")
        PracticeProblem(problem: "4 + 3 = ?")
    }
    .padding()
} 