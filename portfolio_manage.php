<?php

include 'settings.php';
require 'functions.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if ($_POST['delete'] != NULL && $_POST['id'] != NULL) {
    deleteProject($db, $_POST);
}

$singleProject = getSingleProject($db, $_POST);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Admin Edit Projects</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/admin.css"/>
</head>
<body>
    <div class="container">
        <h2>EDIT PROJECT</h2>
        <form method="post" action="portfolio_update.php">
            Project Description:<br>
            <input type="text" name="projectDescription" value="<?php echo $singleProject['projectDescription']; ?>"><br>
            Link:<br>
            <input type="text" name="link" value="<?php echo $singleProject['link']; ?>"><br>
            Image Source:<br>
            <input type="text" name="imageSource" value="<?php echo $singleProject['imageSource']; ?>"><br>
            Alternative Image Text:<br>
            <input type="text" name="alternativeText" value="<?php echo $singleProject['alternativeText']; ?>"><br><br>
            <input type="submit" value="Save">
            <input type='hidden' name='edit' value='Edit'>
            <input type="hidden" name="id" value="<?php echo $singleProject['id']; ?>">
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