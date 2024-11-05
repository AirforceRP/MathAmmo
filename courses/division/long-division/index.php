<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Long Division Practice - MathAmmo</title>
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
    .long-division {
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: "Courier New", Courier, monospace;
      font-size: 1.5rem;
    }
    .result-box {
      display: inline-block;
      border-bottom: 2px solid #1E3A8A;
      width: 40px;
      text-align: center;
      margin: 0 4px;
    }
    .hidden {
      display: none;
    }
  </style>
</head>
<body class="bg-gray-100 font-sans leading-relaxed tracking-normal">
  <header class="bg-blue-600 text-white p-4 shadow-lg text-center">
    <h1 class="text-3xl font-bold">Long Division Practice</h1>
  </header>

  <main class="max-w-4xl mx-auto p-6 mt-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Solve These Long Division Problems Step by Step</h2>

    <!-- Placeholder for Questions -->
    <div id="questionContainer">
      <!-- Each question and its steps will be appended here by JavaScript -->
    </div>

    <!-- Modal for Completion -->
    <div id="completionMessage" class="fade-in hidden text-center mt-8">
      <h3 class="text-2xl font-bold text-green-600">Great Job!</h3>
      <p class="text-gray-700">You've completed all the division problems!</p>
      <a href="index.html" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Back to Main Menu</a>
    </div>

    <!-- Navigation Buttons -->
    <div class="mt-6 flex justify-end">
      <button id="nextButton" class="bg-green-600 text-white px-4 py-2 rounded font-semibold hover:bg-green-500">Next Step</button>
    </div>
  </main>


  <script>
    // Define 10 division problems
    const problems = [
      { dividend: 128, divisor: 4 },
      { dividend: 256, divisor: 8 },
      { dividend: 345, divisor: 5 },
      { dividend: 789, divisor: 3 },
      { dividend: 910, divisor: 7 },
      { dividend: 612, divisor: 6 },
      { dividend: 845, divisor: 5 },
      { dividend: 432, divisor: 4 },
      { dividend: 768, divisor: 8 },
      { dividend: 999, divisor: 9 }
    ];

    let currentProblemIndex = 0;
    let currentStep = 1;

    const questionContainer = document.getElementById("questionContainer");
    const nextButton = document.getElementById("nextButton");
    const completionMessage = document.getElementById("completionMessage");

    function createProblem(problem, index) {
      const steps = [];

      // Calculate the answer for the division
      const answer = Math.floor(problem.dividend / problem.divisor);

      // Step 1: Display division problem
      steps.push(`
        <div class="fade-in" id="step${index}_1">
          <h3 class="text-lg font-semibold text-blue-600 mb-2">Question ${index + 1}:</h3>
          <p class="text-gray-700">${problem.dividend} ÷ ${problem.divisor} = ?</p>
        </div>
      `);

      // Step 2: Divide the first part of the dividend
      const firstPart = Math.floor(problem.dividend / 10);
      steps.push(`
        <div class="fade-in hidden" id="step${index}_2">
          <h3 class="text-lg font-semibold text-blue-600 mb-2">Step 1: Divide</h3>
          <p class="text-gray-700">How many times does ${problem.divisor} fit into ${firstPart}? Answer: ${answer} times.</p>
        </div>
      `);

      // Step 3: Multiply and subtract
      const remainder = problem.dividend % problem.divisor;
      steps.push(`
        <div class="fade-in hidden" id="step${index}_3">
          <h3 class="text-lg font-semibold text-blue-600 mb-2">Step 2: Subtract</h3>
          <p class="text-gray-700">Subtract to get the remainder: ${remainder}</p>
        </div>
      `);

      // Step 4: Final Answer
      steps.push(`
        <div class="fade-in hidden" id="step${index}_4">
          <h3 class="text-lg font-semibold text-blue-600 mb-2">Answer</h3>
          <p class="text-gray-700">${problem.dividend} ÷ ${problem.divisor} = ${answer}</p>
        </div>
      `);

      return steps;
    }

    function displayNextStep() {
      if (currentStep <= 4) {
        const step = document.getElementById(`step${currentProblemIndex}_${currentStep}`);
        if (step) step.classList.remove("hidden");
        currentStep++;
      } else if (currentProblemIndex < problems.length - 1) {
        currentProblemIndex++;
        currentStep = 1;
        loadProblem();
      } else {
        nextButton.style.display = "none";
        completionMessage.classList.remove("hidden");
        completionMessage.classList.add("fade-in");
      }
    }

    function loadProblem() {
      questionContainer.innerHTML = createProblem(problems[currentProblemIndex], currentProblemIndex).join("");
    }

    nextButton.addEventListener("click", displayNextStep);

    // Load the first problem
    loadProblem();
  </script>
</body>
</html>
