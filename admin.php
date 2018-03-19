<?php



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
    <form method="post" action="form_insert.php">
        Header Top:<br>
        <input type="text" name="headerTop"><br>
        Header Bottom:<br>
        <input type="text" name="headerBottom"><br>
        Summary:<br>
        <input type="text" name="summary"><br>
        <input type="submit" value="Save">
    </form>
</div>
<div class="container">
    <h2>FEATURED PROJECTS</h2>
    <form method="post" action="form_insert.php">
        Project Name:<br>
        <input type="text" name="projectName"><br>
        Project Description:<br>
        <input type="text" name="projectDescription"><br>
        Link to project:<br>
        <input type="text" name="link"><br>
        Image Source:<br>
        <input type="text" name="imageSource"><br>
        Alternative Image Text:<br>
        <input type="text" name="alternativeText"><br>
        <input type="submit" value="Save">
    </form>
</div>
<div class="container">
    <h2>ABOUT</h2>
    <form method="post" action="form_insert.php">
        Picture:<br>
        <input type="text" name="profilePicture"><br>
        Alternative Image Text:<br>
        <input type="text" name="alternativeText"><br>
        Description:<br>
        <input type="text" name="description"><br>
        <input type="submit" value="Save">
    </form>
</div>
<div class="container">
    <h2>SKILLS</h2>
    <form method="post" action="form_insert.php">
        Skills Name:<br>
        <input type="text" name="skillsName"><br>
        Alternative Image Text:<br>
        <input type="text" name="alternativeText"><br>
        Image Source:<br>
        <input type="text" name="imageSource"><br>
        <input type="submit" value="Save">
    </form>
</div>
<div class="container">
    <h2>PORTFOLIO</h2>
    <form method="post" action="form_insert.php">
        Project Name:<br>
        <input type="text" name="projectName"><br>
        Project Description:<br>
        <input type="text" name="projectDescription"><br>
        Link to project:<br>
        <input type="text" name="link"><br>
        Image Source:<br>
        <input type="text" name="imageSource"><br>
        Alternative Image Text:<br>
        <input type="text" name="alternativeText"><br>
        <input type="submit" value="Save">
    </form>
</div>
<div class="container">
    <h2>CONTACT</h2>
    <form method="post" action="form_insert.php">
        Description:<br>
        <input type="text" name="description"><br>
        Email address:<br>
        <input type="text" name="email"><br>
        <input type="submit" value="Save">
    </form>
</div>