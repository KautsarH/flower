@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row bg-white">
			<div class="col p-5">
				<h3 class="pb-4">Checkout 
				</h3>
				<div class="float-right">
				</div>
				<div class="card-body">
				<form action="{{ route('order.store') }}" method="POST">
					@csrf 
					<table class="table">
						<tr>
							<th>{{ __('Total') }}</th>
							<td>RM{{$total}}
                            <input id="total" type="text" value= {{$total}} name="total" hidden>
						</tr>
						<tr>
							<th>{{ __('Order Date') }}</th>
							<td>{{Carbon\Carbon::now()}}</td>
						</tr>
						<tr>
							<th>{{ __('Deliver Date') }}</th>
							<td><input id="deliver_date" type="date" class="form-control" name="deliver_date" required> </td>
						</tr>
						<tr>
							<th>{{ __('Deliver Time') }}</th>
							<td><input class="form-control" type="time" name="time"></td>
						</tr>
                        <tr>
							<th>{{ __('Payment') }}</th>
							<td>
                                <select name="payment" class="form-control">
                                    <option value="Cash On Demand">Cash On Demand</option>
                                    <option value="Online Banking">Online Banking</option>
                                </select>
							</td>
						</tr>
                        <tr>
							<th>{{ __('Address') }}</th>
							<td>
                                <select name="delivery_id" class="form-control">
                                    @foreach($deliveries as $delivery)                                   
                                        <option value="{{ $delivery->id }}">{{ $delivery->address }}</option>    
                                    @endforeach
                                </select>
							</td>
						</tr>
                        <tr>
							<th>{{ __('Occasion') }}</th>
							<td>
                                <select name="occasion_id" class="form-control">
                                    @foreach($occasions as $occasion)                                  
                                        <option value="{{ $occasion->id }}">{{ $occasion->name }}</option>
                                    @endforeach
                                </select>
							</td>
						</tr>
                        <tr>
							<th>{{ __('Remarks') }}</th>
							<td><input id="remarks" type="text" class="form-control" name="remarks" required autofocus></td>
						</tr>
						
					</table>
					<div class="float-right">
						<a href="{{ route('product.cart') }}" class="btn btn-default">
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