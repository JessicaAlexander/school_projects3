<?php
// --------------
// -- Programmer:  [Jessica Alexander]
// -- Course:      ITSE-1306 (Intro to PHP)
// -- Instructor:  Cesar "Coach" Marrero
// -- Assignment:  [Lab 11]
// -- Description: [Password Strength]
// ---------------
class password {

public function check($password){
   $response = "OK";
$score = 10;

$length = strlen($password);

$hasLetters = preg_match('![a-zA-Z]!', $password);
$hastwoLetters = preg_match("/^[a-zA-Z]{2}$/i", $password);

$hasLower = preg_match('![a-z]!', $password);
$hasUpper = preg_match('![A-Z]!', $password);

$hasNumber = preg_match('![0-9]!', $password);


$hasLettersAndTwoNum = preg_match('!(?=.*[a-zA-Z])(?=.*[0-9]{2,}$)!', $password);

$hasSpecial = preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password);

if($length < 8){
$score = $score - 4;
$response = "Your Score =".$score;
} if(is_numeric($password)){ 
$score = $score - 3;
$response = "Your Score = ".$score;
}
if(!preg_match('#[0-9]#', $password)){
$score = $score - 3;
$response = "Your Score = ".$score;
   }
if($hasLettersAndTwoNum){
$score = $score + 3;
$response = "Your Score = ".$score;
}
if($hasNumber && $hastwoLetters && $hasSpecial){
$score = $score + 3;
$response = "Your Score = ".$score;
}
if($hasNumber && $hasLetters && $hasSpecial){
$score = $score + 4;
$response = "Your Score = ".$score;
}

if ($score < 10) {
$response = "Your Password is Weak, Score = ".$score;
} elseif ($score >= 10 && $score < 13) {
$response = "Your Password is Questionable,Score = ".$score;
} else {
$response = "Your Password is Strong, Score = ".$score;
}
return $response;
}

}
?>