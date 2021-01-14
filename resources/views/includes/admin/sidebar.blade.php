<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="{{ url('admin/cartadmin') }}" class="nav-link @yield('Cart')">
                  <i class='fas fa-box'></i>
                  <p>Cart</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/productadmin') }}" class="nav-link @yield('Shop')">
                  <i class='far fa-images'></i>
                  <p>Shop</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/galleryadmin') }}" class="nav-link @yield('Gallery')">
                  <i class="fa fa-list"></i>
                  <p>Gallery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/transactionadmin') }}" class="nav-link @yield('Transaction')">
                  <i class='far fa-handshake'></i>
                  <p>Transaction</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/categoryadmin') }}" class="nav-link @yield('Category')">
                  <i class="fa fa-list"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/sizeadmin') }}" class="nav-link @yield('Size')">
                  <i class="fa fa-list"></i>
                  <p>Size</p>
                </a>
              </li>
          
          
              
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>