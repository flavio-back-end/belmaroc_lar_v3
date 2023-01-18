<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="pages_assets/style.css" />
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
        <form action="  {{route('loginuser_inc')}} " method="post" class="sign-in-form">
            @csrf @if (Session::has('fail'))
            <h3 style='color:#c0000b;'> {{Session::get('fail')}} </h3>"
  @endif

          <h2 class="title">LOG IN</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email Address" name="email" />
          </div>
          @error('email')
          <h3 style='color:#c0000b;'> {{$message}} </h3>";
          @enderror
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
          </div>
          @error('password')
          <h3 style='color:#c0000b;'> {{$message}} </h3>";
          @enderror
          <input type="submit" value="Login" name="log" class="btn solid" />
          <p style="display: flex;justify-content: center;align-items: center;margin-top: 20px;"><a href="forgot.php" style="color: #4590ef;" <?php sleep(2); ?>>Forgot Password?</a></p>

        </form>

        <samp>
        </samp>
        </head>
        <form action=" {{route('signupuser_inc')}} " class="sign-up-form" method="post">
         
            @csrf
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Full Name" name="name" />
          </div>
          @error('name')
          <h3 style='color:#c0000b;'> {{$message}} </h3>"
          @enderror
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email Address" name="email" />
          </div>
          @error('email')
          <h3 style='color:#c0000b;'> {{$message}} </h3>"
          @enderror
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
          </div>
          @error('password')
          <h3 style='color:#c0000b;'> {{$message}} </h3>";
          @enderror
          <div class="form-group">
            <label class="d-block" for="email">
                image

            </label>
            <input type="file" name="image" class="form-control" id="" tabindex="2">
        </div>
        @error('image')
        <p style="color: red" class=""> {{$message}} </p> 

        @enderror
          
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
  <script src="pages_assets/app.js"></script>
</body>


</html>