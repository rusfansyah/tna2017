@extends('layouts.app')
{{-- @section('content') --}}
 @section('content')
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="panel panel-default">
           <div class="panel-heading">JUMLAH MAPEL DIKLAT YANG DIBUTUHKAN GURU</div>
           <div class="panel-body">
             <canvas id="chart" width="600" height="300"></canvas>
           </div>
         </div>
       </div>
     </div>
   </div>
  @endsection

{{-- @endsection --}}
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script>
var data = {
  labels: {!! json_encode($mapels) !!},

  datasets: [{
    label: 'Jumlah Mapel Diklat yang Dibutuhkan Guru',
    data: {!! json_encode($jumlahs) !!},
    backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
  }]
};
  var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          stepSize: 1
        }
      }]
    }
  };

  // Define a plugin to provide data labels
          Chart.plugins.register({
              afterDatasetsDraw: function(chart, easing) {
                  // To only draw at the end of animation, check for easing === 1
                  var ctx = chart.ctx;

                  chart.data.datasets.forEach(function (dataset, i) {
                      var meta = chart.getDatasetMeta(i);
                      if (!meta.hidden) {
                          meta.data.forEach(function(element, index) {
                              // Draw the text in black, with the specified font
                              ctx.fillStyle = 'rgb(0, 0, 0)';

                              var fontSize = 16;
                              var fontStyle = 'normal';
                              var fontFamily = 'Helvetica Neue';
                              ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                              // Just naively convert to string for now
                              var dataString = dataset.data[index].toString();

                              // Make sure alignment settings are correct
                              ctx.textAlign = 'center';
                              ctx.textBaseline = 'middle';

                              var padding = 5;
                              var position = element.tooltipPosition();
                              ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
                          });
                      }
                  });
              }
          });

  var ctx = document.getElementById("chart").getContext("2d");
  var authorChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
  });
</script>
@endsection
