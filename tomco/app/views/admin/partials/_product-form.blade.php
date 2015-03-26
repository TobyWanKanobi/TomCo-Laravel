
	{!! Form::token() !!}
<div class="form-group">
	{!! Form::label('Naam') !!}
	{!! Form::text('naam', $product->naam, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('Beschrijving') !!}
	{!! Form::textarea('omschrijving', $product->omschrijving, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('Prijs') !!}
	{!! Form::text('prijs', $product->prijs, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('Afbeelding') !!}
	{!! Form::file('afbeelding', $product->afbeelding, ['class' => 'form-control']) !!}
	<p class="help-block">
		Lorem ipsum
	</p>
</div>
		
<div class="form-group">
	<!--{!! Form::label('Categorie') !!}
	{!! Form::text('categorie', $product->categorie, ['class' => 'form-control']) !!}-->
</div>

{!! Form::submit($submit_tekst, ['class' => 'btn btn-default']) !!}