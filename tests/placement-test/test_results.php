<?php
session_start();

$scores = $_SESSION['scores'];
$totalScore = array_sum($scores);
$totalQuestions = count($scores) * 10; // Since each section has 10 questions
$beneficialUnit = array_keys($scores, min($scores))[0];

// Clear session data after displaying results
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Results - Math Placement Test</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #93c5fd, #3b82f6, #1e40af);
            background-size: cover;
            color: #fff;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="container mx-auto px-4 py-16 text-center">
        <h2 class="text-4xl font-bold mb-6">Your Results</h2>
        <p class="text-xl mb-4">You scored <span class="font-semibold"><?= $totalScore ?></span> out of <span class="font-semibold"><?= $totalQuestions ?></span>.</p>
        
        <h3 class="text-2xl font-semibold mb-4">Score Breakdown:</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
            <?php foreach ($scores as $section => $score): ?>
                <div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-md text-gray-800">
                    <h4 class="text-xl font-semibold"><?= $section ?></h4>
                    <p class="text-gray-600">Score: <?= $score ?> / 10</p>
                </div>
            <?php endforeach; ?>
        </div>

        <p class="text-lg">The unit that would be most beneficial for you to focus on is: <span class="font-semibold text-yellow-300"><?= $beneficialUnit ?></span></p>
        
        <a href="placement_test.php?step=1" class="mt-6 inline-block bg-yellow-500 text-white px-6 py-2 rounded font-semibold hover:bg-yellow-400">Retake the Test</a>
    </div>
</body>
</html>


