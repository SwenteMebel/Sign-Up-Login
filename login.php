<?php
include "functions.php";
session_unset();


echo <<<_END
<form method='post' action='login.php'>
<input type="text" name="naam" placeholder='gebruikersnaam'><br>
<input type='password' name='wachtwoord' placeholder='wachtwoord'><br><br>
<input type='submit' value='Login'>

</form>
_END;

if(isset($_POST['naam'])){
    $naam = sanitiseString($_POST['naam']);
    $wachtwoord = sanitiseString($_POST['wachtwoord']);


    if ($naam == "" || $wachtwoord == ""){
        $error = "De velden zijn niet juist ingevuld";
        echo $error;
    } else {
        $result = queryMysql("SELECT naam, wachtwoord FROM gebruiker WHERE naam='$naam' AND wachtwoord='$wachtwoord'");

        if(!$result->rowCount() == 0 ){
            $error = "Onjuist wachtwoord/gebruikersnaam, probeer het opnieuw";
            echo $error;
        } else {
            $_SESSION['naam'] = $naam;
            $_SESSION['wachtwoord'] = $wachtwoord;

            die("<div class='center'>You are now logged in. Please
             <a data-transition='slide'
               href='members.php?view=$naam'>click here</a>
               to continue.</div></div></body></html>");
        }
    } 
}