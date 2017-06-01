<!DOCTYPE html>
<html>
	<head>
		<title>Material Design for Bootstrap temporary development test case</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Mobile support -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Material Design fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<!-- Bootstrap Material Design -->
		<link href="{{ asset('bootstrap-material-design-master/dist/css/bootstrap-material-design.css') }}" rel="stylesheet">
		<link href="{{ asset('bootstrap-material-design-master/dist/css/ripples.min.css') }}" rel="stylesheet">
		<!-- Dropdown.js -->
		<link href="//cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.css" rel="stylesheet">
		<!-- Page style -->
		<link href="{{ asset('bootstrap-material-design-master/index.css') }}" rel="stylesheet">
		<!-- jQuery -->
		<a href="//code.jquery.com/jquery-1.10.2.min.js"><!--//code.jquery.com/jquery-1.10.2.min.js--></a>
	</head>
	<body>
		<!--
		Test case
		-->
		<div class="navbar navbar-info">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/keluhan">Pendidikan Teknik Informatika dan Komputer</a>
				</div>
				<div class="navbar-collapse collapse navbar-warning-collapse">
					<!--
					<ul class="nav navbar-nav">
					</ul>
					-->
					<form class="navbar-form navbar-left">
						<div class="form-group">
							<input type="text" class="form-control col-md-8" placeholder="Search">
						</div>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="">Nama Kamu</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			@yield('content') 
			<!-- untuk menampung content -->
		</div>
		<!--
		Scripts
		-->
	</body>
</html>