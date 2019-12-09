@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3>{{ __('Address Details') }}</h3>
				<form action="{{ route('delivery.update', $delivery) }}" method="POST">
					{{-- enctype="multipart/form-data" --}}
					@csrf 
					{{-- <input type="hidden" name="_token" value="3412345ysdf"> --}}
					@method('PUT')
					{{-- <input type="hidden" name="_method" value="PUT"> --}}
					<table class="table">
						<tr>
							<th>Name</th>
							<td>
								<input class="form-control @error('name') border border-danger @enderror" 
									type="text" name="name" 
									value="{{ $delivery->name }}">

								@error('name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</td>
						</tr>
						<tr>
							<th>Phone Number</th>
							<td>
								<input class="form-control" 
									type="text" name="phone_no" value="{{ $delivery->phone_no }}">
							</td>
						</tr>
						<tr>
							<th>Latitude</th>
							<td>
								<input class="form-control" 
									type="text" name="latitude" value="{{ $delivery->latitude }}">
							</td>
						</tr>
						<tr>
							<th>Longitude</th>
							<td>
								<input class="form-control" 
									type="text" name="longitude" value="{{ $delivery->longitude }}">
							</td>
						</tr>
					</table>
					<div class="float-right">
						<a href="{{ route('delivery.show', $delivery) }}" class="btn btn-default">
							{{ __('Back') }}
						</a>
						<button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection