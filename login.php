<?php

session_start();

if ($_SESSION['loggedIn']) {
    header('Location: account.php');
    exit;
}

?>

<form method="post" action="account.php">
    Username:<br>
    <input type="text" name="username"><br>
    Password:<br>
    <input type="text" name="password">
    <input type="submit">
</form>