@if(Auth::check()) 
	
@if(Auth::user()->rol == 'admin')

<!DOCTYPE html>
<html lang="nl">

<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="#">

    <title>Administration Panel</title>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	
	<!-- Holder.js -->
	<script src="{{ URL::asset('assets/js/holder.min.js') }}"></script>
	
	<!-- Bootstrap -->
	<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
	
	<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">


    <!-- Custom CSS -->
	<link href="{{ URL::asset('assets/admin/css/sb-admin.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
	<link href="{{ URL::asset('assets/admin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div id="wrapper">
	
	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html">TomCo tuinartikelen beheer</a>
		</div>
		
		<!-- Top Menu Items -->
		<ul class="nav navbar-right top-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
						<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="{{ URL::to('logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
					</li>
				</ul>
			</li>
		</ul>
			
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
					@if(Request::path() === 'admin')
						<li class="active">
							<a href="{{ URL::to('admin') }}"><i class="fa fa-fw fa-dashboard"></i>Dashboard <span class="sr-only">(current)</span></a>
						</li>
					@else
						<li><a href="{{ URL::to('admin') }}"><i class="fa fa-fw fa-dashboard"></i>Dashboard </a></li>
					@endif
					@if(Request::path() === 'admin/producten')
						<li class="active">
							<a href="javascript:;" data-toggle="collapse" data-target="#producten"><i class="fa fa-fw fa-archive"></i> Producten<span class="sr-only">(current)</span> <i class="fa fa-fw fa-caret-down"></i></a>
							<ul id="producten" class="collapse">
								<li class="active">
									<a href="{{ URL::route('products') }}"><i class="fa fa-fw fa-sitemap"></i>Overzicht <span class="sr-only">(current)</span></a>
								</li>
								<li>
									<a href="{{ URL::route('create_product') }}"><i class="fa fa-fw fa-plus"></i>Nieuw product</a>
								</li>
							</ul>
						</li>
					@else
						<li>
							<a href="javascript:;" data-toggle="collapse" data-target="#producten"><i class="fa fa-dropbox"></i> Producten <i class="fa fa-fw fa-caret-down"></i></a>
							<ul id="producten" class="collapse">
								<li class="active">
									<a href="{{ URL::route('products') }}"><i class="fa fa-fw fa-list"></i> Overzicht</a>
								</li>
								<li>
									<a href="{{ URL::route('create_product') }}"><i class="fa fa-fw fa-plus"></i> Nieuw product</a>
								</li>
							</ul>
						</li>
					@endif
					@if(Request::path() === 'admin/bestellingen')
						<li class="active">
							<a href="{{ URL::route('bestellingen') }}"><i class="fa fa-file-text"></i> Bestellingen<span class="sr-only">(current)</span></a>
						</li>
					@else
						<li>
							<a href="{{ URL::route('bestellingen') }}"><i class="fa fa-file-text"></i> Bestellingen</a>
						</li>
					@endif
					@if(Request::path() === 'admin/categorie/beheer' || Request::path() === 'admin/categorie/nieuw')
						<li class="active">
							<a href="javascript:;" data-toggle="collapse" data-target="#categorieen"><i class="fa fa-fw fa-sitemap"></i> Categorie&euml;n <span class="sr-only">(current)</span><i class="fa fa-fw fa-caret-down"></i></a>
							<ul id="categorieen" class="collapse">
								<li>
									<a href="{{ URL::route('categorie_beheer') }}"><i class="fa fa-fw fa-list"></i>Overzicht</a>
								</li>
								<li>
									<a href="{{ URL::route('create_categorie') }}"><i class="fa fa-fw fa-plus"></i>Nieuwe Categorie</a>
								</li>
							</ul>
						</li>
					@else
						<li>
							<a href="javascript:;" data-toggle="collapse" data-target="#categorieen"><i class="fa fa-fw fa-sitemap"></i> Categorie&euml;n <i class="fa fa-fw fa-caret-down"></i></a>
							<ul id="categorieen" class="collapse">
								<li>
									<a href="{{ URL::route('categorie_beheer') }}"><i class="fa fa-fw fa-list"></i> Overzicht</a>
								</li>
								<li>
									<a href="{{ URL::route('create_categorie') }}"><i class="fa fa-fw fa-plus"></i> Nieuwe Categorie</a>
								</li>
							</ul>
						</li>
					@endif
					@if(Request::path() === 'admin/klant')
						<li class="active">
							<a href="{{ URL::route('klant') }}"><i class="fa fa-fw fa-group"></i> Klant<span class="sr-only">(current)</span></a>
						</li>
					@else
						<li>
							<a href="{{ URL::route('klant') }}"><i class="fa fa-fw fa-group"></i> Klant</a>
						</li>
					@endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
               <!-- Page Heading -->
               <!-- <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small>Overzicht</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Overzicht
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				@yield('content')
			   
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
</body>
</html>
@else
	Deze pagina is niet beschikbaar voor u! Klik hier om terug te gaan naar <a href="{{ URL::to('home') }}">Homepage</a>
@endif
@else
	Deze pagina is niet beschikbaar voor u! Klik hier om terug te gaan naar <a href="{{ URL::to('home') }}">Homepage</a>
@endif
