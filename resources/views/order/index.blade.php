@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3 class="pb-4">Purchase History 
				</h3>
				<div class="float-right">

				</div>
				<table class="table">
					<tr>
						<th>No</th>
						<th>Order ID</th>
						<th>Total Price</th>
						<th>Status</th>
						<th>Show</th>
					</tr>
						@foreach($orders as $order)
						<tr>
							<td>{{ $loop->iteration}}</td>
							<td>{{ $order->id}}</td>
							<td>RM{{ $order->total }}</td>
							<td> 
								@if ($order->status == 0)
									Not Processed
								@else
									Completed
								@endif 
							</td>
							<td>
								<div class="btn-group">
									<a href="{{ route('order.show',$order) }}" class="btn btn-primary">
										{{ __('Show') }}
									</a>
								</div>
							</td>
						</tr>
					@endforeach
				</table>
				<div class="float-right">

				</div>
			</div>
		</div>
	</div>
@endsection