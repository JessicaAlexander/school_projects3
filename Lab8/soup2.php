<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>No Soup for You!</title>
</head>
<body>
<h1>Mmm...soups</h1>
<?php // Script 7.2 - soups2.php
// --------------
// -- Programmer:  [Jessica Alexander]
// -- Course:      ITSE-1306 (Intro to PHP)
// -- Instructor:  Cesar "Coach" Marrero
// -- Assignment:  [Lab8]
// -- Description: [Displays number of elements in a array]
// ---------------

$soups = [
	'Monday' => 'Clam Chowder',
	'Tuesday' => 'White Chicken Chili',
	'Wednesday' => 'Vegetarian'
];
// Count and print the current number of elements:
print "<p>The soups array originally had " . count($soups) . " elements </p>";// Add three items to the array:

$soups['Thursday'] = 'Chicken Noodle';
$soups['Friday'] = 'Tomato';
$soups['Saturday'] = 'Cream of Broccoli';
// Count and print the number of elements again:
print "<p>After adding 3 more soups, the array now has " . count($soups) . " elements.</p>";
print_r($soups);
?>
</body>
</html>