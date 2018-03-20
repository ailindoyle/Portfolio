<?php

include 'settings.php';
$db = new PDO($dsn, $user);

$query= $db->prepare("INSERT INTO `skills` (`skillName`,`imageSource`,`alternative`) VALUES (:skillName, :imageSource, :alternative);");

$skillName = $_POST['skillName'];
$imageSource = $_POST['imageSource'];
$alternative = $_POST['alternative'];

$query->bindParam(':skillName', $skillName);
$query->bindParam(':imageSource',$imageSource);
$query->bindParam(':alternative',$alternative);

$status = $query->execute();

$result = $query->fetch();

header('Location: admin_about.php');
exit();

?>