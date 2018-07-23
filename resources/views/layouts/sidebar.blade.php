  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/avatar6.png") }}" class="img-picture" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><h4>{{ Auth::user()->username}}</h4></p>
          <!-- Status -->
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" >
        <!--Admin-->
        @if (Auth::user()-> user_type  == 0)
            <li {{{ (Request::is('/') ? 'class=active' : '') }}}>
              <a href="/">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
              </a>
            </li>
            
            <li {{{ (Request::is('invasive') ? 'class=active' : '') }}}>
              <a href="{{ url('invasive') }}">
                <i class="fa fa-file-text"></i> 
                <span>IAS Management</span>
              </a>
            </li>

            <li class="treeview" {{{ (Request::is('#') ? 'class=active' : '') }}}>
              <a href="#">
                <i class="fa fa-file-text"></i> 
                <span>Herbarium Management</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li {{{ (Request::is('herbarium-management/weedherba') ? 'class=active' : '') }}}>
                  <a href="{{ url('herbarium-management/weedherba') }}">Weed Herbarium</a>
                </li>
                <li {{{ (Request::is('herbarium-management/forestherba') ? 'class=active' : '') }}}>
                  <a href="{{ url('herbarium-management/forestherba') }}">Forest Herbarium</a>
                </li>
                <li {{{ (Request::is('herbarium-management/brivitasherba') ? 'class=active' : '') }}}>
                  <a href="{{ url('herbarium-management/briovitasherba') }}">Bryophyta Herbarium</a>
                </li>
                <li {{{ (Request::is('herbarium-management/lichenherba') ? 'class=active' : '') }}}>
                  <a href="{{ url('herbarium-management/lichenherba') }}">Lichen Herbarium</a>
                </li>
              </ul>
            </li>

            <li {{{ (Request::is('user-management') ? 'class=active' : '') }}}>
              <a href="{{ route('user-management.index') }}">
                <i class="fa fa-link"></i> 
                <span>User Management</span>
              </a>
            </li>

            <li {{{ (Request::is('biotrop-management') ? 'class=active' : '') }}}>
              <a href="{{ url('biotrop-management') }}">
                <i class="fa fa-camera-retro"></i> 
                <span>Biotrop Management</span>
              </a>
            </li>
            
        <!--Operator-->
        @elseif (Auth::user()-> user_type  == 1)
            <li {{{ (Request::is('/') ? 'class=active' : '') }}}>
              <a href="/">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
              </a>
            </li>
            
            <li {{{ (Request::is('invasive') ? 'class=active' : '') }}}>
              <a href="{{ url('invasive') }}">
                <i class="fa fa-file-text"></i> 
                <span>IAS Management</span>
              </a>
            </li>

            <li class="treeview" {{{ (Request::is('#') ? 'class=active' : '') }}}>
              <a href="#">
                <i class="fa fa-file-text"></i> 
                <span>Herbarium Management</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li {{{ (Request::is('herbarium-management/weedherba') ? 'class=active' : '') }}}>
                  <a href="{{ url('herbarium-management/weedherba') }}">Weed Herbarium</a>
                </li>
                <li {{{ (Request::is('herbarium-management/forestherba') ? 'class=active' : '') }}}>
                  <a href="{{ url('herbarium-management/forestherba') }}">Forest Herbarium</a>
                </li>
                <li {{{ (Request::is('herbarium-management/brivitasherba') ? 'class=active' : '') }}}>
                  <a href="{{ url('herbarium-management/briovitasherba') }}">Briovitas Herbarium</a>
                </li>
                <li {{{ (Request::is('herbarium-management/lichenherba') ? 'class=active' : '') }}}>
                  <a href="{{ url('herbarium-management/lichenherba') }}">Lichen Herbarium</a>
                </li>
              </ul>
            </li>

          <!--Verifikator-->
          @elseif (Auth::user()-> user_type  == 2)
            <li {{{ (Request::is('/') ? 'class=active' : '') }}}>
              <a href="/">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
              </a>
            </li>
            
            <li {{{ (Request::is('invasive') ? 'class=active' : '') }}}>
              <a href="{{ url('invasive') }}">
                <i class="fa fa-file-text"></i> 
                <span>IAS Management</span>
              </a>
            </li>

            <li class="treeview" {{{ (Request::is('#') ? 'class=active' : '') }}}>
              <a href="#">
                <i class="fa fa-file-text"></i> 
                <span>Herbarium Management</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li {{{ (Request::is('herbarium-management/weedherba') ? 'class=active' : '') }}}>
                  <a href="{{ url('herbarium-management/weedherba') }}">Weed Herbarium</a>
                </li>
                <li {{{ (Request::is('herbarium-management/forestherba') ? 'class=active' : '') }}}>
                  <a href="{{ url('herbarium-management/forestherba') }}">Forest Herbarium</a>
                </li>
                <li {{{ (Request::is('herbarium-management/brivitasherba') ? 'class=active' : '') }}}>
                  <a href="{{ url('herbarium-management/briovitasherba') }}">Briovitas Herbarium</a>
                </li>
                <li {{{ (Request::is('herbarium-management/lichenherba') ? 'class=active' : '') }}}>
                  <a href="{{ url('herbarium-management/lichenherba') }}">Lichen Herbarium</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="#">
                <i class="fa fa-check-square-o"></i>  
                <span>IAS Verifcation</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li {{{ (Request::is('verificationIAS/verified') ? 'class=active' : '') }}}>
                  <a href="{{ url('verificationIAS/verified') }}">Verified</a>
                </li>
                <li {{{ (Request::is('verificationIAS') ? 'class=active' : '') }}}>
                  <a href="{{ url('verificationIAS') }}">Unverified</a>
                </li>
              </ul>
            </li>

            <li class="treeview" {{{ (Request::is('#') ? 'class=active' : '') }}}>
              <a href="#">
                <i class="fa fa-check-square-o"></i> 
                <span>Herbarium Verifcation</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li >
                  <a href="#"> 
                    <span>Weed Herbarium</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li {{{ (Request::is('verificationWeedHerba/verified') ? 'class=active' : '') }}}>
                      <a href="{{ url('verificationWeedHerba/verified') }}">Verified</a>
                    </li>
                    <li {{{ (Request::is('verificationWeedHerba') ? 'class=active' : '') }}}>
                      <a href="{{ url('verificationWeedHerba') }}">Unverified</a>
                    </li>
                  </ul>
                </li>
                <li >
                  <a href="#">
                    <span>Forest Herbarium</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li {{{ (Request::is('verificationForestHerba/verified') ? 'class=active' : '') }}}>
                      <a href="{{ url('verificationForestHerba/verified') }}">Verified</a>
                    </li>
                    <li {{{ (Request::is('verificationForestHerba') ? 'class=active' : '') }}}>
                      <a href="{{ url('verificationForestHerba') }}">Unverified</a>
                    </li>
                  </ul>
                </li>

                <li >
                  <a href="#">
                    <span>Briovitas Herbarium</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li {{{ (Request::is('verificationBryovitaHerba/verified') ? 'class=active' : '') }}}>
                      <a href="{{ url('verificationBryovitaHerba/verified') }}">Verified</a>
                    </li>
                    <li {{{ (Request::is('verificationBryovitaHerba') ? 'class=active' : '') }}}>
                      <a href="{{ url('verificationBryovitaHerba') }}">Unverified</a>
                    </li>
                  </ul>
                </li>

                <li >
                  <a href="#">
                    <span>Lichen Herbarium</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li {{{ (Request::is('verificationLichenHerba/verified') ? 'class=active' : '') }}}>
                      <a href="{{ url('verificationLichenHerba/verified') }}">Verified</a>
                    </li>
                    <li {{{ (Request::is('verificationLichenHerba') ? 'class=active' : '') }}}>
                      <a href="{{ url('verificationLichenHerba') }}">Unverified</a>
                    </li>
                  </ul>
                </li>     
          @endif
        </ul>
      
      
      <!-- /.sidebar-menu -->
    </section>
   
    <!-- /.sidebar -->
  </aside>

