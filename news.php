<?php
require "function.php";

$username = $_SESSION['username'];
$photo = $_SESSION['photo'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/news.css">
    <link rel="icon" href="images/logo.png">
    <title> HealthScope - News </title>
</head>

<body>
    <nav>
        <div class="nav-content">
            <div class="logo">
                <a href="home.php"><img src="images/logo.png" alt=""></a>
                <span class="hamburger none" onclick="toggle()">
                    <i id="bars" class="ri-menu-line"></i>
                </span>
            </div>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="health.php">Health</a></li>
                <li><a class="active" href="news.php">News</a></li>
                <li><a href="discussion.php">Discussion</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <div class="user-profile">
                <span class="user-name">
                    <?= $username ?>
                </span>
                <img src="user_pp/<?= $photo ?>" alt="" class="user-pp">
            </div>
        </div>
    </nav>

    <section>
        <div class="n-container">
            <div class="n-content-top">
                <div class="left">
                    <div class="n-box-top">
                        <img src="images/topp-image1.jpg" alt="">
                    </div>
                </div>
                <div class="right">
                    <div class="n-box-top">
                        <img src="images/topp-image1.jpg" alt="">
                    </div>
                    <div class="n-box-top">
                        <img src="images/topp-image1.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="n-content-bottom">
                <div class="middle">
                    <div class="n-box-bottom">
                        <img src="images/topp-image1.jpg" alt="">
                        <div class="n-text-bottom">
                            <h3 class="n-title-bottom">this is some dummy title</h3>
                            <p class="n-subtitle-bottom">This is only dummy subtitle, not Lorem Ipsum. Hello World, i'm here to see you!!!</p>
                        </div>
                    </div>

                    <div class="n-box-bottom">
                        <img src="images/topp-image1.jpg" alt="">
                        <div class="n-text-bottom">
                            <h3 class="n-title-bottom">this is some dummy title</h3>
                            <p class="n-subtitle-bottom">This is only dummy subtitle, not Lorem Ipsum. Hello World, i'm here to see you!!!</p>
                        </div>
                    </div>

                    <div class="n-box-bottom">
                        <img src="images/topp-image1.jpg" alt="">
                        <div class="n-text-bottom">
                            <h3 class="n-title-bottom">this is some dummy title</h3>
                            <p class="n-subtitle-bottom">This is only dummy subtitle, not Lorem Ipsum. Hello World, i'm here to see you!!!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="content-f">
            <div class="left box">
                <div class="upper">
                    <div class="topic">About us</div>
                    <p>HealthScope is a website that provides health services. starting from searching, consulting,
                        sharing experiences, and much more</p>
                </div>
                <div class="lower">
                    <div class="topic">Contact us</div>
                    <div class="phone" style="margin-bottom: 6px;">
                        <a href="#"><i class="ri-phone-fill"></i>+62 1234 5678 910</a>
                    </div>
                    <div class="email">
                        <a href="#"><i class="ri-mail-line"></i>healthscope@dummy.com</a>
                    </div>
                </div>
            </div>
            <div class="middle box">
                <div class="topic">Our Services</div>
                <div><a href="#">Health Consultation</a></div>
                <div><a href="#">Health Education</a></div>
                <div><a href="#">Suggestions and Feedback</a></div>
                <div><a href="#">Donation for Dhuafa</a></div>
                <div><a href="#">Build Body</a></div>
                <div><a href="#">Sharing Experiences</a></div>
            </div>
            <div class="right box">
                <div class="topic">Subscribe us</div>
                <form action="#">
                    <input type="text" placeholder="Enter email address">
                    <input type="submit" name="" value="Send">
                    <div class="media-icons">
                        <a href="#"><i class="ri-facebook-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                        <a href="#"><i class="ri-whatsapp-fill"></i></a>
                        <a href="#"><i class="ri-youtube-fill"></i></a>
                        <a href="#"><i class="ri-linkedin-fill"></i></a>
                    </div>
                </form>
            </div>
        </div>
        <div class="bottom">
            <p>Copyright © 2023 <a href="#">HealthScope</a> All rights reserved</p>
        </div>
    </footer>
</body>

<script src="js/script.js"></script>

</html>