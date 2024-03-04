@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-bell" style="font-size:22px;color:green"></i> Reminder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @forelse ($reminder_data as $r)
          <ul>
            <li>{{ $r->remind_name }}</li>
          </ul>
        @empty
        @endforelse
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#historymodal">
          View History
        </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal 2 -->
<div class="modal fade" id="historymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="historymodal"><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="font-size:22px;color:green"></i>History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @forelse ($history_data as $h)
          <ul>
            <li>{{ $h->name_bank }} : @currency($h->total) </li>
          </ul>
        @empty
        @endforelse
      </div>
      <div class="modal-footer">
        <a href="{{ route('history') }}" class="btn btn-primary" role="button" aria-pressed="true">Detail</a>
      </div>
    </div>
  </div>
</div>
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
    <a class="dropdown-item" href="{{ route('print.history') }}">Export History</a>
    <a class="dropdown-item" href="{{ route('all') }}">Export All</a>
  </div>
</div>
<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Menu
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ route('report') }}">Make Report</a>
    <a class="dropdown-item" href="{{ route('reminders') }}">Make Reminder</a>
    <a class="dropdown-item" href="{{ route('history') }}">Make History</a>
    <a class="dropdown-item" href="{{ route('index') }}">Back Home</a>
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
  <div id="piechart_3d" style="width: 1000px; height: 500px;"></div>
  <div id="curve_chart" style="width: 1000px; height: 500px"></div>
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

<!--- CHART CURVE --->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
     
      function drawChart() {
        var data = new google.visualization.DataTable();
        @if($get_totals_pie)
          data.addColumn('date', 'Tanggal');
          data.addColumn('number', 'Cash');
          data.addColumn('number', 'Cost');
          data.addColumn('number', 'Savings');

          data.addRows([
            @foreach($daily_data as $date => $data)
            [new Date('{{ $date }}'), {{ $data['cash'] }}, {{ $data['cost'] }}, {{ $data['saves'] }}],
            @endforeach
          ]);
        @else 
          var data = google.visualization.arrayToDataTable([
            ['Date', 'Cash', 'Cost'],
            ['Sunday', 0, 0],
            ['Monday', 0, 0],
           ]);
        @endif

        var options = {
          title: 'Cash and Cost Recap',
          curveType: 'function',
          legend: { position: 'bottom' }
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

<!--- BEGIN MODAL --->
<script>
    $('#myModal').modal('show');
</script>
<!--- END MODAL --->

@endsection
