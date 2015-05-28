@extends('layouts.admin')
@section('content')
<div id="page-inner">
	
	<div class="row">
		<div class="col-md-12"><h1 class="page-head-line">Nieuw categorie</h1></div>
	</div>
	
	<div class="row">
		<div class="col-md-6"> 
		
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		
		{!! Form::model($categorie, ['route' => 'store_categorie', 'class' => 'form-horizontal']) !!}
		
			@include('admin/categorie/partials/_categorie-form', ['categorie' => $categorie, 'submit_tekst' => 'Categorie toevoegen'])
		
		{!! Form::close() !!}
		</div>
	</div>
</div>
@stop