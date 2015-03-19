@extends('layouts.admin')
@section('content')
<div id="page-inner">
	<div class="row">
		<div class="col-md-12"><h1 class="page-head-line">Nieuw product</h1></div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info">Laatste nieuws en overzicht</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6"> 
		{!! Form::open(array('route' => 'nieuw_product', 'class' => 'form-horizontal')) !!}
		
		<div class="form-group">
			{!! Form::label('Naam') !!}
			{!! Form::text('naam', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('Beschrijving') !!}
			{!! Form::textarea('beschrijving', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('Prijs') !!}
			{!! Form::text('prijs', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('Afbeelding') !!}
			{!! Form::file('afbeelding', null, ['class' => 'form-control']) !!}
			<p class="help-block">
			Lorem ipsum
			</p>
		</div>
		
		<div class="form-group">
			{!! Form::label('Categorie') !!}
			{!! Form::text('categorie', null, ['class' => 'form-control']) !!}
		</div>
		
		{!! Form::submit('Opslaan', ['class' => 'btn btn-default']) !!}
		
		{!! Form::close() !!}
		</div>
	</div>
</div>
@stop