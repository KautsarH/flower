@extends('layouts.app1')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3>{{ __('Ocassion Details') }}</h3>
				<form action="{{ route('admin.occasion.update', $occasion) }}" method="POST">
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
									value="{{ $occasion->name }}">

								@error('name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</td>
						</tr>
						<tr>
							<th>Description</th>
							<td>
								<input class="form-control" 
									type="text" name="description" value="{{ $occasion->description }}">
							</td>
						</tr>
					</table>
					<div class="float-right">
						<a href="{{ route('admin.occasion.show', $occasion) }}" class="btn btn-default">
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