<?php
require "function.php";

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$photo = $_SESSION['photo'];
$created_date = $_SESSION['created_date'];

$show = $find('user', $id);
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
        <?php while ($row = $show->fetch_assoc()) { ?>
            <div class="row">
                <div class="img-edit">
                    <img src="user_pp/<?= $row['photo'] ?>" alt="" class="img-profile">
                    <button class="ri-edit-box-line"></button>
                </div>
                <h1 class="user-name">
                    <?= $row['username'] ?>
                </h1>
            </div>
            <form action="function.php" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="row-main">
                    <div class="info-left">
                        <h2>Basic Information</h2>
                        <p>Some details may be visible to other users</p>
                        <hr>
                        <div class="input-edit">
                            <p>Username</p>
                            <input class="inputField" type="text" placeholder="<?= $row['username'] ?>" name="username"
                                oninput="edit()">
                        </div>
                        <hr>
                        <div class="input-edit">
                            <p>Email</p>
                            <input class="inputField" type="email" placeholder="<?= $row['email'] ?>" name="email"
                                oninput="edit()">
                        </div>
                    </div>
                    <div class="info-right">
                        <h2>Password</h2>
                        <p>A secure password helps protect your account</p>
                        <hr>
                        <div class="input-edit">
                            <p>Password</p>
                            <input class="inputField" type="password" placeholder="********" name="pass" oninput="edit()">
                        </div>
                        <span>last change
                            <?= $row['created_date'] ?>
                        </span>
                    </div>

                </div>
                <button class="edit-button" name="edit-profile"><i class="ri-edit-line"></i> EDIT</button>
            </form>
        <?php } ?>
    </div>
    <!-- end content -->

</body>

<script src="js/script.js"></script>
<script src="js/profile.js"></script>

</html>