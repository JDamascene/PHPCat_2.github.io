<?php
  session_start();
	include("Includes/Header.inc.php");
  echo "
    <div class='container'>
      <div class='jumbotron text-center'>
        <h1>Hi There, Welcome To My PHP Web Page.</h1>
        <p>Please Log In Or Register As A User.</p>
      </div>
    </div>
  ";
?>


<?php
  require "Includes/DBh.inc.php";

  #Authenticate user
  if (isset($_POST['submit'])) {
  		extract($_POST);

      $Name = mysqli_real_escape_string($Conn,$_POST['Name']);
      $pasword = mysqli_real_escape_string($Conn,$_POST['pasword']);

      $sql = "SELECT * FROM 6470users WHERE USERNAME = '$Name'";
  		$Result = mysqli_query($Conn,$sql);
  		$resultCheck = mysqli_num_rows($Result);

      if ($resultCheck < 1) {
        header('Location: index.php?LogIn=Login Error1');
        exit();
      } else {
        #Verifying The Password
        if ($Row = mysqli_fetch_assoc($Result)) {
          # Dehas The Password
          $hashedPssword = password_verify($pasword ,$Row['PASWORD']);
          if ($hashedPssword == false) {
            header('Location: index.php?LogIn=Login Error Password');
          } elseif ($hashedPssword == true) {
            #Log In User Sessions
            $_SESSION['ID'] = $Row['ID'];
            $_SESSION['Name'] = $Row['USERNAME'];
            $_SESSION['pasword'] = $Row['PASWORD'];
            $_SESSION['phonenumber'] = $Row['PHONE'];
            
            if (isset($_SESSION['Name'])) {
              header('Location: LogOut.php');
            } 
            exit();
          }
        } 
      }
    } else {
      header('Location: index.php');
      exit();
    }
  		
  
?>
<?php
	include("Includes/Footer.inc.php");
?>

