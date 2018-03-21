<?php

include 'settings.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT * FROM `about` ORDER BY `dateAdded` DESC LIMIT 1");

$query->execute();
$row=$query->fetch();

$photoSource = $row['photoSource'];
$photoAlt = $row['photoAlt'];
$description = $row['description'];

$skillsQuery = $db->prepare("SELECT * FROM `skills` WHERE `deleted` = 0");

$skillsQuery->execute();
$skillsRow=$skillsQuery->fetchAll();

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
            <input type="text" name="photoSource" value="<?php echo $photoSource?>"><br>
            Alternative Image Text:<br>
            <input type="text" name="photoAlt" value="<?php echo $photoAlt?>"><br>
            Description:<br>
            <input type="text" name="description" value="<?php echo $description?>"><br><br>
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
                <form method="post" action="about_skill_manage.php">
                    <?php
                    foreach ($skillsRow as $skill) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $skill['skillName']?>
                            </td>
                            <td>
                                <?php echo $skill['imageSource']?>
                            </td>
                            <td>
                                <?php echo $skill['alternative']?>
                            </td>
                            <td>
                                <input type="submit" name="edit" value="Edit">
                                <input type="submit" name="delete" value="Delete">
                                <input type="hidden" name="id" value="<?php echo $skill['id']?>">
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                </form>
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
</body>
</html>


