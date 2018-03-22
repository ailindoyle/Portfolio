<?php

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
            <h1>Caitlin Doyle</h1>
            <h3>Web Developer</h3>
        </div>
    </div>
</div>
<div class="summary">
    <div class="container">
        <p>My name is Caitlin Doyle and I am training to become a full stack web developer at Mayden Academy, training in Bath but based in Bristol.</p>
    </div>
</div>
<div class="featured">
    <div class="container">
        <div class="featured-header">
            <h2>FEATURED PROJECTS</h2>
        </div>
        <div>
            <div class="featured-project-links featured-project-one col-3 tb-col-2 mb-col-1">
                <div class="project">
                    <a href="https://dev.maydenacademy.co.uk/students/2018/caitlin/test_form/" target="_blank"><img src="images/testform_tile.png" alt="Test Form"></a>
                    <p>Project: Test Form.<br>The first piece of code I wrote of Mayden Academy. This is a test form and test table.</p>
                </div>
            </div>
            <div class="featured-project-links featured-project-two col-3 tb-col-2 mb-col-1">
                <div class="project">
                    <a href="https://dev.maydenacademy.co.uk/students/2018/caitlin/jumbotron/" target="_blank"><img src="images/jumbotron_tile.png" alt="Jumbotron"></a>
                    <p>Project: Jumbotron.<br>First attempt at page size responsiveness and displaying items inline.</p>
                </div>
            </div>
            <div class="featured-project-links featured-project-three col-3 tb-col-2 mb-col-1">
                <div class="project">
                    <a href="https://dev.maydenacademy.co.uk/students/2018/caitlin/pilot_shop/" target="_blank"><img src="images/pilotshop_tile.png" alt="Pilot Shop"></a>
                    <p>Project: PilotShop.<br>First attempt at responsiveness in number of items on a line and hover features.</p>
                </div>
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