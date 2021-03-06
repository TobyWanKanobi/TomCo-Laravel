@extends('layouts.admin')
@section('content')
<div id="page-inner">
	<div class="row">
		<div class="col-md-12"><h1 class="page-head-line">Producten</h1></div>
	</div>

		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th></th>
					<th>Titel</th>
					<th style="width:20%;">Omschrijving</th>
					<th>Categorie</th>
					<th>Prijs</th>
					<th>Acties</th>
				</tr>
			</thead>
			<tbody>
			@foreach($products as $product)
				<tr>
					<td><img src="{{ URL::asset('uploads/' . $product->afbeelding_groot) }}" class="img-responsive img-thumbnail" alt="title" style="width:100px; height:100px;" /></td>
					<td>{{ $product->naam }}</td>
					<td>{{ $product->omschrijving_kort }}</td>
					<td>{{ $product->categorie->naam }}</td>
					<td>&euro; {{ $product->prijs }}</td> 
					<td>
						<a href="{{ URL::route('edit_product', ['id' => $product->product_id]) }}"class="btn btn-success"
						<button class="btn btn-success" data-productid="{{ $product->product_id }}"><i class="glyphicon glyphicon-pencil"></i> Wijzigen</button> 
						
						<a class="btn btn-danger" data-toggle="modal" data-target="#product-{{ $product->product_id }}" href="#">
							<i class="glyphicon glyphicon-trash"></i> Verwijderen
						</a>
					</td>
					
					<div class="modal fade" id="product-{{ $product->product_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Verwijderen</h4>
								</div>
								<div class="modal-body">
									Weet je zeker dat je {{ $product->naam }} wilt verwijderen?
								</div>
								<div class="modal-footer">
									{!! Form::open(['route' => ['delete_product', $product->product_id], 'method' => 'delete']) !!}
									<button type="button" class="btn btn-default" data-dismiss="modal">Annuleer</button>
									<button type="submit" href="{{ URL::route('delete_product', $product->product_id) }}" class="btn btn-primary">Delete</button>
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
				</tr>
			@endforeach
			</tbody>
		</table>
</div>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('table').on('click', 'td button', function(){
		
			$.ajax({
				url : '{!! URL::to('/admin/product/wijzig') !!}' + '/' + $(this).data('productid'),
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