@extends('layouts.admin')
@section('content')

<div id="page-inner">
	<div class="row">
		<div class="col-md-12"><h1 class="page-head-line">bestellingen beheer</h1></div>
	</div>
	<div class="col-lg-9">

		<div id="bestellingen">

			<div class="container-fluid">
			
			
				<table class="table table-striped" style="max-width:200%; width:110%;">
					<thead>
					<tr>
						<th>ID</th>
						<th>Product ID</th>
						<th>Product Naam</th>
						<th>Aantal</th>
						<th>Subtotaal</th>
						<th>Acties</th>
					</tr>
					</thead>
					<tbody>
						{{-- */$done=false;/* --}}
						{{-- */$counter=0;/* --}}
						@if(count($bestellingen) === 0)
							
						@else
							@foreach($bestellingen as $bestelling)
								@if(!$done)
									{{-- */$counter++;/* --}}
									<tr>
										<td>{{ $bestellingen->bestelling_id }}</td>
										<td>{{ $bestellingen->product_id }}</td>
										<td>{{ $bestellingen->getProduct() }}</td>
										<td>{{ $bestellingen->aantal }}</td>
										<td>{{ $bestellingen->subtotaal }}</td>
										<td>
											<button class="btn btn-success" data-bestellingenid="{{ $bestellingen->bestellingen_id }}"><i class="glyphicon glyphicon-pencil"></i> Wijzigen</button> 
										</td>
									</tr>
									@if(count($bestellingen) == $counter)
										{{-- */$done=true;/* --}}
									@endif
								@endif
							@endforeach
						@endif
					</tbody>
				</table>

				<table class="table table-striped" style="max-width:200%; width:110%;">	
					<thead>
						<tr>
							<th>ID</th>
							<th>Afleveradres</th>
							<th>Huisummer</th>
							<th>Toevoeging</th>
							<th>Postcode</th>
							<th>Woonplaats</th>
							<th>Besteld op</th>
							<th>Acties</th>
						</tr>
					</thead>
					<tbody>
						{{-- */$done=false;/* --}}
						{{-- */$counter=0;/* --}}
						@if(count($bestellingen) === 0)
							
						@else
							@foreach($bestellingen as $bestelling)
								@if(!$done)
									{{-- */$counter++;/* --}}
									<tr>
										<td>{{ $bestellingen->bestelling_id }}</td>
										<td>{{ $bestellingen->getStreet() }}</td>
										<td>{{ $bestellingen->getNumber() }}</td>
										<td>{{ $bestellingen->getExtra() }}</td>
										<td>{{ $bestellingen->getZipCode() }}</td>
										<td>{{ $bestellingen->getResidence() }}</td>
										<td style="width:150px;">{{ $bestellingen->getOrderDate() }}</td>
										<td>
											<button class="btn btn-success" data-bestellingenid="{{ $bestellingen->bestellingen_id }}"><i class="glyphicon glyphicon-pencil"></i> Wijzigen</button> 
										</td>
									</tr>
									@if(count($bestellingen) == $counter)
										{{-- */$done=true;/* --}}
									@endif
								@endif
							@endforeach
						@endif
					</tbody>
				</table>
				
				{{ Form::select('type', $status, Input::old('type'), array('type' => 'type')) }}
			</div>
		</div>

		
	</div>
</div>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('table').on('click', 'td button', function(){
		
			$.ajax({
				url : '{!! URL::to('/admin/bestellingen/wijzig') !!}' + '/' + $(this).data('bestellingenid'),
				success: function(result) {
					$('#edit-modal').remove();
					$('body').append(result);
					$('#edit-modal').modal('show');
				}
			});
			console.log($(this).data('bestellingenid'));
		});
	});

</script>
@stop