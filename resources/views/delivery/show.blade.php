@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3>Address Details</h3>
				<div class="float-right pb-3">
					<a href="{{ route('delivery.edit', $delivery) }}" class="btn btn-success">
						Edit
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
				<table class="table">
					<tr>
						<th>Name</th>
						<td>{{ $delivery->name }}</td>
					</tr>
					<tr>
						<th>Phone Number</th>
						<td>{{ $delivery->phone_no }}</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>{{ $delivery->address}}</td>
					</tr>
                    <tr>
						<th>Latitude</th>
						<td>{{ $delivery->latitude }}</td>
					</tr>
					<tr>
						<th>Longitude</th>
						<td>{{ $delivery->longitude}}</td>
					</tr>
				</table>
				<a href="{{ route('delivery.index') }}" class="btn btn-default">
					Back
				</a>
			</div>
		</div>
	</div>
@endsection