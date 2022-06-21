@php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Cash.xls");
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
    <table>
		<tr>
            <th>No</th>
            <th>Keterangan</th>
            <th>Total</th>
            <th>Tanggal</th>
		</tr>
        @php $no = 1; @endphp
		@forelse ($cash_data as $row)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $row->name }}</td>
			<td>{{ $row->total }}</td>
		    <td>{{ $row->created_at }}</td>
		</tr>
		@empty
		<tr>
			<td colspan="5" class="text-center">Tidak ada data</td>
		</tr>	
        @endforelse
	</table>
    <p>Total : Rp. @currency($tot_cash)</p>
</body>