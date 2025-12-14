<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/style.css">
    <!-- <link rel="stylesheet" href="http://course-platform.local/css/style.css"> -->
    <title><?= $title ?? "Admin Dashboard" ?></title>

    <!-- Tailwind CDN (you can self-host later) -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  </head>

  <body>
    <!-- GLOBAL UI LAYER -->
    <div id="toast-container">
      <?php require_once __DIR__ . '/../partials/toasts.php'; ?>
    </div>
    <div class="dashboard">
      <!-- Sidebar -->
      <?php require __DIR__ . '/../partials/admin-sidebar.php'; ?>

      <!-- Main content -->
      <main class="main-content">
        <?php require __DIR__ . '/../partials/admin-navbar.php'; ?>
        <?= $content ?>
      </main>
    </div>
    <script src="/js/script.js"></script>
  </body>
</html>
