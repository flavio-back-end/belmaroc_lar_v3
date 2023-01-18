<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Writer | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  @include('font_awsome')
 
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
 @include('writer.writer_topbar');

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('writer.writer_sidbar');

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">  </h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">

            <!-- ./col -->
            {{-- auth to user --}}
            @if (Auth::guard('writer')->user())
                
         
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <a href=" {{route('writer.writer_logout')}} " class="small-box-footer">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3> logout</h3>

                    <p>Add</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                </div>
              </a>
            </div>

            {{-- end auth user --}} 

          {{-- auth admin  --}}
           @else
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <a href=" {{route('admin.logout')}} " class="small-box-footer">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3> logout</h3>

                    <p>Add</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                </div>
              </a>
            </div>
            @endif
            
            
             {{-- end auth admin --}}

            <!-- ./col -->
           
            <div class="col-lg-3 col-6">
              <!-- small box -->
            
                  
              
              <a href="view-blog.php" class="small-box-footer">
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>View Blog</h3>

                    <p>View</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                </div>
              </a>
             
            </div>
            <!-- ./col -->
          </div>
      
          <!-- /.row -->
          <!-- Main row -->

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
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
    

  @include('plugin')
</body>

</html>