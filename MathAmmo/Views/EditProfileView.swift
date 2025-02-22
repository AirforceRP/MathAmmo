import SwiftUI

struct EditProfileView: View {
    @Binding var userName: String
    @Binding var userAvatar: String
    @Environment(\.dismiss) private var dismiss
    
    let avatarOptions = [
        "person.circle.fill",
        "star.circle.fill",
        "heart.circle.fill",
        "bolt.circle.fill",
        "book.circle.fill",
        "graduationcap.circle.fill"
    ]
    
    var body: some View {
        NavigationView {
            Form {
                Section(header: Text("Profile Information")) {
                    TextField("Name", text: $userName)
                        .textContentType(.name)
                }
                
                Section(header: Text("Choose Avatar")) {
                    ScrollView(.horizontal, showsIndicators: false) {
                        HStack(spacing: 20) {
                            ForEach(avatarOptions, id: \.self) { avatar in
                                Button {
                                    userAvatar = avatar
                                } label: {
                                    Image(systemName: avatar)
                                        .font(.system(size: 40))
                                        .foregroundColor(avatar == userAvatar ? .blue : .gray)
                                        .padding(8)
                                        .background(
                                            Circle()
                                                .fill(avatar == userAvatar ? Color.blue.opacity(0.2) : Color.clear)
                                        )
                                }
                            }
                        }
                        .padding(.vertical, 8)
                    }
                }
            }
            .navigationTitle("Edit Profile")
            .navigationBarTitleDisplayMode(.inline)
            .toolbar {
                ToolbarItem(placement: .navigationBarLeading) {
                    Button("Cancel") {
                        dismiss()
                    }
                }
                ToolbarItem(placement: .navigationBarTrailing) {
                    Button("Save") {
                        dismiss()
                    }
                }
            }
        }
    }
} 