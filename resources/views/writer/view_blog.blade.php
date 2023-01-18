
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ACT Web Space</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
   @include('dash_topbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('dash_sidbar');

    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            @if (count($row_blogs)>0)
            <div class="col-sm-6">
              <h1>All Blogs</h1>
            </div>

    
@else
<div class="col-sm-6">
    <h1>not has  Blogs</h1>
  </div>
@endif
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">View</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
             
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Img</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Description</th>

                      <th></th>
                    </tr>
                    
                  </thead>
                 
                      
               
                  <tbody>
                   @foreach ($row_blogs as $blog)
                       
                 
                      <tr>
                        <td><img style="width:150px;" src="images/blog/"></td>
                        <td> {{$blog->title}} </td>
                        <td>{{$blog->category}}</td>
                        <td>{{$blog->descrip}}</td>
                        <td class="text-right py-0 align-middle">
                          <div class="btn-group btn-group-sm">
                            <a href="{{route()}} " onclick="return confirm('Are you sure?')" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="view-blog.php?delete_id={{-- include  id to delete --}} " onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    
                  </tbody>
                </table>
              </div>
             
                  
         
             
              <!-- /.card-body -->
            </div>
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
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <script>
    $(function() {
      // Summernote
      $('.textarea').summernote()
    })
  </script>
</body>

</html>