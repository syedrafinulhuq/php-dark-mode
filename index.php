<?php
// starts a new session so we can remember the visit
session_start();

if (!isset($_SESSION['mode'])) {
  $_SESSION['mode'] = 'light';
}

// toggle color checks here light/dark
if (isset($_GET['toggle'])) {
  $_SESSION['mode'] = $_SESSION['mode'] === 'light' ? 'dark' : 'light';

  // header page redirects to the original page 
  header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
  exit;
}

// checks whether the page is white or dark
$isDark = $_SESSION['mode'] === 'dark';

// background color settings
$bgClass = $isDark ? 'bg-gray-900' : 'bg-white';

// text color settings
$textClass = $isDark ? 'text-white' : 'text-gray-900';

// card color settings
$cardClass = $isDark ? 'bg-gray-800 border-gray-700' : 'bg-white border-gray-200';

// button color settings
$btnClass  = $isDark ? 'bg-white text-gray-900 hover:bg-gray-100' : 'bg-gray-900 text-white hover:bg-gray-800';

// button label settings
$buttonLabel = $isDark ? 'Switch to Light Mode' : 'Switch to Dark Mode';

// subtitle settings
$subtitle = $isDark
  ? "Dark mode is easier on the eyes at night"
  : "Light mode is easier on the eyes in the daytime";
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- links -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Mozilla+Headline:wght@200..700&display=swap" rel="stylesheet" />


  <!-- tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

 
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            mozilla: ['"Mozilla Headline"', 'sans-serif'],
          },
        },
      },
    };
  </script>

  
  <title>Dark Mode Using PHP</title>
</head>

<body class="font-mozilla <?php echo $bgClass . ' ' . $textClass; ?> min-h-screen transition-colors duration-300">


  <div class="max-w-3xl mx-auto p-6">

    <div class="flex items-center justify-between mb-8">

      <h1 class="text-3xl md:text-4xl font-bold">Dark Mode Using PHP</h1>

      <a href="?toggle=1"
         class="inline-block px-4 py-2 rounded-lg font-semibold shadow <?php echo $btnClass; ?> transition-colors">

        <?php echo htmlspecialchars($buttonLabel, ENT_QUOTES, 'UTF-8'); ?>
      </a>

    </div>

    
    <section class="border rounded-2xl p-6 md:p-8 shadow-sm <?php echo $cardClass; ?> transition-colors duration-300">

      <p class="text-lg mb-4">
        <?php echo htmlspecialchars($subtitle, ENT_QUOTES, 'UTF-8'); ?>

      </p>

      
      <p class="text-sm opacity-80">

        Current mode:
        <strong><?php echo htmlspecialchars(ucfirst($_SESSION['mode']), ENT_QUOTES, 'UTF-8'); ?></strong>

      </p>
    </section>

  </div>
</body>
</html>