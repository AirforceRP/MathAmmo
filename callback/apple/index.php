<?php
session_start();
include '../../config.php'; // Include your database configuration

// Check if the authorization code and ID token are present in the request
if (empty($_GET['code']) || empty($_GET['id_token'])) {
    die("Authorization code or ID token not received.");
}

$authorizationCode = $_GET['code'];
$idToken = $_GET['id_token'];

// Your Apple Sign In credentials
$clientId = 'com.mathammo.signin'; // Replace with your client ID
$teamId = 'NKN642M989'; // Replace with your team ID
$keyId = 'SAT764FKJ5'; // Replace with your key ID
$privateKeyPath = 'AuthKey_SAT764FKJ5.p8'; // Path to your private key

// Load the private key
$privateKey = file_get_contents('AuthKey_SAT764FKJ5.p8');
if (!$privateKey) {
    die("Failed to load private key.");
}

// Generate the JWT for Apple Authentication
function generateJWT($teamId, $clientId, $keyId, $privateKey) {
    $header = [
        'alg' => 'ES256',
        'kid' => $keyId
    ];
    $body = [
        'iss' => $teamId,
        'iat' => time(),
        'exp' => time() + 3600, // Token expiration time (1 hour)
        'aud' => 'https://appleid.apple.com',
        'sub' => $clientId
    ];

    // Encode header and body
    $headerEncoded = rtrim(strtr(base64_encode(json_encode($header)), '+/', '-_'), '=');
    $bodyEncoded = rtrim(strtr(base64_encode(json_encode($body)), '+/', '-_'), '=');
    $unsignedToken = "$headerEncoded.$bodyEncoded";

    // Sign the token using ES256
    $signature = '';
    $success = openssl_sign($unsignedToken, $signature, $privateKey, OPENSSL_ALGO_SHA256);
    if (!$success) {
        die("Failed to sign the token.");
    }

    $signatureEncoded = rtrim(strtr(base64_encode($signature), '+/', '-_'), '=');

    return "$unsignedToken.$signatureEncoded";
}

$jwt = generateJWT($teamId, $clientId, $keyId, $privateKey);

// Exchange the authorization code for tokens
$tokenUrl = 'https://appleid.apple.com/auth/token';
$data = [
    'grant_type' => 'authorization_code',
    'code' => $authorizationCode,
    'redirect_uri' => 'https://app.mathammo.com/callback/apple/index.php', // Your redirect URI
    'client_id' => $clientId,
    'client_secret' => $jwt
];

$ch = curl_init($tokenUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

$response = curl_exec($ch);
if (curl_errno($ch)) {
    die("cURL error: " . curl_error($ch));
}
curl_close($ch);

$tokens = json_decode($response, true);

if (isset($tokens['id_token'])) {
    // Decode and verify the ID token
    $payload = explode('.', $tokens['id_token'])[1];
    $userInfo = json_decode(base64_decode($payload), true);

    if (!$userInfo) {
        die("Failed to decode ID token.");
    }

    // Use userInfo to register or log in the user
    $_SESSION['user'] = $userInfo;
    header("Location: https://app.mathammo.com/index.php");
    exit();
} else {
    die("Failed to authenticate with Apple. " . htmlspecialchars($response));
}
?>

