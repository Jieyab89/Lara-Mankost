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
         <h1 style="text-align:center;">Reminder</h1>
         <a href="{{ route('reminders.post') }}" class="btn btn-primary">Create a Report</a>
         <p></p>
         <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @forelse($reminder as $r)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $r->remind_name }}</td>
                <td>{{ $r->created_at->toDateString() }}</td>
                <td>
					        <div><a class="btn btn-primary btn-sm" href="{{ route('reminders.edit', $r->id) }}"><i class="fa fa-edit"></i></a></div>
				        </td>
                <td>
                  <form action="{{ route('reminders.hapus', $r->id) }}" method="POST">
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
    {{ $reminder->links() }}
    <div class="col-md-12 bg-light text-right">
      <form action="{{ route('massdelete.reminders') }}" method="POST">
        @csrf
        @method('delete')
        <a href="{{ route('massdelete.reminders') }}" class="btn btn-danger"><i class="fa fa-trash"></i></a> *Delete all
      </form>
    </div>
</div>
@endsection
