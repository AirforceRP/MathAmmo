<?php
session_start();

// Initialize scores if not already set
if (!isset($_SESSION['scores'])) {
    $_SESSION['scores'] = [
        "Addition" => 0,
        "Subtraction" => 0,
        "Multiplication" => 0,
        "Division" => 0,
        "Fractions" => 0,
        "Algebra" => 0,
        "Geometry" => 0,
        "Exponents" => 0,
        "Decimals" => 0
        
    ];
}

// Define more questions for each section
$sections = [
    "Addition" => [
        ["question" => "What is 5 + 3?", "options" => ["6", "7", "8", "9"], "answer" => "8"],
        ["question" => "What is 15 + 7?", "options" => ["20", "22", "23", "24"], "answer" => "22"],
        ["question" => "What is 32 + 18?", "options" => ["40", "45", "50", "60"], "answer" => "50"],
        ["question" => "What is 14 + 6?", "options" => ["18", "19", "20", "21"], "answer" => "20"],
        ["question" => "What is 89 + 11?", "options" => ["90", "99", "100", "110"], "answer" => "100"],
        ["question" => "What is 123 + 456?", "options" => ["579", "580", "581", "582"], "answer" => "579"],
        ["question" => "What is 75 + 25?", "options" => ["90", "95", "100", "105"], "answer" => "100"],
        ["question" => "What is 250 + 175?", "options" => ["400", "425", "450", "475"], "answer" => "425"],
        ["question" => "What is 11 + 99?", "options" => ["100", "110", "111", "120"], "answer" => "110"],
        ["question" => "What is 567 + 123?", "options" => ["680", "690", "700", "710"], "answer" => "690"]
    ],
    "Subtraction" => [
        ["question" => "What is 12 - 4?", "options" => ["6", "7", "8", "9"], "answer" => "8"],
        ["question" => "What is 25 - 9?", "options" => ["14", "15", "16", "17"], "answer" => "16"],
        ["question" => "What is 100 - 55?", "options" => ["45", "50", "55", "60"], "answer" => "45"],
        ["question" => "What is 44 - 20?", "options" => ["22", "23", "24", "25"], "answer" => "24"],
        ["question" => "What is 78 - 33?", "options" => ["44", "45", "46", "47"], "answer" => "45"],
        ["question" => "What is 500 - 123?", "options" => ["377", "378", "379", "380"], "answer" => "377"],
        ["question" => "What is 300 - 150?", "options" => ["100", "150", "200", "250"], "answer" => "150"],
        ["question" => "What is 210 - 60?", "options" => ["140", "150", "160", "170"], "answer" => "150"],
        ["question" => "What is 50 - 25?", "options" => ["20", "25", "30", "35"], "answer" => "25"],
        ["question" => "What is 900 - 450?", "options" => ["400", "450", "500", "550"], "answer" => "450"]
    ],
    "Multiplication" => [
        ["question" => "What is 3 x 4?", "options" => ["10", "11", "12", "13"], "answer" => "12"],
        ["question" => "What is 7 x 8?", "options" => ["54", "56", "58", "60"], "answer" => "56"],
        ["question" => "What is 9 x 9?", "options" => ["72", "81", "90", "99"], "answer" => "81"],
        ["question" => "What is 6 x 7?", "options" => ["40", "42", "44", "48"], "answer" => "42"],
        ["question" => "What is 8 x 5?", "options" => ["35", "40", "45", "50"], "answer" => "40"],
        ["question" => "What is 12 x 12?", "options" => ["120", "124", "144", "150"], "answer" => "144"],
        ["question" => "What is 15 x 3?", "options" => ["30", "35", "40", "45"], "answer" => "45"],
        ["question" => "What is 20 x 5?", "options" => ["90", "95", "100", "105"], "answer" => "100"],
        ["question" => "What is 11 x 11?", "options" => ["110", "121", "130", "140"], "answer" => "121"],
        ["question" => "What is 25 x 4?", "options" => ["90", "95", "100", "105"], "answer" => "100"]
    ],
    "Division" => [
        ["question" => "What is 16 / 4?", "options" => ["2", "3", "4", "5"], "answer" => "4"],
        ["question" => "What is 45 / 5?", "options" => ["8", "9", "10", "11"], "answer" => "9"],
        ["question" => "What is 81 / 9?", "options" => ["7", "8", "9", "10"], "answer" => "9"],
        ["question" => "What is 100 / 10?", "options" => ["9", "10", "11", "12"], "answer" => "10"],
        ["question" => "What is 56 / 7?", "options" => ["6", "7", "8", "9"], "answer" => "8"],
        ["question" => "What is 144 / 12?", "options" => ["10", "11", "12", "13"], "answer" => "12"],
        ["question" => "What is 200 / 50?", "options" => ["2", "3", "4", "5"], "answer" => "4"],
        ["question" => "What is 150 / 5?", "options" => ["25", "30", "35", "40"], "answer" => "30"],
        ["question" => "What is 500 / 25?", "options" => ["10", "15", "20", "25"], "answer" => "20"],
        ["question" => "What is 900 / 30?", "options" => ["20", "25", "30", "35"], "answer" => "30"]
    ],
    "Fractions" => [
        ["question" => "What is 3/4 + 1/4?", "options" => ["1", "1/2", "3/4", "2"], "answer" => "1"],
        ["question" => "What is 2/3 of 12?", "options" => ["4", "6", "8", "9"], "answer" => "8"],
        ["question" => "What is 5/10 simplified?", "options" => ["1/2", "2/5", "5/10", "1"], "answer" => "1/2"],
        ["question" => "What is 7/8 - 1/8?", "options" => ["5/8", "6/8", "7/8", "1"], "answer" => "6/8"],
        ["question" => "What is 3/5 of 20?", "options" => ["10", "12", "15", "18"], "answer" => "12"],
        ["question" => "What is 1/2 + 1/4?", "options" => ["3/4", "1", "1/2", "5/4"], "answer" => "3/4"],
        ["question" => "What is 4/5 - 2/5?", "options" => ["1/5", "2/5", "3/5", "4/5"], "answer" => "2/5"],
        ["question" => "What is 3/8 + 1/8?", "options" => ["4/8", "1/2", "5/8", "6/8"], "answer" => "4/8"],
        ["question" => "What is 9/12 simplified?", "options" => ["3/4", "2/3", "1/2", "1/3"], "answer" => "3/4"],
        ["question" => "What is 2/4 + 3/4?", "options" => ["1", "5/4", "3/4", "7/4"], "answer" => "5/4"]
    ],
    "Algebra" => [
    ["question" => "Solve for x: 2x = 10", "options" => ["3", "4", "5", "6"], "answer" => "5"],
    ["question" => "Solve for y: y + 7 = 14", "options" => ["5", "6", "7", "8"], "answer" => "7"],
    ["question" => "What is x if 3x - 5 = 10?", "options" => ["4", "5", "6", "7"], "answer" => "5"],
    ["question" => "Solve for z: 4z = 16", "options" => ["2", "3", "4", "5"], "answer" => "4"],
    ["question" => "If y - 3 = 12, what is y?", "options" => ["10", "12", "14", "15"], "answer" => "15"],
    ["question" => "Solve for x: 5x = 25", "options" => ["3", "4", "5", "6"], "answer" => "5"],
    ["question" => "What is x if x/2 = 8?", "options" => ["14", "15", "16", "17"], "answer" => "16"],
    ["question" => "If y + 9 = 21, what is y?", "options" => ["10", "11", "12", "13"], "answer" => "12"],
    ["question" => "Solve for x: 6x = 42", "options" => ["5", "6", "7", "8"], "answer" => "7"],
    ["question" => "What is x if x - 5 = 3?", "options" => ["6", "7", "8", "9"], "answer" => "8"]
    ],
    "Geometry" => [
        ["question" => "How many sides does a hexagon have?", "options" => ["5", "6", "7", "8"], "answer" => "6"],
        ["question" => "What is the perimeter of a square with side length 4?", "options" => ["12", "14", "16", "18"], "answer" => "16"],
        ["question" => "What is the area of a triangle with base 5 and height 4?", "options" => ["10", "15", "20", "25"], "answer" => "10"],
        ["question" => "How many degrees are in a right angle?", "options" => ["45", "90", "180", "360"], "answer" => "90"],
        ["question" => "What is the volume of a cube with side length 3?", "options" => ["9", "18", "27", "36"], "answer" => "27"],
        ["question" => "What is the circumference of a circle with radius 7 (π ≈ 3.14)?", "options" => ["21.98", "43.96", "14.00", "28.00"], "answer" => "43.96"],
        ["question" => "How many faces does a cube have?", "options" => ["4", "5", "6", "8"], "answer" => "6"],
        ["question" => "What is the sum of the angles in a triangle?", "options" => ["90", "180", "270", "360"], "answer" => "180"],
        ["question" => "What is the area of a circle with radius 5 (π ≈ 3.14)?", "options" => ["25.12", "31.40", "78.50", "100.00"], "answer" => "78.50"],
        ["question" => "How many sides does a pentagon have?", "options" => ["4", "5", "6", "7"], "answer" => "5"]
    ],
    "Exponents" => [
        ["question" => "What is 2 squared?", "options" => ["2", "3", "4", "5"], "answer" => "4"],
        ["question" => "What is 3 squared?", "options" => ["6", "9", "12", "15"], "answer" => "9"],
        ["question" => "What is 5 squared?", "options" => ["20", "25", "30", "35"], "answer" => "25"],
        ["question" => "What is the square root of 16?", "options" => ["2", "3", "4", "5"], "answer" => "4"],
        ["question" => "What is the square root of 49?", "options" => ["5", "6", "7", "8"], "answer" => "7"],
        ["question" => "What is 4 cubed?", "options" => ["16", "32", "64", "8"], "answer" => "64"],
        ["question" => "What is 10 squared?", "options" => ["50", "75", "100", "125"], "answer" => "100"],
        ["question" => "What is the square root of 81?", "options" => ["7", "8", "9", "10"], "answer" => "9"],
        ["question" => "What is 7 squared?", "options" => ["42", "47", "49", "56"], "answer" => "49"],
        ["question" => "What is the square root of 64?", "options" => ["6", "7", "8", "9"], "answer" => "8"]
    ],
    "Decimals" => [
    ["question" => "What is 0.5 + 0.25?", "options" => ["0.65", "0.70", "0.75", "0.80"], "answer" => "0.75"],
    ["question" => "What is 1.2 - 0.4?", "options" => ["0.7", "0.8", "0.9", "1.0"], "answer" => "0.8"],
    ["question" => "What is 2.5 x 3?", "options" => ["6.5", "7.5", "8.5", "9.5"], "answer" => "7.5"],
    ["question" => "What is 5.4 ÷ 2?", "options" => ["2.5", "2.6", "2.7", "2.8"], "answer" => "2.7"],
    ["question" => "What is 0.75 x 4?", "options" => ["2.75", "3.00", "3.25", "3.50"], "answer" => "3.00"],
    ["question" => "What is 3.6 - 1.8?", "options" => ["1.6", "1.7", "1.8", "1.9"], "answer" => "1.8"],
    ["question" => "What is 0.09 + 0.01?", "options" => ["0.08", "0.09", "0.10", "0.11"], "answer" => "0.10"],
    ["question" => "What is 10.5 ÷ 5?", "options" => ["1.5", "2.0", "2.1", "2.5"], "answer" => "2.1"],
    ["question" => "What is 4.75 - 1.25?", "options" => ["3.25", "3.50", "3.75", "4.00"], "answer" => "3.50"],
    ["question" => "What is 6.3 + 0.7?", "options" => ["6.9", "7.0", "7.1", "7.2"], "answer" => "7.0"]
    ],
    
];

// Get the current step from the URL, default to 1
$step = isset($_GET['step']) ? (int)$_GET['step'] : 1;
$sectionKeys = array_keys($sections);
$currentSection = $sectionKeys[$step - 1] ?? null;

if (isset($currentSection) && isset($sections[$currentSection])) {
    $totalQuestions = count($sections[$currentSection]);
} else {
    $totalQuestions = 0;
} 
$totalQuestions = 0;
foreach ($sections as $section) {
    $totalQuestions += count($section);
}
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $currentSection) {
    foreach ($sections[$currentSection] as $index => $question) {
        if (isset($_POST["question_$index"]) && $_POST["question_$index"] === $question["answer"]) {
            $_SESSION['scores'][$currentSection]++;
        }
    }
    // Move to the next step
    $nextStep = $step + 1;
    if ($nextStep > count($sections)) {
        header("Location: test_results.php");
    } else {
        header("Location: index.php?step=$nextStep");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Placement Test - <?= $currentSection ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom gradient background */
        .gradient-bg {
            background: linear-gradient(135deg, #4f46e5, #06b6d4); /* Purple to teal gradient */
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startScreen = document.querySelector('#start-screen');
            const testScreen = document.querySelector('#test-screen');
            const startButton = document.querySelector('#start-button');

            // Show test screen and hide start screen
            startButton.addEventListener('click', function() {
                startScreen.classList.add('hidden');
                testScreen.classList.remove('hidden');
            });
        });
    </script>
</head>
<body class="font-sans antialiased gradient-bg min-h-screen flex items-center justify-center">
    <!-- Start Screen -->
    <div id="start-screen" class="text-center bg-white p-10 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-4">Welcome to the Math Placement Test</h2>
        <p class="mb-8">You will be tested on various math topics. There are <?= $totalQuestions ?> questions in total.</p>
        <button id="start-button" class="bg-blue-600 text-white px-6 py-3 rounded font-semibold hover:bg-blue-500">Start Test</button>
    </div>

    <!-- Test Screen (Hidden Initially) -->
    <div id="test-screen" class="hidden container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold mb-6 text-center"><?= $currentSection ?> Section</h2>
        <form action="index.php?step=<?= $step ?>" method="post" class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
            <div class="custom-error-message text-red-600 text-center mb-4 hidden">Please answer all required questions.</div>
            <?php if ($currentSection): ?>
                <?php foreach ($sections[$currentSection] as $index => $question): ?>
                    <div class="mb-6">
                        <p class="text-lg font-semibold"><?= ($index + 1) . ". " . $question["question"] ?></p>
                        <?php foreach ($question["options"] as $option): ?>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="question_<?= $index ?>" value="<?= $option ?>" required class="form-radio text-blue-600">
                                    <span class="ml-2"><?= $option ?></span>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>

                <!-- Progress Bar at the Bottom -->
                <div class="relative w-full bg-gray-300 rounded-full h-4 mb-6 mt-4">
                    <div id="progress-bar" class="absolute bg-blue-600 h-4 rounded-full" style="width: 0%;"></div>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Next</button>
            <?php else: ?>
                <p class="text-center text-red-600">Invalid section. Please start over.</p>
                <a href="index.php?step=1" class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded font-semibold hover:bg-blue-500">Restart Test</a>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>