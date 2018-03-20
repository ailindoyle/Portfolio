<?php

include 'settings.php';

$connect = mysqli_connect($host,$user,$password,$db);
if(!$connect)
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM `about` ORDER BY `dateAdded` DESC LIMIT 1";
$rs = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($rs);

$photoSource = $row['photoSource'];
$photoAlt = $row['photoAlt'];
$description = $row['description'];

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
        <h2>ABOUT</h2>
        <form method="post" action="about_main_insert.php">
            Picture:<br>
            <input type="text" name="photoSource" value="<?php echo $photoSource?>"><br>
            Alternative Image Text:<br>
            <input type="text" name="photoAlt" value="<?php echo $photoAlt?>"><br>
            Description:<br>
            <input type="text" name="description" value="<?php echo $description?>"><br>
            <input type="submit" value="Save">
        </form>
    </div>
    <div class="container">
        <h2>SKILLS</h2>
        <form method="post" action="newfile.php">
            Skills Name:<br>
            <input type="text" name="skillsName"><br>
            Alternative Image Text:<br>
            <input type="text" name="alternativeText"><br>
            Image Source:<br>
            <input type="text" name="imageSource"><br>
            <input type="submit" value="Save">
        </form>
    </div>
</body>
</html>


