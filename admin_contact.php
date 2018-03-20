<?php

include 'settings.php';

$connect = mysqli_connect($host,$user,$password,$db);
if(!$connect)
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM `contact` ORDER BY `dateAdded` DESC LIMIT 1";
$rs = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($rs);

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
