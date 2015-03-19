@extends('layouts.default')
@section('content')

<div class="col-lg-3" style="background-color: #00FF00;">
 Categorieen
</div>
<div class="col-lg-9" style="background-color: #00FFFF;">

	<div id="products">

		<div class="container-fluid">
		
		@foreach($products as $product)
		
			<div class="col-sm-6 col-md-4 well text-center">
				<h2 class="h2">{{ $product->naam }}</h2>
				<img data-src="holder.js/200x200" class="img-responsive" alt="title" />
				<p>&euro; {{ $product->prijs }}</p>
				<a href="" class="btn btn-success">Bestellen</a>
				<a href="{{ URL::to("test") }}" class="btn btn-primary">Meer info</a>
			</div>
		
		@endforeach

		</div>
	</div>


</div>
@stop