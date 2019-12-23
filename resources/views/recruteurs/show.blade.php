@extends('layouts.header_footer')

@section('content_body')

@if(Auth::guard('candidat')->check())
  @include('layouts.navbar_candidat')

@elseif(Auth::guard('recruteur')->check())
  @include('layouts.navbar_recruteur')
@else
  @include('layouts.navbar_guest')
@endif
    <!-- Start home -->
    <section class="bg-half page-next-level new-Pad">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <div class="text-sm-center">
                            <img src="{{ asset($recruteur->logo) }}" alt="" class="img-fluid mx-md-auto d-block img-center">
                            <h4 class="mt-3"><a href="#" class="text-white">{{ $recruteur->nom }}</a></h4>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-3">
                                    <p class="text-white mb-0"><i class="mdi mdi-map-marker mr-2 "></i>{{ $recruteur->adresse }}</p>
                                </li>

                                <li class="list-inline-item">
                                    <p class="text-success mb-0"><i class="mdi mdi-bookmark-check mdi-18px mr-2"></i>Verified</p>
                                </li>
                            </ul>

                            <ul class="list-inline mb-2">
                                <li class="list-inline-item mr-3 ">
                                    <p class="text-wwhite"><i class="mdi mdi-earth mr-2"></i>{{ $recruteur->site_web }}</p>
                                </li>

                                <li class="list-inline-item mr-3">
                                    <p class="text-white"><i class="mdi mdi-email mr-2"></i>{{ $recruteur->email }}</p>
                                </li>

                                <li class="list-inline-item">
                                    <p class="text-white"><i class="mdi mdi-cellphone-iphone mr-2"></i>{{ $recruteur->tel }}</p>
                                </li>
                                @if(Auth::guard('candidat')->check())
                                <li class="list-inline-item">
                                    <button class="btn btn-primary pl-5 pr-5">Spontaner</button>
                                </li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- EMPLOYERS DETAILS START -->
    <section class="section ">
        <div class="container">

            @if(Auth::guard('recruteur')->id() == $recruteur->id)
              <div class="row border-bottom" id="{{$recruteur->id}}">
                <div class="col-6 p-0">
                  <p class="recruiter-switch text-center p-3">Mes offres</p>
                </div>
                <div class="col-6 p-0">
                  <p class="recruiter-switch text-center p-3 active">Statistiques</p>
                </div>
              </div>
            @endif


            <div class="row" id="offers" style="{{Auth::guard('recruteur')->id() == $recruteur->id ? 'display: none' : '' }}">
                <div class="col-lg-12 mt-4 pt-2">
                  @if( count($offers) )
                    <h4 class="mb-4">Offres de l'entreprise:</h4>
                    @foreach($offers as $offer)
                        <div class="job-list-box border rounded">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-2">
                                        <div class="company-logo-img">
                                            <img src="{{asset($offer->recruteur->logo)}}" style="height : 120px" class="img-fluid mx-auto d-block">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-9">
                                        <div class="job-list-desc">
                                            <h4 class="mb-2"><a href="{{url('offre/'.$offer->id)}}" class="text-dark">{{ $offer->intitule }}</a></h4>
                                            <p class="text-muted mb-2"><i class="mdi mdi-bank mr-2"></i>{{$offer->recruteur->nom}}</p>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item mr-3">
                                                    <p class="text-muted mb-0"><i class="mdi mdi-map-marker mr-2"></i>{{ $offer->lieu_de_travail }}</p>
                                                </li>

                                                <li class="list-inline-item">
                                                    <p class="text-muted mb-0"><i class="fas fa-chalkboard-teacher"></i> Experience : {{ $offer->annee_experience }} Ans</p>
                                                </li>

                                                <li class="list-inline-item">
                                                    <p class="text-muted mb-0"><i class="mdi mdi-clock-outline mr-2"></i>{{ $offer->updated_at->diffForHumans() }}</p>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="job-list-button-sm text-right">
                                            <span class="badge badge-success">Type : {{ $offer->type }}</span>

                                            <div class="mt-3">
                                                <a href="/offre/{{$offer->id}}" class="btn btn-sm btn-primary">Voir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                  @else
                  <h2 class="text-center text-muted m-5 p-5">Aucun offre n'est disponible</h2>
                  @endif
                </div>
              </div>
              @if(Auth::guard('recruteur')->id() == $recruteur->id)
              <input type="hidden" name="id_rec" value="{{$recruteur->id}}">
              <div class="row" id="statistics">
                <div class="col-12">
                  <h4>statistiques de l'entreprise:</h4>
                </div>

                <!-- LineChart -->
                <div class="offersStat">
                  <div class="row">
                    <div class="col-12">
                      <h6 class="text-muted mt-2 mb-2 pl-2 float-left">Nombre d'offres par année :</h6>
                      <form method="get" id="lineChartForm" class="float-right" action="">
                        <select name="line" class="form-control">
                          <option value="2019">2019</option>
                          <option value="2018">2018</option>
                      </select>
                      </form>
                    </div>
                  </div>
                  <div class="chart-wrapper">
                    <div class="row">
                      <div class="col-4">
                        <div class="inner-box">
                          <p class="text-primary">Total</p>
                          <h2 class="text-primary">255</h2>
                        </div>
                        <div class="inner-box">
                          <p class="text-primary">L'an 2019</p>
                          <h2 class="text-primary">12</h2>
                        </div>
                      </div>
                      <div class="col-8">
                        <canvas id="LineChart"  height="300"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- GroupedBarChart -->
                <div class="offersStat">
                  <div class="row">
                    <div class="col-12">
                      <h6 class="text-muted mt-2 mb-2 pl-2 float-left">Type d'offres par année :</h6>
                      <form method="get"  class="float-right" action="">
                        <select name="bar" class="form-control">
                          <option value="2019">2019</option>
                          <option value="2018">2018</option>
                      </select>
                      </form>
                    </div>
                  </div>
                  <div class="chart-wrapper">
                    <div class="row">
                      <div class="col-10">
                        <canvas id="GroupedBarChart"  height="300"></canvas>
                      </div>
                        <div class="col-2">
                          <div class="inner-box rd">
                            <p class="text-primary">Cdi</p>
                            <h4 class="text-primary">255</h4>
                          </div>
                          <div class="inner-box rd">
                            <p class="text-primary">Cdd</p>
                            <h4 class="text-primary">12</h4>
                          </div>
                          <div class="inner-box rd">
                            <p class="text-primary">Stage</p>
                            <h4 class="text-primary">12</h4>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>

                <!-- PieChart -->
                <div class="offersStat">
                  <div class="row">
                    <div class="col-12">
                      <h6 class="text-muted mt-2 mb-2 pl-2 float-left">nombre d'offre par année :</h6>
                      <form method="get" class="float-right" action="">
                        <select name="pie" class="form-control">
                          <option value="2019">2019</option>
                          <option value="2018">2018</option>
                      </select>
                      </form>
                    </div>
                  </div>
                  <div class="chart-wrapper">
                    <div class="row">
                      <div class="col-10">
                        <canvas id="PieChart"  height="300"></canvas>
                      </div>
                        <div class="col-2">
                          <div class="inner-box rd">
                            <p class="text-primary">Cdi</p>
                            <h4 class="text-primary">255</h4>
                          </div>
                          <div class="inner-box rd">
                            <p class="text-primary">Cdd</p>
                            <h4 class="text-primary">12</h4>
                          </div>
                          <div class="inner-box rd">
                            <p class="text-primary">Stage</p>
                            <h4 class="text-primary">12</h4>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>

              </div>
              @endif
    </section>
    <!-- EMPLOYERS DETAILS END -->

    <!-- subscribe start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="float-left position-relative notification-icon mr-2">
                        <i class="mdi mdi-bell-outline text-primary"></i>
                        <span class="badge badge-pill badge-danger">1</span>
                    </div>
                    <h5 class="mt-2 mb-0">Your Job Notification</h5>
                </div>
                <div class="col-lg-8 col-md-7 mt-4 mt-sm-0">
                    <form>
                        <div class="form-group mb-0">
                            <div class="input-group mb-0">
                                <input name="email" id="email" type="email" class="form-control" placeholder="Your email :" required="" aria-describedby="newssubscribebtn">
                                <div class="input-group-append">
                                    <button class="btn btn-primary submitBnt" type="submit" id="newssubscribebtn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe end -->
@include('layouts.footer')

@endsection
@if(Auth::guard('recruteur')->id() == $recruteur->id)
@section('scripts')
<script type="text/javascript" src="{{asset('assets/js/Chart.min.js')}}"></script>
<script>
    // |-> getting context

  let lineChart = document.getElementById('LineChart');
  let barChart = document.getElementById('GroupedBarChart');
  let PieChart = document.getElementById('PieChart');

    // |-> getting datas

  let lineData = @json($lineChart);
  let barData = @json($types);
  let pieData = @json($pieChart);
  let pieDataName = Array.from(Object.keys(pieData));
  let pieDataValues = Array.from(Object.values(pieData));


  Chart.defaults.global.defaultFontColor = '#333';
    // |-> initializing lineChart
  let line = new Chart(lineChart, {
      type: 'line',
      data: {
          labels: ['Jan', 'Fev', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil', 'Aout', 'Sept', 'Oct', 'Nov','Dec'],
          datasets: [{
              label: 'Offers ' ,
              data: lineData,
              backgroundColor: 'transparent',
              borderColor: '#2f55d4 ',
              borderWidth: 3
          },
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true,
                      stepSize: 1
                  }
              }]
          }
      }
  });

    // |-> initializing GroupedBarChart
  let groupedBar = new Chart(barChart, {
      type: 'bar',
      data: {
          labels: ['Jan', 'Fev', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil', 'Aout', 'Sept', 'Oct', 'Nov','Dec'],
          datasets: [ {
            label: "Cdi",
            backgroundColor: "#ffc0cb",
            data: barData['cdi']      //test values : [8,2,1,9,9,5,7,3,0,1,6,15]
        },
        {
            label: "Cdd",
            backgroundColor: "#2f55d4",
            data: barData['cdd']      //test values : [18,2,3,4,9,0,0,4,0,3,10,15]
        },
        {
            label: "Stage",
            backgroundColor: "#3338",
            data: barData['stage']
            // test values : [2,2,6,8,0,4,9,12,2,14,3,13]
        }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true,
                      stepSize: 1
                  }
              }]
          }
      }
  });

    // |-> initializing PieChart
  let pie = new Chart(PieChart, {
      type: 'pie',
      data: {
          labels: pieDataName,
          datasets: [{
              label: 'Offers ' ,
              data: pieDataValues,
              backgroundColor: [ 'pink' , '#202' , '#3338' , '#2f55d4' , '#FAA916' , '#FF1744' , '#0D1321' ],
              borderWidth: 3
          },
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true,
                      stepSize: 1
                  }
              }]
          }
      }
  });
</script>
@endsection
@endif
