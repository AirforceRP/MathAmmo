<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced Addition</title>
  <!-- Tailwind CSS CDN -->
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
  <header class="bg-green-600 text-white p-4 shadow-lg">
    <div class="max-w-4xl mx-auto">
      <h1 class="text-3xl font-bold">Advanced Addition</h1>
    </div>
  </header>

  <main class="max-w-4xl mx-auto p-6 mt-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Advanced Addition Problems</h2>

    <!-- Problem 1 -->
    <div class="fade-in" id="step1">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Explanation</h3>
      <p class="text-gray-700">We are adding 34 + 27. Break these numbers into tens and ones to simplify the addition.</p>
    </div>
    <div class="fade-in hidden" id="step2">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Problem</h3>
      <p class="text-gray-700">34 is 30 + 4, and 27 is 20 + 7. Add the ones (4 + 7 = 11) and the tens (30 + 20 = 50). Combine: 50 + 11 = 61.</p>
    </div>
    <div class="fade-in hidden" id="step3">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Answer</h3>
      <p class="text-gray-700">34 + 27 equals 61.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">34 + 27 = 61</p>
    </div>

    <!-- Problem 2 -->
    <div class="fade-in hidden" id="step4">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Explanation</h3>
      <p class="text-gray-700">We are adding 56 + 38. Break these numbers into tens and ones.</p>
    </div>
    <div class="fade-in hidden" id="step5">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Problem</h3>
      <p class="text-gray-700">56 is 50 + 6, and 38 is 30 + 8. Add the ones: 6 + 8 = 14, then the tens: 50 + 30 = 80. Combine: 80 + 14 = 94.</p>
    </div>
    <div class="fade-in hidden" id="step6">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Answer</h3>
      <p class="text-gray-700">56 + 38 equals 94.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">56 + 38 = 94</p>
    </div>

    <!-- Problem 3 -->
    <div class="fade-in hidden" id="step7">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Explanation</h3>
      <p class="text-gray-700">We are adding 123 + 89. Split these numbers into hundreds, tens, and ones.</p>
    </div>
    <div class="fade-in hidden" id="step8">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Problem</h3>
      <p class="text-gray-700">123 is 100 + 20 + 3, and 89 is 80 + 9. Add the ones: 3 + 9 = 12, tens: 20 + 80 = 100, and hundreds: 100. Combine: 100 + 100 + 12 = 212.</p>
    </div>
    <div class="fade-in hidden" id="step9">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Answer</h3>
      <p class="text-gray-700">123 + 89 equals 212.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">123 + 89 = 212</p>
    </div>

    <!-- Problem 4 -->
    <div class="fade-in hidden" id="step10">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Explanation</h3>
      <p class="text-gray-700">We are adding 75 + 66. Break down into tens and ones.</p>
    </div>
    <div class="fade-in hidden" id="step11">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Problem</h3>
      <p class="text-gray-700">75 is 70 + 5, and 66 is 60 + 6. Add the ones: 5 + 6 = 11, then the tens: 70 + 60 = 130. Combine: 130 + 11 = 141.</p>
    </div>
    <div class="fade-in hidden" id="step12">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Answer</h3>
      <p class="text-gray-700">75 + 66 equals 141.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">75 + 66 = 141</p>
    </div>

    <!-- Problem 5 -->
    <div class="fade-in hidden" id="step13">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Explanation</h3>
      <p class="text-gray-700">We are adding 250 + 175. Split into hundreds, tens, and ones.</p>
    </div>
    <div class="fade-in hidden" id="step14">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Problem</h3>
      <p class="text-gray-700">250 is 200 + 50, and 175 is 100 + 70 + 5. Add ones: 0 + 5 = 5, tens: 50 + 70 = 120, and hundreds: 200 + 100 = 300. Combine: 300 + 120 + 5 = 425.</p>
    </div>
    <div class="fade-in hidden" id="step15">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Answer</h3>
      <p class="text-gray-700">250 + 175 equals 425.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">250 + 175 = 425</p>
    </div>

    <!-- Problem 6 -->
    <div class="fade-in hidden" id="step16">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Explanation</h3>
      <p class="text-gray-700">We are adding 89 + 47. Use tens and ones breakdown.</p>
    </div>
    <div class="fade-in hidden" id="step17">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Problem</h3>
      <p class="text-gray-700">89 is 80 + 9, and 47 is 40 + 7. Add ones: 9 + 7 = 16, and tens: 80 + 40 = 120. Combine: 120 + 16 = 136.</p>
    </div>
    <div class="fade-in hidden" id="step18">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Answer</h3>
      <p class="text-gray-700">89 + 47 equals 136.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">89 + 47 = 136</p>
    </div>

    <!-- Problem 7 -->
    <div class="fade-in hidden" id="step19">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Explanation</h3>
      <p class="text-gray-700">We are adding 302 + 198. Split into hundreds, tens, and ones.</p>
    </div>
    <div class="fade-in hidden" id="step20">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Problem</h3>
      <p class="text-gray-700">302 is 300 + 2, and 198 is 100 + 90 + 8. Add ones: 2 + 8 = 10, tens: 0 + 90 = 90, and hundreds: 300 + 100 = 400. Combine: 400 + 90 + 10 = 500.</p>
    </div>
    <div class="fade-in hidden" id="step21">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Answer</h3>
      <p class="text-gray-700">302 + 198 equals 500.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">302 + 198 = 500</p>
    </div>

    <!-- Problem 8 -->
    <div class="fade-in hidden" id="step22">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Explanation</h3>
      <p class="text-gray-700">We are adding 176 + 324. Use hundreds, tens, and ones.</p>
    </div>
    <div class="fade-in hidden" id="step23">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Problem</h3>
      <p class="text-gray-700">176 is 100 + 70 + 6, and 324 is 300 + 20 + 4. Add ones: 6 + 4 = 10, tens: 70 + 20 = 90, and hundreds: 100 + 300 = 400. Combine: 400 + 90 + 10 = 500.</p>
    </div>
    <div class="fade-in hidden" id="step24">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Answer</h3>
      <p class="text-gray-700">176 + 324 equals 500.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">176 + 324 = 500</p>
    </div>

    <!-- Problem 9 -->
    <div class="fade-in hidden" id="step25">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Explanation</h3>
      <p class="text-gray-700">We are adding 455 + 345. Split into hundreds, tens, and ones.</p>
    </div>
    <div class="fade-in hidden" id="step26">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Problem</h3>
      <p class="text-gray-700">455 is 400 + 50 + 5, and 345 is 300 + 40 + 5. Add ones: 5 + 5 = 10, tens: 50 + 40 = 90, and hundreds: 400 + 300 = 700. Combine: 700 + 90 + 10 = 800.</p>
    </div>
    <div class="fade-in hidden" id="step27">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Answer</h3>
      <p class="text-gray-700">455 + 345 equals 800.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">455 + 345 = 800</p>
    </div>

    <!-- Problem 10 -->
    <div class="fade-in hidden" id="step28">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Explanation</h3>
      <p class="text-gray-700">We are adding 87 + 49. Break down into tens and ones.</p>
    </div>
    <div class="fade-in hidden" id="step29">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Problem</h3>
      <p class="text-gray-700">87 is 80 + 7, and 49 is 40 + 9. Add ones: 7 + 9 = 16, and tens: 80 + 40 = 120. Combine: 120 + 16 = 136.</p>
    </div>
    <div class="fade-in hidden" id="step30">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Answer</h3>
      <p class="text-gray-700">87 + 49 equals 136.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">87 + 49 = 136</p>
    </div>

    <!-- Modal for Completion -->
    <div class="modal" id="completionModal">
      <div class="modal-content">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Congratulations!</h3>
        <p class="text-gray-700 mb-4">You've completed all the advanced addition problems!</p>
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
