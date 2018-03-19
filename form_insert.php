<?php

$db = new PDO('mysql:host=127.0.0.1; dbname=testBase', 'root');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query= $db->prepare("INSERT INTO `adults` (`name`,`DOB`, `gender`) VALUES (:name, :dateOfBirth, :gender); 
INSERT INTO `children` (`childName`) VALUES (:childName); INSERT INTO `pets` (`petName`) VALUES (:petName);");

$name = $_POST['name'];
$dateOfBirth = $_POST['dateOfBirth'];
$gender = $_POST['gender'];
$childName = $_POST['childName'];
$petName = $_POST['petName'];

$query->bindParam(':name', $name);
$query->bindParam(':dateOfBirth', $dateOfBirth);
$query->bindParam(':gender', $gender);
$query->bindParam(':childName', $childName);
$query->bindParam(':petName', $petName);

$query->execute();

$result = $query->fetch();

?>
