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
          <li class="link">Logout</li>
        </ul>
      </nav>

      <!-- page Content -->
      <div id="dash-content">
        <div class="content-header">
          <i class="fas fa-bars fa-2x ml-2" id="toggle-menu"></i>
          <h4>Dashboard</h4>
        </div>
        <div class="container">
          <div class="row">

            <!-- statistics box -->
            <div class="col-4">
              <div class="dash-box rounded">
                <p class="box-title">Users</p>
                <span class="box-statistic">92,512</span>
                <i class="fas fa-users fa-2x float-right"></i>
                <div class="box-percentage rounded">
                  <div class="box-fill rounded"></div>
                </div>
                <p class="percentage float-right">100 %</p>
              </div>
            </div>


            <!-- statistics box -->
            <div class="col-4">
              <div class="dash-box rounded">
                <p class="box-title">Candidats</p>
                <span class="box-statistic">92,512</span>
                <i class="fas fa-user-tie fa-2x float-right"></i>
                <div class="box-percentage rounded">
                  <div class="box-fill rounded"></div>
                </div>
                <p class="percentage float-right">100 %</p>
              </div>
            </div>


            <!-- statistics box -->
            <div class="col-4">
              <div class="dash-box rounded">
                <p class="box-title">Recruiters</p>
                <span class="box-statistic">92,512</span>
                <i class="fas fa-building fa-2x float-right"></i>
                <div class="box-percentage rounded">
                  <div class="box-fill rounded"></div>
                </div>
                <p class="percentage float-right">100 %</p>
              </div>
            </div>


            <!-- statistics box -->
            <div class="col-4">
              <div class="dash-box rounded">
                <p class="box-title">Earning</p>
                <span class="box-statistic">92,512</span>
                <i class="fas fa-dollar-sign fa-2x float-right"></i>
                <div class="box-percentage rounded">
                  <div class="box-fill rounded"></div>
                </div>
                <p class="percentage float-left">Total</p>
                <p class="percentage float-right">100 %</p>
              </div>
            </div>





            <!-- statistics box -->
            <div class="col-4">
              <div class="dash-box rounded">
                <p class="box-title">Earnings</p>
                <span class="box-statistic">92,512</span>
                <i class="fas fa-dollar-sign fa-2x float-right"></i>
                <div class="box-percentage rounded">
                  <div class="box-fill rounded"></div>
                </div>
                <p class="percentage float-left">This week</p>
                <p class="percentage float-right">100 %</p>
              </div>
            </div>


          </div>
        </div>
      </div>


    </section>


@endsection
