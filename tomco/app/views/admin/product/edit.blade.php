@extends('layouts.admin')
@section('content')
<div id="page-inner">
<h1 class="h1">Product wijzigen</h1>
{!! Form::model($product, ['route' => 'save_product', 'files' => true,'id' => 'edit-product-form']) !!} 
					
	@include('admin/product/partials/_product-form', ['product' => $product, 'categorie_opties' => $categorie_opties, 'submit_tekst' => 'Wijziging opslaan'])
					
{!! Form::close() !!}
</div>
@stop