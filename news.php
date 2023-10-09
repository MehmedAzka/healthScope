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
            </ul>
            <div class="user-profile">
                <img src="user_pp/<?= $photo ?>" alt="" class="user-pp" onclick="toggleMenu()">
            </div>
            <div class="sub-menu-wrap">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="user_pp/<?= $photo ?>" alt="" class="user-pp">
                        <h3 class="user-name">
                            <?= $username ?>
                        </h3>
                    </div>
                    <hr>
                    <a href="profil.php" class="sub-menu-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 20 20">
                            <path fill="currentColor"
                                d="M9 2a4 4 0 1 0 0 8a4 4 0 0 0 0-8Zm-4.991 9A2.001 2.001 0 0 0 2 13c0 1.691.833 2.966 2.135 3.797C5.417 17.614 7.145 18 9 18c.41 0 .816-.019 1.21-.057A5.477 5.477 0 0 1 9 14.5c0-1.33.472-2.55 1.257-3.5H4.01Zm6.626 2.92a2 2 0 0 0 1.43-2.478l-.155-.557c.254-.195.529-.362.821-.497l.338.358a2 2 0 0 0 2.91.001l.324-.344c.298.14.578.315.835.518l-.126.423a2 2 0 0 0 1.456 2.519l.349.082a4.7 4.7 0 0 1 .01 1.017l-.46.117a2 2 0 0 0-1.431 2.479l.156.556a4.35 4.35 0 0 1-.822.498l-.338-.358a2 2 0 0 0-2.909-.002l-.325.344a4.32 4.32 0 0 1-.835-.518l.127-.422a2 2 0 0 0-1.456-2.52l-.35-.082a4.713 4.713 0 0 1-.01-1.016l.461-.118Zm4.865.58a1 1 0 1 0-2 0a1 1 0 0 0 2 0Z" />
                        </svg>
                        <p>Profile Setting</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                            class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z" />
                        </svg>
                        <p>Help & Support</p>
                        <span>></span>
                    </a>
                    <a href="logout.php" class="sub-menu-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                        <p>Log Out</p>
                        <span>></span>
                    </a>
                </div>
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
                            <p class="n-subtitle-bottom">This is only dummy subtitle, not Lorem Ipsum. Hello World, i'm
                                here to see you!!!</p>
                        </div>
                    </div>

                    <div class="n-box-bottom">
                        <img src="images/topp-image1.jpg" alt="">
                        <div class="n-text-bottom">
                            <h3 class="n-title-bottom">this is some dummy title</h3>
                            <p class="n-subtitle-bottom">This is only dummy subtitle, not Lorem Ipsum. Hello World, i'm
                                here to see you!!!</p>
                        </div>
                    </div>

                    <div class="n-box-bottom">
                        <img src="images/topp-image1.jpg" alt="">
                        <div class="n-text-bottom">
                            <h3 class="n-title-bottom">this is some dummy title</h3>
                            <p class="n-subtitle-bottom">This is only dummy subtitle, not Lorem Ipsum. Hello World, i'm
                                here to see you!!!</p>
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