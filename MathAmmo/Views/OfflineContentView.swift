import SwiftUI

struct OfflineContentView: View {
    @State private var downloadedTopics: Set<String> = []
    @State private var downloadProgress: [String: Double] = [:]
    
    let topics = [
        ("Addition", "basic_addition"),
        ("Subtraction", "basic_subtraction"),
        ("Multiplication", "multiplication_tables"),
        ("Division", "division_basics"),
        ("Fractions", "fractions_intro"),
        ("Decimals", "decimals_basics")
    ]
    
    var body: some View {
        ScrollView {
            VStack(spacing: 20) {
                // Header
                ModernCard(
                    title: "Offline Content",
                    subtitle: "Download lessons for offline use",
                    systemImage: "arrow.down.circle.fill",
                    color: .blue
                ) {
                    Text("Available storage: 2.1 GB")
                        .font(.caption)
                        .foregroundColor(.secondary)
                }
                
                // Topics
                ForEach(topics, id: \.0) { topic, identifier in
                    ModernCard(
                        title: topic,
                        subtitle: downloadedTopics.contains(topic) ? "Downloaded" : "Tap to download",
                        systemImage: downloadedTopics.contains(topic) ? "checkmark.circle.fill" : "arrow.down.circle",
                        color: downloadedTopics.contains(topic) ? .green : .blue
                    ) {
                        if let progress = downloadProgress[topic] {
                            ProgressView(value: progress)
                                .tint(.blue)
                        } else {
                            Button(action: {
                                downloadTopic(topic)
                            }) {
                                HStack {
                                    Text(downloadedTopics.contains(topic) ? "Delete" : "Download")
                                    Spacer()
                                    Text("125 MB")
                                        .font(.caption)
                                        .foregroundColor(.secondary)
                                }
                            }
                        }
                    }
                }
            }
            .padding()
        }
        .navigationTitle("Offline Content")
    }
    
    private func downloadTopic(_ topic: String) {
        // Simulate download progress
        downloadProgress[topic] = 0.0
        
        let timer = Timer.publish(every: 0.1, on: .main, in: .common).autoconnect()
        var progress = 0.0
        
        _ = timer.sink { _ in
            progress += 0.1
            downloadProgress[topic] = min(progress, 1.0)
            
            if progress >= 1.0 {
                downloadProgress[topic] = nil
                downloadedTopics.insert(topic)
                timer.upstream.connect().cancel()
            }
        }
    }
} 