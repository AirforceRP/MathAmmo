//
//  ContentView.swift
//  MathAmmo
//
//  Created by Luc Sun on 2/21/25.
//

import SwiftUI

struct ContentView: View {
    @AppStorage("userName") private var userName = ""
    @Environment(\.colorScheme) var colorScheme
    @EnvironmentObject var progressManager: ProgressManager
    
    var body: some View {
        NavigationView {
            ScrollView {
                VStack(spacing: 24) {
                    // Header Navigation
                    HStack {
                        NavigationLink(destination: ProfileView()) {
                            Image(systemName: "person.circle.fill")
                                .font(.title)
                                .foregroundColor(.blue)
                        }
                        
                        Spacer()
                        
                        NavigationLink(destination: SettingsView()) {
                            Image(systemName: "gearshape.fill")
                                .font(.title)
                                .foregroundColor(.blue)
                        }
                    }
                    .padding(.horizontal)
                    
                    // Welcome Card
                    ModernCard(
                        title: "Welcome to",
                        subtitle: userName.isEmpty ? "Math Student" : userName,
                        systemImage: "target",
                        color: .blue
                    ) {
                        Text("MathAmmo 🎯")
                            .font(.largeTitle)
                            .bold()
                            .foregroundColor(.primary)
                    }
                    .padding(.horizontal)
                    
                    // Main Menu Grid
                    LazyVGrid(columns: [GridItem(.flexible()), GridItem(.flexible())], spacing: 20) {
                        // Learn
                        NavigationLink(destination: LearnView()) {
                            MenuButton(
                                title: "Learn",
                                subtitle: "Step by step lessons",
                                systemImage: "book.fill",
                                color: .blue
                            )
                        }
                        
                        // Quiz
                        NavigationLink(destination: QuizView()) {
                            MenuButton(
                                title: "Quiz",
                                subtitle: "Test your skills",
                                systemImage: "questionmark.circle.fill",
                                color: .green
                            )
                        }
                        
                        // Test
                        NavigationLink(destination: TestView()) {
                            MenuButton(
                                title: "Test",
                                subtitle: "Challenge yourself",
                                systemImage: "checkmark.circle.fill",
                                color: .orange
                            )
                        }
                        
                        // Profile
                        NavigationLink(destination: ProfileView()) {
                            MenuButton(
                                title: "Profile",
                                subtitle: "View progress",
                                systemImage: "person.circle.fill",
                                color: .purple
                            )
                        }
                    }
                    .padding(.horizontal)
                    
                    // Progress Section
                    VStack(alignment: .leading, spacing: 16) {
                        HStack {
                            Image(systemName: "chart.line.uptrend.xyaxis")
                                .foregroundColor(.blue)
                            Text("Your Progress")
                                .font(.title2)
                                .bold()
                            Text("Keep going!")
                                .foregroundColor(.gray)
                        }
                        
                        VStack(spacing: 16) {
                            ForEach(["Addition", "Subtraction", "Multiplication"], id: \.self) { topic in
                                ProgressRow(
                                    topic: topic,
                                    progress: progressManager.getProgress(for: topic)
                                )
                            }
                        }
                    }
                    .padding()
                    .background(Color(.systemBackground))
                    .cornerRadius(16)
                    .padding(.horizontal)
                }
                .padding(.vertical)
            }
            .background(Color(.systemGroupedBackground))
        }
    }
}

struct MenuButton: View {
    let title: String
    let subtitle: String
    let systemImage: String
    let color: Color
    
    var body: some View {
        VStack(alignment: .leading, spacing: 8) {
            Image(systemName: systemImage)
                .font(.title)
                .foregroundColor(color)
            Text(title)
                .font(.headline)
                .foregroundColor(color)
            Text(subtitle)
                .font(.caption)
                .foregroundColor(.gray)
        }
        .frame(maxWidth: .infinity, alignment: .leading)
        .padding()
        .background(Color(.systemBackground))
        .cornerRadius(16)
    }
}

struct ActionCard: View {
    let title: String
    let subtitle: String
    let icon: String
    let color: Color
    
    var body: some View {
        VStack(alignment: .leading, spacing: 12) {
            Image(systemName: icon)
                .font(.title)
                .foregroundColor(color)
            
            VStack(alignment: .leading, spacing: 4) {
                Text(title)
                    .font(.headline)
                Text(subtitle)
                    .font(.caption)
                    .foregroundColor(.secondary)
            }
        }
        .frame(maxWidth: .infinity, alignment: .leading)
        .padding()
        .background(Color(.systemBackground))
        .cornerRadius(16)
        .shadow(color: Color.black.opacity(0.1), radius: 10, x: 0, y: 5)
    }
}

struct ProgressRow: View {
    let topic: String
    let progress: Double
    
    var body: some View {
        VStack(alignment: .leading, spacing: 8) {
            HStack {
                Text(topic)
                    .font(.subheadline)
                Spacer()
                Text("\(Int(progress * 100))%")
                    .font(.caption)
                    .foregroundColor(.secondary)
            }
            
            ProgressView(value: progress)
                .tint(.blue)
        }
    }
}

#Preview {
    ContentView()
        .environmentObject(ProgressManager())
}
