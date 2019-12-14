@extends('layouts.header_footer')

@section('content_body')

<section class="" id="dashboard-wrapper">

      <!-- sideBar  -->
      <nav class="navigation ">
        <div class="user">
          <img src="{{asset('assets/images/img-4.jpg')}}" class="rounded-circle">
          <p class="name">Sofiane bk</p>
        </div>
        <p class="nav-header">MAIN NAVIGATION :</p>
        <ul class="nav-links">
          <li class="link">Dashboard</li>
          <li class="link">offers</li>
          <li class="link" data-toggle="collapse" data-target="#expand">Users <i class="fas fa-chevron-left fa-xs float-right"></i>

              <ul class="collapse nav-links" id="expand">
                <li class="sub-link">Candidats</li>
                <li class="sub-link">Recruiters</li>
              </ul>

          </li>
          <li class="link"> <a href="#">Logout</a> </li>
        </ul>
      </nav>

      <!-- page Content -->
      <div id="dash-content">
        <div class="content-header">
          <i class="fas fa-bars fa-2x ml-2" id="toggle-menu"></i>
          <h4>Dashboard</h4>
        </div>
        @yield('dash_content')

      </div>


    </section>


@endsection
