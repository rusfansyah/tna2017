<div class="panel-body">
Selamat datang di Menu Administrasi Larapus. Silahkan pilih menu administrasi yang diinginkan.
<hr>
<h4>Statistik Penulis</h4>
<canvas id="chartPenulis" width="400" height="150"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script>
  var data = {
    labels: ['jan', 'feb', 'mar'],

    datasets: [{
      data: [5, 4, 6]
    }]
  };

  var ctx = document.querySelector("#chartPenulis").getContext("2d");
  var authorChart = new Chart(ctx, {
    type: 'bar',
    data: data
  });
</script>
