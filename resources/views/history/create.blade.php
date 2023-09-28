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
  <h2>History</h2>
  <form action="{{ route('history.send') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="form-group">
      <label for="exampleInputEmail1">Name Bank</label>
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name_bank" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Ammount</label>
      <input id="ammount" type="number" class="form-control @error('ammount') is-invalid @enderror" name="ammount" value="{{ old('ammount') }}" required autocomplete="ammount" autofocus>
        @error('ammount')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Post</button>
  </form>
  <p></p>
  <p style="color:red">*Delete "." in currency</p>
</div>
@endsection
