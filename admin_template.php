<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "doyle_portfolio";

$connect = mysqli_connect($host,$user,$password, $db);
if(!$connect)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>

<?php

$home = "SELECT * FROM `home` ORDER BY `dateAdded` DESC LIMIT 1";
$rs = mysqli_query($connect, $home);
$fetchHome = mysqli_fetch_assoc($rs);

$headerTop = $fetchHome['headerTop'];
$headerBottom = $fetchHome['headerBottom'];
$summary = $fetchHome['summary'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Admin</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
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
            <input type="text" name="summary" value="<?php echo $summary?>"><br>
            <input type="submit" value="Save">
        </form>
    </div>

</html>


<div class="container">
    <h2>CONTACT</h2>
    <form method="post" action="newfile.php">
        Description:<br>
        <input type="text" name="description"><br>
        Email address:<br>
        <input type="text" name="email"><br>
        <input type="submit" value="Save">
    </form>
</div>

<!---->
<!--$featuredProjects = "SELECT * FROM `projects` ORDER BY `dateAdded` DESC LIMIT 1";-->
<!--$rs = mysqli_query($connect, $featuredProjects);-->
<!--$fetchFeatured = mysqli_fetch_assoc($rs);-->


<!---->
<!---->
<!---->
<!--<div class="container">-->
<!--    <h2>FEATURED PROJECTS</h2>-->
<!--    <form method="post" action="home_insert.php">-->
<!--        Project Name:<br>-->
<!--        <input type="text" name="projectName" value="--><?php //echo $fetchFeatured['projectName']?><!--"><br>-->
<!--        Project Description:<br>-->
<!--        <input type="text" name="projectDescription" value="--><?php //echo $fetchFeatured['projectDescription']?><!--"><br>-->
<!--        Link to project:<br>-->
<!--        <input type="text" name="link" value="--><?php //echo $fetchFeatured['link']?><!--"><br>-->
<!--        Image Source:<br>-->
<!--        <input type="text" name="imageSource" value="--><?php //echo $fetchFeatured['imageSource']?><!--"><br>-->
<!--        Alternative Image Text:<br>-->
<!--        <input type="text" name="alternativeText" value="--><?php //echo $fetchFeatured['alternativeText']?><!--"><br>-->
<!--        <input type="submit" value="Save">-->
<!--    </form>-->
<!--</div>-->








<!--<div class="container">-->
<!--    <h2>ABOUT</h2>-->
<!--    <form method="post" action="newfile.php">-->
<!--        Picture:<br>-->
<!--        <input type="text" name="profilePicture"><br>-->
<!--        Alternative Image Text:<br>-->
<!--        <input type="text" name="alternativeText"><br>-->
<!--        Description:<br>-->
<!--        <input type="text" name="description"><br>-->
<!--        <input type="submit" value="Save">-->
<!--    </form>-->
<!--</div>-->
<!--<div class="container">-->
<!--    <h2>SKILLS</h2>-->
<!--    <form method="post" action="newfile.php">-->
<!--        Skills Name:<br>-->
<!--        <input type="text" name="skillsName"><br>-->
<!--        Alternative Image Text:<br>-->
<!--        <input type="text" name="alternativeText"><br>-->
<!--        Image Source:<br>-->
<!--        <input type="text" name="imageSource"><br>-->
<!--        <input type="submit" value="Save">-->
<!--    </form>-->
<!--</div>-->
<!--<div class="container">-->
<!--    <h2>PORTFOLIO</h2>-->
<!--    <form method="post" action="newfile.php">-->
<!--        Project Name:<br>-->
<!--        <input type="text" name="projectName"><br>-->
<!--        Project Description:<br>-->
<!--        <input type="text" name="projectDescription"><br>-->
<!--        Link to project:<br>-->
<!--        <input type="text" name="link"><br>-->
<!--        Image Source:<br>-->
<!--        <input type="text" name="imageSource"><br>-->
<!--        Alternative Image Text:<br>-->
<!--        <input type="text" name="alternativeText"><br>-->
<!--        Delete project:-->
<!--        <input type="checkbox" name="deleted">-->
<!--        <input type="submit" value="Save">-->
<!--    </form>-->
<!--</div>-->
