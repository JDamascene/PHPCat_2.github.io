<?php
	include("Includes/DBh.inc.php");
?>
<?php 
		if (isset($_POST['submit'])) {
			session_start();
			session_unset();
			session_destroy();
			header('Location: index.php');
			exit();
		}

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
			margin-top: 5px;
			margin-bottom: 5px;
		}
		body{
			background-color: #391326;
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
				<ul class="nav navbar-nav navbar-right">
					<form action="LogOut.php" method="post">
						<button class="btn btn-danger" name="submit" type="submit" required><span class="glyphicon glyphicon-user"></span >LogOut</button>
					</form>
					
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<h1>Your To Do List</h1>
		
	</div>

	