@extends('layouts.app1')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3 class="pb-4">Occasions
                <a href="{{ route('admin.occasion.create') }}" 
						class="float-right btn btn-success">
						{{ __('Create New Occasion') }}
					</a>
				</h3>
				<div class="float-right">
				</div>
				<table class="table">
					<tr>
						<th></th>
						<th>Name</th>
						<th>Description</th>
						<th></th>
					</tr>

					@foreach($occasions as $occasion)
						<tr>
							<td>{{ $loop->iteration}} </td>
							<td>{{ $occasion->name }}</td>
							<td>{{ $occasion->description }}</td>
							<td>
								<div class="btn-group">
									<a href="{{ route('admin.order.edit', $occasion) }}" class="btn btn-success">
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