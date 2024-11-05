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

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and retrieve form inputs
    $currentPassword = trim($_POST['current_password']);
    $newPassword = trim($_POST['new_password']);
    $confirmPassword = trim($_POST['confirm_password']);

    // Check if new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        header("Location: profile.php?error=Passwords do not match");
        exit();
    }

    // Fetch the current password hash from the database
    $sql = "SELECT password FROM " . ACCOUNT_TABLE . " WHERE id = ?";
    $stmt = $connection->prepare($sql);
    if ($stmt === false) {
        die("Error preparing the SQL statement: " . $connection->error);
    }
    
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user || !password_verify($currentPassword, $user['password'])) {
        // If the current password is incorrect
        header("Location: profile.php?error=Incorrect current password");
        exit();
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the password in the database
    $sql = "UPDATE " . ACCOUNT_TABLE . " SET password = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    if ($stmt === false) {
        die("Error preparing the SQL statement: " . $connection->error);
    }
    
    $stmt->bind_param("si", $hashedPassword, $userId);
    if ($stmt->execute()) {
        // Redirect to the profile page with a success message
        header("Location: profile.php?password_success=Password changed successfully");
    } else {
        // Redirect to the profile page with an error message
        header("Location: profile.php?error=Failed to change password");
    }

    $stmt->close();
    $connection->close();
} else {
    // If the form was not submitted, redirect back to the profile page
    header("Location: profile.php");
    exit();
}
