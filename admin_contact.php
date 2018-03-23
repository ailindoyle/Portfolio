<?php

include 'settings.php';
require 'functions.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$contactInfo = getContactInfo($db);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Admin Contact</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/admin.css"/>
</head>
<body>
    <div class="container">
        <h2>CONTACT</h2>
        <form method="post" action="contact_insert.php">
            Description:<br>
            <input type="text" name="description" value="<?php echo $contactInfo['description']?>"><br>
            Email address:<br>
            <input type="text" name="email" value="<?php echo $contactInfo['email']?>"><br>
            <input type="submit" value="Save">
        </form>
    </div>
    <div class="container">
        <br><br><a href="admin.php">&#171; Back to list</a>
    </div>
    <div class="container">
        <br><br><a href="index.php">&#171; Back to portfolio</a><br><br>
    </div>
</body>
</html>
