<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	
	<!-- Holder.js -->
	<script src="assets/js/holder.min.js"></script>
	<!-- Bootstrap -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<script src="assets/js/bootstrap.min.js"></script>
	
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
	<div class="container">
	
	@yield('header')
	<?php //require_once('header.php');?>
	
	<div id="main">
	<?php
	if(isset($_GET['page'])) {
		
		$page = $_GET['page'];
		//require_once($page . '.php');
	
	} else {
		
		//require_once('home.php');
	
	}?>
	</div><!--./main-->
	
	<?php //require_once('footer.php');?>
	</div>
</body>
</html>