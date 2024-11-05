<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Units Quiz - MathAmmo</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .question {
      margin-bottom: 20px;
    }
    .question h3 {
      font-size: 1.25rem;
      font-weight: bold;
    }
    .options label {
      display: block;
      margin: 5px 0;
      cursor: pointer;
    }
  </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
  <header class="bg-blue-600 text-white p-4 text-center">
    <h1 class="text-3xl font-bold">All Units Quiz</h1>
  </header>

  <main class="max-w-4xl mx-auto p-6 mt-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Test Your Knowledge Across All Math Units</h2>

    <form id="quizForm">
      <!-- Question 1 to 25 -->
      <div class="question" data-question="1" data-correct="12">
        <h3>1. What is 7 + 5?</h3>
        <div class="options">
          <label><input type="radio" name="q1" value="10"> 10</label>
          <label><input type="radio" name="q1" value="12"> 12</label>
          <label><input type="radio" name="q1" value="14"> 14</label>
          <label><input type="radio" name="q1" value="15"> 15</label>
        </div>
      </div>
      <div class="question" data-question="2" data-correct="7">
        <h3>2. What is 15 - 8?</h3>
        <div class="options">
          <label><input type="radio" name="q2" value="5"> 5</label>
          <label><input type="radio" name="q2" value="7"> 7</label>
          <label><input type="radio" name="q2" value="8"> 8</label>
          <label><input type="radio" name="q2" value="6"> 6</label>
        </div>
      </div>
      <div class="question" data-question="3" data-correct="24">
        <h3>3. What is 6 × 4?</h3>
        <div class="options">
          <label><input type="radio" name="q3" value="20"> 20</label>
          <label><input type="radio" name="q3" value="24"> 24</label>
          <label><input type="radio" name="q3" value="30"> 30</label>
          <label><input type="radio" name="q3" value="18"> 18</label>
        </div>
      </div>
      <div class="question" data-question="4" data-correct="4">
        <h3>4. What is 20 ÷ 5?</h3>
        <div class="options">
          <label><input type="radio" name="q4" value="3"> 3</label>
          <label><input type="radio" name="q4" value="4"> 4</label>
          <label><input type="radio" name="q4" value="5"> 5</label>
          <label><input type="radio" name="q4" value="6"> 6</label>
        </div>
      </div>
      <div class="question" data-question="5" data-correct="15">
        <h3>5. What is 9 + 6?</h3>
        <div class="options">
          <label><input type="radio" name="q5" value="13"> 13</label>
          <label><input type="radio" name="q5" value="14"> 14</label>
          <label><input type="radio" name="q5" value="15"> 15</label>
          <label><input type="radio" name="q5" value="16"> 16</label>
        </div>
      </div>
      <div class="question" data-question="6" data-correct="9">
        <h3>6. What is 18 - 9?</h3>
        <div class="options">
          <label><input type="radio" name="q6" value="7"> 7</label>
          <label><input type="radio" name="q6" value="8"> 8</label>
          <label><input type="radio" name="q6" value="9"> 9</label>
          <label><input type="radio" name="q6" value="10"> 10</label>
        </div>
      </div>
      <div class="question" data-question="7" data-correct="25">
        <h3>7. What is 5 × 5?</h3>
        <div class="options">
          <label><input type="radio" name="q7" value="20"> 20</label>
          <label><input type="radio" name="q7" value="25"> 25</label>
          <label><input type="radio" name="q7" value="30"> 30</label>
          <label><input type="radio" name="q7" value="35"> 35</label>
        </div>
      </div>
      <div class="question" data-question="8" data-correct="5">
        <h3>8. What is 40 ÷ 8?</h3>
        <div class="options">
          <label><input type="radio" name="q8" value="4"> 4</label>
          <label><input type="radio" name="q8" value="5"> 5</label>
          <label><input type="radio" name="q8" value="6"> 6</label>
          <label><input type="radio" name="q8" value="7"> 7</label>
        </div>
      </div>
      <div class="question" data-question="9" data-correct="20">
        <h3>9. What is 12 + 8?</h3>
        <div class="options">
          <label><input type="radio" name="q9" value="18"> 18</label>
          <label><input type="radio" name="q9" value="19"> 19</label>
          <label><input type="radio" name="q9" value="20"> 20</label>
          <label><input type="radio" name="q9" value="21"> 21</label>
        </div>
      </div>
      <div class="question" data-question="10" data-correct="15">
        <h3>10. What is 30 - 15?</h3>
        <div class="options">
          <label><input type="radio" name="q10" value="10"> 10</label>
          <label><input type="radio" name="q10" value="15"> 15</label>
          <label><input type="radio" name="q10" value="20"> 20</label>
          <label><input type="radio" name="q10" value="25"> 25</label>
        </div>
      </div>
      <div class="question" data-question="11" data-correct="64">
        <h3>11. What is 8 × 8?</h3>
        <div class="options">
          <label><input type="radio" name="q11" value="56"> 56</label>
          <label><input type="radio" name="q11" value="64"> 64</label>
          <label><input type="radio" name="q11" value="72"> 72</label>
          <label><input type="radio" name="q11" value="80"> 80</label>
        </div>
      </div>
      <div class="question" data-question="12" data-correct="3">
        <h3>12. What is 21 ÷ 7?</h3>
        <div class="options">
          <label><input type="radio" name="q12" value="2"> 2</label>
          <label><input type="radio" name="q12" value="3"> 3</label>
          <label><input type="radio" name="q12" value="4"> 4</label>
          <label><input type="radio" name="q12" value="5"> 5</label>
        </div>
      </div>
      <div class="question" data-question="13" data-correct="36">
        <h3>13. What is 9 × 4?</h3>
        <div class="options">
          <label><input type="radio" name="q13" value="30"> 30</label>
          <label><input type="radio" name="q13" value="32"> 32</label>
          <label><input type="radio" name="q13" value="36"> 36</label>
          <label><input type="radio" name="q13" value="40"> 40</label>
        </div>
      </div>
      <div class="question" data-question="14" data-correct="45">
        <h3>14. What is 90 ÷ 2?</h3>
        <div class="options">
          <label><input type="radio" name="q14" value="40"> 40</label>
          <label><input type="radio" name="q14" value="45"> 45</label>
          <label><input type="radio" name="q14" value="50"> 50</label>
          <label><input type="radio" name="q14" value="55"> 55</label>
        </div>
      </div>
      <!-- Question 15 -->
<div class="question" data-question="15" data-correct="18">
  <h3>15. What is 9 × 2?</h3>
  <div class="options">
    <label><input type="radio" name="q15" value="16"> 16</label>
    <label><input type="radio" name="q15" value="18"> 18</label>
    <label><input type="radio" name="q15" value="20"> 20</label>
    <label><input type="radio" name="q15" value="22"> 22</label>
  </div>
</div>

<!-- Question 16 -->
<div class="question" data-question="16" data-correct="13">
  <h3>16. What is 26 ÷ 2?</h3>
  <div class="options">
    <label><input type="radio" name="q16" value="11"> 11</label>
    <label><input type="radio" name="q16" value="12"> 12</label>
    <label><input type="radio" name="q16" value="13"> 13</label>
    <label><input type="radio" name="q16" value="14"> 14</label>
  </div>
</div>

<!-- Question 17 -->
<div class="question" data-question="17" data-correct="8">
  <h3>17. What is 4 + 4?</h3>
  <div class="options">
    <label><input type="radio" name="q17" value="6"> 6</label>
    <label><input type="radio" name="q17" value="7"> 7</label>
    <label><input type="radio" name="q17" value="8"> 8</label>
    <label><input type="radio" name="q17" value="9"> 9</label>
  </div>
</div>

<!-- Question 18 -->
<div class="question" data-question="18" data-correct="56">
  <h3>18. What is 7 × 8?</h3>
  <div class="options">
    <label><input type="radio" name="q18" value="48"> 48</label>
    <label><input type="radio" name="q18" value="56"> 56</label>
    <label><input type="radio" name="q18" value="64"> 64</label>
    <label><input type="radio" name="q18" value="72"> 72</label>
  </div>
</div>

<!-- Question 19 -->
<div class="question" data-question="19" data-correct="12">
  <h3>19. What is 24 ÷ 2?</h3>
  <div class="options">
    <label><input type="radio" name="q19" value="10"> 10</label>
    <label><input type="radio" name="q19" value="11"> 11</label>
    <label><input type="radio" name="q19" value="12"> 12</label>
    <label><input type="radio" name="q19" value="13"> 13</label>
  </div>
</div>

<!-- Question 20 -->
<div class="question" data-question="20" data-correct="5">
  <h3>20. What is 20 ÷ 4?</h3>
  <div class="options">
    <label><input type="radio" name="q20" value="4"> 4</label>
    <label><input type="radio" name="q20" value="5"> 5</label>
    <label><input type="radio" name="q20" value="6"> 6</label>
    <label><input type="radio" name="q20" value="7"> 7</label>
  </div>
</div>

<!-- Question 21 -->
<div class="question" data-question="21" data-correct="14">
  <h3>21. What is 7 + 7?</h3>
  <div class="options">
    <label><input type="radio" name="q21" value="12"> 12</label>
    <label><input type="radio" name="q21" value="13"> 13</label>
    <label><input type="radio" name="q21" value="14"> 14</label>
    <label><input type="radio" name="q21" value="15"> 15</label>
  </div>
</div>

<!-- Question 22 -->
<div class="question" data-question="22" data-correct="24">
  <h3>22. What is 8 × 3?</h3>
  <div class="options">
    <label><input type="radio" name="q22" value="20"> 20</label>
    <label><input type="radio" name="q22" value="22"> 22</label>
    <label><input type="radio" name="q22" value="24"> 24</label>
    <label><input type="radio" name="q22" value="26"> 26</label>
  </div>
</div>

<!-- Question 23 -->
<div class="question" data-question="23" data-correct="32">
  <h3>23. What is 64 ÷ 2?</h3>
  <div class="options">
    <label><input type="radio" name="q23" value="30"> 30</label>
    <label><input type="radio" name="q23" value="31"> 31</label>
    <label><input type="radio" name="q23" value="32"> 32</label>
    <label><input type="radio" name="q23" value="33"> 33</label>
  </div>
</div>

<!-- Question 24 -->
<div class="question" data-question="24" data-correct="27">
  <h3>24. What is 9 × 3?</h3>
  <div class="options">
    <label><input type="radio" name="q24" value="24"> 24</label>
    <label><input type="radio" name="q24" value="25"> 25</label>
    <label><input type="radio" name="q24" value="26"> 26</label>
    <label><input type="radio" name="q24" value="27"> 27</label>
  </div>
</div>

      <div class="question" data-question="25" data-correct="9">
        <h3>25. What is 81 ÷ 9?</h3>
        <div class="options">
          <label><input type="radio" name="q25" value="7"> 7</label>
          <label><input type="radio" name="q25" value="8"> 8</label>
          <label><input type="radio" name="q25" value="9"> 9</label>
          <label><input type="radio" name="q25" value="10"> 10</label>
        </div>
      </div>

      <button type="button" onclick="submitQuiz()" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500 mt-4">Submit</button>
    </form>
    
    <!-- Modal Structure -->
    <div id="resultModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
      <div class="bg-white p-6 rounded-lg shadow-lg" style="width: 400px; height: 800px;">
        <h2 class="text-xl font-bold mb-4">Quiz Result</h2>
        <p id="resultText" class="text-lg font-semibold text-gray-800 mb-4"></p>
        <canvas id="resultChart" width="350" height="350"></canvas> <!-- Adjusted Canvas Size -->
        <button onclick="closeModal()" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Close</button>
      </div>
    </div>
    
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  


  <script>
    // Function to shuffle array elements
    function shuffleArray(array) {
      for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
      }
    }

    // Randomize the placement of options for each question
    document.querySelectorAll('.question').forEach(question => {
      const optionsContainer = question.querySelector('.options');
      const options = Array.from(optionsContainer.children);
      shuffleArray(options);
      options.forEach(option => optionsContainer.appendChild(option));
    });

    function submitQuiz() {
      let score = 0;
      let totalQuestions = 25;
      const questions = document.querySelectorAll('.question');
    
      questions.forEach(question => {
        const correctAnswer = question.getAttribute('data-correct');
        const selected = question.querySelector(`input[type="radio"]:checked`);
        if (selected && selected.value === correctAnswer) {
          score++;
        }
      });
    
      // Calculate incorrect answers
      const incorrect = totalQuestions - score;
    
      // Calculate the percentage score
      const percentage = (score / totalQuestions) * 100;
      let grade;
    
      // Determine the letter grade based on the percentage
      if (percentage >= 90) {
        grade = "A";
      } else if (percentage >= 80) {
        grade = "B";
      } else if (percentage >= 70) {
        grade = "C";
      } else if (percentage >= 60) {
        grade = "D";
      } else {
        grade = "F";
      }
    
      // Set the result text with the letter grade
      const resultText = document.getElementById("resultText");
      resultText.innerText = `You scored ${score} out of ${totalQuestions} (${grade})!`;
    
      // Show the modal
      const resultModal = document.getElementById("resultModal");
      resultModal.classList.remove('hidden');
    
      // Create the pie chart
      const ctx = document.getElementById("resultChart").getContext("2d");
      new Chart(ctx, {
        type: "pie",
        data: {
          labels: ["Correct", "Incorrect"],
          datasets: [{
            data: [score, incorrect],
            backgroundColor: ["#4CAF50", "#F44336"], // Green for correct, red for incorrect
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false
        }
      });
    }
    
    // Function to close the modal
    function closeModal() {
      const resultModal = document.getElementById("resultModal");
      resultModal.classList.add('hidden');
    }



  </script>
</body>
</html>
