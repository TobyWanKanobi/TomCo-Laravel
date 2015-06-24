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
				
			{{-- */$done=false;/* --}}
			{{-- */$counter=0;/* --}}
			@if(count($producten) === 0)
				
			@else	
				@foreach($producten as $product)
			
					@if(!$done)
						{{-- */$counter++;/* --}}
				
						<div class="col-md-4 text-center">
							<img src="{{ URL::asset('assets/images/artikelen/' . $producten->afbeelding_groot) }}" alt="product_image" style="height: 200px; width: 200px;" />
						</div>
						
						<div class="col-md-6">
							
							<h2 class="h2">{{ $producten->naam }}</h4>
							<p>
								{{ $producten->omschrijving_kort }}
							</p>
							<p>
								{{ $producten->omschrijving_lang }}
							</p>
							
							<div id="price-box" class="col-md-12 text-right">
								<span><strong>{{ $producten->prijs }}</strong></span>
							</div>
							
							<a href="{{ URL::route('add_to_cart', ['id' => $producten->product_id, 'quantity' => 1]) }}" class="btn btn-success pull-right">Voeg toe aan winkelwagen</a>
						</div>
						@if(count($producten) == $counter)
							{{-- */$done=true;/* --}}
						@endif
					@endif
					
				@endforeach
				
			@endif
		</div><!--./row-->
		
	</div><!--./container-->
</div><!--./product-->

<div id="related-products">
	<div class="container-fluid">
		<h2 class="h2 text-center">Gerelateerde artikelen</h2>
		
		<div class="row">
		
		<?php
		//for($i =0; $i < 3; $i++) {
		?>
			<!--<div class="col-md-4 text-center">
				<h3 class="h3">[product_naam]</h3>
					<img src="#" alt=v"product_image" style="height: 100px; width: 100px;" />
				<a href="" class="btn btn-primary">Bekijk</a>
			</div>-->
		<?php
		//}
		?>
			
		</div><!--./row-->
	</div><!--./container-->
	
</div><!--./related-products-->
@stop