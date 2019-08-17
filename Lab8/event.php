<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add an Event</title>
</head>
<body>
<?php // Script 7.9 - event.php
// --------------
// -- Programmer:  [Jessica Alexander]
// -- Course:      ITSE-1306 (Intro to PHP)
// -- Instructor:  Cesar "Coach" Marrero
// -- Assignment:  [Lab8]
// -- Description: [Unordered List]
// ---------------


print "<p>You want to add an event called <b>{$_POST['name']}</b> which takes place on: <br>";
// Print each weekday:
if (isset($_POST['days']) AND is_array($_POST['days'])) {
	print "<ul>";
	foreach ($_POST['days'] as $day) {
		print "<li>$day<br></li>\n";
	}
} else {
	print 'Please select at least one weekday for this event!';
}
// Complete the paragraph:
print '</p>';
print "</ul>";
?>
</body>
</html>