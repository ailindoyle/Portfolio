<?php

include 'settings.php';
$db = new PDO($dsn, $user);

$query= $db->prepare("INSERT INTO `projects` (`projectDescription`,`link`, `imageSource`,`alternativeText`) VALUES (:projectDescription, :link, :imageSource, :alternativeText);");

$projectDescription = $_POST['projectDescription'];
$link = $_POST['link'];
$imageSource = $_POST['imageSource'];
$alternativeText = $_POST['alternativeText'];

$query->bindParam(':projectDescription', $projectDescription);
$query->bindParam(':link', $link);
$query->bindParam(':imageSource', $imageSource);
$query->bindParam(':alternativeText', $alternativeText);

$status = $query->execute();

$result = $query->fetch();

header('Location: admin_portfolio.php');
exit();

?>