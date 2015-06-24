@extends('layouts.admin')
@section('content')
<div id="page-inner">
	
	<div class="row">
		<div class="col-md-12"><h1 class="page-head-line">Nieuw product</h1></div>
	</div>
	
	<div class="col-md-4">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		
		{!! Form::model($product, ['route' => 'store_product', 'class' => 'form-horizontal', 'files' => true]) !!}
		
			@include('admin/product/partials/_product-form', ['product' => $product, 'categorie_op' => $categorie_opties, 'submit_tekst' => 'Product toevoegen'])
		
		{!! Form::close() !!}
		</div>
	</div>
</div>
@stop