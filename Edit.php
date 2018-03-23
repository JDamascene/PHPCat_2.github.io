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
<?php 
	if (isset($_GET['edit_id'])) {
		$id = (int)$_GET['edit_id'];

		$field = $_GET['edit_id'];
		$result = mysqli_query($Conn, "SELECT ID, Todo_Item FROM Todo_List WHERE ID = '$field' ");
		$row = mysqli_fetch_array($result);
	}
?>
<div class="container">
	<div class="panel panel-info text-center" style='color: #fff; background-color: #ffffff42; border-color: #ffffff42;'>
  		<div class="panel-body ">
  			<h3>Plese Edit The Task</h3>
			<p>Then Press The <span>Make Changes</span> Button To Submit</p>
  		</div>
  	</div>
</div>
	
		
	
</div>
<div class='container'>
	<form action='Edit.php' method='post' class='text-center'>
		<input class='hidden' type='text' name='ID' value='<?php echo "$row[ID]"; ?>' style='width: 100%; height:40px; border-radius: 10px;' required>
		<input class='text-center' type='text' name='EditToDo' value='<?php echo "$row[Todo_Item]"; ?>' style='width: 100%; height:40px; border-radius: 10px;' required><br><br>
		<button class='btn btn-success' type="submit" name="MakeChanges">Make Changes</button>
	</form>
</div>

 <?php 	
	if (isset($_POST['MakeChanges'])) { 
		extract($_POST);

		$field = mysqli_real_escape_string($Conn,$_POST['ID']);
		$EditToDo = mysqli_real_escape_string($Conn,$_POST['EditToDo']);

		$edit = "UPDATE `Todo_List` SET `Todo_Item` = '$EditToDo' WHERE `ID` = '$field'";
		$run = mysqli_query($Conn, $edit);
		if ($run && mysqli_affected_rows($Conn) == 1) {
			header("Location: LogOut.php");
		} else {
			die("update failed " . mysqli_error($Conn));
		}
	}
?>
	<script src="bootstrap/js/Jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body> 
</html>