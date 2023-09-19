<?php
include "connection.php";

$result = null;
$showAll = null;

$show = $conn->query("SELECT title FROM h_topic ORDER BY title ASC");

if (isset($_GET['src-box'])) {
    $search_term = $_GET['src-box'];

    $sql = "SELECT * FROM h_topic WHERE title LIKE '%" . $search_term . "%'";
    $result = $conn->query($sql);

} else {
    // Jika tidak ada request pencarian, ambil semua data
    $showAll = $conn->query("SELECT * FROM h_topic ORDER BY time_created DESC LIMIT 10");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/health.css">
    <link rel="icon" href="images/logo.png">
    <title> HealthScope - Health</title>
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
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="health.php">Health</a></li>
                <li><a href="plan.php">Plan</a></li>
                <li><a href="discussion.php">Discussion</a></li>
                <li><a href="#">Service</a></li>
            </ul>
        </div>
    </nav>

    <section>
        <div class="sec-container">
            <div class="health-component-begin">

                <form method="GET">
                    <div class="src-box">
                        <input class="src-search" type="text" name="src-box" list="title" autocomplete="off" required>
                        <button class="src-button" type="submit" name="src"><i class="ri-search-line"></i></button>
                    </div>
                </form>

                <datalist id="title">
                    <?php while ($result3 = $show->fetch_assoc()) { ?>
                        <option>
                            <?php echo $result3['title']; ?>
                        </option>
                    <?php } ?>
                </datalist>
            </div>

            <?php
            if (($result !== null && $result->num_rows > 0) || ($showAll !== null && $showAll->num_rows > 0)) {
                // Loop melalui hasil pencarian
                while ($row = isset($result) ? $result->fetch_assoc() : $showAll->fetch_assoc()) { ?>
                    <div class="h-content">
                        <a href="#">
                            <div class="h-card">
                                <div class="h-text">
                                    <h2>
                                        <?php echo $row['title']; ?>
                                    </h2>
                                    <p>
                                        <?php echo $row['subtitle']; ?>
                                    </p>
                                    <div class="wtc">
                                        <p class="writer">
                                            <i>Written by -
                                                <?php echo $row['writer']; ?>
                                            </i>
                                        </p>
                                        <p class="cd">
                                            <?php echo $row['time_created']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="h-image">
                                    <img src="health_image/<?php echo $row['image']; ?>" alt="image">
                                </div>
                            </div>
                        </a>
                    </div>
                <?php }
            } else { ?>

                <div class="not-found-page">
                    <h1>Not found for "
                        <?php echo $search_term ?>"
                    </h1>
                </div>
                <?php
            }
            ?>
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
<script src="https://cdn.jsdelivr.net/npm/datalist-css/dist/datalist-css.min.js"></script>

</html>