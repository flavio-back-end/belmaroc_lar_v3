
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Writer-blogs</title>
  <!-- Tell the browser to be responsive to screen width -->
 @include('font_awsome')
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
@include('writer.writer_topbar');
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
 @include('writer.writer_sidbar');

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>All Blogs</h1>
            </div>

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
                    @foreach ($data as $blog)
                        
                    
                   
                 
                      <tr>
                        <td><img style="width:110px;" src="{{url('img/blog/'.$blog->image)}}  "></td>
                        <td>  {{$blog->title  }} </td>
                        <td>{{$blog->category  }} </td>
                        <td>{{$blog->descrip  }} </td>
                        <td class="text-right py-0 align-middle">
                          <div class="btn-group btn-group-sm">
                            <a href=" {{url('writer/edit_blog/'.$blog->id)}} " onclick="return confirm('Are you sure?')" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="{{url('writer/delete/'.$blog->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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

@include('plugin');
</body>

</html>