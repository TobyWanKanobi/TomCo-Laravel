<div id="header">
	
	<div class="row">
	
		<div class="col-md-5" id="logo">
			<img src="{{ URL::asset('assets/images/logo.png') }}" alt="logo" style="width:auto;height:200px">
		</div>
		
		<div class="pull-right" style="padding: 5px;">
				<a href="{{ Url::route('shopping_cart') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Winkelwagen</a>
			@if (Auth::guest())
				<a href="{{ URL::to('login') }}" class="btn btn-success"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Inloggen</a>
				<a href="{{ URL::to('register') }}" class="btn btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Registreren</a>
			@else
				<a href="#" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Winkelwagen</a>
				<a href="{{ URL::to('logout') }}" class="btn btn-success"><span class="glyphicon glyphicon-eject" aria-hidden="true"></span> Logout</a>
			@endif
		
		</div>	
		
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
				<a class="navbar-brand" href="{{ URL::to("/") }}">Tomco</a>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="{{ URL::to("/") }}">Home <span class="sr-only">(current)</span></a></li>
					<li><a href="{{ URL::to('producten') }}">Producten</a></li>
					<li><a href="{{ URL::to('over-ons') }}">Over Ons</a></li>
					<li><a href="{{ URL::to('contact') }}">Contact</a></li>
				</ul>
				
				<div class="col-sm-3 col-md-3 pull-right">
				
					{!! Form::open(['route' => 'search', 'method' => 'get', 'class' => 'navbar-form', 'role' => 'search']) !!}
						
						<div class="input-group">
							{!! Form::text('term','', ['class' => 'form-control', 'placeholder' => 'Zoeken']) !!}
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
					{!! Form::close() !!}
					<!--<form action="{{ URL::route('search') }}" method="get" class="navbar-form" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search" name="term" id="srch-term">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
					</form>-->
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