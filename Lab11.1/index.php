<?php
// --------------
// -- Programmer:  [Jessica Alexander]
// -- Course:      ITSE-1306 (Intro to PHP)
// -- Instructor:  Cesar "Coach" Marrero
// -- Assignment:  [Lab 11]
// -- Description: [Password Strength]
// ---------------
$password = "";
$status = "";
if(isset($_POST["password"])){
   $password = $_POST["password"];
   include_once("password.php");
   $pass = new password();
   $response = $pass->check($password);
       $status = $response;

}
?>
<h2> Password Strength </h2>
<form action="index.php" method="post">
<input name="password" type="password" value="<?php echo $password; ?>"> </br></br>
<input type="submit" value="Check Password Strength">
</form>
<h3><?php echo $status; ?></h3>