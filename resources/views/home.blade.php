@extends('layouts.app')

@section('content')
<div class="container">
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
 </div>
</div>
<div class="d-flex justify-content-center">
  <div class="col-sm-6">
      <div class="card text-black border-success mb-3">
        <div class="card-body">
          <h2 class="card-title">Sisa/Balance</h2>
          <p class="card-text" style="color:red">Rp. @currency($balance)</p>
        </div>
      </div>
    </div>
</div>
<div class="container">
  <div class="row">
    <h2>Graph</h2>
    <p>Soon</p>
  </div>
</div>

@endsection
