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
	<link rel="stylesheet" type="text/css" href="bootstrap/fonts/font-awesome.css">
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
	.badge{
		font-size: 25px;
		background-color: #59b300;
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
<div class="container text-center" >
	<form action="Search.php" method="post" >
		<input type="text" name="SearchTask" style="text-align: center; width: 40%; height:40px; border-radius: 30px;" placeholder="Type whatever you want to search" required>

		<button class="btn btn-info" type="submit" name="Search" style="font-size: 16px; border-radius: 50%;"><i class="fa fa-search"></i></button>
	</form>
?>
	<h1 style="color: #fff;">Your To Do <span class="badge">List</span></h1>
	<form action="LogOut.php" method="post">
		<div class="row">
			<div class="col-md-8" style="color: #000;">
				<input type="text" name="ToDo" placeholder="  Type in a task to be done" style="width: 100%; height:40px; border-radius: 10px;" required>
			</div>
			<div class="col-md-4">
				<button type="submit" name="adTodo" class="btn btn-info btn-block">Ad Task</button>
			</div>
		</div>
	</form>	
</div>
</div>
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
		
	} 
?>
<br><br>
<div class="container text-center">
	<div class="table-responsive ">          
		<table class="table table-hover" style="color: #ff3399;">
			<thead style="color: #fff;" >
				<tr>
					<th>Index_No.</th>
					<th>Task To Be Done</th>
					<th>DELETE</th>
					<th>EDIT</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$x = 1; 
					//fetch data and display it in the table
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr> 
								<td> $x </td>
								<td> $row[Todo_Item]</td>
								<td>
								<a href = 'Delete.php?del_id=$row[ID]'<button class='btn btn-danger'>Delete</button>
								</td>
								<td>
								<a href = 'Edit.php?edit_id=$row[ID]'<button class='btn btn-warning'>Edit</button>
								</td>
						</tr>";
						$x++;
					}
				?>
<?php 
	/*if (isset($_GET['del_id'])) {
		$del = "DELETE FROM `Todo_List` WHERE ID = $_GET[del_id] LIMIT 1";
		$run = mysqli_query($Conn, $del);
		if ($run && mysqli_affected_rows($Conn) == 1) {
			header('Location: LogOut.php');
		} else {
			die("delete failed " . mysqli_error($Conn));
		}
	} */
?>
			</tbody>
		</table>
	</div>
</div> 
<?php 
	/*if (isset($_GET['edit_id'])) {
		$id = (int)$_GET['edit_id'$field = $id;;
		$result = mysqli_query($Conn, "SELECT Todo_Item FROM Todo_List WHERE ID = '$field' ");
		$row = mysqli_fetch_array($result);
		
		// Displaying an edit form
		echo "
			<div class='container'>
			<form action='LogOut.php' method='post' class='text-center'>
				<input class='text-center' type='text' name='EditToDo' value='$row[Todo_Item]' style='width: 100%; height:40px; border-radius: 10px;' required><br><br>
				<a href = 'LogOut.php?MakeChanges_id=$field'<button class='btn btn-success'>Make Changes</button>
			</form>
			</div>
		";	
	if (isset($_GET['MakeChanges_id'])) { 
		$EditToDo = mysqli_real_escape_string($Conn,$_POST['edit_toDo']);

		$edit = " UPDATE `Todo_List` SET `Todo_Item` = '$EditToDo' WHERE `ID` = '$field' ";
		$run = mysqli_query($Conn, $edit);
		if ($run && mysqli_affected_rows($Conn) == 1) {
			//header("Location: LogOut.php");
		} else {
			die("update failed " . mysqli_error($Conn));
		}
	}
} */
?>
	<script src="bootstrap/js/Jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body> 
</html> 