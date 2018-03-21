<?php

include 'settings.php';
$db = new PDO($dsn, $user);

$edit = $_POST['edit'];
$delete = $_POST['delete'];
$id = $_POST['id'];

if ($delete != NULL && $id != NULL) {
    $deleteQuery = $db->prepare("UPDATE `projects` SET `deleted` = 1 WHERE `id` = :id");
    $deleteQuery->bindParam(':id', $id);

    $deleteQuery->execute();

    header('Location: admin_portfolio.php');
    exit();
}

if ($edit == NULL || $id == NULL) {
    header('Location: admin_portfolio.php');
    exit();
}

$fetchQuery = $db->prepare("SELECT * FROM `projects` WHERE `id` = :id");
$fetchQuery->bindParam(':id', $id);

$fetchQuery->execute();
$row=$fetchQuery->fetch();

$projectDescription = $row['projectDescription'];
$link = $row['link'];
$imageSource = $row['imageSource'];
$alternativeText = $row['alternativeText'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Admin Edit Projects</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>
<body>
    <div class="container">
        <h2>EDIT PROJECT</h2>
        <form method="post" action="portfolio_update.php">
            Project Description:<br>
            <input type="text" name="projectDescription" value="<?php echo $projectDescription?>"><br>
            Link:<br>
            <input type="text" name="link" value="<?php echo $link?>"><br>
            Image Source:<br>
            <input type="text" name="imageSource" value="<?php echo $imageSource?>"><br>
            Alternative Image Text:<br>
            <input type="text" name="alternativeText" value="<?php echo $alternativeText?>"><br><br>
            <input type="submit" value="Save">
            <input type="hidden" name="id" value="<?php echo $id?>">
        </form>
    </div>
</body>
</html>


