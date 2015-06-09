	{!! Form::hidden('bestelling_id', $bestelling->bestelling_id) !!}
	
<div class="form-group">
	{!! Form::label('product_id', 'Geef product id op') !!}
	{!! Form::text('product_id', $bestelling->product_id, ['class' => 'form-control']) !!}
</div>
	
<div class="form-group">
	{!! Form::label('aantal', 'Aantal') !!}
	{!! Form::text('aantal', $bestelling->aantal, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('subtotaal', 'Subtotaal') !!}
	{!! Form::textarea('subtotaal', $bestelling->subtotaal, ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submit_tekst, ['class' => 'btn btn-default']) !!}