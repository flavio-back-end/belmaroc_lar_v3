
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>profile| {{$data_writer->name}} | </title>


{{--  include  font  --}}
 @include('font_awsome')

 {{-- ------------ --}}
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 <!-- Navbar -->
 @include('writer.writer_topbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('writer.writer_sidbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <H1 style="text-align: center"> {{$data_writer->name}} </H1>  
           
          </div>
          

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
		<form action="{{route('writer.profile_writer_inc')}} " method="post" enctype="multipart/form-data">
 @if (Session::has('success'))

 <script>alert('Update Successfully');</script>
     
 @endif
  @csrf

      
          <div class="card card-outline card-info">
            <div  style="text-align: center">
			 <img style="width:150px;" src=    "{{url('img/'.$data_writer->image_path)}} "  value="{{$data_writer->image_path}}" alt="">
      </div>
			<div style="text-align: center" class="card-header"><div class="card-header">
        <div class="form-group">
          <label for="exampleInputFile">Image</label>
       
          <input name="image" type="file" required>
         
        </div>
             <div class="form-group">
                  <label>Enter Name</label>
                 <input style="text-align: center" name="name" value=" {{$data_writer->name}}  " type="text" class="form-control" placeholder="Enter ...">
                </div>
                @error('name')
                <label style="color: red">{{$message}} </label>
                    
                @enderror
            </div>
            <div class="card-header">
              <div class="form-group">
                   <label>Enter Email</label>
                  <input style="text-align: center"  name="email" value=" {{$data_writer->email}} " type="email" class="form-control" placeholder="Enter ...">
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
@include('plugin');

</body>
</html>
