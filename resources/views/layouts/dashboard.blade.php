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
          <a href="/dashboard"><li class="link"> Dashboard</li></a>
          <a href="/dashboard/offers"><li class="link">Offers</li> </a>
          <li class="link" data-toggle="collapse" data-target="#expand">Users <i class="fas fa-chevron-left fa-xs float-right"></i>

              <ul class="collapse nav-links" id="expand">
                <a href="/dashboard/candidates"><li class="sub-link">Candidates</li> </a>
                <a href="/dashboard/recruiters"><li class="sub-link">Recruiters </li></a>
              </ul>

          </li>
          <li class="link" data-toggle="collapse" data-target="#statistics">Statistics <i class="fas fa-chevron-left fa-xs float-right"></i>

              <ul class="collapse nav-links" id="statistics">
                <a href="{{ url('/dashboard/statistics/offers') }}"><li class="sub-link">Offers</li> </a>
                <a href="../dashboard/recruiters"><li class="sub-link">Recruiters </li></a>
              </ul>

          </li>
          <a href="../logout"><li class="link"> Logout</li> </a>
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
