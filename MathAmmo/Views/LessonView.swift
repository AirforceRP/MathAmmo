import SwiftUI

struct LessonView: View {
    let level: String
    let topic: String
    @State private var currentStep = 0
    @State private var showingExplanation = false
    @State private var explanationText = ""
    @State private var showingSuccess = false
    @Environment(\.colorScheme) var colorScheme
    @EnvironmentObject var progressManager: ProgressManager
    @Environment(\.dismiss) private var dismiss
    
    var lessonContent: [LessonStep] {
        LessonContent.allLessons[topic]?[level] ?? [
            LessonStep(title: "Coming Soon", content: "This lesson is under development.", example: "", practice: [])
        ]
    }
    
    var body: some View {
        ScrollView {
            VStack(spacing: 24) {
                // Progress Bar
                HStack {
                    ProgressView(value: Double(currentStep + 1), total: Double(lessonContent.count))
                        .tint(.blue)
                    Text("\(currentStep + 1)/\(lessonContent.count)")
                        .font(.caption)
                        .foregroundColor(.secondary)
                }
                .padding(.horizontal)
                
                if currentStep < lessonContent.count {
                    let step = lessonContent[currentStep]
                    
                    // Theory Card
                    VStack(alignment: .leading, spacing: 0) {
                        Text(step.content)
                            .padding()
                            .frame(maxWidth: .infinity, alignment: .leading)
                            .background(colorScheme == .dark ? Color.blue.opacity(0.15) : .white)
                            .cornerRadius(16)
                            .foregroundColor(colorScheme == .dark ? .white : .primary)
                    }
                    .padding(.horizontal)
                    
                    // Example Card
                    if !step.example.isEmpty {
                        VStack(alignment: .leading, spacing: 8) {
                            HStack {
                                Image(systemName: "lightbulb.fill")
                                    .foregroundColor(.yellow)
                                Text("Example")
                                    .font(.headline)
                                Text("See how it works")
                                    .font(.subheadline)
                                    .foregroundColor(colorScheme == .dark ? Color(.systemGray) : .secondary)
                            }
                            .padding(.horizontal)
                            
                            Text(step.example)
                                .font(.system(size: 32, weight: .medium))
                                .frame(maxWidth: .infinity, alignment: .center)
                                .padding()
                        }
                        .padding(.vertical)
                        .background(colorScheme == .dark ? Color.blue.opacity(0.15) : .white)
                        .cornerRadius(16)
                        .padding(.horizontal)
                        .foregroundColor(colorScheme == .dark ? .white : .primary)
                    }
                    
                    // Practice Card
                    if !step.practice.isEmpty {
                        VStack(alignment: .leading, spacing: 8) {
                            HStack {
                                Image(systemName: "pencil.circle.fill")
                                    .foregroundColor(.green)
                                Text("Practice")
                                    .font(.headline)
                                Text("Try it yourself")
                                    .font(.subheadline)
                                    .foregroundColor(colorScheme == .dark ? Color(.systemGray) : .secondary)
                            }
                            .padding(.horizontal)
                            
                            VStack(spacing: 20) {
                                ForEach(step.practice, id: \.self) { problem in
                                    PracticeProblem(problem: problem)
                                }
                            }
                            .padding()
                        }
                        .padding(.vertical)
                        .background(colorScheme == .dark ? Color.blue.opacity(0.15) : .white)
                        .cornerRadius(16)
                        .padding(.horizontal)
                        .foregroundColor(colorScheme == .dark ? .white : .primary)
                    }
                    
                    // Navigation Button
                    Button(action: {
                        if currentStep < lessonContent.count - 1 {
                            withAnimation {
                                currentStep += 1
                            }
                        } else {
                            // Complete lesson and update progress
                            progressManager.updateProgress(for: topic, lesson: level, completed: true)
                            dismiss()
                        }
                    }) {
                        Text(currentStep < lessonContent.count - 1 ? "Next" : "Complete")
                            .font(.headline)
                            .foregroundColor(.white)
                            .frame(width: 200)
                            .padding()
                            .background(Color.blue)
                            .cornerRadius(25)
                    }
                    .padding(.top, 20)
                }
            }
            .padding(.vertical)
        }
        .navigationTitle("\(topic) - \(level)")
        .background(Color(.systemGroupedBackground))
        .toolbar {
            ToolbarItem(placement: .navigationBarTrailing) {
                if currentStep > 0 {
                    Button(action: {
                        withAnimation {
                            currentStep -= 1
                        }
                    }) {
                        Image(systemName: "arrow.left")
                            .foregroundColor(.blue)
                    }
                }
            }
        }
    }
}

struct LessonStep {
    let title: String
    let content: String
    let example: String
    let practice: [String]
} 