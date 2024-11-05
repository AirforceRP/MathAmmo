<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>15x15 Multiplication Table - MathAmmo</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .table-container {
      display: grid;
      grid-template-columns: repeat(16, minmax(40px, 1fr));
      gap: 5px;
      text-align: center;
    }
    .table-cell {
      padding: 10px;
      border-radius: 8px; /* Rounded corners */
      font-weight: bold;
    }
    .header-cell {
      background-color: #000000; /* Black background for headers */
      color: white;
      border-radius: 8px; /* Rounded corners for headers */
    }
    .result-cell {
      background-color: #FCD34D; /* Yellow background for result cells */
      border: 1px solid #FBBF24; /* Slightly darker yellow border */
    }
    .square-cell {
      background-color: #3B82F6; /* Blue background for squared numbers */
      border: 1px solid #2563EB; /* Slightly darker blue border */
      color: white; /* White text for better contrast */
    }
  </style>
</head>
<body class="bg-gray-100 font-sans leading-relaxed tracking-normal">
  <header class="bg-blue-600 text-white p-4 shadow-lg text-center">
    <h1 class="text-3xl font-bold">15x15 Multiplication Table</h1>
  </header>

  <main class="max-w-4xl mx-auto p-6 mt-6 bg-white rounded-lg shadow-md">
    <div class="table-container">
      <!-- Header Row -->
      <div class="table-cell header-cell"></div> <!-- Empty top-left corner -->
      <!-- Header numbers 1 to 15 -->
      <div class="table-cell header-cell">1</div>
      <div class="table-cell header-cell">2</div>
      <div class="table-cell header-cell">3</div>
      <div class="table-cell header-cell">4</div>
      <div class="table-cell header-cell">5</div>
      <div class="table-cell header-cell">6</div>
      <div class="table-cell header-cell">7</div>
      <div class="table-cell header-cell">8</div>
      <div class="table-cell header-cell">9</div>
      <div class="table-cell header-cell">10</div>
      <div class="table-cell header-cell">11</div>
      <div class="table-cell header-cell">12</div>
      <div class="table-cell header-cell">13</div>
      <div class="table-cell header-cell">14</div>
      <div class="table-cell header-cell">15</div>

      <!-- Multiplication Table -->
      <!-- Rows 1 to 15 -->
      <?php for ($i = 1; $i <= 15; $i++): ?>
        <div class="table-cell header-cell"><?php echo $i; ?></div> <!-- Row header -->
        <?php for ($j = 1; $j <= 15; $j++): ?>
          <?php if ($i === $j): ?>
            <div class="table-cell square-cell"><?php echo $i * $j; ?></div> <!-- Blue cell for squared numbers -->
          <?php else: ?>
            <div class="table-cell result-cell"><?php echo $i * $j; ?></div> <!-- Yellow cell for other results -->
          <?php endif; ?>
        <?php endfor; ?>
      <?php endfor; ?>
    </div>
  </main>
</body>
</html>



