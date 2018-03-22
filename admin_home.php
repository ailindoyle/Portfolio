<?php

include 'settings.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT * FROM `home` ORDER BY `dateAdded` DESC LIMIT 1");

$query->execute();
$row=$query->fetch();

$headerTop = $row['headerTop'];
$headerBottom = $row['headerBottom'];
$summary = $row['summary'];

$featuredQuery = $db->prepare("SELECT * FROM `projects` WHERE `deleted` = 0");

$featuredQuery->execute();
$featuredRow = $featuredQuery->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Admin Home</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/admin.css"/>
</head>
<body>
    <div class="container">
        <h2>HOME</h2>
        <form method="post" action="home_insert.php">
            Header Top:<br>
            <input type="text" name="headerTop" value="<?php echo $headerTop?>"><br>
            Header Bottom:<br>
            <input type="text" name="headerBottom" value="<?php echo $headerBottom?>"><br>
            Summary:<br>
            <input type="text" name="summary" value="<?php echo $summary?>"><br><br>
            <input type="submit" value="Save">
        </form>
    </div>
    <div class="container">
        <h2>FEATURED PROJECTS</h2>
        <table>
            <tr>
                <th>Project Description</th>
                <th>Link</th>
                <th>Image Source</th>
                <th>Alt Text</th>
                <th>Featured</th>
                <th>Operations</th>
            </tr>
            <?php
            foreach ($featuredRow as $featured) {
                ?>
                <form method="post" action="featured_manage.php">
                    <tr>
                        <td>
                            <?php echo $featured['projectDescription']?>
                        </td>
                        <td>
                            <?php echo $featured['link']?>
                        </td>
                        <td>
                            <?php echo $featured['imageSource']?>
                        </td>
                        <td>
                            <?php echo $featured['alternativeText']?>
                        </td>
                        <td>
                            <?php echo $featured['featured']?>
                        </td>
                        <td>
                            <input type="submit" name="add" value="Add">
                            <input type="submit" name="remove" value="Remove">
                            <input type="hidden" name="id" value="<?php echo $featured['id']?>">
                        </td>
                    </tr>
                </form>
                <?php
            }
            ?>
        </table>
    </div>
    <div class="container">
        <br><br><a href="admin.php">&#171; Back to list</a>
    </div>
    <div class="container">
        <br><br><a href="index.php">&#171; Back to portfolio</a><br><br>
    </div>
</body>
</html>