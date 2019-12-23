@extends('layouts.dashboard')

@section('dash_content')
<div class="container">

      <!-- LineChart -->
      <div class="statistics-wrapper">
        <form class="year-form">
          <select name="line">
            <option value="">2019</option>
          </select>
        </form>
        <h5 class="text-white mt-1 ml-2 mb-0 border-b">Offers charts & lorem ipsum</h5>
        <div class="statistics">
          <div class="row">
            <div class="col-2 pr-0">
              <div class="nbr-statistics">
                <h2 class="border-b">256</h2>
                <h2>256</h2>
              </div>
            </div>
            <div class="col-10 pl-0">
              <canvas id="LineChart" height="300"></canvas>
            </div>
          </div>
        </div>
      </div>








</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('assets/js/Chart.min.js')}}"></script>
<script>

// |-> getting context

let lineChart = document.getElementById('LineChart');


// |-> getting datas

let lineData = @json($lineData);


Chart.defaults.global.defaultFontColor = "#fff";
// |-> initializing lineChart
let myChart = new Chart(lineChart, {
    type: 'line',
    data: {
        labels: ['Jan', 'Fev', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil', 'Aout', 'Sept', 'Oct', 'Nov','Dec'],
        datasets: [{
            label: 'Offers ',
            data: lineData,
            backgroundColor: '#fff2',
            borderColor: '#fff',
            borderWidth: 3
        },
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
        scales: {
            yAxes: [{
                gridLines: {
                  drawOnChartArea: false
                } ,
                ticks: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }],
            xAxes: [{
              gridLines: {
                drawOnChartArea: false
            }
          }],
        }
    }
});

</script>
@endsection
