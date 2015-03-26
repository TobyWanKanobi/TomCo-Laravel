@extends('layouts.admin')
@section('content')
<div id="page-inner">
	<div class="row">
		<div class="col-md-12"><h1 class="page-head-line">Nieuw product</h1></div>
	</div>
	
	<div class="row">
		<div class="col-md-6"> 
		
		<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
		{!! Form::open(['route' => 'save_product', 'class' => 'form-horizontal']) !!}
		
		@include('admin/partials/_product-form', ['product' => $product, 'submit_tekst' => 'Product toevoegen'])
		
		{!! Form::close() !!}
		</div>
	</div>
</div>
@stop