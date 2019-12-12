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
						<td>{{ $orderProduct->id }}</td>
					</tr>
					 <tr>
						<th>Status</th>
						<td>{{ $orderProduct->status }}</td>
					</tr>
                    <tr>
						<th>Time</th>
						<td>{{ $orderProduct->time }}</td>
					</tr>
					<tr>
						<th>Order date</th>
						<td>{{ $orderProduct->order_date }}</td>
					</tr>
					<tr>
						<th>Deliver date</th>
						<td>{{ $orderProduct->deliver_date }}</td>
					</tr>
					<tr>
						<th>Payment</th>
						<td>{{ $orderProduct->payment }}</td>
					</tr>
					<!-- <tr>
						<th>Address</th>
						<td>{{ $orderProduct->address }}</td>
					</tr>
					<tr>
						<th>Occassion</th>
						<td>{{ $orderProduct->occasion_id }}</td>
					</tr> -->
					<!-- <tr>
						<th>Product</th>
						<td>{{ $orderProduct->occasion_id }}</td>
					</tr> -->
					<!-- <tr>
						<th>Quantity</th>
						<td>{{ $orderProduct->occasion_id }}</td>
					</tr> -->
				</table>
				<a href="{{ route('history.index') }}" class="btn btn-default">
					Back
				</a>
			</div>
		</div>
	</div>
@endsection