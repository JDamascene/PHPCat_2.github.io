<?php 
	session_start();
	include("Includes/Header.inc.php");
?>
<div class="container text-center">
	<form action="ForgotPassword.php" method="post">
		<input type="text" name="Name" required><br>
		<input type="text" name="phonenumber" required><br>
		<button type="submit" name="submit">Check Account</button>
	</form>
</div>

<?php 
	if (isset($_POST['submit'])) {
		extract($_POST);
		require "Includes/DBh.inc.php";
      $Name = mysqli_real_escape_string($Conn,$_POST['Name']);
      $phonenumber = mysqli_real_escape_string($Conn,$_POST['pasword']);

      $sql = "SELECT * FROM 6470users WHERE USERNAME = '$Name' , PHONE = '$phonenumber' `PASWORD` = '$hashedPssword'";
  		$Result = mysqli_query($Conn,$sql);
  		$resultCheck = mysqli_num_rows($Result);

      if ($resultCheck < 1) {
        header('Location: ForgotPassword.php?LogIn=No Match Found');
        exit();
      } else {
        #Verifying The Password
        if ($Row = mysqli_fetch_assoc($Result)) {
          $_SESSION['User'] = $Name;
          $_SESSION['tel'] = $phonenumber;
          
          $hashedPssword = password_verify($pasword ,$Row['PASWORD']);
          $p = $hashedPssword;
          echo "You Password Is $p";
        } 
      }
    } else {
      header('Location: index.php');
      exit();
    }
  		
  
?>



	}
?>


<?php
	include("Includes/Footer.inc.php");
?>