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
    <h2 >HOME</h2>
    <form method="post" action="sql_insert.php">
        Header Top:<br>
        <input type="text" name="headerTop"><br>
        Header Bottom:<br>
        <input type="text" name="headerBottom"><br>
        Summary:<br>
        <input type="text" name="summary"><br>
        <input type="submit" value="Save">
    </form>
</div>