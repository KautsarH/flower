@extends('layouts.app1')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3 class="pb-4">Users 
				</h3>
				<div class="float-right">
				</div>
				<table class="table">
					<tr>
						<th></th>
						<th>User ID</th>
						<th>Name</th>
                        <th></th>
					</tr>

					@foreach($users as $user)
						<tr>
							<td>{{ $loop->iteration}} </td>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>
                                <div class="btn-group">
									<a href="{{ route('admin.user.show',$user) }}" class="btn btn-primary">
										{{ __('Show') }}
									</a>
									<div class="btn btn-danger" onclick="
										if(confirm('Are you sure want to delete this record?')) {
											document.getElementById('user-{{ $user->id }}').submit();
										}
									">
										<form id="user-{{ $user->id }}" 
											action="{{ route('admin.user.destroy', $user) }}" method="POST">
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