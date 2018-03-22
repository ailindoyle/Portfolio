<?php

include 'settings.php';
require 'functions.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

deleteSkill($db, $_POST);

redirectIfStuck ($_POST);

$row = getSingleSkill($db, $_POST);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Admin</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/admin.css"/>
</head>
<body>
    <div class="container">
        <h2>EDIT SKILL</h2>
        <form method="post" action="about_skill_update.php">
            Skills Name:<br>
            <input type="text" name="skillName" value="<?php echo $row['skillName']?>"><br>
            Image Source:<br>
            <input type="text" name="imageSource" value="<?php echo $row['imageSource']?>"><br>
            Alternative Image Text:<br>
            <input type="text" name="alternative" value="<?php echo $row['alternative']?>"><br><br>
            <input type="submit" value="Save">
            <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
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


