<?php
include "connection.php";

$quotes = [
    "\"Create healthy habits, not restrictions.\"",
    "\"Take care of your body. It’s the only place you have to live.\"",
    "\"Healthy is an outfit that looks different on everybody.\"",
    "\"He who has health has hope and he who has hope has everything.\"",
    "\"It is health that is real wealth and not pieces of gold and silver.\"",
    "\"If you don’t recognize an ingredient, your body won’t either.\""
];

$randomQuote = $quotes[array_rand($quotes)];

$showAll = $conn->query("SELECT * FROM h_topic ORDER BY time_created DESC LIMIT 4");
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
    <nav>
        <div class="nav-content">
            <div class="logo">
                <a href="index.php">HEALTHSCOPE</a>
                <span class="hamburger none" onclick="toggle()">
                    <i id="bars" class="ri-menu-line"></i>
                </span>
            </div>
            <ul class="nav-links">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="health.php">Health</a></li>
                <li><a href="plan.php">Plan</a></li>
                <li><a href="discussion.php">Discussion</a></li>
                <li><a href="#">Service</a></li>
            </ul>
        </div>
    </nav>

    <section>
        <div class="container">
            <div class="content">
                <img class="content-image" src="health_image/commonSage.jpg" alt="picture" srcset="">
                <div class="content-desk">
                    <h3>Daun Sage</h3>
                    <p>Daun sage umumnya digunakan secara tradisional sebagai obat melawan diabetes. Ekstrak sage
                        dapat mengurangi kadar glukosa darah pada pengidap diabetes tipe 1 dengan mengaktifkan
                        reseptor tertentu.</p>
                </div>
            </div>

            <div class="content">
                <img class="content-image" src="health_image/honey.jpg" alt="picture" srcset="">
                <div class="content-desk">
                    <h3>Madu</h3>
                    <p>Madu adalah makanan kaya antioksidan yang dapat melindungi tubuh dari risiko serangan senyawa
                        radikal bebas. Jika tidak, senyawa ini dapat merusak sel, menyebabkan gangguan jantung dan
                        pembuluh darah, hingga mempercepat penuaan kulit.</p>
                </div>
            </div>

            <div class="content">
                <img class="content-image" src="health_image/infusedWater.jpg" alt="picture" srcset="">
                <div class="content-desk">
                    <h3>Infused Water</h3>
                    <p>Minuman sehat ini rendah kalori, tetapi tetap mengandung beragam nutrisi penting, seperti
                        vitamin, mineral, serta antioksidan. Tetapi tidak disarankan untuk meminumnya setiap hari,
                        karena dapat menyebabkan tensi menjadi turun.</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-half">
            <div class="title">Latest Topic</div>
            <div class="tb">
                <?php while ($result3 = $showAll->fetch_assoc()) { ?>
                    <div class="tb-card">
                        <img class="tb-image" src="health_image/<?php echo $result3['image']; ?>" alt="">
                        <a href="health.php">
                            <div class="tb-overlay">
                                <p>
                                    <?php echo $result3['title']; ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="background-color: #bbb;">
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

    <section>
        <div class="container">
            <ul id="accordion">
                <li>
                    <label for="a-1">#1 Why Use HealthScope? <span><i
                                class="fa-solid fa-caret-right"></i></span></label>
                    <input type="radio" name="accordion" id="a-1">
                    <div class="acc-content">
                        <p>This website provides various tips and tricks so you can maintain your health and immunity.
                            Actually, on this website there are ways for you to memorize the Quran quickly and
                            efficiently, it all depends on the parameters of your ability to memorize the Quran.</p>
                    </div>
                </li>

                <li>
                    <label for="a-2">#2 Can I ask something to a health expert? <span><i
                                class="fa-solid fa-caret-right"></i></span></label>
                    <input type="radio" name="accordion" id="a-2">
                    <div class="acc-content">
                        <p>On this website there is a place for you to communicate with each other, share stories about
                            health, symptoms of diseases that perhaps only a few people know about, and much more. Of
                            course, you can ask health experts, people who are experienced in the field of herbal
                            medicine and many more.</p>
                    </div>
                </li>

                <li>
                    <label for="a-3">#3 Can I contribute to the development of this website? <span><i
                                class="fa-solid fa-caret-right"></i></span></label>
                    <input type="radio" name="accordion" id="a-3">
                    <div class="acc-content">
                        <p>You can contribute to the development of this website. We would really appreciate any
                            contribution you can give us. You can donate your extra money to run this website. We hope
                            that this website can help all users who want to learn or just want to know about a disease
                            and how to treat it.</p>
                    </div>
                </li>

                <li>
                    <label for="a-4">#4 Are there events to share experiences between santri at their respective
                        Islamic boarding schools? <span><i class="fa-solid fa-caret-right"></i></span></label>
                    <input type="radio" name="accordion" id="a-4">
                    <div class="acc-content">
                        <p>We dedicate this website to all humanity in this world, especially to santri who are
                            memorizing and murojaah the Quran. We provide a forum for santri to share their
                            experiences at Islamic boarding schools with many people.</p>
                    </div>
                </li>

                <li>
                    <label for="a-5">#5 Empty <span><i class="fa-solid fa-caret-right"></i></span></label>
                    <input type="radio" name="accordion" id="a-5">
                    <div class="acc-content">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, accusamus molestiae labore,
                            ullam voluptatibus sequi soluta unde dignissimos iusto accusantium non temporibus error
                            ipsam dolores assumenda voluptatum officiis libero minima.</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section
        style="width: 100%; height: auto; display: flex; justify-content: center; align-item: center; margin: 0 0 30px 0;">
        <?= $randomQuote ?>
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
<script src="js/video.js"></script>

</html>