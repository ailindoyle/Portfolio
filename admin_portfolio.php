<?php

include 'settings.php';

$connect = mysqli_connect($host,$user,$password,$db);
if(!$connect)
{
    die("Connection failed: " . mysqli_connect_error());
}

$projectQuery = "SELECT * FROM `projects` WHERE `deleted` = 0";
$projectrs = mysqli_query($connect, $projectQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Admin Portfolio</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>
<body>
    <div class="container">
        <h2>MANAGE PROJECTS</h2>
            <table>
                <tr>
                    <th>Project Description</th>
                    <th>Link</th>
                    <th>Image Source</th>
                    <th>Alt Text</th>
                    <th>Operations</th>
                </tr>
                <?php
                do {
                    $row = mysqli_fetch_assoc($projectrs);

                    if ($row != NULL) {
                        $id = $row['id'];
                        $projectDescription = $row['$projectDescription'];
                        $link = $row['link'];
                        $imageSource = $row['imageSource'];
                        $alternativeText = $row['alternativeText'];

                        ?>
                        <form method="post" action="portfolio_manage.php">
                            <tr>
                                <td>
                                    <?php echo $projectDescription?>
                                </td>
                                <td>
                                    <?php echo $link?>
                                </td>
                                <td>
                                    <?php echo $imageSource?>
                                </td>
                                <td>
                                    <?php echo $alternativeText?>
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
        <br><h3>ADD PROJECT</h3>
        <form method="post" action="portfolio_insert.php">
            Project Description:<br>
            <input type="text" name="projectDescription"><br>
            Link:<br>
            <input type="text" name="link"><br>
            Image Source:<br>
            <input type="text" name="imageSource"><br>
            Alternative Image Text:<br>
            <input type="text" name="alternativeText"><br><br>
            <input type="submit" value="Add">
        </form>
    </div>
</body>
</html>


