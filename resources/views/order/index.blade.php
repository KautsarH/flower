@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3 class="pb-4">Address 
					<a href="{{ route('delivery.create') }}" 
						class="float-right btn btn-success">
						{{ __('Create New Address') }}
					</a>
				</h3>
				<div class="float-right">

				</div>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Phone</th>
					</tr>

					@foreach($deliveries as $delivery)
						<tr>
							<td>{{ $delivery->name }}</td>
							<td>{{ $delivery->phone_no }}</td>
							<td>
								<div class="btn-group">
									<a href="{{ route('delivery.show',$delivery) }}" class="btn btn-primary">
										{{ __('Show') }}
									</a>
									<a href="{{ route('delivery.edit', $delivery) }}" class="btn btn-success">
										{{ __('Edit') }}
									</a>
									<div class="btn btn-danger" onclick="
										if(confirm('Are you sure want to delete this record?')) {
											document.getElementById('delivery-{{ $delivery->id }}').submit();
										}
									">
										<form id="delivery-{{ $delivery->id }}" 
											action="{{ route('delivery.destroy', $delivery) }}" method="POST">
											@csrf @method('DELETE')
										</form>
										{{ __('Delete') }}
									</div>
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