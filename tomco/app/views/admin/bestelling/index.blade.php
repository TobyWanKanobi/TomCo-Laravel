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
								
						<a class="btn btn-danger" data-toggle="modal" data-target="#bestelling-{{ $bestelling->bestelling_id }}" href="#">
							<i class="glyphicon glyphicon-trash"></i> Verwijderen
						</a>
					</td>
					<div class="modal fade" id="bestelling-{{ $bestelling->bestelling_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Verwijderen</h4>
								</div>
								<div class="modal-body">
									Weet je zeker dat je bestelling met bestel id {{ $bestelling->bestelling_id }} wilt verwijderen?
								</div>
								<div class="modal-footer">
									{!! Form::open(['route' => ['delete_bestelling', $bestelling->bestelling_id], 'method' => 'delete']) !!}
									<button type="button" class="btn btn-default" data-dismiss="modal">Annuleer</button>
									<button type="submit" href="{{ URL::route('delete_bestelling', $bestelling->bestelling_id) }}" class="btn btn-primary">Delete</button>
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
				</tr>
				@endforeach
			<tbody>
		</table>
	</div>
</div>
@stop