<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Math Courses</title>
  <!-- Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://unpkg.com/@heroicons/react@1.0.6/dist/solid.js"></script>
</head>
<body class="bg-gradient-to-r from-gray-100 to-gray-200 font-sans leading-relaxed tracking-normal">
    <nav class="bg-blue-600 text-white px-4 py-3 fixed w-full shadow-md z-50">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <div class="bg-white text-blue-600 p-2 rounded-full">
          <img src="https://app.mathammo.com/mathammo.png" alt="App Icon" class="rounded-full">
        </div>
        <h1 class="text-xl font-bold">MathAmmo by AirforceRP</h1>
      </div>

      <!-- Navbar Items -->
      <ul class="lg:flex space-x-8">
        <li><a href="https://app.mathammo.com" class="hover:text-blue-200">Home</a></li>
        <li><a href="/courses" class="hover:text-blue-200">Courses</a></li>
        <?php if (isset($isLoggedIn) && $isLoggedIn): ?>
          <!-- Logged In Navbar Items -->
          <li><a href="#" class="hover:text-blue-200">Quizzes</a></li>
          <li><a href="#" class="hover:text-blue-200">Tests</a></li>
          <li><a href="../profile.php" class="hover:text-blue-200">Profile</a></li>
          <li><a href="../settings.php" class="hover:text-blue-200">Settings</a></li>
          <li><a href="logout.php" class="hover:text-blue-200">Logout</a></li>
        <?php else: ?>
          
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-5xl font-extrabold text-center text-gray-800 mb-10">Math Courses</h1>

    <!-- Folder: Addition -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8 transform hover:scale-105 transition-transform duration-300">
      <div class="p-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-3 flex items-center">
          <svg class="w-6 h-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Addition
        </h2>
        <ul class="space-y-2">
          <li><a href="https://app.mathammo.com/courses/addition/basic-addition/" class="text-blue-600 hover:text-blue-800 font-medium">Course 1: Basic Addition</a></li>
          <li><a href="https://app.mathammo.com/courses/addition/advanced-addition/" class="text-blue-600 hover:text-blue-800 font-medium">Course 2: Advanced Addition</a></li>
          <li><a href="https://app.mathammo.com/courses/addition/word-problems/" class="text-blue-600 hover:text-blue-800 font-medium">Course 3: Word Problems</a></li>
        </ul>
      </div>
    </div>

    <!-- Folder: Subtraction -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8 transform hover:scale-105 transition-transform duration-300">
      <div class="p-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-3 flex items-center">
          <svg class="w-6 h-6 text-red-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
          </svg>
          Subtraction
        </h2>
        <ul class="space-y-2">
          <li><a href="https://app.mathammo.com/courses/subtraction/basic-subtraction" class="text-blue-600 hover:text-blue-800 font-medium">Course 1: Basic Subtraction</a></li>
          <li><a href="https://app.mathammo.com/courses/subtraction/advanced-subtraction" class="text-blue-600 hover:text-blue-800 font-medium">Course 2: Advanced Subtraction</a></li>
          <li><a href="https://app.mathammo.com/courses/subtraction/word-problems" class="text-blue-600 hover:text-blue-800 font-medium">Course 3: Word Problems</a></li>
        </ul>
      </div>
    </div>
    <!-- Folder: Multiplication -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8 transform hover:scale-105 transition-transform duration-300">
      <div class="p-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-3 flex items-center">
          <svg class="w-6 h-6 text-yellow-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
          Multiplication
        </h2>
        
        <ul class="space-y-2">
          <li><a href="https://app.mathammo.com/courses/multiplication/times-table/" class="text-blue-600 hover:text-blue-800 font-medium">Course 1: Times Tables</a></li>
          <li><a href="https://app.mathammo.com/courses/multiplication/basic-multiplication/" class="text-blue-600 hover:text-blue-800 font-medium">Course 2: Basic Multiplication</a></li>
          <li><a href="https://app.mathammo.com/courses/multiplication/advanced-multiplication/" class="text-blue-600 hover:text-blue-800 font-medium">Course 3: Advanced Multiplication</a></li>
          <li><a href="https://app.mathammo.com/courses/multiplication/word-problems/" class="text-blue-600 hover:text-blue-800 font-medium">Course 4: Word Problems</a></li>
        </ul>
      </div>
    </div>

    <!-- Folder: Division -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8 transform hover:scale-105 transition-transform duration-300">
      <div class="p-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-3 flex items-center">
          <svg class="w-6 h-6 text-purple-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5h0m0 14h0m-7-7h14" />
          </svg>
          Division
        </h2>
        <ul class="space-y-2">
          <li><a href="https://app.mathammo.com/courses/division/basic-division/" class="text-blue-600 hover:text-blue-800 font-medium">Course 1: Basic Division</a></li>
          <li><a href="https://app.mathammo.com/courses/division/long-division" class="text-blue-600 hover:text-blue-800 font-medium">Course 2: Long Division</a></li>
          <li><a href="https://app.mathammo.com/courses/division/word-problems/" class="text-blue-600 hover:text-blue-800 font-medium">Course 3: Word Problems</a></li>
        </ul>
      </div>
    </div>
    
    <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 me-3" style="padding-right:5px;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div>
    <span class="font-medium" style="padding-left:5px;">Info,</span> More Courses will be added over time.
  </div>
</div>
  </div>
</body>
</html>


