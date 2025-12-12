<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>SIGN IN</title>
  </head>
  <body>
    <!-- header  -->
    <?php require_once __DIR__ . '/partials/header.php'; ?>
    <div class="container">

      <h2>Sign in to your account</h2>
      
      <form action="/signin" method="POST">
        <input type="email" name="email" id="" placeholder="Enter email..." />
        <input
        type="password"
        name="password"
        id=""
        placeholder="Enter password..."
        />
        <input type="submit" value="Sign in" />
      </form>
      <div>
        Don't have an account?
        <a href="/signup">Sign up here</a>
      </div>
    </div>
  </body>
</html>
