<?php

include 'settings.php';
require 'functions.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if ($_POST['edit'] != NULL && $_POST['id'] != NULL) {
    editProject($db, $_POST);
}

header('Location: admin_portfolio.php');
exit();

?>