<?php

include 'settings.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$add = $_POST['add'];
$remove = $_POST['remove'];
$id = $_POST['id'];

if ($remove != NULL && $id != NULL) {
    $removeQuery = $db->prepare("UPDATE `projects` SET `featured` = 0 WHERE `id` = :id");
    $removeQuery->bindParam(':id', $id);

    $removeQuery->execute();

    header('Location: admin_home.php');
    exit();
}

if ($add != NULL && $id != NULL) {
    $addQuery = $db->prepare("UPDATE `projects` SET `featured` = 1 WHERE `id` = :id");
    $addQuery->bindParam(':id', $id);

    $addQuery->execute();

    header('Location: admin_home.php');
    exit();
}
