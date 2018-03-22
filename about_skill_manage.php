<?php

include 'settings.php';
$db = new PDO($dsn, $user);

$edit = $_POST['edit'];
$delete = $_POST['delete'];
$id = $_POST['id'];

if ($delete != NULL && $id != NULL) {
    $deleteQuery = $db->prepare("UPDATE `skills` SET `deleted` = 1 WHERE `id` = :id");
    $deleteQuery->bindParam(':id', $id);

    $deleteQuery->execute();

    header('Location: admin_about.php');
    exit();
}

if ($edit == NULL || $id == NULL) {
    header('Location: admin_about.php');
    exit();
}

$fetchQuery = $db->prepare("SELECT * FROM `skills` WHERE `id` = :id");
$fetchQuery->bindParam(':id', $id);

$fetchQuery->execute();
$row=$fetchQuery->fetch();

$skillName = $row['skillName'];
$imageSource = $row['imageSource'];
$alternative = $row['alternative'];

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
            <input type="text" name="skillName" value="<?php echo $skillName?>"><br>
            Image Source:<br>
            <input type="text" name="imageSource" value="<?php echo $imageSource?>"><br>
            Alternative Image Text:<br>
            <input type="text" name="alternative" value="<?php echo $alternative?>"><br><br>
            <input type="submit" value="Save">
            <input type="hidden" name="id" value="<?php echo $id?>">
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


