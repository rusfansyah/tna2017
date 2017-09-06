@extends('layouts.app')

@section('content')
<div class="container">
  <div>
      {{-- <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Dashboard</h1>
          </div>
          <!-- /.col-lg-12 -->
      </div> --}}
      <!-- /.row -->
      <div class="row">
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-users fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{$jumlah_guru}}</div>
                              <div>Guru</div>
                          </div>
                      </div>
                  </div>
                  <a href="/guru">
                      <div class="panel-footer">
                          <span class="pull-left">Tampil</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-green">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-leanpub fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{$jumlah_mapel}}</div>
                              <div>Mapel yang diampu</div>
                          </div>
                      </div>
                  </div>
                  <a href="/lap_hasil/mapel">
                      <div class="panel-footer">
                          <span class="pull-left">Tampil</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-yellow">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-check-circle-o fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{$jumlah_ikut}}</div>
                              <div>Mapel yang pernah diikuti</div>
                          </div>
                      </div>
                  </div>
                  <a href="/lap_hasil/mapel_ikut">
                      <div class="panel-footer">
                          <span class="pull-left">Tampil</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-red">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-thumb-tack fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{$jumlah_butuh}}</div>
                              <div>Mapel yang dibutuhkan</div>
                          </div>
                      </div>
                  </div>
                  <a href="lap_hasil/mapel_butuh">
                      <div class="panel-footer">
                          <span class="pull-left">Tampil</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
          </div>
      </div>
      <!-- /.row -->
      <div class="row">
          <div class="col-lg-12">
              {{-- <div class="panel panel-default">
                  <div class="panel-heading">
                      <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                      <div class="pull-right">
                          <div class="btn-group">
                              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                  Actions
                                  <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                  <li><a href="#">Action</a>
                                  </li>
                                  <li><a href="#">Another action</a>
                                  </li>
                                  <li><a href="#">Something else here</a>
                                  </li>
                                  <li class="divider"></li>
                                  <li><a href="#">Separated link</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                      <div id="morris-area-chart"></div>
                  </div>
                  <!-- /.panel-body -->
              </div> --}}
              <!-- /.panel -->
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Jumlah Guru Seni Budaya
                      {{-- <div class="pull-right">
                          <div class="btn-group">
                              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                  Actions
                                  <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                  <li><a href="#">Action</a>
                                  </li>
                                  <li><a href="#">Another action</a>
                                  </li>
                                  <li><a href="#">Something else here</a>
                                  </li>
                                  <li class="divider"></li>
                                  <li><a href="#">Separated link</a>
                                  </li>
                              </ul>
                          </div>
                      </div> --}}
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                      <div class="row">
                          <div class="col-lg-4">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                  <thead>
                                    <tr>
                                      <td>JENJANG</td>
                                      <td>JUMLAH GURU</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($guru as $guru)
                                    <tr>
                                      <td>{{$guru->jenjang}}</td>
                                      <td>{{$guru->jumlah}}</td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.table-responsive -->
                          </div>
                          <!-- /.col-lg-4 (nested) -->
                          <div class="col-lg-8">

                               <canvas id="chartJenjang" width="400" height="180"></canvas>
                          </div>
                          <!-- /.col-lg-8 (nested) -->
                      </div>
                      <!-- /.row -->
                  </div>
                  <!-- /.panel-body -->
              </div>
              <!-- /.panel -->

              <!-- /.panel -->
          </div>
          <!-- /.col-lg-8 -->

          <!-- /.col-lg-4 -->
      </div>
      <!-- /.row -->
  </div>
</div>


@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script>
var data = {
  labels: {!! json_encode($jenjangs) !!},

  datasets: [{
    label: 'Guru Seni Budaya',
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

  var ctx = document.getElementById("chartJenjang").getContext("2d");
  var authorChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
  });
</script>
@endsection
