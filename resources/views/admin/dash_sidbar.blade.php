<aside class="main-sidebar sidebar-dark-primary elevation-4">
 




  <!-- Brand Logo -->


  <!-- Sidebar -->
{{-- start  --}}

  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
 
        
  
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src=" {{url('img/'.Auth::guard('admin')->user()->image_path)}} " class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{route('admin.profile')}}" class="d-block"> {{ Auth::guard('admin')->user()->name }} </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href=" {{route('admin.dashboard')}} " class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="{{route('admin.setting')}}" class="nav-link ">
            <i class="nav-icon fa fa-cog"></i>
            <p>
              Settings
            </p>
          </a>
        </li>
       
        <li class="nav-item has-treeview menu-open">
          <h5 class="pt-2 pb-2" style="color:white;">Services</h5>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="add-services.php" class="nav-link">
            <i class="fa fa-plus nav-icon"></i>
            <p>
              Add Service
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="view-services.php" class="nav-link ">
            <i class="fa fa-eye nav-icon"></i>
            <p>
              View Services
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="{{route('admin.add_sub_writer')}}" class="nav-link">
            <i class="fa fa-plus nav-icon"></i>
            <p>
              Add  Writer
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <h5 class="pt-2 pb-2" style="color:white;">BLOG SECTION</h5>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="{{route('admin.Sub_writer')}}" class="nav-link">
            <i class="fa fa-eye nav-icon"></i>
            <p>
              View Writers
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview menu-open">
          <a href="{{route('admin.add_blog')}}" class="nav-link ">
            <i class="fa fa-plus nav-icon"></i>
            <p>
              Add Blog Category
            </p>
          </a>
        </li>
       

  

      
        <li class="nav-item has-treeview menu-open">
          <a href="{{route('admin.add_sub_user')}}" class="nav-link">
            <i class="fa fa-plus nav-icon"></i>
            <p>
              Add  user
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="{{route('admin.Sub_user')}}" class="nav-link">
            <i class="fa fa-eye nav-icon"></i>
            <p>
              View Users
            </p>
          </a>
        </li>
   
        <li class="nav-item has-treeview menu-open">
          <a href="{{route('admin.add_blog')}}" class="nav-link">
            <i class="fa fa-plus nav-icon"></i>
            <p>
              Add New Blog
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="{{route('admin.blog')}}" class="nav-link ">
            <i class="fa fa-eye nav-icon"></i>
            <p>
              View Blog
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <h5 class="pt-2 pb-2" style="color:white;">OTHER OPTIONS</h5>
        </li>

        <li class="nav-item has-treeview menu-open">
          <a href="add-testimonials.php" class="nav-link">
            <i class="fa fa-plus nav-icon"></i>
            <p>
              Add Testimonials
            </p>
          </a>
        </li>

        
        <li class="nav-item has-treeview menu-open">
          <a href="{{route('admin.add_about')}}" class="nav-link ">
            <i class="nav-icon fa fa-cog"></i>
            <p>
              About
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="faqs.php" class="nav-link">
            <i class="fa fa-plus nav-icon"></i>
            <p>
              FAQ
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  
  </div> 
  
  <!-- /.sidebar -->
 


</aside>