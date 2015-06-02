@extends('layouts.admin')
@section('content')
<div id="page-inner">
	<div class="row">
		<div class="col-md-12"><h1 class="page-head-line">Categorie beheer</h1></div>
	</div>
	<div class="col-lg-9">

		<div id="categorieen">

			<div class="container-fluid">
			
			
				<table class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Parent ID</th>
						<th>naam</th>
						<th>Controle knoppen</th>
					</tr>
					</thead>
					<tbody>
					@foreach($categorien as $categorie)
						<tr>
							<td>{{ $categorie->categorie_id }}</td>
							<td>{{ $categorie->parent_id }}</td>
							<td>{{ $categorie->naam }}</td>
							<td>
								<button class="btn btn-success" data-toggle="modal" data-target="#categorie-{{ $categorie->categorie_id }}"><i class="glyphicon glyphicon-pencil"></i> Wijzigen</button> 
								
								<a class="btn btn-danger" data-toggle="modal" data-target="categorie-{{ $categorie->categorie_id }}" href="#">
									<i class="glyphicon glyphicon-trash"></i> Verwijderen
								</a>
							</td>
							
							<div class="modal fade" id="categorie-{{ $categorie->categorie_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Verwijderen</h4>
									</div>
									<div class="modal-body">
										Weet je zeker dat je {{ $categorie->naam }} wilt verwijderen?
									</div>
									<div class="modal-footer">
										{!! Form::open(['route' => ['delete_categorie', $categorie->categorie_id], 'method' => 'delete']) !!}
										<button type="button" class="btn btn-default" data-dismiss="modal">Annuleer</button>
										<button type="submit" href="{{ URL::route('delete_categorie', $categorie->categorie_id) }}" class="btn btn-primary">Delete</button>
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
		
		<!--<div>
			<ol>
			@foreach($categorien as $cat)
				<li>{{ $cat->naam }}</li>
			@endforeach
			</ol>
		</div>-->

		
	</div>
</div>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('table').on('click', 'td button', function(){
		
			/*$.ajax({
				url : '{!! URL::to('/admin/categorie/wijzig') !!}' + '/' + $(this).data('categorieid'),
				success: function(result) {
					$('#edit-modal').remove();
					$('body').append(result);
					$('#edit-modal').modal('show');
				}
			});*/
			console.log('howdie');
		});
	});

</script>
@stop