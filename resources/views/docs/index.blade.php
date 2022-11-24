@extends('layouts.app')

@section('content')

<style>
  .chart {
  width: 100%;
  min-height: 450px;
  }
  .row {
  margin:0 !important;
  }
</style>
<div class="container">
  <div class="container">
    <h1 class="display-4">Welcome to {{ config('app.name', 'Laravel') }}</h1>
    <p class="lead">Simple web app for management your money or on your kost. Monitoring your money with {{ config('app.name', 'Laravel') }}</p>
    <p>Thanks for using this apps :D</p>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </div>
  <p></p>
  <h2>Soon will update</h2>
  <ul>
    <li>Add more chart</li>
    <li>Add more features</li>
    <li>Add more algorithm</li>
  </ul>
  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Start {{ config('app.name', 'Laravel') }}</h5>
          <p class="card-text">Monitoring ypur cashout</p>
          <a href="{{ route('home') }}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update {{ config('app.name', 'Laravel') }}</h5>
          <p class="card-text">Read the doc</p>
          <a href="{{ route('update') }}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Contribution {{ config('app.name', 'Laravel') }}</h5>
          <p class="card-text">Read the doc</p>
          <a href="{{ route('contrib') }}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Make a cash</h5>
          <p class="card-text">Read the doc</p>
          <a href="{{ route('make.cash') }}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Make a cost</h5>
          <p class="card-text">Read the doc</p>
          <a href="{{ route('make.cost') }}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Symbol Mean</h5>
          <p class="card-text">Read the doc</p>
          <a href="{{ route('symbol') }}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--- CHART CURVE --->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Cash', 'Cost'],
          ['Sunday', 10000, 4000],
          ['Monday', 11000, 4600],
          ['Tuesday', 800000, 1120],
          ['Wednesday', 10000, 19000],
          ['Thursday', 50000, 25000],
          ['Friday', 200000, 120000],
          ['Saturday', 12000, 4000]
        ]);

        var options = {
          title: 'Monitoring Graph',
          curveType: 'function',
          legend: { position: 'bottom' },
          'width':'80%',
        };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);

        $(window).smartresize(function ()
        {
          chart.draw(data, options);
        });
      }
</script>
<!--- END CHART CURVE --->

<!--- CHART PIE --->
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['CASH',     11],
          ['COST',      2],
          ['SAVINGS',  2],
        ]);

        var options = {
          title: 'My cashout',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
</script>
<!--- END CHART PIE --->
@endsection
