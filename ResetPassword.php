<?php 
	session_start();
	include("Includes/Header.inc.php");

?>

<div class="container text-center">
  <h1 style="color: #fff;">Reset Your Password</h1>
	<form action="ResetPassword.php" method="post">
    <input class='hidden' type='text' name='UsID' value='<?php echo "$_GET[UsID]"; ?>' style='width: 100%; height:40px; border-radius: 10px;' required>
		<input class="text-center" type="text" name="PassNew" style='width: 100%; height:40px; border-radius: 10px;' placeholder="Please Type In New Password" required>
    <br><br>
		<button class="btn btn-warning btn-block" type="submit" name="Reset" style='width: 100%; height:40px; border-radius: 10px;'>Reset Password</button>
	</form>
</div>


<?php 
  if (isset($_POST['Reset'])) {
  extract($_POST); 

  $Id = mysqli_real_escape_string($Conn,$_POST['UsID']);
  $PassNew = mysqli_real_escape_string($Conn,$_POST['PassNew']);

  #Hash The password
  $hashedPssword = password_hash($PassNew ,PASSWORD_DEFAULT);
  
  $edit = "UPDATE `6470users` SET `PASWORD` = '$hashedPssword' WHERE `ID` = '$Id'";
    $run = mysqli_query($Conn, $edit);
    if ($run && mysqli_affected_rows($Conn) == 1) {
      header("Location: index.php");
    } else {
      die("update failed " . mysqli_error($Conn));
    }
}
?>


<?php
	include("Includes/Footer.inc.php");
?>