@extends('layouts.admin')
@section('content')

<div id="page-inner">
	<div class="row">
		<div class="col-md-10">
			<h1 class="page-head-line">Bestelling</h1>
		</div>
	</div>

		<div id="bestellingen">

			<table class="table table-bordered">
			<tbody>
				<tr>
					<th>Naam</th><td>{{ $order->klant->voornaam}} {{ $order->klant->tussenvoegsel}} {{ $order->klant->achternaam }}</td>
				</tr>
				<tr>
					<th>Besteldatum</th><td>{{ $order->besteld_op }}</td>
				</tr>
				<tr>
					<th>Status</th><td>{{ $order->status_type }}</td>
				</tr>
				<tr>
					<th>Afleveradres</th>
					<td>
						{{ $order->afleveradres_straat }} {{ $order->afleveradres_nummer }} {{ $order->afleveradres_toevoeging }} <br />
						{{ $order->afleveradres_woonplaats }} <br />
						{{ $order->afleveradres_postcode }} <br />
					</td>
				</tr>
			</tbody>
			</table>			
			
				<table class="table table-striped">
					
					<thead>
					<tr>
						<th>Product</th>
						<th>Aantal</th>
						<th>Subtotaal</th>
					</tr>
					</thead>
					<tbody>
					<?php 
					$totaalBedrag = 0.00;
					?>
					
					@foreach($order->producten as $product) 
					
					<tr>
						<td>{{ $product->naam }}</td>
						<td>{{ $product->pivot->aantal }}</td>
						<td>&euro; {{ $product->pivot->subtotaal }}</td>
					</tr>
					<?php $totaalBedrag += $product->pivot->subtotaal;  echo $product->subtotaal; ?>
					
					@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2"></td>
							<th><strong>Totaalprijs</strong></th>
						</tr>
						</tr>
							<td colspan="2"></td>
							<td><strong>&euro; <?php echo number_format($totaalBedrag, 2);  ?></strong></td>
						</tr>
					</tfoot>
				</table>
				
				<div class="col-md-2">
			<a href="{{ URL::previous()}}" class="btn btn-primary">Terug</a>
		</div>
		
	</div>
</div>
@stop