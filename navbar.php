<?php
// navbar.php

session_start();

// Function to check if a user is logged in
function isUserLoggedIn() {
    return isset($_SESSION['username']);
}

?>

<nav class="fh5co-nav" role="navigation">
    <div class="container-wrap">
        <div class="top-menu">
            <div class="row">
                <div class="col-md-12 col-offset-0 text-center">
                    <div id="fh5co-logo"><a href="index.php">CultraSwap</a></div>
                </div>
                <div class="col-md-12 col-md-offset-0 text-center menu-1">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li class="has-dropdown">
                            <a href="#">Explore</a>
                            <ul class="dropdown">
                                <li><a href="language-exchange.php">Language Exchange</a></li>
                                <li><a href="cultural-exchange.php">Cultural Exchange</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown">
                            <a href="#">Blog</a>
                            <ul class="dropdown">
                                <li><a href="viewblog.php">View Blog</a></li>
                                <li><a href="addblog.php">Add Blog</a></li>
                            </ul>
                        </li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php">Contact Us</a></li>

                        <?php
                        if (isUserLoggedIn()) {
                            $username = $_SESSION['username'];
                            echo '<li class="has-dropdown">';
                            echo '<a href="#">Welcome, ' . $username . ' <i class="fa fa-user"></i></a>';
                            echo '<ul class="dropdown">';
                            echo '<li><a href="logout.php">Logout</a></li>';
                            echo '</ul>';
                            echo '</li>';
                        } else {
                            echo '<li><a href="login.php">Login</a></li>';
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>


