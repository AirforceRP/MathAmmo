import SwiftUI

struct LoadingView: View {
    @State private var loadingProgress = 0.0
    let tips = [
        "Practice makes perfect!",
        "Take your time with each problem",
        "Review lessons to master concepts",
        "Challenge yourself daily",
        "Track your progress to stay motivated",
        "If you don't understand, ask a teacher!",
        "Keep practicing, you've got this!",
        "If you don't use it, you lose it! - Tracy Hughes",
        "Keep going, you're almost there!",
        "You've got this!",
        "Keep going the harder you try the easier it gets!",
        "The more you practice, the better you'll become!",
        "if you quit now you'll never know"
    ]
    @State private var currentTip = 0
    let timer = Timer.publish(every: 0.1, on: .main, in: .common).autoconnect()
    
    var body: some View {
        VStack(spacing: 30) {
            // Logo
            Image(systemName: "target")
                .font(.system(size: 80))
                .foregroundColor(.blue)
            
            Text("MathAmmo")
                .font(.largeTitle)
                .bold()
            
            // Loading Animation
            VStack(spacing: 16) {
                // Progress Bar
                VStack(spacing: 8) {
                    ProgressView(value: loadingProgress)
                        .tint(.blue)
                        .scaleEffect(x: 1, y: 2, anchor: .center)
                    
                    Text("\(Int(loadingProgress * 100))%")
                        .font(.caption)
                        .foregroundColor(.secondary)
                }
                .frame(width: 200)
                
                // Tips
                Text(tips[currentTip])
                    .font(.subheadline)
                    .foregroundColor(.secondary)
                    .multilineTextAlignment(.center)
                    .padding(.horizontal)
                    .transition(.opacity)
                    .id(currentTip)
            }
        }
        .frame(maxWidth: .infinity, maxHeight: .infinity)
        .background(Color(.systemBackground))
        .onAppear {
            // Rotate through tips
            Timer.scheduledTimer(withTimeInterval: 2.0, repeats: true) { _ in
                withAnimation {
                    currentTip = (currentTip + 1) % tips.count
                }
            }
        }
        .onReceive(timer) { _ in
            if loadingProgress < 1.0 {
                withAnimation {
                    loadingProgress += 0.01 // Will take 10 seconds to reach 1.0
                }
            }
        }
    }
}

#Preview {
    LoadingView()
} 
