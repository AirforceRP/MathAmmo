import Foundation

let helpArticles = [
    // Getting Started
    HelpArticle(
        title: "Welcome to MathAmmo",
        content: "MathAmmo is designed to help you master mathematics through interactive lessons, quizzes, and practice tests. Start with the Learn section to begin your journey.",
        category: .gettingStarted
    ),
    HelpArticle(
        title: "Navigating the App",
        content: "The app has four main sections:\n\n• Learn: Step-by-step lessons\n• Quiz: Test your knowledge\n• Test: Challenge yourself\n• Profile: Track your progress",
        category: .gettingStarted
    ),
    
    // Learning
    HelpArticle(
        title: "How Lessons Work",
        content: "Each topic contains multiple lessons that progressively increase in difficulty. Complete exercises to unlock new levels and track your progress.",
        category: .learning
    ),
    HelpArticle(
        title: "Practice Tips",
        content: "• Practice regularly for 15-20 minutes\n• Review completed lessons\n• Use hints when stuck\n• Track your progress in the Profile section",
        category: .learning
    ),
    
    // Technical
    HelpArticle(
        title: "Offline Access",
        content: "Download lessons in the Offline Content section to practice without internet connection. Your progress will sync when you're back online.",
        category: .technical
    ),
    HelpArticle(
        title: "App Settings",
        content: "Customize your experience in Settings:\n\n• Dark Mode\n• Notifications\n• Sound Effects\n• Progress Reset",
        category: .technical
    ),
    
    // Account & Data
    HelpArticle(
        title: "Progress Tracking",
        content: "Your progress is automatically saved and synced across devices. View detailed statistics in the Profile section.",
        category: .account
    ),
    HelpArticle(
        title: "Data Privacy",
        content: "We take your privacy seriously. All personal information and progress data is encrypted and stored securely.",
        category: .account
    )
] 