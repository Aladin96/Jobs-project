@extends('layouts.dashboard')

@section('dash_content')


    <div class="container">
          <div class="row">

            <!-- statistics box -->
            <div class="col-4">
              <div class="dash-box rounded">
                <p class="box-title">Users</p>
                <span class="box-statistic">{{$data['users']}}</span>
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
                <p class="box-title">Candidates</p>
                <span class="box-statistic">{{$data['candidates']}}</span>
                <i class="fas fa-user-tie fa-2x float-right"></i>
                <div class="box-percentage rounded">
                  <div class="box-fill rounded" style="width:{{$data['c_rate'].'%'}}"></div>
                </div>
                <p class="percentage float-right">{{$data['c_rate'].' %'}}</p>
              </div>
            </div>


            <!-- statistics box -->
            <div class="col-4">
              <div class="dash-box rounded">
                <p class="box-title">Recruiters</p>
                <span class="box-statistic">{{$data['recruiters']}}</span>
                <i class="fas fa-building fa-2x float-right"></i>
                <div class="box-percentage rounded">
                  <div class="box-fill rounded" style="width:{{$data['r_rate'].'%'}}"></div>
                </div>
                <p class="percentage float-right">{{$data['r_rate'].' %'}}</p>
              </div>
            </div>


            <!-- statistics box -->
            <div class="col-4">
              <div class="dash-box rounded">
                <p class="box-title">Earning</p>
                <span class="box-statistic">{{$data['earnings']}}</span>
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
                <span class="box-statistic">Nan</span>
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



@endsection
