<?php

include 'settings.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT * FROM `contact` ORDER BY `dateAdded` DESC LIMIT 1");

$query->execute();
$row=$query->fetch();

$description = $row['description'];
$email = $row['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Admin</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>
<body>
    <div class="container">
        <h2>CONTACT</h2>
        <form method="post" action="contact_insert.php">
            Description:<br>
            <input type="text" name="description" value="<?php echo $description?>"><br>
            Email address:<br>
            <input type="text" name="email" value="<?php echo $email?>"><br>
            <input type="submit" value="Save">
        </form>
    </div>
</body>
</html>
