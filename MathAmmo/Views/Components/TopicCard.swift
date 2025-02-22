import SwiftUI

struct TopicCard: View {
    let title: String
    let icon: String
    let color: Color
    @EnvironmentObject var progressManager: ProgressManager
    
    var progress: Double {
        progressManager.getProgress(for: title)
    }
    
    var stars: Int {
        progressManager.getStars(for: title)
    }
    
    var accuracy: Double {
        progressManager.getAccuracy(for: title)
    }
    
    var body: some View {
        VStack(spacing: 12) {
            Image(systemName: icon)
                .font(.system(size: 30))
                .foregroundColor(color)
            
            Text(title)
                .font(.headline)
                .multilineTextAlignment(.center)
            
            // Stars
            HStack {
                ForEach(0..<3) { index in
                    Image(systemName: index < stars ? "star.fill" : "star")
                        .foregroundColor(index < stars ? .yellow : .gray)
                }
            }
            
            ProgressView(value: progress)
                .tint(color)
            
            HStack {
                Text("\(Int(progress * 100))%")
                Spacer()
                if accuracy > 0 {
                    Text("💯 \(Int(accuracy * 100))%")
                }
            }
            .font(.caption)
            .foregroundColor(.secondary)
        }
        .padding()
        .frame(maxWidth: .infinity)
        .background(Color(.systemBackground))
        .cornerRadius(16)
        .shadow(color: Color.black.opacity(0.1), radius: 10, x: 0, y: 5)
    }
}

#Preview {
    TopicCard(title: "Addition", icon: "plus", color: .blue)
        .environmentObject(ProgressManager())
        .frame(width: 180)
        .padding()
} 