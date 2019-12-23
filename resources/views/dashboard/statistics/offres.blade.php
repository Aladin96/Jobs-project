@extends('layouts.dashboard')

@section('dash_content')
<div class="container">

      <!-- LineChart -->
      <div class="statistics-wrapper mb-4">
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
    <div class="row">
      <!-- GroupedBarChart -->
      <div class="col-8">
        <div class="statistics-wrapper">
          <h5 class="text-white mt-1 ml-2 mb-0 border-b">Offers charts & lorem ipsum</h5>
          <div class="statistics">
                <canvas id="GroupedBarChart" height="300"></canvas>
            </div>
          </div>
        </div>

      <!-- PieChart -->
      <div class="col-4">
        <div class="statistics-wrapper">
          <h5 class="text-white mt-1 ml-2 mb-0 border-b">Offers charts & lorem ipsum</h5>
          <div class="statistics">
            <div class="row">
              <div class="col-12">
                <canvas id="PieChart" height="300"></canvas>
              </div>
            </div>
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
let barChart = document.getElementById('GroupedBarChart');
let PieChart = document.getElementById('PieChart');

// |-> getting datas

let lineData = @json($lineData);
let barData = @json($barData);
let pieData = @json($pieChart);
let pieDataName = Array.from(Object.keys(pieData));
let pieDataValues = Array.from(Object.values(pieData));

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
// |-> initializing GroupedBarChart
let groupedBar = new Chart(barChart, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Fev', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil', 'Aout', 'Sept', 'Oct', 'Nov','Dec'],
        datasets: [ {
          label: "Cdi",
          backgroundColor: "#fffc",
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
          data: barData['stage'] // test values : [2,2,6,8,0,4,9,12,2,14,3,13]
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
