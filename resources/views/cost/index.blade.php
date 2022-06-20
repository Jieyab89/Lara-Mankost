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
         <h1 style="text-align:center;">Cost</h1>
         <a href="{{ route('cost.post') }}" class="btn btn-primary">Buat laporan baru</a>
         <p></p>
         <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Keterangan</th>
                <th scope="col">Total</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            @forelse($cost as $c)
              <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->total }}</td>
                <td>{{ $c->created_at }}</td>
                <td>
					<div><a class="btn btn-primary btn-sm" href="{{ route('cost.edit', $c->id) }}"><i class="fa fa-edit"></i></a></div>
				</td>
                <td>
                <form action="{{ route('cost.hapus', $c->id) }}" method="POST">
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
        <span class="badge badge-success">Rp. @currency($tot_cost)</span>
      </div>
    </div>
    <p></p>
    {{ $cost->links() }}
</div>
@endsection