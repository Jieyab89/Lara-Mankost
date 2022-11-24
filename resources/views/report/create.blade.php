@extends('layouts.app')

@section('content')

<style>
  .ui-datepicker {
   background: black;
   border: 1px solid #555;
   color: white;
}

</style>
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
   <h2>Report</h2>
  <form action="{{ route('report.send') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="form-group">
      <label for="exampleInputEmail1">Desc</label>
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label class="control-label" for="date">Date</label>
        <input class="form-control" id="datepicker" name="report_at" placeholder="YY/MM/DD" type="text"/>
    </div>
    <button type="submit" class="btn btn-primary">Post</button>
  </form>
  <p></p>
  <p style="color:red">*Delete "." in currency</p>
</div>
<script>
   $('#datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        showAnim: 'slideDown',
        duration: 'fast',
        yearRange: new Date().getFullYear() + ':' + new Date().getFullYear(),
    });
</script>
@endsection
