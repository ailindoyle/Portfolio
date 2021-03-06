<?php

include 'settings.php';
require 'functions.php';

$db = new PDO($dsn, $user);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$contactInfo = getContactInfo($db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caitlin Doyle | Contact</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/contactstyles.css"/>
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
            <li>
                <a href="portfolio.php">PORTFOLIO</a>
            </li>
            <li class="current">
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
            <div class="portfolio">
                <a href="portfolio.php">PORTFOLIO</a>
            </div>
            <div class="contact current">
                <a href="contact.php">CONTACT</a>
            </div>
        </div>
    </div>
    <div class="logo">
        <a href="index.php"><img src="images/CD-logo.png" alt="Logo"/></a>
    </div>
</header>
<div class="banner">
    <div class="main">
        <div class="container">
            <div class="about-me">
                <h1>CONTACT ME</h1>
            </div>
        </div>
    </div>
</div>
<div class="contact-info">
    <div class="container">
        <div class="contact">
            <h2><?php echo $contactInfo['description']?></h2>
            <h2><?php echo $contactInfo['email']?></h2>
            <ul class="social-media">
                <li>
                    <a href="https://www.linkedin.com/in/ailin-doyle-304abbb0/" target="_blank"><img src="images/icons8-linkedin-48.png" alt="LinkedIn"/></a>
                </li>
                <li>
                    <a href="https://twitter.com/ailinrdoyle" target="_blank"><img src="images/icons8-twitter-48-blue.png" alt="Twitter"/></a>
                </li>
            </ul>
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