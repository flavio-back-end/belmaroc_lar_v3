<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <!-- tit -->
  <link rel="shortcut icon" href="img/logo bel.png" type="image/x-icon">
  <link rel="icon" href="img/logo bel.png" ty.e="image/x-icon">
  <!-- le lg -->
</head>
<title>login & signup Form - Bel-Maroc</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="../includes/login.inc.php" method="post" class="sign-in-form">
          <h2 class="title">LOG IN</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email Address" name="email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
          </div>
          <input type="submit" value="Login" name="log" class="btn solid" />
          <p style="display: flex;justify-content: center;align-items: center;margin-top: 20px;"><a href="forgot.php" style="color: #4590ef;" <?php sleep(2); ?>>Forgot Password?</a></p>

        </form>

        <samp>
        </samp>
        </head>
        <form action="../includes/signup.inc.php" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Full Name" name="name" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email Address" name="email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="pass" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm Password" name="rpass" />
          </div>
          <input type="submit" class="btn" name="submit" value="Sign up" />

      </div>
      </form>
    </div>


    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <br>
          <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquide </p> -->
          <?php
          if (isset($_GET["error"])) {
            if ($_GET["error"] === "empty") {
              echo "<h3 style='color:#c0000b;'>SORRY YOU DONT HAVE ACOUNT YOU HAVE SIGN UP</h3>";
            } elseif ($_GET["error"] === "wronguser") {
              echo "<h3 style='color:#c0000b;'>SORRY YOUR EMAIL INCOECT </h3>";
              echo "<h2 style='color:#c0000b;'> TRY AGAINE </h2>";
            } elseif ($_GET["error"] === "wrong_password") {
              echo "<h3 style='color:#c0000b;'> PASSWORD INCORECT </h3>";
              echo "<h2 style='color:#c0000b;'> TRY AGAINE </h2>";
            } elseif ($_GET["error"] === "succ") {
              echo "<h3 style='color:#c0000b;'> SIGNUP SUCCSASFULL  </h3>";
            } elseif ($_GET["error"] === "strongpass") {
              echo "<h3 style='color:#c0000b;'> YOU HAVE a number or to strong password </h3>";
            } elseif ($_GET["error"] === "pass") {
              echo "<h3 style='color:#c0000b;'> the password is not identical </h3>";
            } elseif ($_GET["error"] === "check") {
              echo "<h3 > email is ready exist</h3>";
            } elseif ($_GET["error"] === "empty_login") {
              echo "<h3> entre your email and password </h3>";
            }
          }

          ?>
          <br>





          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">

          <h3>One of us ?</h3>

          <button class="btn transparent" id="sign-in-btn">
            log in
          </button>
        </div>
        <img src="" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  <script src="app.js"></script>
</body>


</html>