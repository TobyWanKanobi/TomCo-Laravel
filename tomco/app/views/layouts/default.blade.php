<!DOCTYPE html>
<html lang="en">

<head>
	@include('includes.head')
</head>
<body>
	<div class="container">
	
	@include('includes.header')
	
	<div id="main">
	@yield('content')
	</div><!--./main-->
	
	@include('includes.footer')
	</div>
</body>
</html>