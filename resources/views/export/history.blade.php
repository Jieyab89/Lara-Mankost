@php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=History.xls");
@endphp
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
    <center>
      <h1>Cash</h1>
    </center>
	<p class="text-center" style="color:red">
		@forelse($show as $c) {{ $c->report_at }}
		@empty Sett your date first! <a href="{{ route('report') }}">Here</a>
		@endforelse
	</p>
    <table>
		<tr>
			<th>No</th>
			<th>Desc</th>
			<th>Total</th>
			<th>Date</th>
		</tr>
        @php $no = 1; @endphp
		@forelse ($history_data as $row)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $row->name_bank }}</td>
            <td>{{ $row->total }}</td>
		    <td>{{ $row->created_at }}</td>
		</tr>
		@empty
		<tr>
			<td colspan="5" class="text-center">No data</td>
		</tr>
        @endforelse
	</table>
</body>
