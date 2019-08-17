<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Is it an Anagram</title>
</head>
<body>
<?php
// --------------
// -- Programmer:  [Jessica Alexander]
// -- Course:      ITSE-1306 (Intro to PHP)
// -- Instructor:  Cesar "Coach" Marrero
// -- Assignment:  [Lab8]
// -- Description: [Determine if the two strings are anagrams]
// ---------------

if(isset($_POST['check'])){
   if((!empty($_POST['word1'])) && (!empty($_POST['word2']))) {
   $string_1=strtoupper($_POST['word1']);
   $string_2=strtoupper($_POST['word2']);

function anagram($string_1, $string_2){
if(strlen($string_1)==(strlen($string_2))){
   if (count_chars($string_1, 1) == count_chars($string_2, 1)) {
       echo "Enter String #1 : <b>".$string_1."</b></br>";
       echo "Enter String #2 : <b>".$string_2."</b></br>";
   echo '<b>"'.$string_1.'"</b> and <b>"'.$string_2.'"</b> are anagrams';
   }else{
   echo "Enter String #1 : <b>".$string_1."</b></br>";
       echo "Enter String #2 : <b>".$string_2."</b></br>";
   echo '<b>"'.$string_1.'"</b> and <b>"'.$string_2.'"</b> are not an anagrams';
   }
}else{
   echo"<script>alert('Words Should be same length')</script>";
}

   }
   anagram($string_1,$string_2);
}else{
   echo"<script>alert('All fields are required')</script>";
}
}
?>