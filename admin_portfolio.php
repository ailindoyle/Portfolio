<?php

include 'settings.php';
require 'functions.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$projectItem = getPortfolioInfo($db);

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
                <?php echo createProjectForm($projectItem);?>
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


