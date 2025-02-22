import SwiftUI

struct QuizView: View {
    @State private var currentQuestionIndex = 0
    @State private var score = 0
    @State private var userAnswer = ""
    @State private var showingResults = false
    @State private var feedback = ""
    @State private var isCorrect = false
    @State private var selectedDifficulty = "Easy"
    
    let difficulties = ["Easy", "Medium", "Hard"]
    let questionsPerQuiz = 10
    
    @State private var questions: [MathQuestion] = []
    
    var body: some View {
        VStack(spacing: 20) {
            if !showingResults {
                // Quiz Progress
                ProgressView(value: Double(currentQuestionIndex), total: Double(questionsPerQuiz))
                    .padding()
                
                Text("Question \(currentQuestionIndex + 1) of \(questionsPerQuiz)")
                    .font(.headline)
                
                // Current Question
                if !questions.isEmpty {
                    QuestionView(question: questions[currentQuestionIndex])
                    
                    // Answer Input
                    TextField("Your answer", text: $userAnswer)
                        .textFieldStyle(RoundedBorderTextFieldStyle())
                        .keyboardType(.numberPad)
                        .frame(width: 150)
                        .multilineTextAlignment(.center)
                    
                    // Submit Button
                    Button("Submit Answer") {
                        checkAnswer()
                    }
                    .buttonStyle(.borderedProminent)
                    
                    // Feedback
                    Text(feedback)
                        .foregroundColor(isCorrect ? .green : .red)
                        .font(.title3)
                }
            } else {
                // Results View
                QuizResultView(score: score, total: questionsPerQuiz) {
                    resetQuiz()
                }
            }
        }
        .padding()
        .navigationTitle("Quiz")
        .toolbar {
            ToolbarItem(placement: .navigationBarTrailing) {
                Picker("Difficulty", selection: $selectedDifficulty) {
                    ForEach(difficulties, id: \.self) { difficulty in
                        Text(difficulty)
                    }
                }
            }
        }
        .onAppear {
            generateQuestions()
        }
    }
    
    private func generateQuestions() {
        questions = MathQuestionGenerator.generateQuestions(
            count: questionsPerQuiz,
            difficulty: selectedDifficulty
        )
    }
    
    private func checkAnswer() {
        guard let userInt = Int(userAnswer) else {
            feedback = "Please enter a valid number"
            isCorrect = false
            return
        }
        
        let correct = userInt == questions[currentQuestionIndex].correctAnswer
        isCorrect = correct
        
        if correct {
            score += 1
            feedback = "Correct! 🎉"
        } else {
            feedback = "Incorrect. The answer was \(questions[currentQuestionIndex].correctAnswer)"
        }
        
        // Move to next question after delay
        DispatchQueue.main.asyncAfter(deadline: .now() + 1.5) {
            if currentQuestionIndex < questionsPerQuiz - 1 {
                currentQuestionIndex += 1
                userAnswer = ""
                feedback = ""
            } else {
                showingResults = true
            }
        }
    }
    
    private func resetQuiz() {
        currentQuestionIndex = 0
        score = 0
        userAnswer = ""
        feedback = ""
        showingResults = false
        generateQuestions()
    }
} 