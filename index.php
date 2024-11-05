<?php
    require 'config.php';
    // Check if the user is logged in by verifying if 'user_id' exists in the session
$isLoggedIn = isset($_SESSION['user_id']) ? true : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MathAmmo</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans antialiased">

<script>
  // Generate a random number between 1 and 1000 (or any range you prefer)
  var appilix_push_notification_user_identity = Math.floor(Math.random() * 1000) + 1;


</script>
<?php
// Configuration for the Appilix API
$appKey = "qyoqujjz4ex37tea09hl58712vw6mwrxiynus4pc";
$apiKey = "mwejif8oyx7z6r4vcgd9";
$apiUrl = "https://appilix.com/api/push-notification";

// Generate a random user identity (number between 100000 and 999999)
$userIdentity = rand(100000, 999999);

// Prepare the notification data
$notificationTitle = "Your Notification Title"; // Example title
$notificationBody = "Your Notification Body";  // Example body

// Initialize cURL
$ch = curl_init($apiUrl);

// Setup cURL options for a POST request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/x-www-form-urlencoded"
]);

// Prepare the POST data
$postData = http_build_query([
    'app_key' => $appKey,
    'api_key' => $apiKey,
    'notification_title' => $notificationTitle,
    'notification_body' => $notificationBody,
    'user_identity' => $userIdentity
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

// Execute the request and capture the response
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo "cURL error: " . curl_error($ch);
} else {
    echo "Response from Appilix API: " . $response;
}

// Close cURL
curl_close($ch);
?>

  <!-- Navbar: Hidden on mobile, visible from md screens onwards -->
  <nav class="bg-blue-600 text-white px-4 py-3 fixed w-full shadow-md z-50 hidden md:block">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <div class="bg-white text-blue-600 p-2 rounded-full">
          <img src="https://app.mathammo.com/mathammo.png" alt="App Icon" class="rounded-full">
        </div>
        <h1 class="text-xl font-bold">MathAmmo</h1>
      </div>

      <!-- Navbar Items -->
      <ul class="lg:flex space-x-8">
        <li><a href="https://app.mathammo.com" class="hover:text-blue-200">Home</a></li>
        <li><a href="/courses" class="hover:text-blue-200">Courses</a></li>
        <?php if (isset($isLoggedIn) && $isLoggedIn): ?>
          <!-- Logged In Navbar Items -->
          <li><a href="profile.php" class="hover:text-blue-200">Profile</a></li>
          <li><a href="settings.php" class="hover:text-blue-200">Settings</a></li>
          <li><a href="logout.php" class="hover:text-blue-200">Logout</a></li>
        <?php else: ?>
          <!-- Not Logged In Navbar Items -->
          <li><a href="login.php" class="hover:text-blue-200">Login</a></li>
          <li><a href="register.php" class="hover:text-blue-200">Sign Up</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

  <!-- Hero Section -->
  <?php if (!isset($isLoggedIn) || !$isLoggedIn): ?>
  <header class="pt-20 pb-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-4xl md:text-5xl font-bold mb-4">Master Math with MathAmmo</h2>
      <p class="text-lg md:text-xl mb-8">Your ultimate platform to learn math from basic arithmetic to advanced geometry.</p>
      <a href="login.php" class="bg-white text-blue-600 px-8 py-4 rounded-full font-semibold shadow hover:bg-blue-50 transition text-lg">Get Started Now</a>
    </div>
  </header>
<?php endif; ?>
<br>
  <!-- Courses Section -->
  <section class="container mx-auto px-4 py-16 bg-gray-100 rounded-lg">
    <h3 class="text-3xl font-bold mb-8">Courses</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Basic Addition</h4>
        <p class="text-gray-600 mb-4">Learn and practice the fundamentals of addition, the building block of arithmetic.</p>
        <a href="https://app.mathammo.com/courses/addition/basic-addition/" class="text-blue-600 font-semibold hover:underline">Start Course</a>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Subtraction Skills</h4>
        <p class="text-gray-600 mb-4">Master subtraction and understand how to solve problems confidently.</p>
        <a href="https://app.mathammo.com/courses/subtraction/basic-subtraction/" class="text-blue-600 font-semibold hover:underline">Start Course</a>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Multiplication Basics</h4>
        <p class="text-gray-600 mb-4">Build your multiplication skills and improve your speed with exercises.</p>
        <a href="https://app.mathammo.com/courses/multiplication/basic-multiplication/" class="text-blue-600 font-semibold hover:underline">Start Course</a>
      </div>
      
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Division Fundamentals</h4>
        <p class="text-gray-600 mb-4">Understand division and learn how to divide numbers effectively.</p>
        <a href="https://app.mathammo.com/courses/division/basic-division" class="text-blue-600 font-semibold hover:underline">Start Course</a>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">More</h4>
        <p class="text-gray-600 mb-4">More is comming in a later update</p>
        <a href="https://app.mathammo.com/courses/" class="text-blue-600 font-semibold hover:underline">Start Course</a>
      </div>
      <?php /*
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Introduction to Fractions</h4>
        <p class="text-gray-600 mb-4">Grasp the concept of fractions and learn how to perform fraction operations.</p>
        <a href="#" class="text-blue-600 font-semibold hover:underline">Start Course</a>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Basic Geometry</h4>
        <p class="text-gray-600 mb-4">Explore shapes, angles, and geometry fundamentals to build a strong base.</p>
        <a href="#" class="text-blue-600 font-semibold hover:underline">Start Course</a>
      </div>*/
      ?>
    </div>
  </section>

  <!-- Quizzes Section -->
  <section class="container mx-auto px-4 py-16">
    <h3 class="text-3xl font-bold mb-8">Quizzes</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Addition Quiz</h4>
        <p class="text-gray-600 mb-4">Test your addition skills and improve your mental calculation speed.</p>
        <a href="https://app.mathammo.com/quizzes/addition" class="text-blue-600 font-semibold hover:underline">Take Quiz</a>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Subtraction Quiz</h4>
        <p class="text-gray-600 mb-4">Check your subtraction knowledge and practice with timed questions.</p>
        <a href="https://app.mathammo.com/quizzes/subtraction" class="text-blue-600 font-semibold hover:underline">Take Quiz</a>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Multiplication Mastery</h4>
        <p class="text-gray-600 mb-4">Evaluate your multiplication skills with this comprehensive quiz.</p>
        <a href="https://app.mathammo.com/quizzes/multiplication" class="text-blue-600 font-semibold hover:underline">Take Quiz</a>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Division Quiz</h4>
        <p class="text-gray-600 mb-4">Challenge yourself with division problems and see how well you do.</p>
        <a href="https://app.mathammo.com/quizzes/division" class="text-blue-600 font-semibold hover:underline">Take Quiz</a>
      </div><?php /*
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Fractions Quiz</h4>
        <p class="text-gray-600 mb-4">Strengthen your understanding of fractions with varied problem sets.</p>
        <a href="#" class="text-blue-600 font-semibold hover:underline">Take Quiz</a>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Geometry Quiz</h4>
        <p class="text-gray-600 mb-4">Test your knowledge of shapes, angles, and geometry principles.</p>
        <a href="#" class="text-blue-600 font-semibold hover:underline">Take Quiz</a>
      </div>*/ ?>
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">All Units Quiz</h4>
        <p class="text-gray-600 mb-4">Test your knowledge of all the units you have learned.</p>
        <a href="https://app.mathammo.com/quizzes/all-units/" class="text-blue-600 font-semibold hover:underline">Take Quiz</a>
      </div>
    </div>
  </section>

  <!-- Tests Section -->
  <section class="container mx-auto px-4 py-16">
    <h3 class="text-3xl font-bold mb-8">Tests</h3>
    <center>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-8">
        <h4 class="text-2xl font-semibold mb-2">Math Placement Test</h4>
        <p class="text-gray-600 mb-4">Identify your math proficiency level and get personalized recommendations.</p>
        <a href="https://app.mathammo.com/tests/placement-test" class="text-blue-600 font-semibold hover:underline">Take Test</a>
      </div>
      </center>
    </div>
  </section>

  <!-- Open Source Statement -->
  <section class="container mx-auto px-4 py-16 bg-gray-800 text-white rounded-lg">
    <h3 class="text-3xl font-bold mb-6">Open Source Statement</h3>
    <p class="text-gray-300 mb-8">MathAmmo is built on open-source principles to provide free and accessible math education. We invite developers and educators to contribute to our project and help improve math education worldwide.</p>
    <div class="text-center">
      <a href="#" class="bg-blue-600 px-6 py-3 rounded font-semibold hover:bg-blue-500 transition">View Our Repository</a>
    </div>
  </section><br><br>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto text-center">
      <p class="mb-4">&copy; 2024 MathAmmo. All rights reserved.</p>
      <ul class="flex justify-center space-x-6 text-gray-400">
        <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
        <li><a href="#" class="hover:text-white">Terms of Service</a></li>
        <li><a href="#" class="hover:text-white">Contact Us</a></li>
      </ul>
    </div>
  </footer>

</body>
</html>
