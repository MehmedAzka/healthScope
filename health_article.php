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
    <?php while ($result = $data->fetch_assoc()) { ?>
            <div class="ha-start">
                <div class="back-to-start">
                    <a href="health.php"><i class="ri-arrow-left-s-line"></i> BACK</a>
                </div>
                <div class="ha-head">
                    <h1>
                        <?= $result['title']; ?> <br>
                    </h1>
                </div>
            </div>
            <div class="ha-container">
                <div class="ha-desc">
                    <p>
                    <pre><?= $result['subtitle']; ?></pre>
                    </p>
                </div>
            </div>
        <?php } ?>

</body>

<!-- <script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datalist-css/dist/datalist-css.min.js"></script> -->

</html>