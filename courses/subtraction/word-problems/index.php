<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subtraction Word Problems - MathAmmo</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .fade-in {
      opacity: 0;
      animation: fadeIn 1s forwards;
    }
    .modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      align-items: center;
      justify-content: center;
      visibility: hidden;
      opacity: 0;
      transition: opacity 0.3s, visibility 0.3s;
    }
    .modal.active {
      visibility: visible;
      opacity: 1;
    }
    .modal-content {
      background: white;
      padding: 20px;
      border-radius: 8px;
      text-align: center;
      max-width: 400px;
      width: 100%;
    }
  </style>
</head>
<body class="bg-gray-100 font-sans leading-relaxed tracking-normal">
  <header class="bg-blue-600 text-white p-4 shadow-lg">
    <div class="max-w-4xl mx-auto">
      <h1 class="text-3xl font-bold">Subtraction Word Problems</h1>
    </div>
  </header>

  <main class="max-w-4xl mx-auto p-6 mt-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Solve These Word Problems Using Subtraction</h2>

    <!-- Problem 1 -->
    <div class="fade-in" id="step1">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Explanation</h3>
      <p class="text-gray-700">Michael had 20 chocolates. He gave 7 to his sister. How many chocolates does he have left?</p>
    </div>
    <div class="fade-in hidden" id="step2">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Problem</h3>
      <p class="text-gray-700">20 - 7 = ?</p>
    </div>
    <div class="fade-in hidden" id="step3">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Answer</h3>
      <p class="text-gray-700">Michael has 13 chocolates left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">20 - 7 = 13</p>
    </div>

    <!-- Problem 2 -->
    <div class="fade-in hidden" id="step4">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Explanation</h3>
      <p class="text-gray-700">A bookstore had 50 books. They sold 18 books. How many books are left in the store?</p>
    </div>
    <div class="fade-in hidden" id="step5">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Problem</h3>
      <p class="text-gray-700">50 - 18 = ?</p>
    </div>
    <div class="fade-in hidden" id="step6">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Answer</h3>
      <p class="text-gray-700">There are 32 books left in the store.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">50 - 18 = 32</p>
    </div>

    <!-- Problem 3 -->
    <div class="fade-in hidden" id="step7">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Explanation</h3>
      <p class="text-gray-700">Linda had 35 balloons for a party. 12 of them popped. How many balloons does she have now?</p>
    </div>
    <div class="fade-in hidden" id="step8">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Problem</h3>
      <p class="text-gray-700">35 - 12 = ?</p>
    </div>
    <div class="fade-in hidden" id="step9">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Answer</h3>
      <p class="text-gray-700">Linda has 23 balloons left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">35 - 12 = 23</p>
    </div>

    <!-- Problem 4 -->
    <div class="fade-in hidden" id="step10">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Explanation</h3>
      <p class="text-gray-700">A farmer had 90 cows. He sold 45 of them. How many cows does he have left?</p>
    </div>
    <div class="fade-in hidden" id="step11">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Problem</h3>
      <p class="text-gray-700">90 - 45 = ?</p>
    </div>
    <div class="fade-in hidden" id="step12">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Answer</h3>
      <p class="text-gray-700">The farmer has 45 cows left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">90 - 45 = 45</p>
    </div>

    <!-- Problem 5 -->
    <div class="fade-in hidden" id="step13">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Explanation</h3>
      <p class="text-gray-700">Tom had $75. He spent $30 on groceries. How much money does he have left?</p>
    </div>
    <div class="fade-in hidden" id="step14">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Problem</h3>
      <p class="text-gray-700">$75 - $30 = ?</p>
    </div>
    <div class="fade-in hidden" id="step15">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Answer</h3>
      <p class="text-gray-700">Tom has $45 left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">$75 - $30 = $45</p>
    </div>

    <!-- Problem 6 -->
    <div class="fade-in hidden" id="step16">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Explanation</h3>
      <p class="text-gray-700">A garden had 150 flowers. A storm destroyed 55 of them. How many flowers are left?</p>
    </div>
    <div class="fade-in hidden" id="step17">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Problem</h3>
      <p class="text-gray-700">150 - 55 = ?</p>
    </div>
    <div class="fade-in hidden" id="step18">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Answer</h3>
      <p class="text-gray-700">There are 95 flowers left in the garden.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">150 - 55 = 95</p>
    </div>

    <!-- Problem 7 -->
    <div class="fade-in hidden" id="step19">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Explanation</h3>
      <p class="text-gray-700">A factory produced 1,000 units of a product. 350 units were sold. How many units are left?</p>
    </div>
    <div class="fade-in hidden" id="step20">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Problem</h3>
      <p class="text-gray-700">1000 - 350 = ?</p>
    </div>
    <div class="fade-in hidden" id="step21">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Answer</h3>
      <p class="text-gray-700">There are 650 units left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">1000 - 350 = 650</p>
    </div>

    <!-- Problem 8 -->
    <div class="fade-in hidden" id="step22">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Explanation</h3>
      <p class="text-gray-700">Sarah had 500 stickers. She gave 275 to her friends. How many stickers does she have left?</p>
    </div>
    <div class="fade-in hidden" id="step23">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Problem</h3>
      <p class="text-gray-700">500 - 275 = ?</p>
    </div>
    <div class="fade-in hidden" id="step24">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Answer</h3>
      <p class="text-gray-700">Sarah has 225 stickers left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">500 - 275 = 225</p>
    </div>

    <!-- Problem 9 -->
    <div class="fade-in hidden" id="step25">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Explanation</h3>
      <p class="text-gray-700">A tree had 1,200 leaves in spring. By autumn, 800 leaves had fallen. How many leaves remain?</p>
    </div>
    <div class="fade-in hidden" id="step26">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Problem</h3>
      <p class="text-gray-700">1200 - 800 = ?</p>
    </div>
    <div class="fade-in hidden" id="step27">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Answer</h3>
      <p class="text-gray-700">There are 400 leaves left on the tree.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">1200 - 800 = 400</p>
    </div>

    <!-- Problem 10 -->
    <div class="fade-in hidden" id="step28">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Explanation</h3>
      <p class="text-gray-700">A school had 600 students at the beginning of the year. 150 students graduated. How many students are left?</p>
    </div>
    <div class="fade-in hidden" id="step29">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Problem</h3>
      <p class="text-gray-700">600 - 150 = ?</p>
    </div>
    <div class="fade-in hidden" id="step30">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Answer</h3>
      <p class="text-gray-700">There are 450 students left at the school.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">600 - 150 = 450</p>
    </div>

    <!-- Modal for Completion -->
    <div class="modal" id="completionModal">
      <div class="modal-content">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Congratulations!</h3>
        <p class="text-gray-700 mb-4">You've completed all the subtraction word problems!</p>
        <a href="https://app.mathammo.com/courses/" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Back to Main Menu</a>
      </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="mt-6 flex justify-end">
      <button id="nextButton" class="bg-green-600 text-white px-4 py-2 rounded font-semibold hover:bg-green-500">Next Step</button>
    </div>
  </main>

  <script>
    let currentStep = 1;
    const steps = document.querySelectorAll(".fade-in");
    const nextButton = document.getElementById("nextButton");
    const modal = document.getElementById("completionModal");

    function nextStep() {
      if (currentStep < steps.length) {
        steps[currentStep].classList.remove("hidden");
        steps[currentStep].classList.add("fade-in");
        currentStep++;
      } else {
        nextButton.style.display = "none";
        modal.classList.add("active");
      }
    }

    nextButton.addEventListener("click", nextStep);
  </script>
</body>
</html>
