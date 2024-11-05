<?php
define('DB_HOST', 'your-database-host');
define('DB_NAME', 'your-database-name');
define('DB_USER', 'your-database-username');
define('DB_PASS', 'your-database-password');

// Google OAuth configuration
define('GOOGLE_CLIENT_ID', 'your_google_client_id');
define('GOOGLE_CLIENT_SECRET', 'your_google_client_secret');
define('GOOGLE_REDIRECT_URI', 'https://yourdomain.com/google_callback.php');


// Still working on errors caused by apple
// Apple OAuth configuration
define('APPLE_CLIENT_ID', ''); // Your app's Bundle Identifier
define('APPLE_TEAM_ID', ''); // Your Team ID
define('APPLE_KEY_ID', ''); // Your Key ID
define('APPLE_REDIRECT_URI', ''); // Your Redirect URI
define('APPLE_PRIVATE_KEY_PATH', ''); // Path to your private key file

// Create a connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
