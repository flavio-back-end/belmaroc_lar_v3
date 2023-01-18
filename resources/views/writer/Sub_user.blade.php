
<!DOCTYPE html>
<html>

  <head>
    <title> Writer-All Users</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- Font Awesome -->
 @include('font_awsome')
  </head>
@if (Session::has('update_succ'))
             
             
<script>alert('Update Successfully');</script>
                
                 
@endif
@if (Session::has('delete_succ'))
             
             
<script>alert('Delete Successfully');</script>
                
                 
@endif
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
   @include('writer.writer_topbar')
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
              <h1>All Users </h1>
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
                      <th>IMG</th>
                      <th>NAME</th>
                      <th>EMAIL</th>
                      <th>Create at</th>
                      <th>Upadte  at  </th>
                      <th>Role </th>
                      <th> Last Seen </th>
                      <th>Status </th>
                     



                      {{-- <th>Type</th> --}}

                      <th></th>
                    </tr>
                    
                  </thead>
                 
                      
               
                  <tbody>
                   @foreach ($data as $user)
                       
                 
                      <tr>
                        <td><img style="width:150px;" src=" {{url('img/'.$user->image_path)}} "></td>
                        <td> {{$user->name}} </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at	}}</td>
                        <td>{{$user->updated_at	}}</td>
                        <td> User </td>
                        @if ( Cache::has('user-is-online-'.$user->id)  )
                        <td  class="text-success"> Now</td>
                       
                     <td>
                        
                        <span class="text-success">Online</span>
                      
                        @else
                        <td>{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans()}} </td>
                        <td><span class="text-scondary">Offline</span></td>
                       
                        @endif
                      </td>
                        {{-- <td>{{$user->type}}</td> --}}
                        <td class="text-right py-0 align-middle">
                          <div class="btn-group btn-group-sm">
                            <a href="{{url('writer/edit_sub/'.$user->id)}} " onclick="return confirm('Are you sure?')" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href=" {{url('writer/delete/'.$user->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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

  @include('plugin')
   
</body>

</html>