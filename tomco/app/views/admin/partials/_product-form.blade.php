{!! Form::token() !!}

<div class="form-group">
	{!! Form::label('naam', 'Naam') !!}
	{!! Form::text('naam', $product->naam, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('beschrijving', 'Beschrijving') !!}
	{!! Form::textarea('beschrijving', $product->beschrijving, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('prijs', 'Prijs') !!}
	{!! Form::text('prijs', $product->prijs, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('afbeelding', 'Afbeelding') !!}
	{!! Form::file('afbeelding', $product->afbeelding, ['class' => 'form-control']) !!}
	<p class="help-block">
		Lorem ipsum
	</p>
</div>
<!--	
<div class="form-group">
	{!! Form::label('Categorie') !!}
	{!! Form::text('categorie', $product->categorie, ['class' => 'form-control']) !!}
</div>-->


{!! Form::submit($submit_tekst, ['class' => 'btn btn-default']) !!}