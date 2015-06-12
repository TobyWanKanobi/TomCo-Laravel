@extends('layouts.admin')
@section('content')
<div id="page-inner">
	<div class="row">
		<div class="col-md-12"><h1 class="page-head-line">Overzicht Klanten</h1></div>
	</div>
	<div class="col-lg-9">

		<div id="klant">

			<div class="container-fluid">
			
			
				<table class="table table-striped">
					<tr>
						<th>Voornaam</th>
						<th>Tussenvoegsel</th>
						<th>Achternaam</th>
						<th>Straatnaam</th>
						<th>Huisnummer</th>
						<th>Toevoeging</th>
						<th>Postcode</th>
						<th>Woonplaats</th>
						<th>Acties</th>
					</tr>
					@foreach($klanten as $klant)
						<tr>
							<td>{{ $klant->voornaam }}</td>
							<td>{{ $klant->tussenvoegsel }}</td> 
							<td>{{ $klant->achternaam }}</td>
							<td>{{ $klant->adres_naam }}</td>
							<td>{{ $klant->adres_nummer }}</td>
							<td>{{ $klant->adres_toevoeging }}</td>
							<td>{{ $klant->postcode }}</td>
							<td>{{ $klant->woonplaats }}</td>
							<td>
								<button class="btn btn-success" data-klantid="{{ $klant->klant_id }}"><i class="glyphicon glyphicon-pencil"></i> Wijzigen</button> 
								
								<a class="btn btn-danger" data-toggle="modal" data-target="#klant-{{ $klant->klant_id }}" href="#">
									<i class="glyphicon glyphicon-trash"></i> Verwijderen
								</a>
							</td>
							
							<div class="modal fade" id="klant-{{ $klant->klant_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Verwijderen</h4>
										</div>
										<div class="modal-body">
											Weet je zeker dat je {{ $klant->naam }} wilt verwijderen?
										</div>
										<div class="modal-footer">
											{!! Form::open(['route' => ['delete_klant', $klant->klant_id], 'method' => 'delete']) !!}
											<button type="button" class="btn btn-default" data-dismiss="modal">Annuleer</button>
											<button type="submit" href="{{ URL::route('delete_klant', $klant->klant_id) }}" class="btn btn-primary">Delete</button>
											{!! Form::close() !!}
										</div>
									</div>
								</div>
							</div>
						</tr>
					@endforeach
				</table>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('table').on('click', 'td button', function(){
		
			$.ajax({
				url : '{!! URL::to('/admin/klant/wijzig') !!}' + '/' + $(this).data('klantid'),
				success: function(result) {
					$('#edit-modal').remove();
					$('body').append(result);
					$('#edit-modal').modal('show');
				}
			});
			console.log('howdie');
		});
	});

</script>
@stop