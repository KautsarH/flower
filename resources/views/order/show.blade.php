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
						<td>{{ $order->id }}</td>
					</tr>
					 <tr>
						<th>Status</th>
						<td>@if ($order->status == 0)
									Not Processed
								@else
									Completed
								@endif </td>
					</tr>
                    <tr>
						<th>Time</th>
						<td>{{ $order->time }}</td>
					</tr>
					<tr>
						<th>Order date</th>
						<td>{{ $order->order_date }}</td>
					</tr>
					<tr>
						<th>Deliver date</th>
						<td>{{ $order->deliver_date }}</td>
					</tr>
					<tr>
						<th>Payment</th>
						<td>{{ $order->payment }}</td>
					</tr>
					<!-- <tr>
						<th>Address</th>
						<td>{{ $order->address }}</td>
					</tr>
					<tr>
						<th>Occassion</th>
						<td>{{ $order->name }}</td>
					</tr> -->
					<!-- <tr>
						<th>Product</th>
						<td>{{ $order->occasion_id }}</td>
					</tr> -->
					<!-- <tr>
						<th>Quantity</th>
						<td>{{ $order->occasion_id }}</td>
					</tr> -->
				</table>
				<a href="{{ route('order.index') }}" class="btn btn-default">
					Back
				</a>
			</div>
		</div>
	</div>
@endsection