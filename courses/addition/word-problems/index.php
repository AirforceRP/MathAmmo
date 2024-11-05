<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Word Problems - MathAmmo</title>
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
      <h1 class="text-3xl font-bold">Word Problems</h1>
    </div>
  </header>

  <main class="max-w-4xl mx-auto p-6 mt-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Solve These Word Problems</h2>

    <!-- Problem 1 -->
    <div class="fade-in" id="step1">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Explanation</h3>
      <p class="text-gray-700">Emily has 15 apples and buys 9 more. How many apples does she have now?</p>
    </div>
    <div class="fade-in hidden" id="step2">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Problem</h3>
      <p class="text-gray-700">15 + 9 = ?</p>
    </div>
    <div class="fade-in hidden" id="step3">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Answer</h3>
      <p class="text-gray-700">Emily has 24 apples.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">15 + 9 = 24</p>
    </div>

    <!-- Problem 2 -->
    <div class="fade-in hidden" id="step4">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Explanation</h3>
      <p class="text-gray-700">A bus has 22 passengers. At the next stop, 13 more get on. How many passengers are there now?</p>
    </div>
    <div class="fade-in hidden" id="step5">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Problem</h3>
      <p class="text-gray-700">22 + 13 = ?</p>
    </div>
    <div class="fade-in hidden" id="step6">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Answer</h3>
      <p class="text-gray-700">There are 35 passengers on the bus.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">22 + 13 = 35</p>
    </div>

    <!-- Problem 3 -->
    <div class="fade-in hidden" id="step7">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Explanation</h3>
      <p class="text-gray-700">Sarah has 48 pencils. She gives 19 to her friend. How many pencils does she have left?</p>
    </div>
    <div class="fade-in hidden" id="step8">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Problem</h3>
      <p class="text-gray-700">48 - 19 = ?</p>
    </div>
    <div class="fade-in hidden" id="step9">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Answer</h3>
      <p class="text-gray-700">Sarah has 29 pencils left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">48 - 19 = 29</p>
    </div>

    <!-- Problem 4 -->
    <div class="fade-in hidden" id="step10">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Explanation</h3>
      <p class="text-gray-700">Tom baked 30 cookies. He gave 12 to his neighbors. How many cookies does he have now?</p>
    </div>
    <div class="fade-in hidden" id="step11">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Problem</h3>
      <p class="text-gray-700">30 - 12 = ?</p>
    </div>
    <div class="fade-in hidden" id="step12">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Answer</h3>
      <p class="text-gray-700">Tom has 18 cookies left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">30 - 12 = 18</p>
    </div>

    <!-- Problem 5 -->
    <div class="fade-in hidden" id="step13">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Explanation</h3>
      <p class="text-gray-700">James reads 25 pages of his book on Monday and 18 pages on Tuesday. How many pages has he read in total?</p>
    </div>
    <div class="fade-in hidden" id="step14">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Problem</h3>
      <p class="text-gray-700">25 + 18 = ?</p>
    </div>
    <div class="fade-in hidden" id="step15">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Answer</h3>
      <p class="text-gray-700">James has read 43 pages.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">25 + 18 = 43</p>
    </div>

    <!-- Problem 6 -->
    <div class="fade-in hidden" id="step16">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Explanation</h3>
      <p class="text-gray-700">A store has 50 oranges. They sell 23 in the morning. How many oranges are left?</p>
    </div>
    <div class="fade-in hidden" id="step17">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Problem</h3>
      <p class="text-gray-700">50 - 23 = ?</p>
    </div>
    <div class="fade-in hidden" id="step18">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Answer</h3>
      <p class="text-gray-700">There are 27 oranges left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">50 - 23 = 27</p>
    </div>

    <!-- Problem 7 -->
    <div class="fade-in hidden" id="step19">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Explanation</h3>
      <p class="text-gray-700">Anna saves $45 from her allowance. She spends $20 on a gift. How much money does she have left?</p>
    </div>
    <div class="fade-in hidden" id="step20">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Problem</h3>
      <p class="text-gray-700">45 - 20 = ?</p>
    </div>
    <div class="fade-in hidden" id="step21">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Answer</h3>
      <p class="text-gray-700">Anna has $25 left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">45 - 20 = 25</p>
    </div>

    <!-- Problem 8 -->
    <div class="fade-in hidden" id="step22">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Explanation</h3>
      <p class="text-gray-700">A farmer has 70 cows. He sells 32. How many cows does he have left?</p>
    </div>
    <div class="fade-in hidden" id="step23">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Problem</h3>
      <p class="text-gray-700">70 - 32 = ?</p>
    </div>
    <div class="fade-in hidden" id="step24">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Answer</h3>
      <p class="text-gray-700">The farmer has 38 cows left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">70 - 32 = 38</p>
    </div>

    <!-- Problem 9 -->
    <div class="fade-in hidden" id="step25">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Explanation</h3>
      <p class="text-gray-700">Lucas has 120 marbles. He gives 45 to his cousin. How many marbles does he have now?</p>
    </div>
    <div class="fade-in hidden" id="step26">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Problem</h3>
      <p class="text-gray-700">120 - 45 = ?</p>
    </div>
    <div class="fade-in hidden" id="step27">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Answer</h3>
      <p class="text-gray-700">Lucas has 75 marbles left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">120 - 45 = 75</p>
    </div>

    <!-- Problem 10 -->
    <div class="fade-in hidden" id="step28">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Explanation</h3>
      <p class="text-gray-700">A train travels 150 miles in the morning and 130 miles in the afternoon. How far did the train travel in total?</p>
    </div>
    <div class="fade-in hidden" id="step29">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Problem</h3>
      <p class="text-gray-700">150 + 130 = ?</p>
    </div>
    <div class="fade-in hidden" id="step30">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Answer</h3>
      <p class="text-gray-700">The train traveled 280 miles in total.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">150 + 130 = 280</p>
    </div>

    <!-- Modal for Completion -->
    <div class="modal" id="completionModal">
      <div class="modal-content">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Congratulations!</h3>
        <p class="text-gray-700 mb-4">You've completed all the word problems!</p>
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
