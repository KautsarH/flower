@extends('layouts.app1')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3>User details</h3>
				<div class="float-right pb-3">
				</div>
				<table class="table">
					<tr>
						<th>ID</th>
						<td>{{ $user->id }}</td>
					</tr>
					 <tr>
						<th>Name</th>
						<td>{{ $user->name }}</td>
					</tr>
                    <tr>
						<th>Username</th>
						<td>{{ $user->username }}</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>{{ $user->email }}</td>
					</tr>
					<tr>
						<th>Phone Number</th>
						<td>{{ $user->phone_no }}</td>
					</tr>
				</table>
				<a href="{{ route('admin.user.index') }}" class="btn btn-default">
					Back
				</a>
			</div>
		</div>
	</div>
@endsection