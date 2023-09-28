@extends('layouts.app')

@section('content')
@if(!$hasData)
<div class="container">
 <div class="d-flex justify-content-center">
  <h1>You have not set a report time date</h1>
 </div>
</div>
@else
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
         <h1 style="text-align:center;">History</h1>
         <a href="{{ route('history.post') }}" class="btn btn-primary">Create a Report</a>
         <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Bank</th>
                <th scope="col">Ammount</th>
                <th scope="col">Date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @forelse($history as $h)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $h->name_bank }}</td>
                <td>@currency($h->total)</td>
                <td>{{ $h->created_at->toDateString() }}</td>
                <td>
					        <div><a class="btn btn-primary btn-sm" href="{{ route('history.edit', $h->id) }}"><i class="fa fa-edit"></i></a></div>
				        </td>
                <td>
                  <form action="{{ route('history.hapus', $h->id) }}" method="POST">
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
    <p></p>
    {{ $history->links() }}
    <div class="col-md-12 bg-light text-right">
      <form action="{{ route('massdelete.history') }}" method="POST">
        @csrf
        @method('delete')
        <a href="{{ route('massdelete.history') }}" class="btn btn-danger"><i class="fa fa-trash"></i></a> *Delete all
      </form>
    </div>
</div>
@endif
@endsection
