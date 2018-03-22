<?php

include 'settings.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$row = getPortfolioInfo($db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Portfolio</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/portfoliostyles.css"/>
</head>
<body>
<header class="navbar">
    <div class="menu">
        <ul class="navigation">
            <li>
                <a href="index.php">HOME</a>
            </li>
            <li>
                <a href="about.php">ABOUT</a>
            </li>
            <li class="current">
                <a href="portfolio.php">PORTFOLIO</a>
            </li>
            <li>
                <a href="contact.php">CONTACT</a>
            </li>
        </ul>
        <div class="dropdown">
            <div class="home">
                <a href="index.php">HOME</a>
            </div>
            <div class="about">
                <a href="about.php">ABOUT</a>
            </div>
            <div class="portfolio current">
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
<div class="full-portfolio">
    <div class="main">
        <div class="container">
            <div class="portfolio-header">
                <h2>PROJECTS</h2>
            </div>
            <div>
                <?php echo displayProjects($row); ?>
            </div>
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