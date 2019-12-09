@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3 class="pb-4">Products 
				</h3>
				<div class="float-right">
				</div>
				<table class="table">
					<tr>
						<th></th>
						<th>Name</th>
						<th>Description</th>
						<th>Price</th>
						<th></th>
					</tr>

					@foreach($products as $product)
						<tr>
							<td>
								<img src="{{ $product->picture }}" alt="{{ $product->name }}" style="width:121px;height:121px;"></td>
							<td>{{ $product->name }}</td>
							<td>{{ $product->description }}</td>
							<td>RM{{ $product->price }}</td>
							<td>
								<div class="btn-group">
									<a href="{{ route('product.addToCart', $product) }}" class="btn btn-success">
										{{ __('Add to cart') }}
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