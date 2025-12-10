<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIGN UP</title>
  </head>
  <body>
    <h2>Create a new account</h2>
    <form action="/signup" method="POST">
      <input
        type="text"
        name="fullname"
        id=""
        placeholder="Enter fullname..."
      />
      <input
        type="text"
        name="username"
        id=""
        placeholder="Enter username..."
      />
      <input type="email" name="email" id="" placeholder="Enter email..." />
      <input
        type="password"
        name="password"
        id=""
        placeholder="Enter password..."
      />
      <input
        type="password"
        name="password_confirm"
        id=""
        placeholder="Confirm password..."
      />
      <input type="submit" value="Sign up" />
    </form>
    <div>
      Already have an account?
      <a href="/signin">Sign in here</a>
    </div>
  </body>
</html>
