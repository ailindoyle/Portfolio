<?php

include 'settings.php';
require 'functions.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$aboutInfo = getAboutInfo($db);

$skillsRow = getSkills($db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Admin About</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/admin.css"/>
</head>
<body>
    <div class="container">
        <h2>ABOUT</h2>
        <form method="post" action="about_main_insert.php">
            Picture:<br>
            <input type="text" name="photoSource" value="<?php echo $aboutInfo['photoSource']?>"><br>
            Alternative Image Text:<br>
            <input type="text" name="photoAlt" value="<?php echo $aboutInfo['photoAlt']?>"><br>
            Description:<br>
            <input type="text" name="description" value="<?php echo $aboutInfo['description']?>"><br><br>
            <input type="submit" value="Save">
        </form>
    </div>
    <div class="container">
        <h2>MANAGE SKILLS</h2>
            <table>
                <tr>
                    <th>Skill Name</th>
                    <th>Image Source</th>
                    <th>Alt Text</th>
                    <th>Operations</th>
                </tr>
                <?php echo createSkillsForm($skillsRow);?>
            </table>
        <br><h3>ADD SKILL</h3>
        <form method="post" action="about_skill_insert.php">
            Skills Name:<br>
            <input type="text" name="skillName"><br>
            Image Source:<br>
            <input type="text" name="imageSource"><br>
            Alternative Image Text:<br>
            <input type="text" name="alternative"><br><br>
            <input type="submit" value="Add">
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


