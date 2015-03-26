@extends('layouts.default')
@section('content')

<div class="col-lg-3" style="background-color: #00FF00;">
 Categorieen
</div>
<div class="col-lg-9" style="background-color: #00FFFF;">

	<div id="products">

		
		@foreach($products as $product)
		
			<div class="col-sm-6 col-md-4 well text-center">
				<h2 class="h4">{{ $product->naam }}</h2>
					<img src="{{ URL::asset('assets/images/artikelen/' . $product->afbeelding_naam) }}" class="img-responsive img-thumbnail" alt="title" style="width:200px; height:200px;" />
				
				<p>&euro; {{ $product->prijs }}</p>
				<a href="" class="btn btn-success">Bestellen</a>
				<a href="{{ URL::action('ShopController@product', 123) }}" class="btn btn-primary">Meer info</a>
			</div>
		
		@endforeach
	</div>


</div>
@stop