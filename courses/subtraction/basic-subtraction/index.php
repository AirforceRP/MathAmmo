<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basic Subtraction with Tallies - MathAmmo</title>
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
    .tally {
      display: inline-block;
      width: 5px;
      height: 30px;
      background-color: #1E3A8A;
      margin: 2px;
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
      <h1 class="text-3xl font-bold">Basic Subtraction</h1>
    </div>
  </header>

  <main class="max-w-4xl mx-auto p-6 mt-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Solve These Problems Using Subtraction and Tallies</h2>

    <!-- Problem 1 -->
    <div class="fade-in" id="step1">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Explanation</h3>
      <p class="text-gray-700">Sam had 10 candies. He ate 3 of them. How many candies does Sam have left?</p>
      <div class="mt-4">
        <div class="flex justify-center">
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div>
        </div>
        <p class="text-gray-700 mt-2">Take away 3 tallies:</p>
        <div class="flex justify-center mt-2">
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="fade-in hidden" id="step2">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Problem</h3>
      <p class="text-gray-700">10 - 3 = ?</p>
    </div>
    <div class="fade-in hidden" id="step3">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Answer</h3>
      <p class="text-gray-700">Sam has 7 candies left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">10 - 3 = 7</p>
    </div>

    <!-- Problem 2 -->
    <div class="fade-in hidden" id="step4">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Explanation</h3>
      <p class="text-gray-700">Lily had 8 balloons. 5 of them popped. How many balloons does she have now?</p>
      <div class="mt-4">
        <div class="flex justify-center">
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div>
        </div>
        <p class="text-gray-700 mt-2">Take away 5 tallies:</p>
        <div class="flex justify-center mt-2">
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="fade-in hidden" id="step5">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Problem</h3>
      <p class="text-gray-700">8 - 5 = ?</p>
    </div>
    <div class="fade-in hidden" id="step6">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Answer</h3>
      <p class="text-gray-700">Lily has 3 balloons left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">8 - 5 = 3</p>
    </div>

    <!-- Problem 3 -->
    <div class="fade-in hidden" id="step7">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Explanation</h3>
      <p class="text-gray-700">A store had 12 apples. 4 apples were sold. How many apples are left in the store?</p>
      <div class="mt-4">
        <div class="flex justify-center">
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div>
        </div>
        <p class="text-gray-700 mt-2">Take away 4 tallies:</p>
        <div class="flex justify-center mt-2">
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="fade-in hidden" id="step8">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Problem</h3>
      <p class="text-gray-700">12 - 4 = ?</p>
    </div>
    <div class="fade-in hidden" id="step9">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Answer</h3>
      <p class="text-gray-700">There are 8 apples left in the store.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">12 - 4 = 8</p>
    </div>

    <!-- Problem 4 -->
    <div class="fade-in hidden" id="step10">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Explanation</h3>
      <p class="text-gray-700">Jack had 9 toy cars. He lost 2 of them. How many toy cars does Jack have now?</p>
      <div class="mt-4">
        <div class="flex justify-center">
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
        </div>
        <p class="text-gray-700 mt-2">Take away 2 tallies:</p>
        <div class="flex justify-center mt-2">
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="fade-in hidden" id="step11">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Problem</h3>
      <p class="text-gray-700">9 - 2 = ?</p>
    </div>
    <div class="fade-in hidden" id="step12">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Answer</h3>
      <p class="text-gray-700">Jack has 7 toy cars left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">9 - 2 = 7</p>
    </div>

    <!-- Problem 5 -->
    <div class="fade-in hidden" id="step13">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Explanation</h3>
      <p class="text-gray-700">Emma had 15 pencils. She gave 6 to her friend. How many pencils does Emma have now?</p>
      <div class="mt-4">
        <div class="flex justify-center">
          <!-- Tallies for 15 pencils -->
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
        </div>
        <p class="text-gray-700 mt-2">Take away 6 tallies:</p>
        <div class="flex justify-center mt-2">
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="fade-in hidden" id="step14">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Problem</h3>
      <p class="text-gray-700">15 - 6 = ?</p>
    </div>
    <div class="fade-in hidden" id="step15">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Answer</h3>
      <p class="text-gray-700">Emma has 9 pencils left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">15 - 6 = 9</p>
    </div>
    
    <div class="fade-in hidden" id="step16">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Explanation</h3>
      <p class="text-gray-700">A classroom had 20 students. 5 students went home early. How many students are left in the classroom?</p>
      <div class="mt-4">
        <div class="flex justify-center">
          <!-- Tallies for 20 students -->
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div>
        </div>
        <p class="text-gray-700 mt-2">Take away 5 tallies:</p>
        <div class="flex justify-center mt-2">
          <!-- Tallies after removing 5 -->
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="fade-in hidden" id="step17">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Problem</h3>
      <p class="text-gray-700">20 - 5 = ?</p>
    </div>
    <div class="fade-in hidden" id="step18">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Answer</h3>
      <p class="text-gray-700">There are 15 students left in the classroom.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">20 - 5 = 15</p>
    </div>

    <!-- Problem 7 -->
    <div class="fade-in hidden" id="step19">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Explanation</h3>
      <p class="text-gray-700">A baker had 25 muffins. He sold 10 muffins. How many muffins are left?</p>
      <div class="mt-4">
        <div class="flex justify-center">
          <!-- Tallies for 25 muffins -->
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div>
        </div>
        <p class="text-gray-700 mt-2">Take away 10 tallies:</p>
        <div class="flex justify-center mt-2">
          <!-- Tallies after removing 10 -->
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
          <div class="tally"></div><div class="tally"></div><div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="fade-in hidden" id="step20">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Problem</h3>
      <p class="text-gray-700">25 - 10 = ?</p>
    </div>
    <div class="fade-in hidden" id="step21">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Answer</h3>
      <p class="text-gray-700">There are 15 muffins left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">25 - 10 = 15</p>
    </div>
    <!-- Problem 8 -->
<div class="fade-in hidden" id="step22">
  <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Explanation</h3>
  <p class="text-gray-700">A zoo had 30 monkeys. 8 monkeys were moved to another zoo. How many monkeys are left?</p>
  <div class="mt-4">
    <div class="flex justify-center">
      <!-- Tallies for 30 monkeys -->
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
    </div>
    <p class="text-gray-700 mt-2">Take away 8 tallies:</p>
    <div class="flex justify-center mt-2">
      <!-- Tallies after removing 8 -->
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div>
    </div>
  </div>
</div>
<div class="fade-in hidden" id="step23">
  <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Problem</h3>
  <p class="text-gray-700">30 - 8 = ?</p>
</div>
<div class="fade-in hidden" id="step24">
  <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Answer</h3>
  <p class="text-gray-700">There are 22 monkeys left.</p>
  <p class="text-xl font-bold text-blue-600 mt-2">30 - 8 = 22</p>
</div>

<!-- Problem 9 -->
<div class="fade-in hidden" id="step25">
  <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Explanation</h3>
  <p class="text-gray-700">A library had 40 books. 15 books were borrowed. How many books are left in the library?</p>
  <div class="mt-4">
    <div class="flex justify-center">
      <!-- Tallies for 40 books -->
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
    </div>
    <p class="text-gray-700 mt-2">Take away 15 tallies:</p>
    <div class="flex justify-center mt-2">
      <!-- Tallies after removing 15 -->
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div>
      <div class="tally"></div>
    </div>
  </div>
</div>
<div class="fade-in hidden" id="step26">
  <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Problem</h3>
  <p class="text-gray-700">40 - 15 = ?</p>
</div>
<div class="fade-in hidden" id="step27">
  <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Answer</h3>
  <p class="text-gray-700">There are 25 books left in the library.</p>
  <p class="text-xl font-bold text-blue-600 mt-2">40 - 15 = 25</p>
</div>

<!-- Problem 10 -->
<div class="fade-in hidden" id="step28">
  <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Explanation</h3>
  <p class="text-gray-700">A farmer had 50 chickens. 20 chickens were sold. How many chickens does the farmer have left?</p>
  <div class="mt-4">
    <div class="flex justify-center">
      <!-- Tallies for 50 chickens -->
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
    </div>
    <p class="text-gray-700 mt-2">Take away 20 tallies:</p>
    <div class="flex justify-center mt-2">
      <!-- Tallies after removing 20 -->
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      <div class="tally"></div><div class="tally"></div>
    </div>
  </div>
</div>
<div class="fade-in hidden" id="step29">
  <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Problem</h3>
  <p class="text-gray-700">50 - 20 = ?</p>
</div>
<div class="fade-in hidden" id="step30">
  <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Answer</h3>
  <p class="text-gray-700">The farmer has 30 chickens left.</p>
  <p class="text-xl font-bold text-blue-600 mt-2">50 - 20 = 30</p>
</div>

    <!-- Modal for Completion -->
    <div class="modal" id="completionModal">
      <div class="modal-content">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Congratulations!</h3>
        <p class="text-gray-700 mb-4">You've completed all the basic subtraction problems with tallies!</p>
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

