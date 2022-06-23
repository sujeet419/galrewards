 <!-- Header -->
 <header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
      <!-- Sidebar toggle button -->
      <button id="sidebar-toggler" class="sidebar-toggle">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <!-- search form -->
      <div class="search-form d-none d-lg-inline-block">
        <div class="input-group">

          {{-- <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc."
            autofocus autocomplete="off" /> --}}
        </div>
        <div id="search-results-container">
        </div>
      </div>

      <div class="navbar-right ">
        <ul class="nav navbar-nav">
          <!-- Github Link Button -->

          <!-- User Account -->
          <li class="dropdown user-menu">
            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <img src="{{asset('assets/logo/appmainlogo.png')}}" class="user-image" alt="User Image" />
              <span class="d-none d-lg-inline-block"> {{ Auth::user()->name }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <!-- User image -->
              <li class="dropdown-header">
                <img src="{{asset('assets/logo/appmainlogo.png')}}" class="img-circle" alt="User Image" />
                <div class="d-inline-block">
                  {{ Auth::user()->name }} <small class="pt-1">{{ Auth::user()->email }}</small>
                </div>
              </li>

              <li>
                <a href="{{ route('view_ad_profile')}}">
                  <i class="mdi mdi-account"></i> My Profile
                </a>
              </li>
              <li>
                <a href="{{ route('add_admin')}}">
                  <i class="mdi mdi-diamond-stone"></i> Add Admin
                </a>
              </li>
              <li class="dropdown-footer">
                <a href="{{ route('logout')}}"><button class="btn btn-primary" type="submit" style="margin-left: 50px;"> <i class="mdi mdi-logout"></i>Log Out</button></a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>


  </header>