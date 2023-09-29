<?php
include "function.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/loginRegister.css">
    <link rel="icon" href="images/logo.png">
    <title> HealthScope </title>
</head>

<body>
    <?php if (isset($_SESSION['error'])) { ?>
        <div>
            <?php echo $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php } ?>

    <!-- Register -->
    <p>Sign Up</p>
    <form action="function.php" method="post" enctype="multipart/form-data">
        <label for="username">Username</label>
        <input id="username" type="text" maxlength="225" autocomplete="off" name="username" required>

        <label for="email">Email</label>
        <input id="email" type="email" maxlength="225" autocomplete="off" name="email" required>

        <label for="password">Password</label>
        <input id="password" type="password" maxlength="225" autocomplete="off" name="password" required>

        <label for="confirm-password">Confirm Password</label>
        <input id="confirm-password" type="password" maxlength="225" autocomplete="off" name="confirm-password"
            required>

        <label for="photo">Photo Profile</label>
        <input id="photo" type="file" maxlength="225" autocomplete="off" name="photo">

        <input type="hidden" value="user" name="role">

        <input type="submit" value="Submit" name="regis-user">
    </form>

    <!-- Login -->
    <p>Login</p>
    <form action="function.php" method="post">
        <label for="username">Username</label>
        <input id="username" type="text" maxlength="225" autocomplete="off" name="username" required>

        <label for="password">Password</label>
        <input id="password" type="password" maxlength="225" autocomplete="off" name="password" required>

        <input type="submit" value="Submit" name="login-user">
    </form>
</body>

</html>