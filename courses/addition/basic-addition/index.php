<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basic Addition Tutorial</title>
  <!-- Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Keyframes for fade-in animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
      opacity: 0;
      animation: fadeIn 1s forwards;
    }

    /* Tallies styling */
    .tally {
      background-color: #fef3c7;
      border: 2px solid #fbbf24;
      width: 4px;
      height: 60px;
      margin: 2px;
      display: inline-block;
      border-radius: 2px;
    }

    .tally-group {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 4px;
    }

    .centered {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 16px;
    }

    /* Modal styling */
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
  <!-- Header -->
  <header class="bg-blue-600 text-white p-4 shadow-lg">
    <div class="max-w-4xl mx-auto">
      <h1 class="text-3xl font-bold">Math Courses - Comprehensive Addition Tutorial</h1>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-4xl mx-auto p-6 mt-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Addition Step-by-Step</h2>
    <p class="text-gray-700 mb-4">Follow the steps below to understand and solve addition problems:</p>
    
    <div class="step fade-in" id="step1">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Explanation</h3>
      <p class="text-gray-700">We are adding 2 + 3. Think of adding two groups: one with 2 items and another with 3 items.</p>
    </div>
    <div class="step fade-in mt-6 hidden" id="step2">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Problem</h3>
      <div class="centered mt-2">
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
        <span class="text-2xl font-bold">+</span>
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="step fade-in mt-6 hidden" id="step3">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Answer</h3>
      <p class="text-gray-700">2 + 3 equals 5. When you combine the two groups, you get a total of 5.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">2 + 3 = 5</p>
    </div>

    <div class="step fade-in mt-6 hidden" id="step4">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Explanation</h3>
      <p class="text-gray-700">We are adding 4 + 1. Imagine combining 4 items with 1 more item.</p>
    </div>
    <div class="step fade-in mt-6 hidden" id="step5">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Problem</h3>
      <div class="centered mt-2">
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
        <span class="text-2xl font-bold">+</span>
        <div class="tally-group">
          <div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="step fade-in mt-6 hidden" id="step6">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Answer</h3>
      <p class="text-gray-700">4 + 1 equals 5. When combined, they make a group of 5 items.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">4 + 1 = 5</p>
    </div>

    <div class="step fade-in mt-6 hidden" id="step7">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Explanation</h3>
      <p class="text-gray-700">We are adding 3 + 6. Visualize 3 items being combined with 6 items.</p>
    </div>
    <div class="step fade-in mt-6 hidden" id="step8">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Problem</h3>
      <div class="centered mt-2">
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
        <span class="text-2xl font-bold">+</span>
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="step fade-in mt-6 hidden" id="step9">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Answer</h3>
      <p class="text-gray-700">3 + 6 equals 9. Together, they form a group of 9 items.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">3 + 6 = 9</p>
    </div>

    <div class="step fade-in mt-6 hidden" id="step10">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Explanation</h3>
      <p class="text-gray-700">We are adding 5 + 4. Picture 5 items joined by 4 more items.</p>
    </div>
    <div class="step fade-in mt-6 hidden" id="step11">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Problem</h3>
      <div class="centered mt-2">
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
        <span class="text-2xl font-bold">+</span>
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="step fade-in mt-6 hidden" id="step12">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Answer</h3>
      <p class="text-gray-700">5 + 4 equals 9. When you add them together, you get 9 items.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">5 + 4 = 9</p>
    </div>

    <!-- Question 5 -->
    <div class="step fade-in mt-6 hidden" id="step13">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Explanation</h3>
      <p class="text-gray-700">We are adding 7 + 2. Envision adding 7 items with 2 more items.</p>
    </div>
    <div class="step fade-in mt-6 hidden" id="step14">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Problem</h3>
      <div class="centered mt-2">
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
        <span class="text-2xl font-bold">+</span>
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="step fade-in mt-6 hidden" id="step15">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Answer</h3>
      <p class="text-gray-700">7 + 2 equals 9. The total is 9 items when combined.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">7 + 2 = 9</p>
    </div>

    <div class="step fade-in mt-6 hidden" id="step16">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Explanation</h3>
      <p class="text-gray-700">We are adding 1 + 8. Visualize 1 item combined with 8 items.</p>
    </div>
    <div class="step fade-in mt-6 hidden" id="step17">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Problem</h3>
      <div class="centered mt-2">
        <div class="tally-group">
          <div class="tally"></div>
        </div>
        <span class="text-2xl font-bold">+</span>
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="step fade-in mt-6 hidden" id="step18">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Answer</h3>
      <p class="text-gray-700">1 + 8 equals 9. Together, they make a total of 9 items.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">1 + 8 = 9</p>
    </div>

    <div class="step fade-in mt-6 hidden" id="step19">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Explanation</h3>
      <p class="text-gray-700">We are adding 6 + 3. Think of combining 6 items with 3 items.</p>
    </div>
    <div class="step fade-in mt-6 hidden" id="step20">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Problem</h3>
      <div class="centered mt-2">
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
        <span class="text-2xl font-bold">+</span>
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="step fade-in mt-6 hidden" id="step21">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Answer</h3>
      <p class="text-gray-700">6 + 3 equals 9. When you combine both groups, you have 9 items.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">6 + 3 = 9</p>
    </div>
    
    <div class="step fade-in mt-6 hidden" id="step22">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Explanation</h3>
      <p class="text-gray-700">We are adding 4 + 5. Picture 4 items combined with 5 items.</p>
    </div>
    <div class="step fade-in mt-6 hidden" id="step23">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Problem</h3>
      <div class="centered mt-2">
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
        <span class="text-2xl font-bold">+</span>
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="step fade-in mt-6 hidden" id="step24">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Answer</h3>
      <p class="text-gray-700">4 + 5 equals 9. Adding the two groups gives a total of 9 items.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">4 + 5 = 9</p>
    </div>

    <div class="step fade-in mt-6 hidden" id="step25">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Explanation</h3>
      <p class="text-gray-700">We are adding 8 + 1. Envision adding 8 items to 1 more item.</p>
    </div>
    <div class="step fade-in mt-6 hidden" id="step26">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Problem</h3>
      <div class="centered mt-2">
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
        <span class="text-2xl font-bold">+</span>
        <div class="tally-group">
          <div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="step fade-in mt-6 hidden" id="step27">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Answer</h3>
      <p class="text-gray-700">8 + 1 equals 9. The total is 9 items when added together.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">8 + 1 = 9</p>
    </div>

    <!-- Question 10 -->
    <div class="step fade-in mt-6 hidden" id="step28">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Explanation</h3>
      <p class="text-gray-700">We are adding 2 + 5. Think of adding 2 items to 5 items.</p>
    </div>
    <div class="step fade-in mt-6 hidden" id="step29">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Problem</h3>
      <div class="centered mt-2">
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
        <span class="text-2xl font-bold">+</span>
        <div class="tally-group">
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
          <div class="tally"></div>
        </div>
      </div>
    </div>
    <div class="step fade-in mt-6 hidden" id="step30">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Answer</h3>
      <p class="text-gray-700">2 + 5 equals 7. Together, they make a total of 7 items.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">2 + 5 = 7</p>
    </div>

    <div class="modal" id="completionModal">
      <div class="modal-content">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Congratulations!</h3>
        <p class="text-gray-700 mb-4">You've completed this lesson. Ready to move to the next one?</p>
        <div class="flex space-x-4">
          <button onclick="goToNextLesson()" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Next Lesson</button>
          <button onclick="closeModal()" class="bg-gray-400 text-white px-4 py-2 rounded font-semibold hover:bg-gray-500">Review Again</button>
        </div>
      </div>
    </div>

    <div class="mt-6 flex space-x-4">
      <button id="nextButton" onclick="nextStep()" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Next Step</button>
    </div>
  </main>

  <script>
    let currentStep = 0;
    const steps = document.querySelectorAll('.step');
    const nextButton = document.getElementById('nextButton');
    const modal = document.getElementById('completionModal');

    function nextStep() {
      if (currentStep < steps.length) {
        steps[currentStep].classList.remove('hidden');
        steps[currentStep].classList.add('fade-in');
        currentStep++;
      }
      if (currentStep === steps.length) {
        nextButton.style.display = 'none'; // Hide the Next Step button
        modal.classList.add('active'); // Show the modal
      }
    }

    function closeModal() {
      modal.classList.remove('active');
      currentStep = 0; // Reset for review
      steps.forEach(step => step.classList.add('hidden')); // Hide all steps
      nextButton.style.display = 'block'; // Show the Next Step button
    }

    function goToNextLesson() {
      window.location.href = ''; // Redirect to the next lesson
    }
  </script>
</body>
</html>



