<?php

include 'settings.php';
$db = new PDO($dsn, $user);

$id = $_POST['id'];
$skillName = $_POST['skillName'];
$imageSource = $_POST['imageSource'];
$alternative = $_POST['alternative'];

if ($id != NULL) {
    $updateQuery = $db->prepare("UPDATE `skills` SET `skillName` = :skillName, `imageSource` = :imageSource, `alternative` = :alternative WHERE `id` = :id");
    $updateQuery->bindParam(':id', $id);
    $updateQuery->bindParam(':skillName', $skillName);
    $updateQuery->bindParam(':imageSource', $imageSource);
    $updateQuery->bindParam(':alternative', $alternative);

    $updateQuery->execute();

}

header('Location: admin_about.php');
exit();