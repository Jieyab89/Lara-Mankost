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
    <div class="row justify-content-center">
        <div class="col-lg-12">
         <h1 style="text-align:center;">Report</h1>
         @if(!$hasData)
         <a href="{{ route('report.post') }}" class="btn btn-primary">Sett your date</a>
         @else
         @endif
         <p></p>
         <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Desc</th>
                <th scope="col">Date</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            @forelse($show as $c)
              <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->report_at }}</td>
                <td>{{ $c->created_at }}</td>
                <td>
                  <form action="{{ route('report.hapus', $c->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            </tbody>
            @empty
              <p style="text-align:center;color:red;">Opss... not found :(</p>
            @endforelse
          </table>
        </div>
      </div>
    </div>
</div>
@endsection
