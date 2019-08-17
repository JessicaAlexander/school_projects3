<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cost Calculator</title>
</head>
<body>
<?php 
// --------------
// -- Programmer:  [Jessica Alexander]
// -- Course:      ITSE-1306 (Intro to PHP)
// -- Instructor:  Cesar "Coach" Marrero
// -- Assignment:  [Chapter 10]
// -- Description: [Creating Functions]
// ---------------
$tax = 8.75;
function calculate_total ($quantity, $price) {
	global $tax;
	
	$total = $quantity * $price; 
	$taxrate = ($tax / 100) + 1;
	$total = $total * $taxrate; 
	$total = number_format ($total, 2); 
	
	return $total; 
} 
if (isset($_POST['submitted'])) {
	if ( is_numeric($_POST['quantity']) AND is_numeric($_POST['price']) ) {
	
		$total = calculate_total($_POST['quantity'], $_POST['price']);
		print "<p>Your total comes to $<span style=\"font-weight: bold;\">$total</span>, including the $tax percent tax rate.</p>";
		
	} else { 
		print '<p style="color: red;">Please enter a valid quantity and price!</p>';
	}
	
}
?>
<form action="" method="post">
	<p>Quantity: <input type="text" name="quantity" size="3"></p>
	<p>Price: <input type="text" name="price" size="5"></p>
	<input type="submit" name="submit" value="Calculate!">
	<input type="hidden" name="submitted" value="true">
</form>
</body>
</html>