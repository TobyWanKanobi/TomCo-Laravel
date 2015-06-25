@extends('layouts.default')
@section('content')

<div id="page-inner">
	{!! Breadcrumbs::render('customer', $klantnaam) !!}
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-head-line">Bestellingen</h1>
		</div>
	</div>

	<div id="bestellingen">
		@if(count($bestellingen) === 0)
			<h3>U heeft geen bestellingen geplaats</h3>
		@else	
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
						<button class="btn btn-primary" data-klantid="{{ $bestelling->klant->klant_id }}" data-bestellingid="{{ $bestelling->bestelling_id }}"> Details</button> 
						
					</td>
					
				</tr>
				@endforeach
			<tbody>
		</table>
		@endif
	</div>
</div>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('table').on('click', 'td button', function(){
			window.open('{!! URL::to('/klant') !!}' + '/' + $(this).data('klantid') + '/' + $(this).data('bestellingid'), "_self" );
			
		});
	});

</script>
@stop
