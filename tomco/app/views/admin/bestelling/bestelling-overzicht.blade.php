@extends('layouts.admin')
@section('content')

<div id="page-inner">
	<div class="row">
		<div class="col-md-12"><h1 class="page-head-line">Bestelling beheer</h1></div>
	</div>
	<div class="col-lg-9">

		<div id="bestellingen">

			<div class="container-fluid">
			
			
				<table class="table table-striped" style="max-width:200%; width:105%;">
					
					<thead>
					<tr>
						<th>ID</th>
						<th>Product ID</th>
						<th>Product Naam</th>
						<th>Aantal</th>
						<th>Subtotaal</th>
						<th>Afleveradres</th>
						<th>Huisummer</th>
						<th>Toevoeging</th>
						<th>Postcode</th>
						<th>Woonplaats</th>
						<th>Besteld op</th>
						<th>Status</th>
					</tr>
					</thead>
					<tbody>
					@foreach($bestellingen as $bestelling)
						<tr>
							<td>{{ $bestelling->bestelling_id }}</td>
							<td>{{ $bestelling->product_id }}</td>
							<td>{{ $bestelling->getProduct() }}</td>
							<td>{{ $bestelling->aantal }}</td>
							<td>{{ $bestelling->subtotaal }}</td>
							<td>{{ $bestelling->getStreet() }}</td>
							<td>{{ $bestelling->getNumber() }}</td>
							<td>{{ $bestelling->getExtra() }}</td>
							<td>{{ $bestelling->getZipCode() }}</td>
							<td>{{ $bestelling->getResidence() }}</td>
							<td style="width:150px;">{{ $bestelling->getOrderDate() }}</td>
							<td>{{ $bestelling->status_type }}</td>
							<td>
								<button class="btn btn-success" data-bestellingid="{{ $bestelling->bestelling_id }}"><i class="glyphicon glyphicon-pencil"></i> Wijzigen</button> 
								
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
										Weet je zeker dat je {{ $bestelling->bestelling_id }} wilt verwijderen?
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

		
	</div>
</div>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('table').on('click', 'td button', function(){
		
			$.ajax({
				url : '{!! URL::to('/admin/bestelling/wijzig') !!}' + '/' + $(this).data('bestellingid'),
				success: function(result) {
					$('#edit-modal').remove();
					$('body').append(result);
					$('#edit-modal').modal('show');
				}
			});
			console.log($(this).data('bestellingid'));
		});
	});

</script>
@stop