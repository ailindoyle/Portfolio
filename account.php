<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$correctUsername = 'test';
$correctPassword = 'test';

function checkCredentials ($username, $password, $correctUsername, $correctPassword) {

    if ($username==$correctUsername&&$password==$correctPassword || $_SESSION['loggedIn']==TRUE) {
        $_SESSION['loggedIn']=TRUE;
        header('Location: admin.php');
        exit;
    } else {
        $_SESSION['loggedIn']=FALSE;
        header('Location: index.php');
        exit;
    }

}

checkCredentials($username, $password, $correctPassword, $correctUsername);