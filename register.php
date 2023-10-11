<?php
include "function.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/loginRegister.css">
    <link rel="icon" href="images/logo.png">
    <title> HealthScope </title>
</head>

<body>
    <div class="container">
        <!-- Register -->
        <div class="signup">
            <img src="images/logo-1.png" alt="">
            <form action="function.php" method="post" enctype="multipart/form-data">
                <input id="username" placeholder="Username" type="text" maxlength="225" autocomplete="off"
                    name="username" required>

                <input id="email" placeholder="Email" type="email" maxlength="225" autocomplete="off" name="email"
                    required>

                <input id="password" placeholder="Password" type="password" maxlength="225" autocomplete="off"
                    name="password" required>

                <input id="confirm-password" placeholder="Confirm Password" type="password" maxlength="225"
                    autocomplete="off" name="confirm-password" required>

                <input type="hidden" value="user" name="role">

                <?php if (isset($_SESSION['error'])) { ?>
                    <p class="alert">
                        <?php echo $_SESSION['error']; ?>
                    </p>
                    <?php unset($_SESSION['error']); ?>
                <?php } ?>

                <button type="submit" value="Submit" name="regis-user">Sign Up</button>
            </form>
            <p>Already have an account? <a href="index.php">Login</a></p>
        </div>


        <!-- Login -->
        <!-- <div class="login">
            <img src="images/logo-1.png" alt="">
            <form action="function.php" method="post">

                <input id="username" placeholder="Username" type="text" maxlength="225" autocomplete="off"
                    name="username" required>

                <input id="password" placeholder="Password" type="password" maxlength="225" autocomplete="off"
                    name="password" required>
                <?php if (isset($_SESSION['error'])) { ?>
                    <p class="alert">
                        <?php echo $_SESSION['error']; ?>
                    </p>
                    <?php unset($_SESSION['error']); ?>
                <?php } ?>

                <button type="submit" value="Submit" name="login-user">Login</button>
                <p>Don't have an account? <a href="#" onclick="toggleForm('signup')">Sign Up</a></p>
            </form>
        </div> -->

    </div>
</body>

<script src="js/loginRegister.js"></script>

</html>