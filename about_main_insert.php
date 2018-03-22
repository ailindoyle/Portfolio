<?php

include 'settings.php';
$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query= $db->prepare("INSERT INTO `about` (`photoSource`,`photoAlt`,`description`) VALUES (:photoSource, :photoAlt, :description);");

$photoSource = $_POST['photoSource'];
$photoAlt = $_POST['photoAlt'];
$description = $_POST['description'];

$query->bindParam(':photoSource', $photoSource);
$query->bindParam(':photoAlt',$photoAlt);
$query->bindParam(':description',$description);

$query->execute();

$result = $query->fetch();

header('Location: admin_about.php');
exit();

?>