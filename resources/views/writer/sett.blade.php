
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        <!-- Font Awesome -->
        <link rel="stylesheet" href="dash_assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dash_assets/dist/css/adminlte.min.css">
        <!-- summernote -->
        <link rel="stylesheet" href="dash_assets/plugins/summernote/summernote-bs4.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      </head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
  @include('dash_topbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
 @include('dash_sidbar')
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Settings</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <form action="{{route('add_setting') }} " method="post" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-md-6">

    

              <div class="card card-outline card-info">
                <div class="card-header">
                  <div class="form-group">
                    <label>Site Name</label>
                    <input name="site_name" value=" {{$data->site_name}} " type="text" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                @error('site_name')
                <label style="color: red">{{$message}} </label>
                @enderror
                <div class="card-header">
                  <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" value="{{$data->phone}} " type="text" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                @error('phone')
                <label style="color: red">{{$message}} </label>
                @enderror
                <div class="card-header">
                  <div class="form-group">
                    <label>Company Email</label>
                    <input name="email" value="{{$data->email}} " type="text" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                @error('email')
                <label style="color: red">{{$message}} </label>
                @enderror
                <div class="card-header">
                  <div class="form-group">
                    <label>Map</label>
                    <textarea name="map" class="form-control" placeholder="Enter Iframe Code">
                    {{-- include map --}}
                </textarea>
                  </div>
                </div>

                <!--<div class="card-body pad">
			<label>Footer Description</label>
              <div class="mb-3">
                <textarea name="footer_desc" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">></textarea>
              </div>
            </div>-->
                <div class="card-header">
                  <div class="form-group">
                    <label>Full Address with pincode</label>
                    <input name="address" value="{{$data->address}} " type="text" class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                @error('address')
                <label style="color: red">{{$message}} </label>
                @enderror

              </div>
            
            </div>
            <!-- /.col-->

            <div class="col-md-6">
              <div class="card card-outline card-info">
                <div class="card-header">
                  <div class="form-group">
                    <label>Facebook</label>
                    <input name="facebook" value="{{$data->facebook}} " type="text" class="form-control" placeholder="URL">
                  </div>
                </div>
                <div class="card-header">
                  <div class="form-group">
                    <label>Twitter</label>
                    <input name="twitter" value="{{$data->twitter}} " type="text" class="form-control" placeholder="URL">
                  </div>
                </div>
                <div class="card-header">
                  <div class="form-group">
                    <label>Linkedin</label>
                    <input name="linkedin" value="{{$data->linkedin}} " type="text" class="form-control" placeholder="URL">
                  </div>
                </div>

                <div class="card-header">
                  <div class="form-group">
                    <label>Instagram</label>
                    <input name="instagram" value="{{$data->instagram}} " type="text" class="form-control" placeholder="URL">
                  </div>
                </div>
                <div class="card-header">
                  <div class="form-group">
                    <label>YouTube</label>
                    <input name="youtube" value="{{$data->youtube}} " type="text" class="form-control" placeholder="URL">
                  </div>
                </div>


              </div>

            </div>

            <div class="col-md-12">

              <div class="card-header">
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <div style="text-align: center" ><button type="submit" name="publise" class="btn btn-warning btn-lg">Publish</button></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </form>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('dash_footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="dash_assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="dash_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dash_assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dash_assets/dist/js/demo.js"></script>
  <!-- Summernote -->
  <script src="dash_assets/plugins/summernote/summernote-bs4.min.js"></script>
  <script>
    $(function() {
      // Summernote
      $('.textarea').summernote()
    })
  </script>
</body>

</html>