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
			<td><img src="{!! URL::asset('assets/images/artikelen/' . $product['image']) !!}" alt="{!! $product['name'] !!}" /></td>
			<td>{!! $product['name'] !!}</td>
			<td>{!! $product['price'] !!}</td>
			<td>{!! $product['description'] !!}</td>
			<td style="width: 10%;">
			<form>
				<div class="form-group">
					<input type="text" class="form-control" name="" value="{!! $product['quantity'] !!}" />
				</div>
				
			</form>
			</td>
			<td>&euro; {!! $product['price'] * $product['quantity'] !!}</td>
			<td><a href="{{ URL::route('remove_from_cart', ['id' => $product['id']]) }}" class="delete-item">Verwijder</a></td>
		</tr>
	@endforeach
	@if (count($products) == 0)
		<tr>
			<td colspan="8">Winkelwagen bevat geen producten</td>
		</tr>
	@endif
	</tbody>
	@if (count($products) > 0)
	<tfoot>
		<tr>
			<td colspan="8"><button class="btn btn-primary pull-right"><span class="glyphicon glyphicon-shopping-cart"></span> Betalen</button></td>
		</tr>
	</tfoot>
	@endif
</table>
<script type="text/javascript">
$(document).ready(function(){
	/*$('.delete-item').on('click', function(event){
		event.preventDefault();
		console.log('dsfsdf');
		
		$.ajax({
			url : $(this).attr('href'),
			complete : function(response){
				console.log('Success: delete item from shoppingcart');
				$(event.target).closest('tr').remove();
				
			},
			error : function(response){
				console.log('Failed: delete item from shoppingcart');
			},
		});
		
	});*/
});
</script>
@stop
