<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Chapter 7</title>
</head>
<body>
<h2> Best Makeup Brands</h2>
<?php
// --------------
// -- Programmer:  [Jessica Alexander]
// -- Course:      ITSE-1306 (Intro to PHP)
// -- Instructor:  Cesar "Coach" Marrero
// -- Assignment:  [Lab8]
// -- Description: [Multidimensional Array]
// ---------------

$company = array(
1 => 'Naked','MAC', 'Jeffree Star');
$type = array(
1 => 'Eyeshadow','Mascara','Lipstick');
$brand = array(
1 => 'Urban Decay', 'PlayLash', 'Velour Liquid Lipstick');
$best = array(
'Maker' => $company,
'type' => $type,
'brand' => $brand );
print "<p>The best eye makeup comes from {$best['Maker'][1]} Urban Decay eyeshadow";
print "<p>The best mascara will be MAC's PlayLash {$best['type'][2]}";
print "<p>The best lipstick is Jeffree Star's {$best['brand'][3]}";
foreach ($best as $name => $typez){

 foreach ($typez as $makeup => $types){
  print "<p>Makeup by company, type and brand: $types\n</p>";
 }
}
?>
</body>
</html>