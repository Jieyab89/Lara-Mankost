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
    <h2>Reminder Edit</h2>
  <form action="{{ route('reminders.update', $reminder->id) }}" method="post">
    @csrf
    @method('post')
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <textarea id="remind_name" type="text" class="form-control @error('remind_name') is-invalid @enderror" name="remind_name" value="{{ old('remind_name') }}" required autocomplete="remind_name"  rows="5" autofocus>{{ $reminder->remind_name }}</textarea>
        @error('remind_name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Post</button>
  </form>
</div>
@endsection
