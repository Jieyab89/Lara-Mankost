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
    <p class="lead">Simple web app for management your transcation and money. Monitoring your transcation with {{ config('app.name', 'Laravel') }}</p>
    <p>Thanks for using this apps :D</p>
  </div>
  <p></p>
  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Start {{ config('app.name', 'Laravel') }}</h5>
          <p class="card-text">Monitoring your cashout</p>
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
          <h5 class="card-title">Icon Mean</h5>
          <p class="card-text">Read the doc</p>
          <a href="{{ route('symbol') }}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
  </div>
</div>
@endsection
