import SwiftUI

struct HomeButtonView: View {
    let title: String
    let icon: String
    let color: Color
    
    var body: some View {
        HStack {
            Image(systemName: icon)
                .font(.title)
            Text(title)
                .font(.title2)
                .bold()
            Spacer()
            Image(systemName: "chevron.right")
        }
        .foregroundColor(.white)
        .padding()
        .background(color)
        .cornerRadius(12)
        .frame(maxWidth: .infinity)
    }
} 