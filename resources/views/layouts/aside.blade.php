<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
        <center><span class="brand-text font-weight-light"><i class="fa fa-mosque"> AL-IKHLAS</i></span></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar"><br>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ url('profile/', \Auth::user()->photo) }}" class="img-circle elevation-2" style="height: 40px; width: 40px" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ \Auth::user()->name }}</a>
            </div>
          </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{url('/home')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">MY DATA</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-mosque"></i>
                        <p>
                            KAS MESJID
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('kas_mesjid_masuk')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Masuk</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('kas_mesjid_keluar')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('rekap_km')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rekap</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            KAS SOSIAL
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('kas_sosial_masuk')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Masuk</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('kas_sosial_keluar')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('rekap_ks')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rekap</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">OTHER</li>
                <li class="nav-item">
                    <a href="{{url('pengguna')}}" class="nav-link">
                        <i class="fa fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('keluar')}}" class="nav-link">
                        <i class="fa fa-arrow-right"></i>
                        <p>Keluar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>