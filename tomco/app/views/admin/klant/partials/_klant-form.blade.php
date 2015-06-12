	{!! Form::hidden('klant_id', $klant->klant_id) !!}

<div class="form-group">
	{!! Form::label('voornaam', 'Naam') !!}
	{!! Form::text('voornaam', $klant->voornaam, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tussenvoegsel', 'Tussenvoegsel') !!}
	{!! Form::text('tussenvoegsel', $klant->tussenvoegsel, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('achternaam', 'Achernaam') !!}
	{!! Form::text('achternaam', $klant->achternaam, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('adres_straat', 'Straatnaam') !!}
	{!! Form::text('adres_straat', $klant->adres_straat, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('adres_toevoeging', 'Toevoeging') !!}
	{!! Form::text('adres_toevoeging', $klant->adres_toevoeging, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('adres_nummer', 'Adres Nummer') !!}
	{!! Form::text('adres_nummer', $klant->adres_nummer, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('postcode', 'Postcode') !!}
	{!! Form::text('postcode', $klant->postcode, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('woonplaats', 'Woonplaats') !!}
	{!! Form::text('woonplaats', $klant->woonplaats, ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submit_tekst, ['class' => 'btn btn-default']) !!}