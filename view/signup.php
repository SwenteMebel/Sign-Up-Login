<?php
include_once "../controller/functions.php";
session_unset();


echo <<<_END

<form method='post' action='../model/signup.model.php'>
<input type="text" name="naam" placeholder='gebruikersnaam'><br>
<input type='email' name='email' placeholder='email'><br>
<input type='password' name='wachtwoord' placeholder='wachtwoord'><br><br>
<input type='submit' value='Bevestigen'>
</form>
_END;

?>