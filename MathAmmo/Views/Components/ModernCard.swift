import SwiftUI

struct ModernCard<Content: View>: View {
    let title: String
    let subtitle: String
    let systemImage: String
    let color: Color
    let content: Content
    
    init(
        title: String,
        subtitle: String? = nil,
        systemImage: String,
        color: Color = .blue,
        @ViewBuilder content: () -> Content
    ) {
        self.title = title
        self.subtitle = subtitle ?? ""
        self.systemImage = systemImage
        self.color = color
        self.content = content()
    }
    
    var body: some View {
        VStack(alignment: .leading, spacing: 16) {
            HStack {
                Image(systemName: systemImage)
                    .font(.title2)
                    .foregroundColor(color)
                    .frame(width: 32, height: 32)
                
                VStack(alignment: .leading) {
                    Text(title)
                        .font(.headline)
                    if !subtitle.isEmpty {
                        Text(subtitle)
                            .font(.subheadline)
                            .foregroundColor(.secondary)
                    }
                }
            }
            
            content
        }
        .padding()
        .background(Color(.systemBackground))
        .cornerRadius(16)
        .shadow(color: Color.black.opacity(0.1), radius: 10, x: 0, y: 5)
    }
}

#Preview {
    VStack(spacing: 20) {
        ModernCard(
            title: "Example Card",
            subtitle: "This is a subtitle",
            systemImage: "star.fill"
        ) {
            Text("Card content goes here")
                .foregroundColor(.secondary)
        }
        
        ModernCard(
            title: "Another Card",
            systemImage: "heart.fill",
            color: .red
        ) {
            HStack {
                Text("Some content")
                Spacer()
                Image(systemName: "arrow.right")
            }
        }
    }
    .padding()
} 