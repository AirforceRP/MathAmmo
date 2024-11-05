<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['code'])) {
    $code = $_POST['code'];

    // Generate the JWT for Apple token request
    $privateKey = file_get_contents(APPLE_PRIVATE_KEY_PATH);
    $header = base64_encode(json_encode(['alg' => 'ES256', 'kid' => APPLE_KEY_ID]));
    $payload = base64_encode(json_encode([
        'iss' => APPLE_TEAM_ID,
        'iat' => time(),
        'exp' => time() + 3600,
        'aud' => 'https://appleid.apple.com',
        'sub' => APPLE_CLIENT_ID
    ]));

    $unsignedToken = $header . '.' . $payload;
    $signature = '';
    openssl_sign($unsignedToken, $signature, $privateKey, OPENSSL_ALGO_SHA256);
    $clientSecret = $unsignedToken . '.' . base64_encode($signature);

    // Request the token from Apple
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://appleid.apple.com/auth/token");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'grant_type' => 'authorization_code',
        'code' => $code,
        'redirect_uri' => APPLE_REDIRECT_URI,
        'client_id' => APPLE_CLIENT_ID,
        'client_secret' => $clientSecret,
    ]));

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $tokenData = json_decode($response, true);

    if ($httpCode !== 200) {
        // Print the error if the HTTP response code is not 200 (OK)
        echo "Error: Failed to retrieve token. HTTP Code: $httpCode<br>";
        echo "Response: " . htmlspecialchars($response) . "<br>";
        exit();
    }

    if (isset($tokenData['id_token'])) {
        $idToken = $tokenData['id_token'];

        // Decode the ID token manually
        list($headerEncoded, $payloadEncoded, $signatureEncoded) = explode('.', $idToken);

        // Decode the payload
        $payload = json_decode(base64_decode($payloadEncoded), true);
        $email = $payload['email'] ?? null;

        if ($email) {
            // Check if user exists in the database, if not, register the user
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                // Register the new user
                $stmt = $conn->prepare("INSERT INTO users (email) VALUES (?)");
                $stmt->bind_param("s", $email);
                $stmt->execute();
            }

            // Log in the user by starting a session
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['email'] = $email;
            header('Location: index.php');
            exit();
        }
    } else {
        // Print the entire response if the ID token is not present
        echo "Authentication failed. Response from Apple:<br>";
        echo "Response: " . htmlspecialchars($response) . "<br>";
        exit();
    }
} else {
    echo "Authorization code not received.";
}
?>

