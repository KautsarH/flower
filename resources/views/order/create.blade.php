@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3>{{ __('Address Details') }}</h3>
				<form action="{{ route('delivery.store') }}" method="POST">
					@csrf 
					<table class="table">
						<tr>
							<th>{{ __('Name') }}</th>
							<td>
								<input class="form-control @error('name') border border-danger @enderror" 
									type="text" name="name" 
									value="{{ old('name') }}">

								@error('name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</td>
						</tr>
						<tr>
							<th>{{ __('Phone Number') }}</th>
							<td>
								<input class="form-control" 
									type="text" name="phone_no" 
									value="{{ old('phone_no') }}">
							</td>
						</tr>
						<tr>
							<th>{{ __('Latitude') }}</th>
							<td>
								<input class="form-control" 
									type="text" name="latitude" 
									value="{{ old('latitude') }}">
							</td>
						</tr>
						<tr>
							<th>{{ __('Longitude') }}</th>
							<td>
								<input class="form-control" 
									type="text" name="longitude"									" 
									value="{{ old('longitude') }}">
							</td>
						</tr>
						
					</table>
					<div class="float-right">
						<a href="{{ route('delivery.index') }}" class="btn btn-default">
							{{ __('Back') }}
						</a>
						<button type="submit" class="btn btn-primary">
                            {{ __('Create') }}
                        </button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection