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
			<td>{!! $product->afbeelding_klein !!}</td>
			<td>{!! $product->naam !!}</td>
			<td>{!! $product->prijs !!}</td>
			<td>{!! $product->omschrijving_kort !!}</td>
			<td><span class="glyphicon glyphicon-shopping-cart"></span> Toevoegen</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop
