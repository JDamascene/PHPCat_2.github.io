<?php
include("DBh.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<style>
		.form-inline{
			display: inline-flex;
			padding: 5px 0 5px 0;
		}
		.btn{
			margin-left: 5px;
			margin-right: 5px;
		}
		body{
			background-color: #391326;
		}
		.navbar-inverse{
			background-color: #10101075;
			border-color: #10101075;
		}
</style>
</head>
<body> 
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand" href="#">PHP Master Me</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="ForgotPassword.php">Forgot Password</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<form class="form-inline" action="index.php" method="post" >
						<div>
							<input type="text" name="Name" class="form-control" required >
						</div>
						<div>
							<input type="password" name="pasword" class="form-control" required >
						</div>

						<button type="submit" class="btn btn-info" name="submit">Log In</button>
						<button class="btn btn-success"><a href="RegistrationForm.php"><span class="glyphicon glyphicon-user"></span> Register </a></button>
					</form>
					
				</ul>
			</div>
		</div>
	</nav>
