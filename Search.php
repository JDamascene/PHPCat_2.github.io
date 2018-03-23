 <?php
	include("Includes/DBh.inc.php");
	
	//DB Connection for the to do list items
	$ServerName = "localhost";
	$User = "Admin1";
	$Password = "admin101thebestest";
	$DB_Name = "6470_DB";

	$query = ("SELECT * FROM Todo_List");
	$result = mysqli_query($Conn, $query);
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
	<script src="bootstrap/js/Jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
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
				<a class="navbar-brand" href="LogOut.php">PHP Master Me</a>
				<a class="navbar-brand" href="LogOut.php">    Home </a>
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
<div class="container text-center">
	<h1 style="color: #fff;" >Here Are Your Search Results</h1>
	    <div class="jumbotron " style="color: #fff; background-color: #08080894; padding: 0; padding-top: 10px; margin: 0;">
<!--The Search code-->
 <?php 	
 	$x = 1; 
	if (isset($_POST['Search'])) { 
		extract($_POST);

		$result = mysqli_query($Conn, "SELECT * FROM Todo_List WHERE Todo_Item LIKE '%{$SearchTask}%'");
		
		while ($row = mysqli_fetch_array($result)) { ?>

	    	<h4>
	        	<?php echo $x . ".   "; echo $row['Todo_Item'] ; ?>
	        </h4>
	    <br>   

		<?php  $x++; } } ?>
 	</div>
 	<br><br>
 	<a href="LogOut.php"> <button class="btn btn-success">Go Back To Main Page?</button> </a>
</div>    
	
	<script src="bootstrap/js/Jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body> 
</html>