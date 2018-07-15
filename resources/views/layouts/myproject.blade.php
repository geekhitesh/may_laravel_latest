<html>


<head>
  <title>Layout Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<div class="container">

	<div class="row">This is header</div>
	
	<div class="row">
	  <div class="col-sm-6">@yield('content1')</div>
	  <div class="col-sm-6">@yield('content2')</div>
	</div>	

	<div class="row">
	  <div class="col-sm-3">@yield('content3')</div>
	  <div class="col-sm-3">@yield('content4')</div>
	  <div class="col-sm-3">@yield('content5')</div>
	  <div class="col-sm-3">@yield('content6')</div>
	</div>	

	<div class="row">This is footer</div>		
</div>


</html>