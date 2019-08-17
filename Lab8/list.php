<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>I Have This Sorted Out</title>
</head>
<body>
<?php // Script 7.7 - list.php
// --------------
// -- Programmer:  [Jessica Alexander]
// -- Course:      ITSE-1306 (Intro to PHP)
// -- Instructor:  Cesar "Coach" Marrero
// -- Assignment:  [Lab8]
// -- Description: [Replace implode with foreach]
// ---------------
$words_array = explode(' ' , $_POST['words']);

sort($words_array);

$string_words = "";
$separator = '<br />';

foreach ( $words_array as $i => $word )
{
    $string_words .= $word . $separator;
}

print "<p>Word list is: <br />$string_words</p>";
?>
</body>
</html>