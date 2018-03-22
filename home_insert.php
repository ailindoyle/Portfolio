<?php

include 'settings.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query= $db->prepare("INSERT INTO `home` (`headerTop`,`headerBottom`, `summary`) VALUES (:headerTop, :headerBottom, :summary);");

insertHome($db, $_POST);

header('Location: admin_home.php');
exit();


?>
