<?php

include 'settings.php';
require 'functions.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if ($_POST['remove'] != NULL && = $_POST['id'] != NULL) {
    $removeQuery = $db->prepare("UPDATE `projects` SET `featured` = 0 WHERE `id` = :id");
    $removeQuery->bindParam(':id',  $_POST['id']);

    $removeQuery->execute();

    header('Location: admin_home.php');
    exit();
}

if ($_POST['add'] != NULL && = $_POST['id'] != NULL) {
    $addQuery = $db->prepare("UPDATE `projects` SET `featured` = 1 WHERE `id` = :id");
    $addQuery->bindParam(':id',  $_POST['id']);

    $addQuery->execute();

    header('Location: admin_home.php');
    exit();
}
