<?php

include 'settings.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query= $db->prepare("INSERT INTO `contact` (`description`,`email`) VALUES (:description, :email);");

$description = $_POST['description'];
$email = $_POST['email'];

$query->bindParam(':description', $description);
$query->bindParam(':email',$email);

$query->execute();

$result = $query->fetch();

header('Location: admin_contact.php');
exit();

?>