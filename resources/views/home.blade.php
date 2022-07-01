@extends('layouts.app')

@section('content')
<style>
  .space { margin-top: 16px; }
</style>
@if(!$hasData)
<div class="container">
 <div class="d-flex justify-content-center">
  <h1>Anda belum menyetting tanggal waktu laporan</h1>
 </div>
</div>
<p class="text-center" style="color:red">
    @forelse($show as $c) {{ $c->report_at->toDateString() }} 
    @empty Setting waktu laporan Anda dulu! <a href="{{ route('report') }}">klik disini</a> 
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
  <h4>Rekap laporan Anda selama perbulan</h4>
</div>
<p class="text-center">
  @forelse($show as $c) {{ $c->report_at }} 
  @empty Setting waktu laporan Anda dulu! <a href="{{ route('report') }}">klik disini</a> 
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
        <p>Pantau pengeluaran rekapan Anda secara berkala!</p>
        <p class="card-text">Rp. @currency($tot_recap_cost)</p>
        @if($tot_recap_cost == "0")
        <!-- SETT YOUR VALUE -->
        <small style="color:green">*Belum ada rekapan</small>
        <div class="space"></div>
        @elseif($tot_recap_cost < "0")
        <small style="color:red">*Anda tidak aman, kurangi pengeluaran! Fokus pemasukan dan nabung</small>
        <div class="space"></div>
        @else
        <small style="color:green">*Saldo Anda aman</small>
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
        <p>Setting target tabungan Anda (Belum ada rekapan)</p>
        <p class="card-text" style="color:green">Rp. @currency($tot_saves)</p>
        @elseif($tot_saves < $tot_cost)
        <p>Setting target tabungan Anda (Tabungan Anda terancam)</p>
        <p class="card-text" style="color:red">Rp. @currency($tot_saves)</p>
        @else
        <p>Setting target tabungan Anda (Tabungan Anda aman)</p>
        <p class="card-text" style="color:green">Rp. @currency($tot_saves)</p>
        @endif
        <a href="{{ route('saves') }}" class="btn btn-primary">Go somewhere</a>
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
          <small style="color:green">*Belum ada rekapan</small>
          <div class="space"></div>
          @elseif($balance < "0")
          <p class="card-text" style="color:red">Rp. @currency($balance)</p>
          <div class="space"></div>
          @else
          <p class="card-text" style="color:green">Rp. @currency($balance)</p>
          <div class="space"></div>
          @endif
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
@endif
@endsection
