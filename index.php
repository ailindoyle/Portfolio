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

$featuredQuery = $db->prepare("SELECT * FROM `projects` WHERE `featured` = 1");

$featuredQuery->execute();
$featuredRow = $featuredQuery->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Web Developer</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/homestyles.css"/>
</head>
<body>
<header class="navbar">
    <div class="menu">
        <ul class="navigation">
            <li class="current">
                <a href="index.php">HOME</a>
            </li>
            <li>
                <a href="about.php">ABOUT</a>
            </li>
            <li>
                <a href="portfolio.php">PORTFOLIO</a>
            </li>
            <li>
                <a href="contact.php">CONTACT</a>
            </li>
        </ul>
        <div class="dropdown">
            <div class="home current">
                <a href="index.php">HOME</a>
            </div>
            <div class="about">
                <a href="about.php">ABOUT</a>
            </div>
            <div class="portfolio">
                <a href="portfolio.php">PORTFOLIO</a>
            </div>
            <div class="contact">
                <a href="contact.php">CONTACT</a>
            </div>
        </div>
    </div>
    <div class="logo">
        <a href="index.php"><img src="images/CD-logo.png" alt="Logo"/></a>
    </div>
</header>
<div class="hero">
    <div class="main container">
        <div class="hero-box description">
            <h1><?php echo $headerTop?></h1>
            <h3><?php echo $headerBottom?></h3>
        </div>
    </div>
</div>
<div class="summary">
    <div class="container">
        <p><?php echo $summary?></p>
    </div>
</div>
<div class="featured">
    <div class="container">
        <div class="featured-header">
            <h2>FEATURED PROJECTS</h2>
        </div>
        <div>
            <?php
            foreach ($featuredRow as $featured) {
                ?>
                <div class="featured-project-links featured-project-one col-3 tb-col-2 mb-col-1">
                    <div class="project">
                        <a href="<?php echo $featured['link']?>" target="_blank"><img src="<?php echo $featured['imageSource']?>" alt="<?php echo $featured['alternativeText']?>"></a>
                        <p><?php echo $featured['projectDescription']?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="contact-details">
            <div class="hire-link">
                <button type="button">
                    <a href="contact.php">Hire Me</a>
                </button>
            </div>
            <div class="footer-contact">
                <div class="email">
                    <h4>caitlin.doyle@mobile-life.com</h4>
                </div>
                <ul class="media">
                    <li>
                        <a href="https://www.linkedin.com/in/ailin-doyle-304abbb0/" target="_blank"><img src="images/icons8-linkedin-48.png" alt="LinkedIn"/></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/ailinrdoyle" target="_blank"><img src="images/icons8-twitter-48.png" alt="Twitter"/></a>
                    </li>
                </ul>
            </div>
            <div class="admin">
                <a href="login.php">Admin</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>