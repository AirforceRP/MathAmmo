import SwiftUI

class ProgressManager: ObservableObject {
    @AppStorage("topicProgress") private var progressData: Data = Data()
    @Published var topicProgress: [String: TopicProgress] = [:]
    @Published var achievements: [Achievement] = Achievement.all
    
    struct TopicProgress: Codable {
        var completedLessons: Set<String> = []
        var overallProgress: Double = 0.0
        var lastCompletedDate: Date?
        var practiceStats: [String: PracticeStat] = [:]
        var stars: Int = 0
    }
    
    struct PracticeStat: Codable {
        var correctAnswers: Int = 0
        var totalAttempts: Int = 0
        var streak: Int = 0
        var bestStreak: Int = 0
        
        var accuracy: Double {
            guard totalAttempts > 0 else { return 0 }
            return Double(correctAnswers) / Double(totalAttempts)
        }
    }
    
    init() {
        loadProgress()
    }
    
    func loadProgress() {
        if let decoded = try? JSONDecoder().decode([String: TopicProgress].self, from: progressData) {
            topicProgress = decoded
        }
    }
    
    func saveProgress() {
        if let encoded = try? JSONEncoder().encode(topicProgress) {
            progressData = encoded
        }
    }
    
    func updateProgress(for topic: String, lesson: String, completed: Bool) {
        var current = topicProgress[topic] ?? TopicProgress()
        
        if completed {
            current.completedLessons.insert(lesson)
            current.lastCompletedDate = Date()
            
            // Update stars based on completion
            if current.stars < 3 {
                current.stars += 1
            }
            
            checkAchievements()
        }
        
        // Calculate overall progress
        let totalLessons = LessonContent.allLessons[topic]?.count ?? 1
        current.overallProgress = Double(current.completedLessons.count) / Double(totalLessons)
        
        topicProgress[topic] = current
        saveProgress()
        
        objectWillChange.send()
    }
    
    func recordPracticeAttempt(topic: String, correct: Bool) {
        var current = topicProgress[topic] ?? TopicProgress()
        var stats = current.practiceStats[topic] ?? PracticeStat()
        
        stats.totalAttempts += 1
        if correct {
            stats.correctAnswers += 1
            stats.streak += 1
            stats.bestStreak = max(stats.streak, stats.bestStreak)
        } else {
            stats.streak = 0
        }
        
        current.practiceStats[topic] = stats
        topicProgress[topic] = current
        saveProgress()
        
        objectWillChange.send()
    }
    
    func getProgress(for topic: String) -> Double {
        return topicProgress[topic]?.overallProgress ?? 0.0
    }
    
    func getStars(for topic: String) -> Int {
        return topicProgress[topic]?.stars ?? 0
    }
    
    func getAccuracy(for topic: String) -> Double {
        return topicProgress[topic]?.practiceStats[topic]?.accuracy ?? 0.0
    }
    
    func getBestStreak(for topic: String) -> Int {
        return topicProgress[topic]?.practiceStats[topic]?.bestStreak ?? 0
    }
    
    func getCurrentStreak(for topic: String) -> Int {
        return topicProgress[topic]?.practiceStats[topic]?.streak ?? 0
    }
    
    func checkAchievements() {
        for (index, achievement) in achievements.enumerated() {
            if !achievement.isUnlocked {
                let allCompleted = achievement.requiredLessons.allSatisfy { lesson in
                    isLessonCompleted(lesson)
                }
                
                if allCompleted {
                    achievements[index].isUnlocked = true
                    showAchievementUnlocked(achievement)
                }
            }
        }
    }
    
    private func showAchievementUnlocked(_ achievement: Achievement) {
        // Show achievement notification
        // You can implement this using a custom view modifier
    }
    
    private func isLessonCompleted(_ lesson: String) -> Bool {
        return topicProgress[lesson]?.completedLessons.contains(lesson) ?? false
    }
} 