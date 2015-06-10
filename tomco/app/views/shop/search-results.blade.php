@extends('layouts.default')
@section('content')
<table class="table table-bordered">
	<thead>
		<tr>
			<th></th>
			<th>Product</th>
			<th>Prijs</th>
			<th>Omschrijving</th>
			<th>Actie</th>
		</tr>
	</thead>
	<tbody>
	@foreach($products as $product)
		<tr>
			<td>
				<img src="{{ URL::asset('assets/images/artikelen/' . $product->afbeelding_klein) }}" class="img-responsive img-thumbnail" alt="title" style="width:200px; height:200px;" />
			</td>
			<td>{!! $product->naam !!}</td>
			<td>{!! $product->prijs !!}</td>
			<td>{!! $product->omschrijving_kort !!}</td>
			<td>
				<a href="{{ URL::route('add_to_cart', ['id' => $product->product_id, 'quantity' => 1]) }}" class="btn btn-success add-to-cart">Bestellen</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop