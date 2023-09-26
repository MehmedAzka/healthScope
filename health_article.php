<?php
include "function.php";

$id = $_GET['article'];

$data = $find('h_topic', $id);
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
    <div class="ha-container">
        <div class="back-to-start">
            <a href="health.php"><i class="ri-arrow-left-line"></i> Back To Page</a>
        </div>
        <div class="ha-card">
            <?php while ($result = $data->fetch_assoc()) { ?>
                <div class="ha-title">
                    <h1>
                        <?= $result['title']; ?> <br>
                    </h1>
                </div>
                <div class="ha-desc">
                    <p>
                    <pre> <?= $result['subtitle']; ?> </pre>
                    </p>
                </div>
                <!-- <img class="ha-image" src="health_image/<?= $result['image'] ?>" alt="image"> -->
            <?php } ?>
        </div>
    </div>


</body>

<!-- <script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datalist-css/dist/datalist-css.min.js"></script> -->

</html>