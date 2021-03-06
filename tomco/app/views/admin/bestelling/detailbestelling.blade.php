@extends('layouts.admin')
@section('content')

<div id="page-inner">
	<div class="row">
		<div class="col-md-12"><h1 class="page-head-line">Bestelling</h1></div>
	</div>
	<div class="col-lg-9">

		<div id="bestellingen">

			<div class="container-fluid">
			
			
				<table class="table table-striped">
					
					<thead>
					<tr>
						<th>ID</th>
					</tr>
					</thead>
					<tbody>
					@foreach($bestellingen as $bestelling)
						<tr>
							<td>{{ $bestelling->bestelling_id }}</td>
							<td>
								<!--<button class="btn btn-primary" data-bestellingid="{{ $bestelling->bestelling_id }}"><i class="glyphicon glyphicon-info-sign"></i> Details</button>-->
								<a class="btn btn-primary" href="{{ URL::to('/admin/bestelling/overzicht/informatie', $bestelling->bestelling_id) }}"><i class="glyphicon glyphicon-info-sign"></i> Details</a>
							</td>
							<td>
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
										Weet je zeker dat je bestelling met besteld id {{ $bestelling->bestelling_id }} wilt verwijderen?
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
				url : '{!! URL::to('/admin/bestelling/overzicht/informatie') !!}' + '/' + $(this).data('bestellingid'),
				success: function(result) {
					//$('body').append(result);
				}
			});
			console.log($(this).data('bestellingid'));
		});
	});

</script>
@stop