<?php

include 'settings.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$projectQuery = $db->prepare("SELECT `projectDescription`, `link`, `imageSource`, `alternativeText`, `id` FROM `projects` WHERE `deleted` = 0");

$projectQuery->execute();
$projectItem=$projectQuery->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Admin Portfolio</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/admin.css"/>
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
                foreach ($projectItem as $project) {
                    ?>
                    <form method="post" action="portfolio_manage.php">
                        <tr>
                            <td>
                                <?php echo $project['projectDescription']; ?>
                            </td>
                            <td>
                                <?php echo $project['link']; ?>
                            </td>
                            <td>
                                <?php echo $project['imageSource']; ?>
                            </td>
                            <td>
                                <?php echo $project['alternativeText']; ?>
                            </td>
                            <td>
                                <input type="submit" name="edit" value="Edit">
                                <input type="submit" name="delete" value="Delete">
                                <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                            </td>
                        </tr>
                    </form>
                    <?php
                }
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
    <div class="container">
        <br><br><a href="admin.php">&#171; Back to list</a>
    </div>
    <div class="container">
        <br><br><a href="index.php">&#171; Back to portfolio</a><br><br>
    </div>
</body>
</html>


