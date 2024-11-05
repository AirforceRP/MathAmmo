<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced Subtraction Word Problems - MathAmmo</title>
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
      <h1 class="text-3xl font-bold">Advanced Subtraction</h1>
    </div>
  </header>

  <main class="max-w-4xl mx-auto p-6 mt-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tackle These Challenging Subtraction Problems</h2>

    <!-- Problem 1 -->
    <div class="fade-in" id="step1">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Explanation</h3>
      <p class="text-gray-700">A factory produced 5,000 widgets in January. By the end of March, 3,487 widgets were sold. How many widgets are left in the factory?</p>
    </div>
    <div class="fade-in hidden" id="step2">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Problem</h3>
      <p class="text-gray-700">5,000 - 3,487 = ?</p>
    </div>
    <div class="fade-in hidden" id="step3">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 1: Answer</h3>
      <p class="text-gray-700">There are 1,513 widgets left in the factory.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">5,000 - 3,487 = 1,513</p>
    </div>

    <!-- Problem 2 -->
    <div class="fade-in hidden" id="step4">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Explanation</h3>
      <p class="text-gray-700">A school library had 12,345 books. Over the course of the year, 4,789 books were borrowed and not returned. How many books remain in the library?</p>
    </div>
    <div class="fade-in hidden" id="step5">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Problem</h3>
      <p class="text-gray-700">12,345 - 4,789 = ?</p>
    </div>
    <div class="fade-in hidden" id="step6">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 2: Answer</h3>
      <p class="text-gray-700">There are 7,556 books remaining in the library.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">12,345 - 4,789 = 7,556</p>
    </div>

    <!-- Problem 3 -->
    <div class="fade-in hidden" id="step7">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Explanation</h3>
      <p class="text-gray-700">An airplane had 8,000 liters of fuel. It consumed 5,432 liters during a flight. How much fuel is left in the tank?</p>
    </div>
    <div class="fade-in hidden" id="step8">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Problem</h3>
      <p class="text-gray-700">8,000 - 5,432 = ?</p>
    </div>
    <div class="fade-in hidden" id="step9">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 3: Answer</h3>
      <p class="text-gray-700">There are 2,568 liters of fuel left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">8,000 - 5,432 = 2,568</p>
    </div>

    <!-- Problem 4 -->
    <div class="fade-in hidden" id="step10">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Explanation</h3>
      <p class="text-gray-700">A farmer had 15,000 kilograms of wheat. He sold 6,754 kilograms to a distributor. How much wheat does the farmer have left?</p>
    </div>
    <div class="fade-in hidden" id="step11">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Problem</h3>
      <p class="text-gray-700">15,000 - 6,754 = ?</p>
    </div>
    <div class="fade-in hidden" id="step12">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 4: Answer</h3>
      <p class="text-gray-700">The farmer has 8,246 kilograms of wheat left.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">15,000 - 6,754 = 8,246</p>
    </div>

    <!-- Problem 5 -->
    <div class="fade-in hidden" id="step13">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Explanation</h3>
      <p class="text-gray-700">A tech company had 9,999 units of a gadget in stock. After a major sale, 3,567 units were sold. How many units are left?</p>
    </div>
    <div class="fade-in hidden" id="step14">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Problem</h3>
      <p class="text-gray-700">9,999 - 3,567 = ?</p>
    </div>
    <div class="fade-in hidden" id="step15">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 5: Answer</h3>
      <p class="text-gray-700">There are 6,432 units left in stock.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">9,999 - 3,567 = 6,432</p>
    </div>
    <!-- Problem 6 -->
    <div class="fade-in hidden" id="step16">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Explanation</h3>
      <p class="text-gray-700">A construction project had a budget of $50,000. After initial expenses of $23,458, how much budget remains?</p>
    </div>
    <div class="fade-in hidden" id="step17">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Problem</h3>
      <p class="text-gray-700">50,000 - 23,458 = ?</p>
    </div>
    <div class="fade-in hidden" id="step18">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 6: Answer</h3>
      <p class="text-gray-700">The remaining budget is $26,542.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">50,000 - 23,458 = 26,542</p>
    </div>
    
    <!-- Problem 7 -->
    <div class="fade-in hidden" id="step19">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Explanation</h3>
      <p class="text-gray-700">An athlete ran a total distance of 18,250 meters. During training, he covered 9,876 meters. How much distance does he have left to reach his total goal?</p>
    </div>
    <div class="fade-in hidden" id="step20">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Problem</h3>
      <p class="text-gray-700">18,250 - 9,876 = ?</p>
    </div>
    <div class="fade-in hidden" id="step21">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 7: Answer</h3>
      <p class="text-gray-700">He has 8,374 meters left to run.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">18,250 - 9,876 = 8,374</p>
    </div>
    
    <!-- Problem 8 -->
    <div class="fade-in hidden" id="step22">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Explanation</h3>
      <p class="text-gray-700">A tech company had 120,000 units of a product. They shipped 67,543 units to stores. How many units are still in the warehouse?</p>
    </div>
    <div class="fade-in hidden" id="step23">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Problem</h3>
      <p class="text-gray-700">120,000 - 67,543 = ?</p>
    </div>
    <div class="fade-in hidden" id="step24">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 8: Answer</h3>
      <p class="text-gray-700">There are 52,457 units remaining in the warehouse.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">120,000 - 67,543 = 52,457</p>
    </div>
    
    <!-- Problem 9 -->
    <div class="fade-in hidden" id="step25">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Explanation</h3>
      <p class="text-gray-700">A city's population was 950,000 people. After a census, it was found that 124,567 people had moved out. What is the new population of the city?</p>
    </div>
    <div class="fade-in hidden" id="step26">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Problem</h3>
      <p class="text-gray-700">950,000 - 124,567 = ?</p>
    </div>
    <div class="fade-in hidden" id="step27">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 9: Answer</h3>
      <p class="text-gray-700">The new population is 825,433 people.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">950,000 - 124,567 = 825,433</p>
    </div>
    
    <!-- Problem 10 -->
    <div class="fade-in hidden" id="step28">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Explanation</h3>
      <p class="text-gray-700">A company had a profit of $1,000,000 last year. This year, they incurred losses amounting to $456,789. What is their remaining profit?</p>
    </div>
    <div class="fade-in hidden" id="step29">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Problem</h3>
      <p class="text-gray-700">1,000,000 - 456,789 = ?</p>
    </div>
    <div class="fade-in hidden" id="step30">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Question 10: Answer</h3>
      <p class="text-gray-700">The remaining profit is $543,211.</p>
      <p class="text-xl font-bold text-blue-600 mt-2">1,000,000 - 456,789 = 543,211</p>
    </div>


    <!-- Modal for Completion -->
    <div class="modal" id="completionModal">
      <div class="modal-content">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Congratulations!</h3>
        <p class="text-gray-700 mb-4">You've completed all the advanced subtraction problems!</p>
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
