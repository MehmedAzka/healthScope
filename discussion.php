<?php
include "function.php";

$data = $select('discussion', 'created_date');

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
    <link rel="stylesheet" href="css/discussion.css">
    <link rel="icon" href="images/logo.png">
    <title> HealthScope - Discussion</title>
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
                <li><a href="health.php">Health</a></li>
                <li><a href="plan.php">Plan</a></li>
                <li><a class="active" href="discussion.php">Discussion</a></li>
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
        <div class="d-center">
            <div class="d-container">
                <div class="d-add">
                    <button class="add-discussion sticky"><i class="ri-add-line"></i> New Discussion</button>
                </div>

                <?php if (mysqli_num_rows($data) > 0) {
                    while ($result = $data->fetch_assoc()) { ?>
                        <div class="d-card">
                            <a href="discussion_page.php?forum=<?php echo $result['id'] ?>">
                                <div class="d-profile">
                                    <h2 class="profile">AdminHS</h2>
                                </div>
                                <div class="d-title">
                                    <p>
                                        <?php echo $result['title'] ?>
                                    </p>
                                </div>
                                <div class="d-footer">
                                    <form action="function.php" method="post">
                                        <input type="hidden" name="id_to_delete" value="<?php echo $result['id'] ?>">
                                        <button class="ri-delete-bin-6-line" type="submit" name="delete-submit"
                                            onclick="return confirm('Are you sure you want to delete this data?')"></button>
                                    </form>
                                </div>
                            </a>
                        </div>
                    <?php }
                } else { ?>
                    <div class="not-found-page">
                        <h1>Not Found</h1>
                    </div>
                <?php } ?>
            </div>

            <form action="function.php" method="post">
                <div class="sec-add-dis-void">
                    <div class="sec-add-dis">
                        <label for="diss">Your Discussion</label>
                        <input type="text" name="diss" id="diss" maxlength="100" autocomplete="off" required>
                        <button class="sad-submit" type="submit" name="diss-submit"><i class="ri-add-line"></i>
                            Add</button>
                    </div>
                </div>
            </form>
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