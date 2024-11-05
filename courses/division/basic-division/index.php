<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basic Division Practice with Tallies - MathAmmo</title>
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
    .tally-group {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
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
      <h1 class="text-3xl font-bold">Basic Division Practice with Tallies</h1>
    </div>
  </header>

  <main class="max-w-4xl mx-auto p-6 mt-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Solve These Division Problems Using Tallies</h2>

    <!-- Problem 1 -->
    <div class="fade-in" id="step1">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1:</h3>
      <p class="text-gray-700">6 ÷ 2 = ?</p>
    </div>
    <div class="fade-in hidden" id="step2">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Tallies</h3>
      <div class="tally-group">
        <div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div> 
      </div>
    </div>
    <div class="fade-in hidden" id="step3">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Answer</h3>
      <p class="text-gray-700">6 ÷ 2 = 3</p>
    </div>

    <!-- Problem 2 -->
    <div class="fade-in hidden" id="step4">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2:</h3>
      <p class="text-gray-700">8 ÷ 4 = ?</p>
    </div>
    <div class="fade-in hidden" id="step5">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Tallies</h3>
      <div class="tally-group">
        <div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div>
      </div>
    </div>
    <div class="fade-in hidden" id="step6">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Answer</h3>
      <p class="text-gray-700">8 ÷ 4 = 2</p>
    </div>

    <!-- Problem 3 -->
    <div class="fade-in hidden" id="step7">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3:</h3>
      <p class="text-gray-700">12 ÷ 3 = ?</p>
    </div>
    <div class="fade-in hidden" id="step8">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Tallies</h3>
      <div class="tally-group">
        <div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      </div>
    </div>
    <div class="fade-in hidden" id="step9">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Answer</h3>
      <p class="text-gray-700">12 ÷ 3 = 4</p>
    </div>

    <!-- Problem 4 -->
    <div class="fade-in hidden" id="step10">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4:</h3>
      <p class="text-gray-700">16 ÷ 4 = ?</p>
    </div>
    <div class="fade-in hidden" id="step11">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Tallies</h3>
      <div class="tally-group">
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div>
      </div>
    </div>
    <div class="fade-in hidden" id="step12">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Answer</h3>
      <p class="text-gray-700">16 ÷ 4 = 4</p>
    </div>

    <!-- Problem 5 -->
    <div class="fade-in hidden" id="step13">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5:</h3>
      <p class="text-gray-700">20 ÷ 5 = ?</p>
    </div>
    <div class="fade-in hidden" id="step14">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Tallies</h3>
      <div class="tally-group">
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div>
      </div>
    </div>
    <div class="fade-in hidden" id="step15">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Answer</h3>
      <p class="text-gray-700">20 ÷ 5 = 4</p>
    </div>

    <!-- Problem 6 -->
    <div class="fade-in hidden" id="step16">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6:</h3>
      <p class="text-gray-700">18 ÷ 3 = ?</p>
    </div>
    <div class="fade-in hidden" id="step17">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Tallies</h3>
      <div class="tally-group">
        <div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div>
      </div>
    </div>
    <div class="fade-in hidden" id="step18">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Answer</h3>
      <p class="text-gray-700">18 ÷ 3 = 6</p>
    </div>

    <!-- Problem 7 -->
    <div class="fade-in hidden" id="step19">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7:</h3>
      <p class="text-gray-700">24 ÷ 6 = ?</p>
    </div>
    <div class="fade-in hidden" id="step20">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Tallies</h3>
      <div class="tally-group">
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div>
      </div>
    </div>
    <div class="fade-in hidden" id="step21">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Answer</h3>
      <p class="text-gray-700">24 ÷ 6 = 4</p>
    </div>
<!-- Problem 8 -->
    <div class="fade-in hidden" id="step22">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8:</h3>
      <p class="text-gray-700">30 ÷ 5 = ?</p>
    </div>
    <div class="fade-in hidden" id="step23">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Tallies</h3>
      <div class="tally-group">
        <!-- 30 tallies split into 5 groups -->
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div>
      </div>
    </div>
    <div class="fade-in hidden" id="step24">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Answer</h3>
      <p class="text-gray-700">30 ÷ 5 = 6</p>
    </div>

    <!-- Problem 9 -->
    <div class="fade-in hidden" id="step25">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9:</h3>
      <p class="text-gray-700">36 ÷ 6 = ?</p>
    </div>
    <div class="fade-in hidden" id="step26">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Tallies</h3>
      <div class="tally-group">
        <!-- 36 tallies split into 6 groups -->
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div>
      </div>
    </div>
    <div class="fade-in hidden" id="step27">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Answer</h3>
      <p class="text-gray-700">36 ÷ 6 = 6</p>
    </div>

    <!-- Problem 10 -->
    <div class="fade-in hidden" id="step28">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10:</h3>
      <p class="text-gray-700">40 ÷ 8 = ?</p>
    </div>
    <div class="fade-in hidden" id="step29">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Tallies</h3>
      <div class="tally-group">
        <!-- 40 tallies split into 8 groups -->
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div> | 
        <div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div><div class="tally"></div>
      </div>
    </div>
    <div class="fade-in hidden" id="step30">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Answer</h3>
      <p class="text-gray-700">40 ÷ 8 = 5</p>
    </div>

    <!-- Modal for Completion -->
    <div class="modal" id="completionModal">
      <div class="modal-content">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Great Job!</h3>
        <p class="text-gray-700 mb-4">You've solved all the division problems!</p>
        <a href="index.html" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Back to Main Menu</a>
      </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="mt-6 flex justify-end">
      <button id="nextButton" class="bg-green-600 text-white px-4 py-2 rounded font-semibold hover:bg-green-500">Next Question</button>
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