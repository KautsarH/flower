@extends('layouts.app')

@section('content')
    @if(Session::has('cart'))
    <div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3 class="pb-4">Cart
				</h3>
				<div class="float-right">

				</div>
				<table class="table">
					<tr>
						<th>Flower</th>
						<th>Quantity</th>
						<th>Price</th>
						<th></th>
					</tr>

					@foreach($products as $product)
						<tr>
							<td>{{ $product['item']['name'] }}</td>
							<td>{{ $product['qty'] }}</td>
							<td>RM{{ $product['price'] }}</td>
							<td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action</button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Reduce 1</a></li>
                                        <li><a href="#">Delete all</a></li>
                                    </ul>
                                </div>
                            </td>
						</tr>
					@endforeach
				</table>
				<div class="float-right">
                Total :RM{{ $totalPrice}}
                <button type="button" class="btn btn-success">Checkout</button>
				</div>
			</div>
		</div>
	</div>

    @else
    <div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3 class="pb-4">Cart
				</h3>
				<div class="float-right">

				</div>
                <h3>No items in cart.</h3>
				
				<div class="float-right">
            
				</div>
			</div>
		</div>
	</div>
    @endif
	
@endsection