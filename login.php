<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        <!-- Login Form -->
        <form action="login_process.php" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Login</button>
        </form>
<?php 
/*
        <!-- Divider -->
        <div class="flex items-center my-4">
            <hr class="flex-1 border-gray-300">
            <span class="px-3 text-gray-500 text-sm">or</span>
            <hr class="flex-1 border-gray-300">
        </div>


        <!-- Google and Apple Sign-in Buttons -->
        <div class="space-y-2" 
            <a href="google-login.php" class="flex items-center justify-center bg-red-500 text-white p-2 rounded hover:bg-red-600">
                <img src="google-icon.png" alt="Google" class="w-5 h-5 mr-2"> Sign in with Google
            </a>
            <a href="apple-login.php" class="flex items-center justify-center bg-black text-white p-2 rounded hover:bg-gray-800">
                <img src="apple-icon.png" alt="Apple" class="w-5 h-5 mr-2"> Sign in with Apple
            </a>
        </div>
        
        */
        ?>
    </div>
</body>
</html>

