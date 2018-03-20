<?php

include 'settings.php';
$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query= $db->prepare("INSERT INTO `home` (`headerTop`,`headerBottom`, `summary`) VALUES (:headerTop, :headerBottom, :summary);");

$headerTop = $_POST['headerTop'];
$headerBottom = $_POST['headerBottom'];
$summary = $_POST['summary'];

$query->bindParam(':headerTop', $headerTop);
$query->bindParam(':headerBottom', $headerBottom);
$query->bindParam(':summary', $summary);

$query->execute();

$result = $query->fetch();

header('Location: admin.php');
exit();


?>
