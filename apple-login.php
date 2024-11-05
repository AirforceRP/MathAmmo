<?php
require_once 'config.php';

// Construct the Apple authorization URL with response_mode=form_post
$authUrl = "https://appleid.apple.com/auth/authorize?" . http_build_query([
    'client_id' => APPLE_CLIENT_ID,
    'redirect_uri' => APPLE_REDIRECT_URI,
    'response_type' => 'code',
    'scope' => 'name email',
    'response_mode' => 'form_post'
]);

header('Location: ' . $authUrl);
exit();
?>
