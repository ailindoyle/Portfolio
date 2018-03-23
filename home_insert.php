<?php

include 'settings.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

insertHome($db, $_POST);

header('Location: admin_home.php');
exit();

?>