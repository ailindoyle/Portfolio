<?php

include 'settings.php';

$connect = mysqli_connect($host,$user,$password,$db);
if(!$connect)
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM `home` ORDER BY `dateAdded` DESC LIMIT 1";
$rs = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($rs);

$headerTop = $row['headerTop'];
$headerBottom = $row['headerBottom'];
$summary = $row['summary'];

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
        <h2>HOME</h2>
        <form method="post" action="home_insert.php">
            Header Top:<br>
            <input type="text" name="headerTop" value="<?php echo $headerTop?>"><br>
            Header Bottom:<br>
            <input type="text" name="headerBottom" value="<?php echo $headerBottom?>"><br>
            Summary:<br>
            <input type="text" name="summary" value="<?php echo $summary?>"><br>
            <input type="submit" value="Save">
        </form>
    </div>
</html>
