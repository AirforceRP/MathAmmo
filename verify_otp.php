<?php
session_start();
include 'config.php'; // Include your database configuration

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredOtp = htmlspecialchars($_POST['otp']);
    $phone = $_SESSION['registration_data']['phone'];

    // Retrieve the OTP from the database
    $stmt = $connection->prepare("SELECT otp_code, expires_at FROM otp WHERE phone = ? ORDER BY created_at DESC LIMIT 1");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();
    $otpData = $result->fetch_assoc();

    if ($otpData) {
        if ($enteredOtp === $otpData['otp_code'] && strtotime($otpData['expires_at']) > time()) {
            // OTP is correct and not expired, register the user
            $username = $_SESSION['registration_data']['username'];
            $email = $_SESSION['registration_data']['email'];
            $password = $_SESSION['registration_data']['password'];

            // Insert the user into the database
            $stmt = $connection->prepare("INSERT INTO users (username, email, password, phone) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $password, $phone);

            if ($stmt->execute()) {
                // Registration successful
                $_SESSION['user_id'] = $connection->insert_id;
                // Clean up OTP
                $connection->query("DELETE FROM otp WHERE phone = '$phone'");
                header("Location: profile.php"); // Redirect to profile or dashboard
                exit();
            } else {
                $error = "Error: " . $connection->error;
            }
        } else {
            $error = "Invalid or expired OTP. Please try again.";
        }
    } else {
        $error = "OTP not found. Please request a new one.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify OTP - MathAmmo</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans antialiased">
  <!-- OTP Verification Section -->
  <section class="container mx-auto px-4 py-16">
    <h3 class="text-3xl font-bold mb-6 text-center">Verify OTP</h3>
    <form action="verify_otp.php" method="post" class="bg-white p-8 rounded-lg shadow-md max-w-md mx-auto">
      <?php if (isset($error)): ?>
        <p class="text-red-600 mb-4"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>
      <div class="mb-6">
        <label for="otp" class="block text-gray-700 font-semibold mb-2">Enter OTP</label>
        <input type="text" id="otp" name="otp" class="w-full p-2 border rounded" required>
      </div>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Verify</button>
    </form>
  </section>
</body>
</html>
