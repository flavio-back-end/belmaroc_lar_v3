
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> add about</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- <!-- Font Awesome -->
  <link rel="stylesheet" href="dash_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dash_assets/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="dash_assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
  @include('font_awsome')
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    @include('admin.dash_topbar');
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.dash_sidbar');
    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Add About</h1>
            </div>
            <div class="col-sm-6">

            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-8">
            <form action="{{route('admin.add_about_inc')}} " method="post" enctype="multipart/form-data">
                @csrf
              <div class="card card-outline card-info">
@if (Session::has('succ'))
{
    <script>alert('update about us Successfully');</script>
}
    
@endif
                <div class="card-header">
                  <div class="form-group">
                    <label>Enter Title</label>
                    <input name="title" value=" {{$data->title }} " type="text" class="form-control" placeholder="Enter ...">
                  </div>
                  @error('title')
                  <label style="color: red">{{$message}} </label>
                  @enderror
                </div>
                <div class="card-header">
                    <div class="form-group">
                      <label>name of ceo</label>
                      <input name="ceo" value="{{$data->ceo }}" type="text" class="form-control" placeholder="Enter ...">
                    </div>
                    @error('ceo')
                    <label style="color: red">{{$message}} </label>
                    @enderror
                  </div>
                  <div class="card-header">
                    <div class="form-group">
                      <label>Mission</label>
                      <input name=" mission" value="{{$data->info_mission }}" type="text" class="form-control" placeholder="Enter ...">
                    </div>
                    @error('mission')
                    <label style="color: red">{{$message}} </label>
                    @enderror
                  </div>
                  <div class="card-header">
                    <div class="form-group">
                      <label>Version</label>
                      <input name="version" value="{{$data->info_version }}" type="text" class="form-control" placeholder="Enter ...">
                    </div>
                    @error('version')
                    <label style="color: red">{{$message}} </label>
                    @enderror
                  </div>
                  <div class="card-header">
                    <div class="form-group">
                      <label>Value</label>
                      <input name="value" value="{{$data->info_value }}" type="text" class="form-control" placeholder="Enter ...">
                    </div>
                    @error('value')
                    <label style="color: red">{{$message}} </label>
                    @enderror
                    
                  </div>
                  <div class="card-header">
                    <div class="form-group">
                      <label>Title Description</label>
                      <input name="info" value="{{$data->info }}" type="text" class="form-control" placeholder="Enter ...">
                    </div>
                    @error('info')
                    <label style="color: red">{{$message}} </label>
                    @enderror
                    
                  </div>

                <div class="card-body pad">
                  <label>Full Description</label>
                  <div class="mb-3">
                    <textarea name="descrip" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$data->descrip }}</textarea>
                  </div>
                  @error('descrip')
                  <label style="color: red">{{$message}} </label>
                  @enderror
                </div>
                <div class="card-header">
                  <div class="form-group">
                    <label for="exampleInputFile">Select Img<span style="color:red;">(only compresed)</span></label>
                    <p style="color:red;">img size 560px x 350px</p>
                    <input name="image" type="file">
                    <img style="width:200; height:150px;" src="../images/about/">
                  </div> @error('image')
                  <label style="color: red">{{$message}} </label>
                  @enderror
                </div>

                <div class="card-header">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <button type="submit" name="publise" class="btn btn-block btn-warning btn-lg">Publish</button>
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

  {{-- <!-- jQuery -->
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
  </script> --}}
  @include('plugin');
</body>

</html>