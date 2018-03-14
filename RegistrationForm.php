<?php
  include("Includes/Header.inc.php");
?>
<div class="container">
	<div class="jumbotron">
		<h3 class="text-center">REGISTER</h3>
		<form role="form" action="RegistrationForm.php" method="post">
      <label class="text-left">User Name</label>
			<input type="text" name="Name" class="form-control">
      <br>
      <label class="text-left">Password</label>
			<input type="password" name="pasword" class="form-control" placeholder="password" required >
      <br>
			<input type="text" name="phonenumber" class="form-control" placeholder="Phone Number" required >
      <br>
			<button type="submit" class="btn btn-info btn-block" name="submit">Register</button>
		</form>
	</div>
</div>

<?php 
require "Includes/DBh.inc.php";
session_start();

if (isset($_POST['submit'])) {
 extract($_POST);
 $Name = mysqli_real_escape_string($Conn,$_POST['Name']);
 $pasword = mysqli_real_escape_string($Conn,$_POST['pasword']);
 $phonenumber = mysqli_real_escape_string($Conn,$_POST['phonenumber']);


      # Veryfying the username's euniqueness
 $sql = "SELECT * FROM 6470users WHERE ID = '$ID'";
 $Result = mysqli_query($Conn,$sql);
 $resultCheck = mysqli_num_rows($Result);
 if ($resultCheck > 0) {
  $error = "The Use Name has already been taken";
  echo "<h1 class='text-center'>$error</h1>";
  exit();
} else {
        #Hash The password
  $hashedPssword = password_hash($pasword ,PASSWORD_DEFAULT);
  # Insert User Details Into The Data Base
  $query = "INSERT INTO `6470users` SET `USERNAME` = '$Name' ,`PASWORD` = '$hashedPssword',`PHONE` = '$phonenumber'";

  $Insert = mysqli_query($Conn, $query);
  if ($Insert) {
    header('Location: index.php?index=The User has been Registered successfully');
    exit();
  } else {
    echo "<h1>User Registeration Was Unsuccessful...</h1>" . mysqli_error($Conn);
  }
}
}
?>
<?php
include("Includes/Footer.inc.php");
?>