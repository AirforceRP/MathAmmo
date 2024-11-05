<?php
session_start(); // Start the session
include 'config.php'; // Include the configuration file
define('ACCOUNT_TABLE', 'users');
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get the user ID from the session
$userId = $_SESSION['user_id'];

// Fetch the current subscription type from the database
$sql = "SELECT subscription_type FROM " . ACCOUNT_TABLE . " WHERE id = ?";
$stmt = $connection->prepare($sql);
if ($stmt === false) {
    die("Error preparing the SQL statement: " . $connection->error);
}

$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$subscription = $user['subscription_type'] ?? null; // Get subscription type or NULL

// Determine the current subscription status
if ($subscription === 'perpetual') {
    // If it's perpetual, prevent subscription changes
    header("Location: profile.php?error=You cannot change a perpetual subscription");
    exit();
} elseif (is_null($subscription)) {
    // If subscription is NULL, set it to 'free'
    $subscription = 'free';
}

// Check if the payment was successful
if (isset($_GET['status']) && $_GET['status'] === 'success') {
    // Sanitize and validate the new subscription type
    $newSubscription = isset($_POST['subscription']) ? trim($_POST['subscription']) : 'free';
    $validSubscriptions = ['monthly', 'yearly']; // Only allow 'monthly' and 'yearly'

    if (!in_array($newSubscription, $validSubscriptions)) {
        header("Location: profile.php?error=Invalid subscription type");
        exit();
    }

    // Update the subscription in the database
    $sql = "UPDATE " . ACCOUNT_TABLE . " SET subscription_type = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    if ($stmt === false) {
        die("Error preparing the SQL statement: " . $connection->error);
    }

    $stmt->bind_param("si", $newSubscription, $userId);
    if ($stmt->execute()) {
        // Redirect to the profile page with a success message
        header("Location: profile.php?success=Subscription updated successfully");
    } else {
        // Redirect to the profile page with an error message
        header("Location: profile.php?error=Failed to update subscription");
    }

    $stmt->close();
    $connection->close();
} else {
    // If the payment was not successful, redirect back to the profile page
    header("Location: profile.php?error=Payment not completed");
    exit();
}
