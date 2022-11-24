@php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=all.xls");
@endphp

@extends('layouts.app')

@section('content')
<style>
  .space { margin-top: 16px; }
</style>
<div class="container">
<p class="text-center" style="color:red">
  @forelse($show as $c) {{ $c->report_at }}
  @empty Setting your date first! <a href="{{ route('report') }}">Here</a>
  @endforelse
</p>
<div class="space"></div>
<div class="row">
  <div class="col-sm-6">
    <div class="card text-black border-primary mb-3">
      <div class="card-body">
        <h2 class="card-title">Pemasukan/Cash</h2>
        <p class="card-text">Rp. @currency($tot_cash) </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-black border-warning mb-3">
      <div class="card-body">
        <h2 class="card-title">Penguluaran/Cost</h2>
        <p class="card-text">Rp. @currency($tot_cost)</p>
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
        @if($tot_recap_cost < "$tot_saves")
        <!-- SETT YOUR VALUE -->
        <small style="color:red">*Your balance is not safe, reduce expenses! And focus on saving</small>
        <div class="space"></div>
        @elseif($tot_saves < "0")
        <small style="color:green">*No report</small>
        <div class="space"></div>
        @else
        <small style="color:green">*Your balance are safe</small>
        <div class="space"></div>
        @endif
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-black border-danger mb-3">
      <div class="card-body">
        <h2 class="card-title">Nabung/Save money</h2>
        <p>Target for saving/Set your target for saving money</p>
        <p class="card-text">Rp. @currency($tot_saves)</p>
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
@endsection
