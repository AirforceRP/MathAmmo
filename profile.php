<?php
session_start(); // Start the session

include 'config.php'; // Include the configuration file
define('ACCOUNT_TABLE', 'users');

// Check if user is logged in by checking if `user_id` exists in the session
if (!isset($_SESSION['user_id'])) {
    // If not set, redirect to login page
    header("Location: login.php");
    exit(); // Stop further script execution
}

// Fetch user information from the database
$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM " . ACCOUNT_TABLE . " WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("User not found.");
}

// Handle success and error messages
$successMessage = "";
$errorMessage = "";

if (isset($_GET['success'])) {
    $successMessage = "Profile updated successfully!";
} elseif (isset($_GET['password_success'])) {
    $successMessage = "Password changed successfully!";
} elseif (isset($_GET['error'])) {
    $errorMessage = htmlspecialchars($_GET['error']); // Sanitize the error message
}

// Fetch the user's subscription type, defaulting to 'free' if not set
$subscription = isset($user['subscription']) ? $user['subscription'] : 'free';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile - MathAmmo</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  
</head>
<body>
  <!-- Navbar -->
  <nav class="bg-blue-600 text-white px-4 py-3 fixed w-full shadow-md z-50 hidden md:flex">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold">MathAmmo</h1>
      <ul class="flex space-x-6">
        <li><a href="index.php" class="hover:text-blue-200">Dashboard</a></li>
        <li><a href="https://app.mathammo.com/courses/" class="hover:text-blue-200">Courses</a></li>
        <li><a href="profile.php" class="hover:text-blue-200">Profile</a></li>
        <li><a href="logout.php" class="hover:text-blue-200">Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="container mx-auto px-4 py-16 mt-16">
    <h2 class="text-3xl font-bold mb-4">Your Profile</h2>

    <?php if ($successMessage): ?>
      <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
        <?php echo $successMessage; ?>
      </div>
    <?php endif; ?>
    <?php if ($errorMessage): ?>
      <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
        <?php echo $errorMessage; ?>
      </div>
    <?php endif; ?>

    <div class="flex space-x-4 mb-6">
      <button class="tab-button bg-gray-200 text-gray-800 px-4 py-2 rounded" onclick="openTab('account-tab', this)">Account Info</button>
      <button class="tab-button bg-gray-200 text-gray-800 px-4 py-2 rounded" onclick="openTab('password-tab', this)">Change Password</button>
      <button class="tab-button bg-gray-200 text-gray-800 px-4 py-2 rounded" onclick="openTab('account-changes-tab', this)">Account Changes</button>
    </div>

    <div id="account-tab" class="bg-white p-6 rounded-lg shadow">
      <form action="update_profile.php" method="post">
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold mb-2" for="username">Username</label>
          <input class="w-full p-2 border rounded" type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold mb-2" for="email">Email</label>
          <input class="w-full p-2 border rounded" type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Update Profile</button>
      </form>
    </div>

    <div id="password-tab" class="bg-white p-6 rounded-lg shadow" style="display: none;">
      <form action="change_password.php" method="post">
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold mb-2" for="current_password">Current Password</label>
          <input class="w-full p-2 border rounded" type="password" id="current_password" name="current_password" required>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold mb-2" for="new_password">New Password</label>
          <input class="w-full p-2 border rounded" type="password" id="new_password" name="new_password" required>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold mb-2" for="confirm_password">Confirm New Password</label>
          <input class="w-full p-2 border rounded" type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Change Password</button>
      </form>
    </div>

    <div id="account-changes-tab" class="bg-white p-6 rounded-lg shadow" style="display: none;">
      <h3 class="text-2xl font-bold mb-4">Account Changes</h3>
      <?php $isPerpetual = ($subscription === 'perpetual'); ?>

      <form action="update_subscription.php" method="post">
          <div class="mb-4">
              <label class="block text-gray-700 font-semibold mb-2" for="subscription">Subscription Plan</label>
              <select class="w-full p-2 border rounded" id="subscription" name="subscription" <?php echo $isPerpetual ? 'disabled' : ''; ?>>
                  <option value="free" <?php echo ($subscription === 'free') ? 'selected' : ''; ?>>Free</option>
                  <option value="monthly" <?php echo ($subscription === 'monthly') ? 'selected' : ''; ?>>Monthly</option>
                  <option value="yearly" <?php echo ($subscription === 'yearly') ? 'selected' : ''; ?>>Yearly</option>
                  <option value="perpetual" <?php echo ($subscription === 'perpetual') ? 'selected' : ''; ?> disabled>Perpetual</option>
              </select>
          </div>
          <?php if (!$isPerpetual): ?>
              <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Update Subscription</button>
          <?php else: ?>
              <p class="text-red-500">You cannot change a perpetual subscription.</p>
          <?php endif; ?>
      </form>

      <div class="mt-8">
        <button class="bg-red-600 text-white px-4 py-2 rounded font-semibold hover:bg-red-500" onclick="openModal()">Delete Account</button>
      </div>
    </div>

    <div id="warning-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
      <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h3 class="text-xl font-bold mb-4">Are you sure?</h3>
        <p class="text-gray-700 mb-6">Deleting your account is irreversible. All your data will be permanently removed.</p>
        <div class="flex justify-end space-x-4">
          <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded" onclick="closeModal()">Cancel</button>
          <a href="delete_account.php" class="bg-red-600 text-white px-4 py-2 rounded font-semibold hover:bg-red-500">Delete</a>
        </div>
      </div>
    </div>
  </div>
  <script>
    function openTab(tabName, element) {
        document.getElementById("account-tab").style.display = "none";
        document.getElementById("password-tab").style.display = "none";
        document.getElementById("account-changes-tab").style.display = "none";

        var tabButtons = document.getElementsByClassName("tab-button");
        for (var i = 0; i < tabButtons.length; i++) {
            tabButtons[i].classList.remove("tab-active");
        }

        document.getElementById(tabName).style.display = "block";
        element.classList.add("tab-active");
    }

    function openModal() {
        document.getElementById("warning-modal").classList.remove("hidden");
    }

    function closeModal() {
        document.getElementById("warning-modal").classList.add("hidden");
    }
  </script>
</body>
</html>
