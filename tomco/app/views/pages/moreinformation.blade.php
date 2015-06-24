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
{!! Breadcrumbs::render('more_information', $product) !!}
<div id="product">
	<div class="container-fluid">
		
		<div class="row">
				
			<div class="col-md-2">
				<div id="categories">
					<?php
						echo generateCategories($categorieen);
					?>
				</div>
			</div>
				
						<div class="col-md-4 text-center">
							<img src="{{ URL::asset('assets/images/artikelen/' . $product->afbeelding_groot) }}" alt="product_image" style="height: 200px; width: 200px;" />
						</div>
						
						<div class="col-md-6">
							
							<h2 class="h2">{{ $product->naam }}</h4>
							<h4>Omschrijving Kort</h4>
							<p>
								<br/>
								{{ $product->omschrijving_kort }}
							</p>
							<br/><h4>Omschrijving Lang</h4>
							<p>
								<br/>
								{{ $product->omschrijving_lang }}
							</p>
							
							<div id="price-box" class="col-md-12 text-right">
								<span><strong>&euro; {{ $product->prijs }}</strong></span>
							</div>
							<br/>
							<br/>
							<a href="{{ URL::route('add_to_cart', ['id' => $product->product_id, 'quantity' => 1]) }}" class="btn btn-success pull-right"><li class="glyphicon glyphicon-shopping-cart"></li> Voeg toe aan winkelwagen</a>
						</div>
		</div><!--./row-->
		
	</div><!--./container-->
</div><!--./product-->
@stop