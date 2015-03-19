<div id="header">
	<div id="logo">
		<img src="{{ URL::asset('assets/images/logo.png') }}" alt="logo" style="width:auto;height:200px">
	</div>
	
	<!-- Navigation -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Tomco</a>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="{{ URL::to("/") }}">Home <span class="sr-only">(current)</span></a></li>
					<li><a href="{{ URL::to("products/browse") }}">Producten</a></li>
					<li><a href="{{ URL::to("products/browse") }}">Over Ons</a></li>
					<li><a href="{{ URL::to("products/browse") }}">Contact</a></li>
				</ul>
				
				<div class="col-sm-3 col-md-3 pull-right">
					<form class="navbar-form" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<!-- Navigation End -->
	
	<!--Begin unique sellingpoints-->
	<div class="row">
		<div class="col-md-2">
			<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Gratis thuisbezorgd
		</div>
		<div class="col-md-2">
			<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> 50 tuincentra
		</div>
		<div class="col-md-3">
			<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Servicedesk van 07:00 t/m 22:00
		</div>
		<div class="col-md-2">
			<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Gigantisch assortiment
		</div>
		<div class="col-md-3">
			<span class="glyphicon glyphicon-time" aria-hidden="true"></span> Voor 15:00 besteld morgen in huis
		</div>
	</div>
	<!--Einde unique sellingpoints-->
</div>