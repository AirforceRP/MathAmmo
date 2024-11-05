<?php
session_start();
include 'config.php'; // Include your database configuration

// ClickSend API credentials
$clicksendUsername = 'lucsun@airforcerp.com';
$clicksendApiKey = '3DE73515-52CE-5958-9670-D08794948D2D';

// Function to generate a random 6-digit OTP
function generateOtp() {
    return rand(100000, 999999);
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect user input
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $phone = htmlspecialchars($_POST['phone']);

    // Generate OTP and calculate expiration time
    $otp = generateOtp();
    $expiresAt = date("Y-m-d H:i:s", strtotime("+10 minutes")); // OTP expires in 10 minutes

    // Store OTP in the database
    $stmt = $connection->prepare("INSERT INTO otp (phone, otp_code, expires_at) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $phone, $otp, $expiresAt);
    if ($stmt->execute()) {
        // Send OTP using ClickSend's API with cURL
        $url = 'https://rest.clicksend.com/v3/sms/send';
        $message = "Your AirforceRP MathAmmo OTP is: $otp /n Do not share your code.";

        $payload = json_encode([
            "messages" => [
                [
                    "source" => "php",
                    "body" => $message,
                    "to" => $phone
                ]
            ]
        ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_USERPWD, "$clicksendUsername:$clicksendApiKey");
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            // Store user registration data in the session
            $_SESSION['registration_data'] = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'phone' => $phone
            ];
            header("Location: verify_otp.php"); // Redirect to OTP verification page
            exit();
        } else {
            $error = "Failed to send OTP. Please try again.";
        }
    } else {
        $error = "Failed to store OTP in the database.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - MathAmmo</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans antialiased">
  <!-- Register Section -->
  <section class="container mx-auto px-4 py-16">
    <h3 class="text-3xl font-bold mb-6 text-center">Sign Up for MathAmmo</h3>
    <form action="register.php" method="post" class="bg-white p-8 rounded-lg shadow-md max-w-md mx-auto">
      <?php if (isset($error)): ?>
        <p class="text-red-600 mb-4"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>
      <div class="mb-4">
        <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
        <input type="text" id="username" name="username" class="w-full p-2 border rounded" required>
      </div>
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
        <input type="email" id="email" name="email" class="w-full p-2 border rounded" required>
      </div>
      <div class="mb-4">
        <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone Number</label>
        <input type="text" id="phone" name="phone" class="w-full p-2 border rounded" required>
      </div>
      <div class="mb-6">
        <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
        <input type="password" id="password" name="password" class="w-full p-2 border rounded" required>
      </div>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Sign Up</button>
    </form>
  </section>
</body>
</html>

