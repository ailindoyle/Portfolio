<?php

include 'settings.php';
require 'functions.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if ($_POST['delete'] != NULL && $_POST['id'] != NULL) {
    deleteSkill($db, $_POST);
}

$singleSkill = getSingleSkill($db, $_POST);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Admin Edit Skills</title>
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
            <input type="text" name="skillName" value="<?php echo $singleSkill['skillName']; ?>"><br>
            Image Source:<br>
            <input type="text" name="imageSource" value="<?php echo $singleSkill['imageSource']; ?>"><br>
            Alternative Image Text:<br>
            <input type="text" name="alternative" value="<?php echo $singleSkill['alternative']; ?>"><br><br>
            <input type="submit" value="Save">
            <input type='hidden' name='edit' value='Edit'>
            <input type="hidden" name="id" value="<?php echo $singleSkill['id']; ?>">
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


