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
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Load login stylesheet -->
	<link rel="stylesheet" href="css/login.css">
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
									<img src="img/kodinger.jpg" alt="kodinger logo" class="img-fluid">
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
							<h2>Login</h2>
							<p class="lead">Before you get started, you must login or register if you don't already have
								an account.</p>
							<form action=" {{route('login_inc')}} " autocomplete="off" method="POST">
							@if (Session::has('fail'))
							<h4> {{Session::get('fail')}} </h4>
								
							@endif
							@if (Session::has('pfail'))
							<h4> {{Session::get('pfail')}} </h4>
								
							@endif
								@csrf
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" class="form-control" id="Email" tabindex="1" value="{{old('email')}} ">
								</div>
								@error('email')
                                    
                                <p style="color: red" class=""> {{$message}} </p> 
                                   
                               @enderror
								<div class="form-group">
									<label class="d-block" for="password">
										Password
										<div class="float-right">
											<a href="forgot.php">Forgot Password?</a>
										</div>
									</label>
									<input type="password" name="password" class="form-control" id="password" tabindex="2">
								</div>
								@error('password')
                                    
                                <p style="color: red" class=""> {{$message}} </p> 
                                   
                               @enderror
								<div class="form-group text-right">
									<div class="float-left mt-2">
										<a href=" signup ">Create an account?</a>
									</div>
									<button class="btn btn-primary" tabindex="3" name="login">
										Login
									</button>
								</div>
								<script>
									var my_req = new
								</script>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/particles.js"></script>
	<script>
		particlesJS.load('particles-js', 'particlesjs-config.json', function() {
			console.log('callback - particles.js config loaded');
		});
	</script>
</body>

</html>