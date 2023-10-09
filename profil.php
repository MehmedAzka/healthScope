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
    <link rel="stylesheet" href="css/profil.css">
    <link rel="icon" href="images/logo.png">
    <title> HealthScope | Profil Users </title>
</head>

<body>

    <!-- content -->
    <div class="back">
        <button onclick="goBack()">
            < Back</button>
    </div>
    <div class="profile">
        <div class="row">
            <img src="user_pp/<?= $photo ?>" alt="" class="img-profile">
            <h1 class="user-name"><?= $username ?></h1>
        </div>
        <div class="row-main">
            <div class="info-left">
                <h2>Basic Information</h2>
                <p>Some details may be visible to other users</p>
                <hr>
                <div class="input-edit">
                    <p>Username</p>
                    <input type="text" placeholder="<?= $username ?>">
                </div>
                <hr>
                <div class="input-edit">
                    <p>Email</p>
                    <input type="text" placeholder="jamus@gmail.com">
                </div>
            </div>
            <div class="info-right">
                <h2>Password</h2>
                <p>A secure password helps protect your account</p>
                <hr>
                <div class="input-edit">
                    <p>Password</p>
                    <input type="password" placeholder="*********">
                </div>
                <span>last change 15/9/2023</span>
            </div>
        </div>
    </div>
    <!-- end content -->

</body>

<script src="js/script.js"></script>

<script>
    // USER FUNCTION
    let subMenu = document.querySelector(".sub-menu-wrap");

    function toggleMenu() {
        subMenu.classList.toggle("open-menu");
    }

    // BUTTON Back
    function goBack() {
        // Kembali ke home.php
        window.location.href = 'home.php';
    }
</script>

</html>