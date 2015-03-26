@extends('layouts.default')
@section('content')
<div id="product">
	<div class="container-fluid">
		
		<div class="row">
				
			<div class="col-md-4 text-center">
				<img src="#" alt="product_image" style="height: 200px; width: 200px;" />
			</div>
			
			<div class="col-md-8">
				<h2 class="h2">Product title</h4>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu elementum mauris. Praesent ligula lorem, auctor eu fringilla vel, gravida quis risus. Fusce porttitor purus vel molestie egestas. Nunc a semper odio, at tincidunt urna. Maecenas nec vestibulum tortor. Phasellus lacinia viverra diam, in pulvinar velit ultrices a. Mauris quis dolor elementum, imperdiet eros non, posuere nisl. Cras eu risus auctor, interdum eros quis, blandit nunc. Aliquam feugiat imperdiet augue, quis consectetur eros ultrices ut. In at lorem mi. Curabitur auctor nunc sem, ut tincidunt risus fringilla id.
				</p>
				
				<div id="price-box" class="col-md-12 text-right">
					<span><strong>&euro; 15,99</strong></span>
				</div>
				
				<a href="#" class="btn btn-success pull-right">Voeg toe aan winkelwagen</a>
			</div>

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