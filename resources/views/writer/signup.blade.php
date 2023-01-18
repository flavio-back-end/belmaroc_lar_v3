<!DOCTYPE html>
<html>

<head>
    <!-- Karakter encoding -->
    <meta charset="utf-8">
    <!-- 
		Perintah agar lebar viewport mengikuti lebar perangkat
		dan skala mengikuti ukuran ketika web di-load
	 -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Page Ep. 4</title>
    <!-- Load bootstrap stylesheet -->
    <link rel="stylesheet" href="{{url('admin_assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- Load login stylesheet -->
    <link rel="stylesheet" href="{{url('admin_assets/css/login.css')}}">
</head>

<body>
    <div class="container-fluid">
        <div class="card card-login">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="padding bg-primary text-center align-items-center d-flex">
                            <div id="particles-js"></div>
                            <div class="w-100">
                                <div class="logo mb-4">
                                    <img src="{{url('admin_assets/img/kodinger.jpg')}}" alt="kodinger logo" class="img-fluid">
                                </div>
                                <h4 class="text-light mb-2">Don't waste your time</h4>
                                <p class="lead text-light">Login quickly like replying to your girlfriend's message.</p>
                                <button class="btn btn-block btn-icon btn-icon-google mb-3">
                                    Login With Google
                                </button>
                            </div>

                            <div class="help-links">
                                <ul>
                                    <li><a href="#">Terms of Service</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="padding">
                            <h2>Signup</h2>
                            <p class="lead">Before you get started, you must login or register if you don't already have
                                an account.</p>
                           <form autocomplete="off" action="  {{route('user.signup_inc_user')}} " method="POST"  enctype="multipart/form-data"> 
                                @if (Session::has('succ'))
                                <p style="color: red" class=""> {{Session::get('succ')}} </p> 
                                @endif @if (Session::has('fail'))
                                <p style="color: red" class=""> {{Session::get('fail')}} </p> 
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" tabindex="1"value=" {{old('username')}} ">
                                </div>
                                <div>
                                    @error('username')
                                    <p style="color: red" class=""> {{$message}} </p> 
    
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="d-block" for="username">
                                        Email

                                    </label>
                                    <input type="text" name="email" class="form-control" id="email" tabindex="2" value=" {{old('email')}} ">
                                </div>
                                @error('email')
                                <p style="color: red" class=""> {{$message}} </p> 

                                @enderror
                                <div class="form-group">
                                    <label class="d-block" for="email">
                                        Password

                                    </label>
                                    <input type="password" name="password" class="form-control" id="password" tabindex="2">
                                </div> @error('password')
                                <p style="color: red" class=""> {{$message}} </p> 

                                @enderror

                                <div class="form-group">
                                    <label class="d-block" for="email">
                                        image

                                    </label>
                                    <input type="file" name="image" class="form-control" id="" tabindex="2">
                                </div> @error('image')
                                <p style="color: red" class=""> {{$message}} </p> 

                                @enderror
                                  
                               

                                <button class="btn btn-primary" tabindex="3" name="signup">
                                    Signup
                                </button>
                                <?php

                                ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="{{url('admin_assets/js/particles.js')}}"></script>
    <script>
        particlesJS.load('particles-js', 'particlesjs-config.json', function() {
            console.log('callback - particles.js config loaded');
        });
    </script>
</body>

</html>