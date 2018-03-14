<?php
include("Includes/DBh.inc.php");
	
	//DB Connection
	$ServerName = "localhost";
	$User = "Admin1";
	$Password = "admin101thebestest";
	$DB_Name = "6470_DB";
	
	$conn = new mysqli($ServerName,$User,$Password,$DB_Name);
	$query = mysqli_query("SELECT * FROM Todo_List");
	$result = mysqli_query($conn, $query);
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
				<ul class="nav navbar-nav navbar-right">
					<form action="LogOut.php" method="post">
						<button class="btn btn-danger" name="submit" type="submit" required><span class="glyphicon glyphicon-user"></span >LogOut</button>
					</form>
					
				</ul>
			</div>
		</div>
	</nav>

<div class="container text-center" style="color: #fff;">
	<h1>Your To Do List</h1>
	<form action="LogOut.php" method="post">
		<div class="row">
			<div class="col-md-8">
				<input type="text" name="ToDo" placeholder="Type in a task to be done" style="width: 100%; height:40px; border-radius: 10px;">
			</div>
			<div class="col-md-4">
				<button type="submit" name="adTodo" class="btn btn-info btn-block">Ad Task</button>
			</div>
		</div>
	</form>	
</div>
<br><br>
<div class="container text-center">
	<div class="table-responsive table-striped">          
		<table class="table">
			<thead style="color: #fff;" >
				<tr>
					<th>Index_ID</th>
					<th>Task To Be Done</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<?php 
	//fetch data and display it in the table
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr> 
				<td> $row[ID]</td>
				<td> $row[Todo_Item]</td>
				<td>
				<a herf ='View.php?del_P_Number=$row[P_Number]' class='btn btn-danger'>Delete</a>
				</td>
				<td><button class='btn btn-warning'>Edit</button></td>

		</tr>";
	}
?>
<?php 
if (isset($_POST['adTodo'])) {
	extract($_POST); 

	$ID = mysqli_real_escape_string($Conn,$_POST['ID']);
	$ToDo = mysqli_real_escape_string($Conn,$_POST['ToDo']);
	$query = "INSERT INTO `Todo_List` SET `ID` = '$ID' ,`Todo_Item` = '$ToDo' ";

	$Insert = mysqli_query($Conn, $query);
	if ($Insert) {
		header('Location: LogOut.php?LogOut=added successfully');
		
	} else {
		echo "<h1>User Registeration Was Unsuccessful...</h1>" . mysqli_error($Conn);
	}
		
	} else {
		exit();
	}

		  ?>




