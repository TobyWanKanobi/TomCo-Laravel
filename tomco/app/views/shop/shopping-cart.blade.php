@extends('layouts.default')
@section('content')
<table class="table table-bordered">
	<thead>
		<tr>
			<th></th>
			<th>Product</th>
			<th>Prijs</th>
			<th>Omschrijving</th>
			<th>Aantal</th>
			<th>Totaal</th>
			<th>Actie</th>
		</tr>
	</thead>
	<tbody>
	@foreach($products as $product)
		<tr>
			<td style="width:15%;"><img src="{!! URL::asset('assets/images/artikelen/' . $product['image']) !!}" style="width: 70%; height: 70%;" alt="{!! $product['name'] !!}" /></td>
			<td>{!! $product['name'] !!}</td>
			<td>{!! $product['price'] !!}</td>
			<td>{!! $product['description'] !!}</td>
			<td style="width: 10%;">
				<button class="btn btn-primary" data-toggle="popover" data-placement="bottom" title="Aantal aanpassen" data-content='<form><input type="text" value="{!! $product["quantity"]!!}" />
				<button class="btn btn-primary edit-quantity" data-productid="{!! $product["id"] !!}">Opslaan</button></form>'>{!! $product['quantity'] !!}</button>
			</td>
			<td>&euro; {!! $product['price'] * $product['quantity'] !!}</td>
			<td><a href="{{ URL::route('remove_from_cart', ['id' => $product['id']]) }}" class="delete-item">Verwijder</a></td>
		</tr>
	@endforeach
		<tr>
			<td colspan="8">
				@if (count($products) == 0)
					Winkelwagen bevat geen producten
				@else
					<button class="btn btn-primary pull-right"><span class="glyphicon glyphicon-shopping-cart"></span> Betalen</button>
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
