<?php

include 'settings.php';
$db = new PDO($dsn, $user);

$id = $_POST['id'];
$projectDescription = $_POST['projectDescription'];
$link = $_POST['link'];
$imageSource = $_POST['imageSource'];
$alternativeText = $_POST['alternativeText'];

if ($id != NULL) {
    $updateQuery = $db->prepare("UPDATE `projects` SET `projectDescription` = :projectDescription, `link` = :link, `imageSource` = :imageSource, `alternativeText` = :alternativeText WHERE `id` = :id");
    $updateQuery->bindParam(':id', $id);
    $updateQuery->bindParam(':projectDescription', $projectDescription);
    $updateQuery->bindParam(':link', $link);
    $updateQuery->bindParam(':imageSource', $imageSource);
    $updateQuery->bindParam(':alternativeText', $alternativeText);

    $updateQuery->execute();

}

header('Location: admin_portfolio.php');
exit();