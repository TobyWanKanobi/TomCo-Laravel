@extends('layouts.default')
@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary">Terug</a>
	
	<h1>Bestelling afronden</h1>
	
	<table class="table table-bordered">
		<tbody>
			<tr>
				<th>Naam</th><td>{{ $customer->voornaam}} {{ $customer->tussenvoegsel}} {{ $customer->achternaam }}</td>
			</tr>
			<tr>
				<th>Besteldatum</th><td>{{ $date }}</td>
			</tr>
			<tr>
				<th>Afleveradres</th>
				<td>
					{{ $customer->adres_straat }} {{ $customer->adres_nummer }} {{ $customer->adres_toevoeging }} <br />
					{{ $customer->postcode }} <br />
					{{ $customer->woonplaats }} <br />
					@if($customer->telefoonnummer != null)
						{{ $customer->telefoonnummer }} <br />
					elseif($customer->mobielnummer != null)
						{{ $customer->mobielnummer }} <br />
					@endif
				</td>
			</tr>
		</tbody>
	</table>	

	<table class="table table-bordered">
		<thead>
			<tr>
				<th></th>
				<th>Product</th>
				<th>Prijs</th>
				<th>Omschrijving</th>
				<th>Aantal</th>
				<th>Totaal</th>
			</tr>
		</thead>
		<tbody>
		@foreach($products as $product)
			<tr>
				<td style="width:15%; text-align:center;"><img src="{!! URL::asset('uploads/' . $product['image']) !!}" style="width: 100px; height: 100px;" alt="{!! $product['name'] !!}" /></td>
				<td>{!! $product['name'] !!}</td>
				<td>{!! $product['price'] !!}</td>
				<td>{!! $product['description'] !!}</td>
				<td>
					{!! $product['quantity'] !!}
				</td>
				<td>&euro; {!! $product['price'] * $product['quantity'] !!}</td>
			</tr>
		@endforeach
			<tr>
				<td colspan="8">
					@if (count($products) == 0)
						Winkelwagen bevat geen producten
					@else
						<a href="{{ URL::route('checkout') }}" class="btn btn-primary pull-right"><i class="fa fa-usd"></i> Betalen</a>
					@endif
				</td>
			</tr>
		</tbody>
	</table>
<script type="text/javascript">
$(document).ready(function(){

	var baseUrl = '{!! URL::to('/') !!}';
	
	$('[data-toggle="popover"]').popover({
		html : true,
	});
	
	$('table tbody').on('click', '.edit-quantity', function(event){
		event.preventDefault();
		var productId = $(this).data('productid');
		var quantity = $(this).siblings('input').first().val();
		var url = baseUrl + '/winkelwagen/add?id=' + productId + '&quantity=' + quantity;
		window.location.href = url;
	});
});
</script>
@stop
