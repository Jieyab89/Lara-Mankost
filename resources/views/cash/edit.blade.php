@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success.up'))
          <div class="alert alert-success">
            {!! session('success.up') !!}
          </div>
      @endif
      @if(session('success.down'))
          <div class="alert alert-danger">
            {!! session('success.down') !!}
          </div>
    @endif
    <h2>cash</h2>
  <form action="{{ route('cash.update', $cash->id) }}" method="post">
    @csrf
    @method('post')
    <div class="form-group">
      <label for="exampleInputEmail1">Keterangan</label>
      <input type="text" name="name" class="form-control" aria-describedby="name" value="{{ $cash->name }}">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Total</label>
      <input type="number" name="total" class="form-control" aria-describedby="total" value="{{ $cash->total }}">
    </div>
    <button type="submit" class="btn btn-primary">Post</button>
  </form>
</div>
@endsection