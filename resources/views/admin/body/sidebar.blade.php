

        <aside class="left-sidebar bg-sidebar">

            <div id="sidebar" class="sidebar sidebar-with-footer">

              <!-- Aplication Brand -->

              <div class="app-brand">

                <a href="{{ route('dashboard')}}">

<img src="{{asset('assets/logo/appmainlogo.png')}}">

                  <span class="brand-name">GalRewards</span>

                </a>

              </div>

              <!-- begin sidebar scrollbar -->



<div class="sidebar-scrollbar">



    <!-- sidebar menu -->



    <ul class="nav sidebar-inner" id="sidebar-menu">

      <li class="has-sub">

        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">

          <i class="mdi mdi-view-dashboard-outline"></i>

          <span class="nav-text">Master</span> <b class="caret"></b>

        </a>

        <ul class="collapse" id="dashboard" data-parent="#sidebar-menu">

          <div class="sub-menu">  

            <li  class="has-sub active expand" >

              <a class="sidenav-item-link" href="{{ route('view_category')}}" data-toggle="" data-target=""

                aria-expanded="false" aria-controls="dashboard">

                <i class="mdi mdi-language-c"></i>&nbsp;&nbsp;&nbsp;&nbsp;

                <span class="nav-text">Category</span> 

              </a>

    

            </li>   

            <li  class="has-sub active expand" >

              <a class="sidenav-item-link" href="{{ route('view_subcategory')}}" data-toggle="" data-target=""

                aria-expanded="false" aria-controls="dashboard">

                <i class="mdi mdi-layers"></i>&nbsp;&nbsp;&nbsp;&nbsp;

                <span class="nav-text">Sub Category</span> 

              </a>

    

            </li>  

			

			  <li  class="has-sub active expand" >

              <a class="sidenav-item-link" href="{{ route('view_country')}}" data-toggle="" data-target=""

                aria-expanded="false" aria-controls="dashboard">

                <i class="mdi mdi-layers"></i>&nbsp;&nbsp;&nbsp;&nbsp;

                <span class="nav-text">Country</span> 

              </a>

    

            </li> 



            <li  class="has-sub active expand" >

<a class="sidenav-item-link" href="{{ route('agencygroup')}}" data-toggle="" data-target=""

  aria-expanded="false" aria-controls="dashboard">

  <i class="mdi mdi-layers"></i>&nbsp;&nbsp;&nbsp;&nbsp;

  <span class="nav-text">Agency Group</span> 

</a>



</li> 

			

			  <li  class="has-sub active expand" >

              <a class="sidenav-item-link" href="{{ route('pcc')}}" data-toggle="" data-target=""

                aria-expanded="false" aria-controls="dashboard">

                <i class="mdi mdi-layers"></i>&nbsp;&nbsp;&nbsp;&nbsp;

                <span class="nav-text">PCC</span> 

              </a>

    

            </li> 

			

			

          </div>

        </ul>

      </li>



        <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('supplier')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-map"></i>

            <span class="nav-text">Supplier</span> 

          </a>



        </li>

        <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('view_product')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-truck"></i>

            <span class="nav-text">Product Definition</span> 

          </a>



        </li>

        <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('view_points')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-file-powerpoint-box"></i>

            <span class="nav-text">Points</span> 

          </a>



        </li>

		

		   <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('usertransfer')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-file-powerpoint-box"></i>

            <span class="nav-text">Points Transfer</span> 

          </a>



        </li>

		

		

		

        <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('view.bonus')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-file-powerpoint-box"></i>

            <span class="nav-text">Bonus Points</span> 

          </a>



        </li>

        <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('view.acbalance')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-ticket-account"></i>

            <span class="nav-text">Account Balance</span> 

          </a>



        </li>

		

		    <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('account_summary')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-ticket-account"></i>

            <span class="nav-text">Account Summary</span> 

          </a>



        </li>

		

        <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('producthistory')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-history"></i>

            <span class="nav-text">Order History</span> 

          </a>



        </li>

        <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('revolving_image')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-image-filter-vintage"></i>

            <span class="nav-text">Revolving Image</span> 

          </a>



        </li>

        <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('view_slider')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-image-area"></i>

            <span class="nav-text">Sliders</span> 

          </a>



        </li>

        <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('view.reg')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-nature-people"></i>

            <span class="nav-text">User Registration</span> 

          </a>



        </li>

		

		    <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('userpointview')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-nature-people"></i>

            <span class="nav-text">User Point Update</span> 

          </a>



        </li>

		

		

		   <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('userbonuspointview')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-nature-people"></i>

            <span class="nav-text">User Bonus Point Update</span> 

          </a>



        </li>

		

		

        <li  class="has-sub active expand" >

          <a class="sidenav-item-link" href="{{ route('view.ticket')}}" data-toggle="" data-target=""

            aria-expanded="false" aria-controls="dashboard">

            <i class="mdi mdi-nature-people"></i>

            <span class="nav-text">Ticket</span> 

          </a>



        </li>


        <li  class="has-sub active expand" >

<a class="sidenav-item-link" href="{{ route('report')}}" data-toggle="" data-target=""

  aria-expanded="false" aria-controls="dashboard">

  <i class="mdi mdi-nature-people"></i>

  <span class="nav-text">Report</span> 

</a>



</li>



    </ul>



  </div>





          </div>

        </aside>