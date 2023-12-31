<?php
include "function.php";

$id = $_GET['forum'];
$data = $find('discussion', $id);

$show = $conn->query("SELECT * FROM comment WHERE commented = '$id' ORDER BY created_date DESC");
$sesID = $_SESSION['id'];
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
    <title> HealthScope - Health</title>
</head>

<body>
    <div class="dp-start">
        <div class="back-to-start">
            <a href="discussion.php"><i class="ri-arrow-left-s-line"></i> BACK</a>
        </div>
        <?php while ($result = $data->fetch_assoc()) { ?>
            <div class="dp-profile">
                <div class="dp-username">
                    <h2>
                        <?= $result['created_by']; ?> <br>
                    </h2>
                </div>
                <div class="dp-dis-topic">
                    <p>
                        <?= $result['title']; ?> <br>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="dp-container">
        <?php if (mysqli_num_rows($show) > 0) {
            while ($row = $show->fetch_assoc()) { ?>
                <div class="dp-comment">
                    <div class="dp-comment-user">
                        <h4>
                            <?php echo $row['username'] ?>
                        </h4>
                        <?php if ($row['username'] == $sesID) { ?>
                            <form action="function.php" method="post">
                                <input type="hidden" name="forum" value="<?= $id ?>">
                                <input type="hidden" name="c-id" value="<?php echo $row['id'] ?>">
                                <button class="ri-delete-bin-6-line" type="submit" name="delete-c-content"
                                    onclick="return confirm('Are you sure you want to delete this data?')"></button>
                            </form>
                        <?php } else { ?>

                        <?php } ?>
                    </div>
                    <div class="dp-comment-text">
                        <p>
                        <pre><?php echo $row['comment'] ?></pre>
                        </p>
                    </div>
                    <div class="dp-created-dt-replay">
                        <p>
                            <?php echo $row['created_date'] ?>
                        </p>
                        <p class="reply">Reply</p>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="not-found-page">
                <h1>No Comment</h1>
            </div>
        <?php } ?>
    </div>

    <form method="post">
        <div class="dp-input-box">
            <textarea class="dp-input" type="text" name="dp-input" placeholder="type something..." required></textarea>
            <button class="dp-button" type="submit" name="dp-submit"><i class="ri-send-plane-2-fill"></i></button>
        </div>
    </form>

</body>

<!-- <script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datalist-css/dist/datalist-css.min.js"></script> -->

</html>