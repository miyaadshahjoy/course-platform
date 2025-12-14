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
    <div class="signin">
      <div class="container">
        <div class="signin-wrapper">
          <h2>Sign in to your account</h2>
          
          <form class="form form-signin" action="/signin" method="POST">
            <input type="email" name="email" id="" placeholder="Enter email..." />
            <input
            type="password"
            name="password"
            id=""
            placeholder="Enter password..."
            />
            <input class="button-submit" type="submit" value="Sign in" />
          </form>
          <div>
            Don't have an account?
            <a href="/signup">Sign up here</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
