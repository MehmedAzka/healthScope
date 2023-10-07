<?php
include "function.php";


$result = null;
$showAll = null;
$search_term = null;

$show = $conn->query("SELECT title FROM h_topic ORDER BY title ASC");

if (isset($_GET['src-box'])) {
    $search_term = htmlspecialchars($_GET['src-box']);

    $sql = "SELECT * FROM h_topic WHERE title LIKE '%" . $search_term . "%'";
    $result = $conn->query($sql);

} else {
    // Jika tidak ada request pencarian, ambil semua data
    $showAll = $conn->query("SELECT * FROM h_topic ORDER BY created_date DESC LIMIT 10");
}

$sesID = $_SESSION['id'];
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
    <link rel="stylesheet" href="css/health.css">
    <link rel="icon" href="images/logo.png">
    <title> HealthScope - Health</title>
</head>

<body>
    <nav>
        <div class="nav-content">
            <div class="logo">
                <a href="home.php"><img src="images/healthScope.png" alt=""></a>
                <span class="hamburger none" onclick="toggle()">
                    <i id="bars" class="ri-menu-line"></i>
                </span>
            </div>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a class="active" href="health.php">Health</a></li>
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

    <section>
        <div class="health-component-begin">

            <form method="GET">
                <div class="src-box">
                    <input class="src-search" type="text" name="src-box" list="title" autocomplete="off"
                        placeholder="Search" required>
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
        <div class="d-add">
            <button id="add-discussion" class="add-discussion"><i class="ri-add-line"></i> New Article</button>
        </div>
        <div class="sec-container">


            <form action="function.php" method="post" enctype="multipart/form-data">
                <div class="sec-add-dis-void">
                    <div class="sec-add-dis">
                        <div class="left">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" maxlength="255" autocomplete="off"
                                placeholder="type something..." required>
                            <label for="image">Image *Portrait</label>
                            <input type="file" name="image" id="image" accept="image/*" required>
                        </div>
                        <div class="right">
                            <label for="subtitle">Subtitle</label>
                            <textarea name="subtitle" id="subtitle" maxlength="5000" autocomplete="off"
                                placeholder="explain what you mean..." required></textarea>
                            <button class="sad-submit" type="submit" name="health-submit"><i class="ri-add-line"></i>
                                Add</button>
                        </div>
                    </div>
                </div>
            </form>

            <br>

            <?php
            if (($result !== null && $result->num_rows > 0) || ($showAll !== null && $showAll->num_rows > 0)) {
                // Loop melalui hasil pencarian
                while ($row = isset($result) ? $result->fetch_assoc() : $showAll->fetch_assoc()) { ?>
                    <div class="h-content">
                        <a href="health_article.php?article=<?php echo $row['id']; ?>">
                            <div class="h-card">
                                <div class="h-image">
                                    <img src="health_image/<?php echo $row['image']; ?>" alt="image">
                                </div>
                                <div class="h-text">
                                    <h2>
                                        <?php echo $row['title']; ?>
                                    </h2>
                                    <p>
                                        <?php
                                        $max_words = 30;
                                        $data_varchar = $row['subtitle'];

                                        $words = explode(" ", $data_varchar);
                                        $data_limit = implode(" ", array_slice($words, 0, $max_words));

                                        echo $data_limit;
                                        ?>....
                                    </p>
                                    <div class="wtc">
                                        <p class="writer">
                                            Written by -
                                            <?php echo $row['created_by']; ?>
                                        </p>
                                        <div class="h-action">
                                            <?php if ($row['created_by'] == $sesID) { ?>
                                                <form action="function.php" method="post">
                                                    <input type="hidden" name="h_content_id" value="<?php echo $row['id'] ?>">
                                                    <button class="ri-delete-bin-6-line" type="submit" name="delete-h-content"
                                                        onclick="return confirm('Are you sure you want to delete this data?')"></button>
                                                </form>
                                            <?php } else { ?>

                                            <?php } ?>
                                            <!-- <div id="add-discussion">
                                                <input type="hidden" name="h_content_id" value="<?php echo $row['id'] ?>">
                                                <button class="ri-edit-box-line" type="submit" name="edit-h-content"></button>
                                            </div> -->
                                        </div>
                                    </div>
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