//
//  MathAmmoApp.swift
//  MathAmmo
//
//  Created by Luc Sun on 2/21/25.
//

import SwiftUI
import SwiftData

@main
struct MathAmmoApp: App {
    @AppStorage("isDarkMode") private var isDarkMode = false
    @StateObject private var progressManager = ProgressManager()
    @State private var isLoading = true
    
    var sharedModelContainer: ModelContainer = {
        let schema = Schema([
            Item.self,
        ])
        let modelConfiguration = ModelConfiguration(schema: schema, isStoredInMemoryOnly: false)

        do {
            return try ModelContainer(for: schema, configurations: [modelConfiguration])
        } catch {
            fatalError("Could not create ModelContainer: \(error)")
        }
    }()

    var body: some Scene {
        WindowGroup {
            ZStack {
                if isLoading {
                    LoadingView()
                } else {
                    ContentView()
                        .preferredColorScheme(isDarkMode ? .dark : .light)
                        .environmentObject(progressManager)
                }
            }
            .onAppear {
                // 10 second loading time
                DispatchQueue.main.asyncAfter(deadline: .now() + 10) {
                    withAnimation {
                        isLoading = false
                    }
                }
            }
        }
        .modelContainer(sharedModelContainer)
    }
}
