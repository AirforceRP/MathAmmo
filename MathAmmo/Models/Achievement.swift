import SwiftUI

struct Achievement: Codable, Identifiable {
    let id: String
    let title: String
    let description: String
    let icon: String
    var isUnlocked: Bool
    let requiredLessons: [String]
    
    static let all: [Achievement] = [
        Achievement(
            id: "math_starter",
            title: "Math Starter",
            description: "Complete your first lesson",
            icon: "star.fill",
            isUnlocked: false,
            requiredLessons: ["Addition-Basics"]
        ),
        Achievement(
            id: "addition_master",
            title: "Addition Master",
            description: "Complete all addition lessons",
            icon: "plus.circle.fill",
            isUnlocked: false,
            requiredLessons: [
                "Addition-Basics",
                "Addition-Adding Tens",
                "Addition-Advanced",
                "Addition-Word Problems"
            ]
        ),
        // Add more achievements...
    ]
} 