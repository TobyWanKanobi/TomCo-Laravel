	{!! Form::hidden('bestelling_id', $bestelling->bestelling_id) !!}
	
<div class="form-group">
	{!! Form::label('product_id', 'Geef product id op') !!}
	{!! Form::text('product_id', $bestelling->product_id, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('naam', 'Product Naam') !!}
	{!! Form::text('naam', $bestelling->getProduct(), ['class' => 'form-control', ('disabled')]) !!}
</div>
	
<div class="form-group">
	{!! Form::label('aantal', 'Aantal') !!}
	{!! Form::text('aantal', $bestelling->aantal, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('subtotaal', 'Subtotaal') !!}
	{!! Form::text('subtotaal', $bestelling->subtotaal, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('afleveradres_straat', 'Aflever Adres') !!}
	{!! Form::text('afleveradres_straat', $bestelling->getStreet(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('afleveradres_nummer', 'Aflever Nummer') !!}
	{!! Form::text('afleveradres_nummer', $bestelling->getNumber(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('afleveradres_toevoeging', 'Aflever Toevoeging') !!}
	{!! Form::text('afleveradres_toevoeging', $bestelling->getExtra(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('afleveradres_postcode', 'Aflever Postcode') !!}
	{!! Form::text('afleveradres_postcode', $bestelling->getZipCode(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('afleveradres_woonplaats', 'Aflever Woonplaats') !!}
	{!! Form::text('afleveradres_woonplaats', $bestelling->getResidence(), ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submit_tekst, ['class' => 'btn btn-default']) !!}