<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="Ruleof72.css">
    <head>
        <title>Rule of 72</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <form method="post" action="Ruleof72.php">
            <br>
            <strong>Enter Rate of Return :
            <input type="textbox" name="returnRate"/>
            <br>
        <br>
        <input type="Submit" name="btnSubmit"/>
</strong>
        <br>
<?php
// --------------
// -- Programmer:  [Jessica Alexander]
// -- Course:      ITSE-1306 (Intro to PHP)
// -- Instructor:  Cesar "Coach" Marrero
// -- Assignment:  [Rule of 72]
// -- Description: [How long it will take to double your investment.]
// ---------------
if(isset($_POST['btnSubmit']))
{
    $returnRate=$_POST['returnRate'];

if(strval($returnRate)==='0')
    {
        print "<strong><br/> can't divide by zero</strong>";
    }
else if(is_numeric($returnRate))
    {
        print "<br/><strong>It would take ".round((72/$returnRate))." years to double your investment</strong>";
    }
else
    {
        print "<strong><br/>".$returnRate." : Enter numeric value</strong>";
    }
}
?>
</form>
</body>
</html>