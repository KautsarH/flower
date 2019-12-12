@extends('layouts.app1')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3 class="pb-4">Orders 
				</h3>
				<div class="float-right">
				</div>
				<table class="table">
					<tr>
						<th></th>
						<th>Order ID</th>
						<th>Status</th>
						<th></th>
					</tr>

					@foreach($orders as $order)
						<tr>
							<td>{{ $loop->iteration}} </td>
							<td>{{ $order->id }}</td>
							<td>
                                @if ($order->status == 0)
									Not Processed
								@else
									Completed
								@endif 
                            </td>
							<td>
								<div class="btn-group">
									<a href="{{ route('admin.order.edit', $order) }}" class="btn btn-success">
										{{ __('Edit') }}
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