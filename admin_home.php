<?php

include 'settings.php';
require 'functions.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$homeInfo = getHomeInfo($db);

$featuredRow = getPortfolioInfo($db);

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
            <input type="text" name="headerTop" value="<?php echo $homeInfo['headerTop']?>"><br>
            Header Bottom:<br>
            <input type="text" name="headerBottom" value="<?php echo $homeInfo['headerBottom']?>"><br>
            Summary:<br>
            <input type="text" name="summary" value="<?php echo $homeInfo['summary']?>"><br><br>
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
            <?php echo createFeaturedForm($featuredRow);?>
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