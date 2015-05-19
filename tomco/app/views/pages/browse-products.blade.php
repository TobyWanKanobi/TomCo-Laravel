@extends('layouts.default')
@section('content')

<?php
function generateCategories($categorien) {
	
	$html = '';
	
	$html .= '<ol>';
	
	foreach($categorien as $cat) {
		
		$html .= '<li>';
		$html .= '<a href="' . URL::to('categorie/'.$cat->naam) . '">' . $cat->naam . '</a>';
		
		if(!empty($cat->subCategorien())) {
			
			$html .= generateCategories($cat->subCategorien()->get());
		}
		
		$html .= '</li>';
	}
	
	$html .= '</ol>';
	
	return $html;
}

?>

<div class="col-lg-3">
	<div id="categories">
	<?php
		echo generateCategories($categorieen);
	?>
	</div>
</div>
<div class="col-lg-9">

	<div id="products">

		@if (count($producten) === 0)
			<div class="alert alert-warning" role="alert">Er zijn geen producten in deze categorie.</div>
		@endif
		
		@foreach($producten as $product)
		
			<div class="col-sm-6 col-md-4 well text-center">
				<h2 class="h4">{{ $product->naam }}</h2>
					<img src="{{ URL::asset('assets/images/artikelen/' . $product->afbeelding_groot) }}" class="img-responsive img-thumbnail" alt="title" style="width:200px; height:200px;" />
				
				<p>&euro; {{ $product->prijs }}</p>
				<a href="" class="btn btn-success">Bestellen</a>
				<a href="#" class="btn btn-primary">Meer info</a>
			</div>
		
		@endforeach
	</div>


</div>
@stop