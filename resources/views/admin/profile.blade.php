
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title> Admin.profile.{{$data->name}} | </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
  @include('font_awsome')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 <!-- Navbar -->
 {{-- @include('dash_topbar') --}}
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.dash_sidbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <H1 style="text-align: center"> {{$data->name}}  ( {{$data->type }} ) </H1>  
           
          </div>
          

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
		<form action="{{route('admin.profile_inc')}} " method="post" enctype="multipart/form-data">
 @if (Session::has('success'))

 <script>alert('Update Successfully');</script>
     
 @endif
  @csrf

      
          <div class="card card-outline card-info">
            <div  style="text-align: center">
			 <img style="width:150px;" src=    "{{url('img/'.$data->image_path)}} " alt="">
      </div>
			<div style="text-align: center" class="card-header"><div class="card-header">
        <div class="form-group">
          <label for="exampleInputFile">Image</label>
       
          <input name="image" type="file" required>
         
        </div>
             <div class="form-group">
                  <label>Enter Name</label>
                 <input style="text-align: center" name="name" value=" {{$data->name}}  " type="text" class="form-control" placeholder="Enter ...">
                </div>
                @error('name')
                <label style="color: red">{{$message}} </label>
                    
                @enderror
            </div>
            <div class="card-header">
              <div class="form-group">
                   <label>Enter Email</label>
                  <input style="text-align: center"  name="email" value=" {{$data->email}} " type="email" class="form-control" placeholder="Enter ...">
                 </div>
                 @error('email')
                 <label style="color: red">{{$message}} </label>
                     
                 @enderror
             </div>
             <div class="card-header">
              <div class="form-group">
                   <label>Enter password</label>
                  <input style="text-align: center"  name="password" value="" type="password" class="form-control" placeholder="Enter  ...">
                 </div>
                 @error('password')
                 <label style="color: red">{{$message}} </label>
                     
                 @enderror
             </div>
             
            
            
            <div class="card-body pad">
		
			 
			<div class="card-header">
             <div class="form-group">
					<div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
				<button type="submit" name="publise" class="btn btn-primary btn-lg">Publish</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
		  </form>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('dash_footer');

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{-- <script src="dash_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="dash_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dash_assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dash_assets/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="dash_assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script> --}}
@include('plugin');
</body>
</html>
