@extends('layouts.admin')
@section('content')

<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-head-line">Bestellingen</h1>
		</div>
	</div>

	<div id="bestellingen">
			
			
		<table class="table table-bordered table-striped">
			
			<thead>
			<tr>
				<th>ID</th>
				<th>Besteldatum / tijd</th>
				<th>Status</th>
				<th>Klant</th>
				<th>Adres</th>
				<th>Aantal producten</th>
				<th>Totaalbedrag</th>
				<th>Acties</th>
			</tr>
			</thead>
			<tbody>
				@foreach($bestellingen as $bestelling)
				<?php
				$aantalProducten = 0;
				$totaalBedrag = 0.00;
				foreach($bestelling->producten as $product)
				{
					$aantalProducten += $product->pivot->aantal;
					$totaalBedrag += $product->pivot->subtotaal;
				}?>
				<tr>
					<td>{{ $bestelling->bestelling_id}}</td>
					<td>{{ $bestelling->besteld_op}}</td>
					<td>{{ $bestelling->status_type }}</td>
					<td>{{ $bestelling->klant->voornaam }} {{ $bestelling->klant->tussenvoegsel}} {{$bestelling->klant->achternaam }}</td>
					<td>{{ $bestelling->afleveradres_straat }} {{ $bestelling->afleveradres_nummer }} {{ $bestelling->afleveradres_toevoeging }}<br />
						{{ $bestelling->afleveradres_woonplaats }}<br />
						{{ $bestelling->afleveradres_postcode }}
					</td>
					<td>{{ $aantalProducten }}</td>
					<td>&euro; {{ $totaalBedrag }}</td>
					<td>
						<a href="{{ URL::route('bestelling', ['id' => $bestelling->bestelling_id]) }}" class="btn btn-primary">Details</a>
						<button class="btn btn-success" data-productid="{{ $product->product_id }}"><i class="glyphicon glyphicon-pencil"></i> Wijzigen</button> 
								
								<a class="btn btn-danger" data-toggle="modal" data-target="#product-{{ $product->product_id }}" href="#">
									<i class="glyphicon glyphicon-trash"></i> Verwijderen
								</a>
					</td>
				</tr>
				@endforeach
			<tbody>
		</table>
	</div>
</div>
@stop