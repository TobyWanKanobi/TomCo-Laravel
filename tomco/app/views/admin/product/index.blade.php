@extends('layouts.admin')
@section('content')
<div id="page-inner">
	<div class="row">
		<div class="col-md-12"><h1 class="page-head-line">Overzicht product</h1></div>
	</div>
	<div class="col-lg-9">

		<div id="products">

			<div class="container-fluid">
			
			
				<table class="table table-striped">
					<tr>
						<th>Titel</th>
						<th>Prijs</th>
						<th>Acties</th>
					</tr>
					@foreach($products as $product)
						<tr>
							<td>{{ $product->naam }}</td>
							<td>&euro; {{ $product->prijs }}</td> 
							<td>
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
				</table>

			</div>
		</div>
	</div>
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