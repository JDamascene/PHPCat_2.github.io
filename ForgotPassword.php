<?php 
	session_start();
	include("Includes/Header.inc.php");

?>

<div class="container text-center">
  <h1 style="color: #fff;">Forgot Your Password</h1>
  <h4 style="color: #fff;">Plese Fill In The Form</h4>
	<form action="ForgotPassword.php" method="post">
		<input type="text" name="Name" style='width: 100%; height:40px; border-radius: 10px;' placeholder="User Name" required>
    <br><br>
		<input type="text" name="phonenumber" style='width: 100%; height:40px; border-radius: 10px;'  placeholder="Phone Number" required>
    <br><br>
		<button type="submit" name="CheckResults">Check Account</button>
	</form>
</div>


<?php 
  if (isset($_POST['CheckResults'])) {
  extract($_POST); 

  $Name = mysqli_real_escape_string($Conn,$_POST['Name']);
  $phonenumber = mysqli_real_escape_string($Conn,$_POST['phonenumber']);

  $sql = "SELECT * FROM 6470users WHERE USERNAME = '$Name'";
  $Records = mysqli_query($Conn, $sql);
  
  $row = mysqli_fetch_assoc($Records);
  $resultCheck = mysqli_num_rows($Records);
  if ($resultCheck < 1) {
      $error = "You don't have an acount";
        echo "<h1 class='text-center'>$error</h1>";
        exit();
    } else {
      //echo "$row[ID]";
      header("Location: ResetPassword.php?UsID=$row[ID] ");
    }
    
  } 
?>


<?php
	include("Includes/Footer.inc.php");
?>