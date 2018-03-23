<?php

include 'settings.php';
require 'functions.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if ($_POST['remove'] != NULL && $_POST['id'] != NULL) {
    removeFeatured($db, $_POST);
}

if ($_POST['add'] != NULL && $_POST['id'] != NULL) {
    addFeatured($db, $_POST);
}

?>