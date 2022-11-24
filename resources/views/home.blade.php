@extends('layouts.app')

@section('content')

<style>
  .space { margin-top: 16px; }
</style>
@if(!$hasData)
<div class="container">
 <div class="d-flex justify-content-center">
  <h1>You have not set a report time date</h1>
 </div>
</div>
<p class="text-center" style="color:red">
    @forelse($show as $c) {{ $c->report_at->toDateString() }}
    @empty Set your report time first! <a href="{{ route('report') }}">Here</a>
    @endforelse
</p>
@else
<div class="container">
@if(session('success.down'))
   <div class="alert alert-danger">
      {!! session('success.down') !!}
   </div>
@endif
<div class="d-flex justify-content-center">
  <h4>Recap your report for the month</h4>
</div>
<p class="text-center">
  @forelse($show as $c) {{ $c->report_at }}
  @empty Set your report time first! <a href="{{ route('report') }}">Here</a>
  @endforelse
</p>
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Export
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ route('print.cash') }}">Export Cash</a>
    <a class="dropdown-item" href="{{ route('print.cost') }}">Export Cost</a>
    <a class="dropdown-item" href="{{ route('all') }}">Export All</a>
  </div>
</div>
<div class="col-md-12 bg-light text-right">
  <form action="{{ route('massdelete.all') }}" method="POST">
    @csrf
    @method('delete')
    <a href="{{ route('massdelete.all') }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
  </form>
</div>
<div class="space"></div>
<div class="row">
  <div class="col-sm-6">
    <div class="card text-black border-primary mb-3">
      <div class="card-body">
        <h2 class="card-title">Pemasukan/Cash</h2>
        <p class="card-text">Rp. @currency($tot_cash) </p>
        <a href="{{ route('cash') }}" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-black border-warning mb-3">
      <div class="card-body">
        <h2 class="card-title">Penguluaran/Cost</h2>
        <p class="card-text">Rp. @currency($tot_cost)</p>
        <a href="{{ route('cost') }}" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-black border-secondary mb-3">
      <div class="card-body">
        <h2 class="card-title">Cash terbesar/Cash strike</h2>
        <p class="card-text">Rp. @currency($tot_strike_cash)&nbsp;<i class="fa fa-caret-up" style='font-size:18px;color:green'></i></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-black border-secondary mb-3">
      <div class="card-body">
        <h2 class="card-title">Cost terbesar/Cost strike</h2>
        <p class="card-text">Rp. @currency($tot_strike_cost)&nbsp;<i class="fa fa-caret-up" style='font-size:18px;color:green'></i></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-black border-danger mb-3">
      <div class="card-body">
        <h2 class="card-title">Rekap pengeluaran/Cost recap</h2>
        <p>Keep track of your recap expenses regularly!</p>
        <p class="card-text">Rp. @currency($tot_recap_cost)</p>
        @if($tot_recap_cost == "0")
        <!-- SETT YOUR VALUE -->
        <small style="color:green">*No report</small>
        <div class="space"></div>
        @elseif($tot_recap_cost < "0")
        <small style="color:red">*You are insecure, spend less! Focus on income and saving</small>
        <div class="space"></div>
        @else
        <small style="color:green">*You are safe</small>
        <div class="space"></div>
        @endif
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-black border-danger mb-3">
      <div class="card-body">
        <h2 class="card-title">Nabung/Save money</h2>
        @if($tot_saves == "0")
        <p>Setting your savings target (No Report)</p>
        <p class="card-text" style="color:green">Rp. @currency($tot_saves)</p>
        @elseif($tot_saves < $tot_cost)
        <p>Setting your savings target (Your savings are risk)</p>
        <p class="card-text" style="color:red">Rp. @currency($tot_saves)</p>
        @else
        <p>Setting your savings target (Your savings are safe)</p>
        <p class="card-text" style="color:green">Rp. @currency($tot_saves)</p>
        @endif
        <a href="{{ route('saves') }}" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-black border-info mb-3">
      <div class="card-body">
        <h2 class="card-title">Pemasukan/Income Today</h2>
        <p class="card-text">Rp. @currency($tot_cash_today)</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-black border-info mb-3">
      <div class="card-body">
        <h2 class="card-title">Pengeluaran/Cost Today</h2>
        <p class="card-text">Rp. @currency($tot_cost_today)</p>
      </div>
    </div>
  </div>
 </div>
</div>
<div class="d-flex justify-content-center">
  <div class="col-sm-6">
      <div class="card text-black border-success mb-3">
        <div class="card-body">
          <h2 class="card-title">Sisa/Balance</h2>
          @if($balance == "0")
          <!-- SETT YOUR VALUE -->
          <small style="color:green">*No report</small>
          <div class="space"></div>
          @elseif($balance < "0")
          <p class="card-text" style="color:red">Rp. @currency($balance)&nbsp;<i class="fa fa-caret-down" style='font-size:18px;color:red'></i></p>
          <div class="space"></div>
          @else
          <p class="card-text" style="color:green">Rp. @currency($balance)
          @if($tot_cash_today)
            &nbsp;<i class="fa fa-caret-up" style='font-size:18px;color:green'></i> <br> <br> *There is income</p>
          @else
            &nbsp;<i class="fa fa-caret-down" style='font-size:18px;color:red'></i> <br> <br> *No income</p>
          @endif
          <div class="space"></div>
          @endif
        </div>
      </div>
    </div>
</div>
@if($get_totals_pie)
<div class="container">
  <div class="row">
    <h2>Graph</h2>
  </div>
  <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  <p><b>*Soon there is new graph chart</b></p>
</div>
@else
<div class="container">
  <div class="row">
    <h2>Graph</h2>
    <p>Opps you dont have report</p>
  </div>
</div>
@endif
<!--- ENDIF FOR CHART GRAPH --->
@endif
<!--- CHART PIE --->
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          @if($get_totals_pie)
            ['Task', 'Hours per Day'],
            ['CASH', {{ ($tot_cash/$get_totals_pie)*100 }} ],
            ['COST', {{ ($tot_cost/$get_totals_pie)*100 }} ],
            ['SAVINGS', {{ ($tot_saves/$get_totals_pie)*100 }} ],
          @else
            ['Task', 'Hours per Day'],
            ['CASH', 0 ],
            ['COST', 0 ],
            ['SAVINGS', 0 ],
          @endif
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
</script>
<!--- END CHART PIE --->
@endsection
