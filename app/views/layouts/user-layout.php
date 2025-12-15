<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/style.css">
    <title><?= $title ?? "User Dashboard" ?></title>

  </head>

  <body>
    <?php require_once __DIR__ . '/../partials/header.php'; ?>

    <div class="dashboard">
      <!-- Sidebar -->
      <?php require __DIR__ . '/../partials/user-sidebar.php'; ?>

      <!-- Main content -->
      <main class="main-content">
        <?= $content ?>
      </main>
    </div>

    <script src="/js/script.js"></script>

  </body>
</html>
