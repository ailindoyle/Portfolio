<?php

include 'settings.php';
require 'functions.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

insertContact($db, $_POST);

header('Location: admin_contact.php');
exit();

?>