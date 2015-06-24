	{!! Form::hidden('product_id', $product->product_id) !!}

<div class="form-group">
	{!! Form::label('naam', 'Naam') !!}
	{!! Form::text('naam', $product->naam, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::select('categorie_id', 
		$categorie_opties, $product->categorie_id, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('omschrijving_kort', 'Korte beschrijving (max 200)') !!}
	{!! Form::textarea('omschrijving_kort', $product->omschrijving_kort, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('omschrijving_lang', 'Uitgebreide beschrijving') !!}
	{!! Form::textarea('omschrijving_lang', $product->omschrijving_lang, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('prijs', 'Prijs') !!}
	{!! Form::text('prijs', $product->prijs, ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submit_tekst, ['class' => 'btn btn-default']) !!}