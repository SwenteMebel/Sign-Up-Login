<?php
include_once "functions.php";
session_unset();


echo <<<_END

<form method='post' action='index.php'>
<input type="text" name="naam" placeholder='gebruikersnaam'><br>
<input type='email' name='email' placeholder='email'><br>
<input type='password' name='wachtwoord' placeholder='wachtwoord'><br><br>
<input type='submit' value='Bevestigen'>
</form>
_END;

if (isset($_SESSION['user'])) destroySession();

if(isset($_POST['naam']) && isset($_POST['email']) && isset($_POST['wachtwoord'])){
    $naam = $_POST['naam'];
    $email =  $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $hashpw = password_hash($wachtwoord, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('INSERT INTO gebruiker VALUES(NULL, ?,?,?)');
    $stmt->bindParam(1, $naam, PDO::PARAM_STR, 20);
    $stmt->bindParam(2, $email, PDO::PARAM_STR, 50);
    $stmt->bindParam(3, $hashpw, PDO::PARAM_STR, 255);
        
    $stmt->execute([$naam, $email, $hashpw]);
    die("<div>Account created, your name is $naam
    <a data-transition='slide'
      href='login.php?'>click here</a>
      to login.</div>");
}










?>