<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<style type="text/css" media="screen">
		.error { color: brown; }
	</style>
</head>
<body>
<h1>Registration Results</h1>
<?php // Script 6.8 - handle_reg.php 
// --------------
// -- Programmer:  [Jessica Alexander]
// -- Course:      ITSE-1306 (Intro to PHP)
// -- Instructor:  Cesar "Coach" Marrero
// -- Assignment:  [Chapter 6 Pursue]
// -- Description: [Displaying Age, Birth Date, and favorite color.]
// ---------------

$year = date('Y');
$Day = $_POST['day'];
$Month = $_POST['month'];
$Year =  $_POST['year'];

$okay = true;

if (empty($_POST['email'])) {
	print '<p class="error">Please enter your email address.</p>';
	$okay = false;
}
if (empty($_POST['password'])) {
	print '<p class="error">Please enter your password.</p>';
	$okay = false;
}
if ($_POST['password'] != $_POST['confirm']) {
	print '<p class="error">Your confirmed password does not match the original password.</p>';
	$okay = false;
}
if ( is_numeric($_POST['year']) AND (strlen($_POST['year']) == 4) ) {
	if ($_POST['year'] < $year) {
		$age = $year - $_POST['year']; 
	} else {
		print '<p class="error">Either you entered your birth year wrong or you come from the future!</p>';
		$okay = false;
	}
	
} else { 
	print '<p class="error">Please enter the year you were born as four digits.</p>';
	$okay = false;
} 
if ( !isset($_POST['terms'])) {
	print '<p class="error">You must accept the terms.</p>';
	$okay = false;	
}
$color = $_POST['color'];
switch ($color) {
	case 'red':
		$color_type = 'primary';
		break;
	case 'yellow':
		$color_type = 'primary';
		break;
	case 'green':
		$color_type = 'secondary';
		break;
	case 'blue':
		$color_type = 'primary';
		break;
	default:
		print '<p class="error">Please select your favorite color.</p>';
		$okay = false;
		break;
} 
if ($okay) {
	print "<p>You have been successfully registered (but not really).</p>";
	print "<p>You were born $Month/$Day/$Year.</p>";
	print "<p>You will turn $age this year.</p>";
	print "<p>Your color was: " . "<strong><font style=\"color:" . $color . "\">" . $color . "</font></strong> and it is a $color_type color.</p>";
}
?>
</body>
</html>