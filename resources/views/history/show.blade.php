@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3>Purchase Details</h3>
				<div class="float-right pb-3">
				</div>
				<table class="table">
					<tr>
						<th>Order ID</th>
						<td>{{ $history->id }}</td>
					</tr>
					 <tr>
						<th>Status</th>
						<td>{{ $history->status }}</td>
					</tr>
                    <tr>
						<th>Time</th>
						<td>{{ $history->time }}</td>
					</tr>
					<tr>
						<th>Order date</th>
						<td>{{ $history->order_date }}</td>
					</tr>
					<tr>
						<th>Deliver date</th>
						<td>{{ $history->deliver_date }}</td>
					</tr>
					<tr>
						<th>Payment</th>
						<td>{{ $history->payment }}</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>{{ $history->longitude }}</td>
					</tr>
					<tr>
						<th>Occassion</th>
						<td>{{ $history->occasion_id }}</td>
					</tr>
					<tr>
						<th>Product</th>
						<td>{{ $history->occasion_id }}</td>
					</tr>
					<tr>
						<th>Quantity</th>
						<td>{{ $history->occasion_id }}</td>
					</tr>
				</table>
				<a href="{{ route('history.index') }}" class="btn btn-default">
					Back
				</a>
			</div>
		</div>
	</div>
@endsection