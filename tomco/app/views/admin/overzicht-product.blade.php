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
						<th>ID</th>
						<th>Titel</th>
						<th>Prijs</th>
						<th>Controle knoppen</th>
					</tr>
					@foreach($products as $product)
						<tr>
							<td>{{ $product->product_id }}</td>
							<td>{{ $product->naam }}</td>
							<td>&euro; {{ $product->prijs }}</td> 
							<td><a class="btn btn-success" data-toggle="modal" data-target="#change-{{ $product->product_id }}" href="#"><i class="glyphicon glyphicon-pencil"></i> Wijzigen</a> &nbsp; <a class="btn btn-danger" data-toggle="modal" data-target="#product-{{ $product->product_id }}" href="#"><i class="glyphicon glyphicon-trash"></i> Verwijderen</a></td>
							<div class="modal fade" id="change-{{ $product->product_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Wijzigen</h4>
									</div>
									<div class="modal-body">
										{!! Form::model($product, ['route' => ['change_product']]) !!}
		
										@include('admin/partials/_product-form', ['submit_tekst' => 'Wijzigen'])
										
										{!! Form::close() !!}
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Annuleer</button>
									</div>
									</div>
								</div>
							</div>
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
										{!! Form::open(['route' => ['verwijderen', $product->product_id], 'method' => 'delete']) !!}
										<button type="button" class="btn btn-default" data-dismiss="modal">Annuleer</button>
										<button type="submit" href="{{ URL::route('verwijderen', $product->product_id) }}" class="btn btn-primary">Delete</button>
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
@stop