@extends('layouts.dashboard')

@section('dash_content')
<div class="container">
  <div class="chart-section jumbotron p-2 m-5" style="margin-bottom:0!important;background:#fff">
    <canvas id="myChart" style="height:500px"></canvas>
  </div>


  <form method="get" id="chart-form" class="chart-form" action="{{ url('/dashboard/statistics/offers') }}">
    <select name="q" class="form-control">
    @foreach($all_years as $y)
      <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>{{ $y }}</option>
    @endforeach
  </select>
  </form>
  <div class="month">
    <month style="display:none">{{ $janvier }}</month>
    <month style="display:none">{{ $fevrier }}</month>
    <month style="display:none">{{ $mars }}</month>
    <month style="display:none">{{ $avril }}</month>
    <month style="display:none">{{ $mai }}</month>
    <month style="display:none">{{ $juin }}</month>
    <month style="display:none">{{ $juillet }}</month>
    <month style="display:none">{{ $aout }}</month>
    <month style="display:none">{{ $septembre }}</month>
    <month style="display:none">{{ $octobre }}</month>
    <month style="display:none">{{ $novembre }}</month>
    <month style="display:none">{{ $decembre }}</month>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('assets/js/Chart.min.js')}}"></script>
<script>

var ctx = document.getElementById('myChart');
var data = [];
var i;

for (i=0; i<12; i++){
  let offers = parseInt(document.getElementsByTagName('month')[i].textContent);
  data.push(offers);
}
Chart.defaults.global.defaultFontColor = '#333'
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre','Decembre'],
        datasets: [{
            label: 'Offers ' + {{$year}},
            data: data,
            backgroundColor: 'transparent',
            borderColor: '#FF6384',
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
