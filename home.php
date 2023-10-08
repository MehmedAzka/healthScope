<?php
include "function.php";

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$quotes = [
    "\"Create healthy habits, not restrictions.\"",
    "\"Take care of your body. It’s the only place you have to live.\"",
    "\"Healthy is an outfit that looks different on everybody.\"",
    "\"He who has health has hope and he who has hope has everything.\"",
    "\"It is health that is real wealth and not pieces of gold and silver.\"",
    "\"If you don’t recognize an ingredient, your body won’t either.\"",
    "\"Together is easy, but TO GET HER is god damm hard\" -AA"
];

$randomQuote = $quotes[array_rand($quotes)];
$showAll = $conn->query("SELECT * FROM h_topic ORDER BY created_date DESC LIMIT 4");

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
    <link rel="icon" href="images/logo.png">
    <title> HealthScope </title>
</head>

<body>
    <!-- navbar -->
    <nav>
        <div class="nav-content">
            <div class="logo">
                <a href="home.php"><img src="images/logo.png" alt=""></a>
                <span class="hamburger none" onclick="toggle()">
                    <i id="bars" class="ri-menu-line"></i>
                </span>
            </div>
            <ul class="nav-links">
                <li><a class="active" href="home.php">Home</a></li>
                <li><a href="health.php">Health</a></li>
                <li><a href="news.php">News</a></li>
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
    <!-- end navbar -->

    <!-- daily info -->
    <section>
        <div class="container">
            <div class="row">
                <div class="content">
                    <img class="content-image" src="images/commonSage.jpg" alt="picture" srcset="">
                    <div class="content-desk">
                        <h3>Daun Sage</h3>
                        <p>Daun sage umumnya digunakan secara tradisional sebagai obat melawan diabetes. Ekstrak sage
                            dapat mengurangi kadar glukosa darah pada pengidap diabetes tipe 1 dengan mengaktifkan
                            reseptor tertentu.</p>
                    </div>
                </div>

                <div class="content">
                    <img class="content-image" src="images/honey.jpg" alt="picture" srcset="">
                    <div class="content-desk">
                        <h3>Madu</h3>
                        <p>Madu adalah makanan kaya antioksidan yang dapat melindungi tubuh dari risiko serangan senyawa
                            radikal bebas. Jika tidak, senyawa ini dapat merusak sel, menyebabkan gangguan jantung dan
                            pembuluh darah.</p>
                    </div>
                </div>

                <div class="content">
                    <img class="content-image" src="images/infusedWater.jpg" alt="picture" srcset="">
                    <div class="content-desk">
                        <h3>Infused Water</h3>
                        <p>Minuman sehat ini rendah kalori, tetapi tetap mengandung beragam nutrisi penting, seperti
                            vitamin, mineral, serta antioksidan. Tetapi tidak disarankan untuk meminumnya setiap hari,
                            karena dapat menyebabkan tensi menjadi turun.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end daily info -->

    <!-- topic 1 -->
    <section>
        <div class="container-half">
            <h1 class="title">Latest Topic</h1>
            <div class="tb">
                <?php while ($result3 = $showAll->fetch_assoc()) { ?>
                    <div class="tb-card">
                        <img class="tb-image" src="health_image/<?php echo $result3['image']; ?>" alt="">
                        <a href="health_article.php?article=<?php echo $result3['id']; ?>">
                            <div class="tb-overlay">
                                <p>
                                    <?php echo $result3['title']; ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <a href="health.php"><button>View More Topic</button></a>
        </div>
    </section>
    <!-- end topic 1 -->

    <!-- video -->
    <section id="video">
        <h1 class="title-video">Exercise For Diet</h1>
        <div class="video">
            <div class="v-container show-controls">
                <div class="v-wrapper">
                    <div class="video-timeline">
                        <div class="progress-area">
                            <span>00:00</span>
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                    <ul class="video-controls">
                        <li class="options left">
                            <button class="volume"><i class="ri-volume-up-line"></i></button>
                            <input type="range" min="0" max="1" step="any">
                            <div class="video-timer">
                                <p class="current-time">00:00</p>
                                <p class="separator"> / </p>
                                <p class="video-duration">00:00</p>
                            </div>
                        </li>
                        <li class="options center">
                            <button class="skip-backward"><i class="ri-arrow-left-double-fill"></i></button>
                            <button class="play-pause"><i class="ri-play-fill"></i></button>
                            <button class="skip-forward"><i class="ri-arrow-right-double-fill"></i></i></button>
                        </li>
                        <li class="options rigth">
                            <div class="playback-content">
                                <button class="playback-speed">
                                    <span class="ri-slow-down-fill"></span>
                                </button>
                                <ul class="speed-options">
                                    <li data-speed="2">2x</li>
                                    <li data-speed="1.5">1.5x</li>
                                    <li data-speed="1" class="s-active">Normal</li>
                                    <li data-speed="0.75">0.75x</li>
                                    <li data-speed="0.5">0.5x</li>
                                </ul>
                            </div>
                            <button class="pic-in-pic">
                                <span class="ri-picture-in-picture-line"></span>
                            </button>
                            <button class="full-screen"><i class="ri-fullscreen-line"></i></button>
                        </li>
                    </ul>
                </div>
                <video src="video/video-content.mp4"></video>
            </div>
        </div>
    </section>
    <!-- end video -->

    <!-- accordion -->
    <section>
        <div class="faq">
            <div class="accordion">
                <div class="accordion-content">
                    <header>
                        <span class="accordion-title">Why should I use a HealthScope?</span>
                        <i class="ri-arrow-down-s-fill"></i>
                    </header>

                    <p class="accordion-desc">
                        HeatlhScope provides a media website that provides health services for students at Islamic
                        Boarding Schools, and this site is of course still in the development stage. with the hope that
                        in the future, this website will be useful for all mankind.
                    </p>
                </div>

                <div class="accordion-content">
                    <header>
                        <span class="accordion-title">What can I get from HealthScope?</span>
                        <i class="ri-arrow-down-s-fill"></i>
                    </header>

                    <p class="accordion-desc">
                        You can look for articles about health and traditional medicine, of course with herbal
                        medicines. Here you can also discuss health between users and experts in the health sector. with
                        the hope of maintaining the health of all users safely and comfortably.
                    </p>
                </div>

                <div class="accordion-content">
                    <header>
                        <span class="accordion-title">Can I collaborate with HealthScope?</span>
                        <i class="ri-arrow-down-s-fill"></i>
                    </header>

                    <p class="accordion-desc">
                        Those of you who want to collaborate with us, of course we will gladly welcome it. Of course,
                        there are several conditions for collaborating, so don't worry about fraud from us. If there is
                        something uncomfortable about our service, then you can report it to us by contacting us.
                    </p>
                </div>

                <div class="accordion-content">
                    <header>
                        <span class="accordion-title">Can I search for content about the Quran on HealthScope?</span>
                        <i class="ri-arrow-down-s-fill"></i>
                    </header>

                    <p class="accordion-desc">
                        You can search for all article content here. You can even add content from the article, by
                        writing your article on the "Health" page, and you will verify your article first, if from our
                        side your article is safe for us to publish, then we will display it on the "Health" page too .
                        you can read your own articles here!!
                    </p>
                </div>

                <div class="accordion-content">
                    <header>
                        <span class="accordion-title">How can I support the HealthScope community?</span>
                        <i class="ri-arrow-down-s-fill"></i>
                    </header>

                    <p class="accordion-desc">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit velit voluptas ea omnis
                        voluptatem eum at molestiae non laudantium, rerum saepe consequuntur ex! Cumque vitae atque
                        exercitationem porro nesciunt! Minus.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end accordion -->

    <!-- quotes -->
    <section>
        <div class="dq-container">
            <div class="dq-card">
                <div class="dq-close"><i class="ri-close-line"></i></div>
                <div class="dq-text">
                    <h1>Today Quote is</h1>
                    <p>
                        <?= $randomQuote ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end quotes -->

    <!-- footer -->
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
    <!-- end footer -->
</body>

<script src="js/script.js"></script>
<script src="js/video.js"></script>
<script src="js/popup.js"></script>
<script src="js/accordion.js"></script>

</html>