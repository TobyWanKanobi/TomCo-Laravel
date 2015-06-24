@extends('layouts.default')
@section('content')

<!--Begin carousel-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">

	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class=""></li>
		<li data-target="#myCarousel" data-slide-to="1" class=""></li>
		<li data-target="#myCarousel" data-slide-to="2" class="active"></li>
	</ol>
	
	<div class="carousel-inner" role="listbox">
		<div class="item">
			<img src="assets/images/slider/aanbieding_philips_verlichting.png" alt="First slide">
			<!--<div class="container">
				<div class="carousel-caption">
					<h1>Example headline.</h1>
					<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
					<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
				</div>
			</div>-->
		</div>
		
		<div class="item active left">
			<img src="assets/images/slider/tuinmeubelen.png" alt="First slide">
			<!--<div class="container">
				<div class="carousel-caption">
					<h1>Example headline.</h1>
					<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
					<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
				</div>
			</div>-->
		</div>
		
		<div class="item next left">
			<img src="assets/images/slider/regentonnen.png" alt="First slide">
			<!--<div class="container">
				<div class="carousel-caption">
					<h1>Example headline.</h1>
					<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
					<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
				</div>
			</div>-->
		</div>
	</div><!--./carousel-inner-->
	
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<!--Einde carousel-->

<!--Begin Top-sellers-->
<div id="top-sellers" class="container-fluid text-center">
	<h2 class="h2">Top-sellers</h2>
	<div class="row text-center">
	
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">Schep</div>
				<div class="panel-body">
					<a href="#"><img src="assets/images/artikelen/schep.jpg" class="img-thumbnail img-responsive"></a>
				</div>
				<div class="panel-footer">&euro; 75,00</div>
			</div>	
		</div>
	
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">Tegel</div>
				<div class="panel-body">
					<a href="#"><img src="assets/images/artikelen/tegelpatroon.jpg" class="img-thumbnail img-responsive"></a>
				</div>
				<div class="panel-footer">&euro; 150,00</div>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">Schep</div>
				<div class="panel-body">
					<a href="#"><img src="assets/images/artikelen/schep.jpg" class="img-thumbnail img-responsive"></a>
				</div>
				<div class="panel-footer">&euro; 75,00</div>
			</div>	
		</div>
		
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">Vijver</div>
				<div class="panel-body">
					<a href="#"><img src="assets/images/artikelen/blokkenvijver.jpg" class="img-thumbnail img-responsive"></a>
				</div>
				<div class="panel-footer">&euro; 1175,00</div>
			</div>
		</div>
		
	</div><!--./row-->
</div><!--./container-->
<!--Einde Top-seller-->
@stop