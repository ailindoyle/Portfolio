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

$skillsQuery = "SELECT * FROM `skills` WHERE `deleted` = 0";
$skillsrs = mysqli_query($connect, $skillsQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Admin About</title>
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
                <?php
                do {
                    $row = mysqli_fetch_assoc($skillsrs);

                    if ($row != NULL) {
                        $id = $row['id'];
                        $skillName = $row['skillName'];
                        $imageSource = $row['imageSource'];
                        $alternative = $row['alternative'];

                        ?>
                        <form method="post" action="about_skill_manage.php">
                            <tr>
                                <td>
                                    <?php echo $skillName?>
                                </td>
                                <td>
                                    <?php echo $imageSource?>
                                </td>
                                <td>
                                    <?php echo $alternative?>
                                </td>
                                <td>
                                    <input type="submit" name="edit" value="Edit">
                                    <input type="submit" name="delete" value="Delete">
                                    <input type="hidden" name="id" value="<?php echo $id?>">
                                </td>
                            </tr>
                        </form>
                        <?php
                    }
                } while ($row != NULL);
                ?>
            </table>
        <br><h3>ADD SKILL</h3>
        <form method="post" action="about_skill_insert.php">
            Skills Name:<br>
            <input type="text" name="skillName"><br>
            Image Source:<br>
            <input type="text" name="imageSource"><br>
            Alternative Image Text:<br>
            <input type="text" name="alternative"><br><br>
            <input type="submit" value="Save">
        </form>
    </div>
</body>
</html>


