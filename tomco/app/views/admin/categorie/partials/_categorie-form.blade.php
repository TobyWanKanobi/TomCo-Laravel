	{!! Form::hidden('categorie_id', $categorie->categorie_id) !!}
	
<div class="form-group">
	{!! Form::label('parent van een categorie', 'Geef Parent id op') !!}
	{!! Form::text('parent_id', $categorie->parent_id, ['class' => 'form-control']) !!}
</div>
	
<div class="form-group">
	{!! Form::label('naam', 'Naam') !!}
	{!! Form::text('naam', $categorie->naam, ['class' => 'form-control']) !!}
</div>

<!--<div class="form-group">
	{!! Form::label('omschrijving_lang', 'Uitgebreide beschrijving') !!}
	{!! Form::textarea('omschrijving_lang', $categorie->omschrijving_lang, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('prijs', 'Prijs') !!}
	{!! Form::text('prijs', $categorie->prijs, ['class' => 'form-control']) !!}
</div>-->

{!! Form::submit($submit_tekst, ['class' => 'btn btn-default']) !!}