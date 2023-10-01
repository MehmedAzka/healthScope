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

    <div class="container">
        <!-- Register -->
        <div class="signup">
            <img src="images/logo-1.png" alt="">
            <form action="function.php" method="post" enctype="multipart/form-data">
                <input id="username" placeholder="Username" type="text" maxlength="225" autocomplete="off" name="username" required>

                <input id="email" placeholder="Email" type="email" maxlength="225" autocomplete="off" name="email" required>

                <input id="password" placeholder="Password" type="password" maxlength="225" autocomplete="off" name="password" required>

                <input id="confirm-password" placeholder="Confirm Password" type="password" maxlength="225" autocomplete="off" name="confirm-password" required>

                <input type="hidden" value="user" name="role">

                <button type="submit" value="Submit" name="regis-user">Sign Up</button>
            </form>
            <p>Already have an account? <a href="#" onclick="toggleForm('login')">Login</a></p>
        </div>


        <!-- Login -->
        <div class="login">
            <img src="images/logo-1.png" alt="">
            <form action="function.php" method="post">

                <input id="username" placeholder="Username" type="text" maxlength="225" autocomplete="off" name="username" required>

                <input id="password" placeholder="Password" type="password" maxlength="225" autocomplete="off" name="password" required>

                <button type="submit" value="Submit" name="login-user">Login</button>
                <p>Don't have an account? <a href="#" onclick="toggleForm('signup')">Sign Up</a></p>
            </form>
        </div>

    </div>

    <script>
        function toggleForm(formToShow) {
            const loginForm = document.querySelector('.login');
            const signupForm = document.querySelector('.signup');

            if (formToShow === 'login') {
                loginForm.style.display = 'block';
                signupForm.style.display = 'none';
            } else if (formToShow === 'signup') {
                loginForm.style.display = 'none';
                signupForm.style.display = 'block';
            }
        }

        // Sembunyikan form registrasi dan tampilkan form login saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.querySelector('.login');
            const signupForm = document.querySelector('.signup');

            loginForm.style.display = 'block';
            signupForm.style.display = 'none';
        });
    </script>
</body>

</html>