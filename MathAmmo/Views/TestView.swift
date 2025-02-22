import SwiftUI

struct TestView: View {
    @State private var timeRemaining = 300 // 5 minutes in seconds
    @State private var isActive = false
    @State private var questions: [MathQuestion] = []
    @State private var currentQuestionIndex = 0
    @State private var userAnswers: [Int?] = Array(repeating: nil, count: 20)
    @State private var showingResults = false
    @State private var selectedDifficulty = "Easy"
    let timer = Timer.publish(every: 1, on: .main, in: .common).autoconnect()
    
    let difficulties = ["Easy", "Medium", "Hard"]
    
    var body: some View {
        VStack {
            if !showingResults {
                // Timer
                HStack {
                    Image(systemName: "clock")
                    Text(timeString(from: timeRemaining))
                        .font(.title2)
                        .monospacedDigit()
                }
                .padding()
                
                // Question Navigation
                ScrollView(.horizontal, showsIndicators: false) {
                    HStack {
                        ForEach(0..<questions.count, id: \.self) { index in
                            Button(action: {
                                currentQuestionIndex = index
                            }) {
                                Text("\(index + 1)")
                                    .frame(width: 40, height: 40)
                                    .background(questionBackgroundColor(for: index))
                                    .foregroundColor(.white)
                                    .clipShape(Circle())
                            }
                        }
                    }
                    .padding()
                }
                
                // Current Question
                if !questions.isEmpty {
                    TestQuestionView(
                        question: questions[currentQuestionIndex],
                        userAnswer: $userAnswers[currentQuestionIndex]
                    )
                    
                    // Navigation Buttons
                    HStack {
                        Button("Previous") {
                            if currentQuestionIndex > 0 {
                                currentQuestionIndex -= 1
                            }
                        }
                        .disabled(currentQuestionIndex == 0)
                        
                        Spacer()
                        
                        Button("Next") {
                            if currentQuestionIndex < questions.count - 1 {
                                currentQuestionIndex += 1
                            }
                        }
                        .disabled(currentQuestionIndex == questions.count - 1)
                    }
                    .padding()
                    
                    Button("Submit Test") {
                        showingResults = true
                    }
                    .buttonStyle(.borderedProminent)
                }
            } else {
                // Results View
                TestResultView(
                    questions: questions,
                    userAnswers: userAnswers,
                    timeSpent: 300 - timeRemaining
                ) {
                    resetTest()
                }
            }
        }
        .navigationTitle("Math Test")
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
        .onReceive(timer) { _ in
            if isActive && timeRemaining > 0 {
                timeRemaining -= 1
            } else if timeRemaining == 0 {
                showingResults = true
            }
        }
    }
    
    private func timeString(from seconds: Int) -> String {
        let minutes = seconds / 60
        let remainingSeconds = seconds % 60
        return String(format: "%02d:%02d", minutes, remainingSeconds)
    }
    
    private func questionBackgroundColor(for index: Int) -> Color {
        if index == currentQuestionIndex {
            return .blue
        }
        return userAnswers[index] != nil ? .green : .gray
    }
    
    private func generateQuestions() {
        questions = MathQuestionGenerator.generateQuestions(
            count: 20,
            difficulty: selectedDifficulty
        )
        userAnswers = Array(repeating: nil, count: 20)
    }
    
    private func resetTest() {
        timeRemaining = 300
        showingResults = false
        currentQuestionIndex = 0
        generateQuestions()
    }
} 