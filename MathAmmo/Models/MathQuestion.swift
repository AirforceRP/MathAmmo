import Foundation

struct MathQuestion: Identifiable {
    let id = UUID()
    let number1: Int
    let number2: Int
    let operation: String
    let correctAnswer: Int
    
    var questionText: String {
        "\(number1) \(operation) \(number2)"
    }
}

struct MathQuestionGenerator {
    static func generateQuestions(count: Int, difficulty: String) -> [MathQuestion] {
        var questions: [MathQuestion] = []
        let operations = ["+", "-", "×", "÷"]
        
        let range: ClosedRange<Int>
        switch difficulty {
        case "Easy":
            range = 1...10
        case "Medium":
            range = 1...100
        case "Hard":
            range = 1...1000
        default:
            range = 1...10
        }
        
        for _ in 0..<count {
            let operation = operations.randomElement()!
            var num1 = Int.random(in: range)
            var num2 = Int.random(in: range)
            
            // Ensure division results in whole numbers
            if operation == "÷" {
                num2 = Int.random(in: 1...10)
                num1 = num2 * Int.random(in: 1...10)
            }
            
            let answer: Int
            switch operation {
            case "+": answer = num1 + num2
            case "-": answer = num1 - num2
            case "×": answer = num1 * num2
            case "÷": answer = num1 / num2
            default: answer = 0
            }
            
            questions.append(MathQuestion(
                number1: num1,
                number2: num2,
                operation: operation,
                correctAnswer: answer
            ))
        }
        
        return questions
    }
} 
