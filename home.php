<?php
include "function.php";

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$quotes = [
    "\"Create healthy habits, not restrictions.\"",
    "\"Take care of your body. It’s the only place you have to live.\"",
    "\"Healthy is an outfit that looks different on everybody.\"",
    "\"He who has health has hope and he who has hope has everything.\"",
    "\"It is health that is real wealth and not pieces of gold and silver.\"",
    "\"If you don’t recognize an ingredient, your body won’t either.\"",
    "\"Together is easy, but TO GET HER is god damm hard\" -AA"
];

$randomQuote = $quotes[array_rand($quotes)];
$showAll = $conn->query("SELECT * FROM h_topic ORDER BY created_date DESC LIMIT 4");

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="icon" href="images/logo.png">
    <title> HealthScope </title>
</head>

<body>
    <!-- navbar -->
    <nav>
        <div class="nav-content">
            <div class="logo">
                <a href="home.php"><img src="images/healthScope.png" alt=""></a>
                <span class="hamburger none" onclick="toggle()">
                    <i id="bars" class="ri-menu-line"></i>
                </span>
            </div>
            <ul class="nav-links">
                <li><a class="active" href="home.php">Home</a></li>
                <li><a href="health.php">Health</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="discussion.php">Discussion</a></li>
            </ul>
            <div class="user-profile">
                <img src="user_pp/<?= $photo ?>" alt="" class="user-pp" onclick="toggleMenu()">
            </div>
            <div class="sub-menu-wrap">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="user_pp/<?= $photo ?>" alt="" class="user-pp">
                        <h3 class="user-name"><?= $username ?></h3>
                    </div>
                    <hr>
                    <a href="profil.php" class="sub-menu-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 20 20">
                            <path fill="currentColor" d="M9 2a4 4 0 1 0 0 8a4 4 0 0 0 0-8Zm-4.991 9A2.001 2.001 0 0 0 2 13c0 1.691.833 2.966 2.135 3.797C5.417 17.614 7.145 18 9 18c.41 0 .816-.019 1.21-.057A5.477 5.477 0 0 1 9 14.5c0-1.33.472-2.55 1.257-3.5H4.01Zm6.626 2.92a2 2 0 0 0 1.43-2.478l-.155-.557c.254-.195.529-.362.821-.497l.338.358a2 2 0 0 0 2.91.001l.324-.344c.298.14.578.315.835.518l-.126.423a2 2 0 0 0 1.456 2.519l.349.082a4.7 4.7 0 0 1 .01 1.017l-.46.117a2 2 0 0 0-1.431 2.479l.156.556a4.35 4.35 0 0 1-.822.498l-.338-.358a2 2 0 0 0-2.909-.002l-.325.344a4.32 4.32 0 0 1-.835-.518l.127-.422a2 2 0 0 0-1.456-2.52l-.35-.082a4.713 4.713 0 0 1-.01-1.016l.461-.118Zm4.865.58a1 1 0 1 0-2 0a1 1 0 0 0 2 0Z" />
                        </svg>
                        <p>Profile Setting</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z" />
                        </svg>
                        <p>Help & Support</p>
                        <span>></span>
                    </a>
                    <a href="logout.php" class="sub-menu-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                        <p>Log Out</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- daily info -->
    <section>
        <div class="container">
            <div class="row">
                <div class="content">
                    <img class="content-image" src="images/commonSage.jpg" alt="picture" srcset="">
                    <div class="content-desk">
                        <h3>Daun Sage</h3>
                        <p>Daun sage umumnya digunakan secara tradisional sebagai obat melawan diabetes. Ekstrak sage
                            dapat mengurangi kadar glukosa darah pada pengidap diabetes tipe 1 dengan mengaktifkan
                            reseptor tertentu.</p>
                    </div>
                </div>

                <div class="content">
                    <img class="content-image" src="images/honey.jpg" alt="picture" srcset="">
                    <div class="content-desk">
                        <h3>Madu</h3>
                        <p>Madu adalah makanan kaya antioksidan yang dapat melindungi tubuh dari risiko serangan senyawa
                            radikal bebas. Jika tidak, senyawa ini dapat merusak sel, menyebabkan gangguan jantung dan
                            pembuluh darah.</p>
                    </div>
                </div>

                <div class="content">
                    <img class="content-image" src="images/infusedWater.jpg" alt="picture" srcset="">
                    <div class="content-desk">
                        <h3>Infused Water</h3>
                        <p>Minuman sehat ini rendah kalori, tetapi tetap mengandung beragam nutrisi penting, seperti
                            vitamin, mineral, serta antioksidan. Tetapi tidak disarankan untuk meminumnya setiap hari,
                            karena dapat menyebabkan tensi menjadi turun.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end daily info -->

    <!-- users -->
    <div class="users">
        <section>
            <div class="card-one">
                <svg width="38" height="42" viewBox="0 0 38 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 21C21.8795 21 24.641 19.8938 26.6772 17.9246C28.7133 15.9555 29.8571 13.2848 29.8571 10.5C29.8571 7.71523 28.7133 5.04451 26.6772 3.07538C24.641 1.10625 21.8795 0 19 0C16.1205 0 13.3589 1.10625 11.3228 3.07538C9.28673 5.04451 8.14286 7.71523 8.14286 10.5C8.14286 13.2848 9.28673 15.9555 11.3228 17.9246C13.3589 19.8938 16.1205 21 19 21ZM15.1237 24.9375C6.76875 24.9375 0 31.4836 0 39.5637C0 40.909 1.12813 42 2.5192 42H35.4808C36.8719 42 38 40.909 38 39.5637C38 31.4836 31.2313 24.9375 22.8763 24.9375H15.1237Z" fill="#37BD6B" />
                </svg>
                <p class="counter">120</p>
                <h4>Website Users</h4>
            </div>
            <div class="card-two">
                <svg width="48" height="42" viewBox="0 0 48 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 5.25019C0 2.34909 2.352 0 5.25 0H30.75C33.651 0 36 2.34909 36 5.25019V21.7508C36 23.1432 35.4469 24.4786 34.4623 25.4632C33.4777 26.4478 32.1424 27.001 30.75 27.001H21.183L13.461 34.7203C12.8497 35.3313 12.071 35.7473 11.2233 35.9159C10.3756 36.0844 9.497 35.9978 8.6985 35.6671C7.89999 35.3364 7.21744 34.7764 6.73713 34.0578C6.25682 33.3393 6.0003 32.4945 6 31.6301V27.001H5.25C3.85761 27.001 2.52226 26.4478 1.53769 25.4632C0.553123 24.4786 0 23.1432 0 21.7508L0 5.25019ZM5.25 4.50016C5.05109 4.50016 4.86032 4.57918 4.71967 4.71984C4.57902 4.8605 4.5 5.05127 4.5 5.25019V21.7508C4.5 22.1648 4.836 22.5008 5.25 22.5008H8.25C8.84674 22.5008 9.41903 22.7379 9.84099 23.1598C10.2629 23.5818 10.5 24.1541 10.5 24.7509V31.3181L18.66 23.1608C18.8684 22.9514 19.1162 22.7853 19.3891 22.6721C19.662 22.5588 19.9545 22.5006 20.25 22.5008H30.75C30.9489 22.5008 31.1397 22.4218 31.2803 22.2811C31.421 22.1405 31.5 21.9497 31.5 21.7508V5.25019C31.5 5.05127 31.421 4.8605 31.2803 4.71984C31.1397 4.57918 30.9489 4.50016 30.75 4.50016H5.25ZM42.75 10.5004H41.25C40.6533 10.5004 40.081 10.2633 39.659 9.84135C39.2371 9.41938 39 8.84706 39 8.2503C39 7.65354 39.2371 7.08122 39.659 6.65925C40.081 6.23728 40.6533 6.00022 41.25 6.00022H42.75C45.651 6.00022 48 8.3493 48 11.2504V27.751C48 29.1434 47.4469 30.4789 46.4623 31.4635C45.4777 32.4481 44.1424 33.0012 42.75 33.0012H42V37.6304C41.9997 38.4947 41.7432 39.3395 41.2629 40.058C40.7826 40.7766 40.1 41.3366 39.3015 41.6673C38.503 41.9981 37.6244 42.0846 36.7767 41.9161C35.929 41.7476 35.1503 41.3315 34.539 40.7205L27.66 33.8412C27.4512 33.6324 27.2856 33.3845 27.1726 33.1117C27.0596 32.8389 27.0014 32.5465 27.0014 32.2512C27.0014 31.9559 27.0596 31.6635 27.1726 31.3906C27.2856 31.1178 27.4512 30.8699 27.66 30.6611C27.8688 30.4523 28.1167 30.2867 28.3895 30.1737C28.6623 30.0607 28.9547 30.0025 29.25 30.0025C29.5453 30.0025 29.8377 30.0607 30.1105 30.1737C30.3833 30.2867 30.6312 30.4523 30.84 30.6611L37.5 37.3184V30.7511C37.5 30.1544 37.7371 29.582 38.159 29.1601C38.581 28.7381 39.1533 28.501 39.75 28.501H42.75C42.9489 28.501 43.1397 28.422 43.2803 28.2814C43.421 28.1407 43.5 27.9499 43.5 27.751V11.2504C43.5 11.0515 43.421 10.8607 43.2803 10.7201C43.1397 10.5794 42.9489 10.5004 42.75 10.5004ZM26.34 11.3404L17.34 20.3407C17.1317 20.5505 16.884 20.7169 16.6111 20.8305C16.3382 20.9441 16.0456 21.0025 15.75 21.0025C15.4544 21.0025 15.1618 20.9441 14.8889 20.8305C14.616 20.7169 14.3683 20.5505 14.16 20.3407L9.66 15.8406C9.4512 15.6318 9.28557 15.3839 9.17256 15.111C9.05956 14.8382 9.0014 14.5458 9.0014 14.2505C9.0014 13.9552 9.05956 13.6628 9.17256 13.39C9.28557 13.1172 9.4512 12.8693 9.66 12.6605C9.8688 12.4516 10.1167 12.286 10.3895 12.173C10.6623 12.06 10.9547 12.0018 11.25 12.0018C11.5453 12.0018 11.8377 12.06 12.1105 12.173C12.3833 12.286 12.6312 12.4516 12.84 12.6605L15.75 15.5676L23.16 8.1603C23.5817 7.73859 24.1536 7.50167 24.75 7.50167C25.3464 7.50167 25.9183 7.73859 26.34 8.1603C26.7617 8.58201 26.9986 9.15397 26.9986 9.75035C26.9986 10.3467 26.7617 10.9187 26.34 11.3404Z" fill="#37BD6B" />
                </svg>
                <p class="counter">68</p>
                <h4>People Discussing</h4>
            </div>
            <div class="card-three">
                <svg width="54" height="58" viewBox="0 0 54 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M34.3652 14.5H40.9247C41.5046 14.5 42.0607 14.7546 42.4708 15.2078C42.8808 15.661 43.1112 16.2757 43.1112 16.9166V43.5C43.1112 44.7818 42.6505 46.0112 41.8304 46.9176C41.0103 47.8241 39.898 48.3333 38.7382 48.3333M38.7382 48.3333C37.5784 48.3333 36.4661 47.8241 35.646 46.9176C34.8259 46.0112 34.3652 44.7818 34.3652 43.5V12.0833C34.3652 11.4424 34.1348 10.8277 33.7248 10.3745C33.3147 9.92124 32.7586 9.66663 32.1787 9.66663H10.3136C9.73368 9.66663 9.17754 9.92124 8.76749 10.3745C8.35744 10.8277 8.12708 11.4424 8.12708 12.0833V41.0833C8.12708 43.0061 8.81817 44.8502 10.0483 46.2098C11.2785 47.5695 12.9469 48.3333 14.6866 48.3333H38.7382Z" stroke="#37BD6B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18.254 19.3334H27.0001" stroke="#37BD6B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18.254 29H27.0001" stroke="#37BD6B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18.254 38.6666H27.0001" stroke="#37BD6B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="counter">27</p>
                <h4>Health News</h4>
            </div>
            <div class="card-four">
                <svg width="48" height="42" viewBox="0 0 48 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M36 36.4736V12.1578" stroke="#37BD6B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18 26.0527L24 20.8422L30 26.0527" stroke="#37BD6B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M30 17.3684L36 12.1578L42 17.3684" stroke="#37BD6B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6 36.4736H42" stroke="#37BD6B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M24 36.4737V20.8422" stroke="#37BD6B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <p>5.0 <svg width="80" height="16" viewBox="0 0 101 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.36356 12.5773L4.55612 14.5099C4.44313 14.5668 4.31602 14.5922 4.18897 14.5833C4.06193 14.5743 3.93996 14.5313 3.83668 14.4591C3.7334 14.3869 3.65288 14.2883 3.60409 14.1743C3.55531 14.0603 3.5402 13.9354 3.56043 13.8136L4.28791 9.71927L1.20795 6.82047C1.11602 6.73437 1.05093 6.62497 1.02011 6.50476C0.989286 6.38454 0.993975 6.25835 1.03364 6.14059C1.07331 6.02284 1.14635 5.91825 1.24443 5.83879C1.34252 5.75932 1.46169 5.70817 1.58834 5.69117L5.84455 5.09341L7.74827 1.36929C7.8052 1.25837 7.89295 1.16505 8.00165 1.09981C8.11035 1.03457 8.23569 1 8.36356 1C8.49143 1 8.61676 1.03457 8.72546 1.09981C8.83416 1.16505 8.92191 1.25837 8.97885 1.36929L10.8826 5.09341L15.1388 5.69117C15.2651 5.70877 15.3837 5.76026 15.4814 5.8398C15.579 5.91934 15.6518 6.02376 15.6914 6.14126C15.7309 6.25876 15.7358 6.38465 15.7053 6.50468C15.6749 6.62471 15.6104 6.7341 15.5192 6.82047L12.4392 9.71927L13.1649 13.8119C13.1867 13.9339 13.1727 14.0595 13.1246 14.1742C13.0764 14.2889 12.996 14.3883 12.8925 14.461C12.789 14.5337 12.6665 14.5768 12.539 14.5854C12.4114 14.594 12.284 14.5679 12.171 14.5099L8.36356 12.5773Z" fill="#FFE500" stroke="#FFE600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M29.3991 12.5773L25.5917 14.5099C25.4787 14.5668 25.3516 14.5922 25.2246 14.5833C25.0975 14.5743 24.9755 14.5313 24.8723 14.4591C24.769 14.3869 24.6885 14.2883 24.6397 14.1743C24.5909 14.0603 24.5758 13.9354 24.596 13.8136L25.3235 9.71927L22.2435 6.82047C22.1516 6.73437 22.0865 6.62497 22.0557 6.50476C22.0249 6.38454 22.0296 6.25835 22.0692 6.14059C22.1089 6.02284 22.1819 5.91825 22.28 5.83879C22.3781 5.75932 22.4973 5.70817 22.6239 5.69117L26.8801 5.09341L28.7839 1.36929C28.8408 1.25837 28.9285 1.16505 29.0372 1.09981C29.1459 1.03457 29.2713 1 29.3991 1C29.527 1 29.6523 1.03457 29.761 1.09981C29.8697 1.16505 29.9575 1.25837 30.0144 1.36929L31.9182 5.09341L36.1744 5.69117C36.3006 5.70877 36.4193 5.76026 36.517 5.8398C36.6146 5.91934 36.6874 6.02376 36.7269 6.14126C36.7665 6.25876 36.7714 6.38465 36.7409 6.50468C36.7105 6.62471 36.646 6.7341 36.5547 6.82047L33.4748 9.71927L34.2005 13.8119C34.2223 13.9339 34.2083 14.0595 34.1602 14.1742C34.112 14.2889 34.0316 14.3883 33.9281 14.461C33.8246 14.5337 33.7021 14.5768 33.5746 14.5854C33.447 14.594 33.3195 14.5679 33.2066 14.5099L29.3991 12.5773Z" fill="#FFE500" stroke="#FFE600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M50.4347 12.5773L46.6273 14.5099C46.5143 14.5668 46.3872 14.5922 46.2601 14.5833C46.1331 14.5743 46.0111 14.5313 45.9078 14.4591C45.8046 14.3869 45.724 14.2883 45.6753 14.1743C45.6265 14.0603 45.6114 13.9354 45.6316 13.8136L46.3591 9.71927L43.2791 6.82047C43.1872 6.73437 43.1221 6.62497 43.0913 6.50476C43.0605 6.38454 43.0651 6.25835 43.1048 6.14059C43.1445 6.02284 43.2175 5.91825 43.3156 5.83879C43.4137 5.75932 43.5329 5.70817 43.6595 5.69117L47.9157 5.09341L49.8194 1.36929C49.8764 1.25837 49.9641 1.16505 50.0728 1.09981C50.1815 1.03457 50.3069 1 50.4347 1C50.5626 1 50.6879 1.03457 50.7966 1.09981C50.9053 1.16505 50.9931 1.25837 51.05 1.36929L52.9537 5.09341L57.2099 5.69117C57.3362 5.70877 57.4549 5.76026 57.5526 5.8398C57.6502 5.91934 57.7229 6.02376 57.7625 6.14126C57.8021 6.25876 57.8069 6.38465 57.7765 6.50468C57.7461 6.62471 57.6816 6.7341 57.5903 6.82047L54.5104 9.71927L55.2361 13.8119C55.2579 13.9339 55.2439 14.0595 55.1957 14.1742C55.1476 14.2889 55.0672 14.3883 54.9637 14.461C54.8602 14.5337 54.7377 14.5768 54.6101 14.5854C54.4826 14.594 54.3551 14.5679 54.2422 14.5099L50.4347 12.5773Z" fill="#FFE500" stroke="#FFE600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M71.4703 12.5773L67.6629 14.5099C67.5499 14.5668 67.4228 14.5922 67.2957 14.5833C67.1687 14.5743 67.0467 14.5313 66.9434 14.4591C66.8402 14.3869 66.7596 14.2883 66.7108 14.1743C66.6621 14.0603 66.6469 13.9354 66.6672 13.8136L67.3947 9.71927L64.3147 6.82047C64.2228 6.73437 64.1577 6.62497 64.1269 6.50476C64.096 6.38454 64.1007 6.25835 64.1404 6.14059C64.1801 6.02284 64.2531 5.91825 64.3512 5.83879C64.4493 5.75932 64.5684 5.70817 64.6951 5.69117L68.9513 5.09341L70.855 1.36929C70.912 1.25837 70.9997 1.16505 71.1084 1.09981C71.2171 1.03457 71.3424 1 71.4703 1C71.5982 1 71.7235 1.03457 71.8322 1.09981C71.9409 1.16505 72.0287 1.25837 72.0856 1.36929L73.9893 5.09341L78.2455 5.69117C78.3718 5.70877 78.4905 5.76026 78.5881 5.8398C78.6858 5.91934 78.7585 6.02376 78.7981 6.14126C78.8377 6.25876 78.8425 6.38465 78.8121 6.50468C78.7817 6.62471 78.7172 6.7341 78.6259 6.82047L75.546 9.71927L76.2717 13.8119C76.2935 13.9339 76.2795 14.0595 76.2313 14.1742C76.1832 14.2889 76.1028 14.3883 75.9993 14.461C75.8957 14.5337 75.7733 14.5768 75.6457 14.5854C75.5182 14.594 75.3907 14.5679 75.2778 14.5099L71.4703 12.5773Z" fill="#FFE500" stroke="#FFE600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M92.5059 12.5773L88.6985 14.5099C88.5855 14.5668 88.4583 14.5922 88.3313 14.5833C88.2043 14.5743 88.0823 14.5313 87.979 14.4591C87.8757 14.3869 87.7952 14.2883 87.7464 14.1743C87.6976 14.0603 87.6825 13.9354 87.7028 13.8136L88.4302 9.71927L85.3503 6.82047C85.2584 6.73437 85.1933 6.62497 85.1624 6.50476C85.1316 6.38454 85.1363 6.25835 85.176 6.14059C85.2156 6.02284 85.2887 5.91825 85.3868 5.83879C85.4849 5.75932 85.604 5.70817 85.7307 5.69117L89.9869 5.09341L91.8906 1.36929C91.9475 1.25837 92.0353 1.16505 92.144 1.09981C92.2527 1.03457 92.378 1 92.5059 1C92.6338 1 92.7591 1.03457 92.8678 1.09981C92.9765 1.16505 93.0642 1.25837 93.1212 1.36929L95.0249 5.09341L99.2811 5.69117C99.4074 5.70877 99.5261 5.76026 99.6237 5.8398C99.7214 5.91934 99.7941 6.02376 99.8337 6.14126C99.8733 6.25876 99.8781 6.38465 99.8477 6.50468C99.8173 6.62471 99.7528 6.7341 99.6615 6.82047L96.5815 9.71927L97.3073 13.8119C97.329 13.9339 97.3151 14.0595 97.2669 14.1742C97.2188 14.2889 97.1384 14.3883 97.0348 14.461C96.9313 14.5337 96.8088 14.5768 96.6813 14.5854C96.5538 14.594 96.4263 14.5679 96.3133 14.5099L92.5059 12.5773Z" fill="#FFE500" stroke="#FFE600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </p>
                    <h4>Rating</h4>
            </div>
        </section>
    </div>
    <!-- end users -->

    <!-- topic 1 -->
    <section>
        <div class="container-half">
            <h1 class="title">Latest Topic</h1>
            <div class="tb">
                <?php while ($result3 = $showAll->fetch_assoc()) { ?>
                    <div class="tb-card">
                        <img class="tb-image" src="health_image/<?php echo $result3['image']; ?>" alt="">
                        <a href="health_article.php?article=<?php echo $result3['id']; ?>">
                            <div class="tb-overlay">
                                <p>
                                    <?php echo $result3['title']; ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <a href="#"><button>View More Topic</button></a>
        </div>
    </section>
    <!-- end topic 1 -->

    <!-- testimonial -->
    <div class="monial">
        <div class="row">
            <h1>Doctor's Advice</h1>
        </div>
        <div class="row-main">
            <div class="card-one">
                
            </div>
        </div>
    </div>
    <!-- end testimonial -->

    <!-- video -->
    <section id="video">
        <h1 class="title-video" data-aos="fade-right">Exercise For Diet</h1>
        <div class="video">
            <div class="v-container show-controls">
                <div class="v-wrapper">
                    <div class="video-timeline">
                        <div class="progress-area">
                            <span>00:00</span>
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                    <ul class="video-controls">
                        <li class="options left">
                            <button class="volume"><i class="ri-volume-up-line"></i></button>
                            <input type="range" min="0" max="1" step="any">
                            <div class="video-timer">
                                <p class="current-time">00:00</p>
                                <p class="separator"> / </p>
                                <p class="video-duration">00:00</p>
                            </div>
                        </li>
                        <li class="options center">
                            <button class="skip-backward"><i class="ri-arrow-left-double-fill"></i></button>
                            <button class="play-pause"><i class="ri-play-fill"></i></button>
                            <button class="skip-forward"><i class="ri-arrow-right-double-fill"></i></i></button>
                        </li>
                        <li class="options rigth">
                            <div class="playback-content">
                                <button class="playback-speed">
                                    <span class="ri-slow-down-fill"></span>
                                </button>
                                <ul class="speed-options">
                                    <li data-speed="2">2x</li>
                                    <li data-speed="1.5">1.5x</li>
                                    <li data-speed="1" class="s-active">Normal</li>
                                    <li data-speed="0.75">0.75x</li>
                                    <li data-speed="0.5">0.5x</li>
                                </ul>
                            </div>
                            <button class="pic-in-pic">
                                <span class="ri-picture-in-picture-line"></span>
                            </button>
                            <button class="full-screen"><i class="ri-fullscreen-line"></i></button>
                        </li>
                    </ul>
                </div>
                <video src="video/video-content.mp4"></video>
            </div>
        </div>
    </section>
    <!-- end video -->

    <!-- accordion -->
    <section>
        <div class="faq">
            <ul id="accordion">
                <li class="contentBx">
                    <label for="a-1">#1 Why Use HealthScope? <span><i class="fa-solid fa-caret-right"></i></span></label>
                    <input type="radio" name="accordion" id="a-1">
                    <div class="acc-content">
                        <p>This website provides various tips and tricks so you can maintain your health and immunity.
                            Actually, on this website there are ways for you to memorize the Quran quickly and
                            efficiently, it all depends on the parameters of your ability to memorize the Quran.</p>
                    </div>
                </li>

                <li class="contentBx">
                    <label for="a-2">#2 Can I ask something to a health expert? <span><i class="fa-solid fa-caret-right"></i></span></label>
                    <input type="radio" name="accordion" id="a-2">
                    <div class="acc-content">
                        <p>On this website there is a place for you to communicate with each other, share stories about
                            health, symptoms of diseases that perhaps only a few people know about, and much more. Of
                            course, you can ask health experts, people who are experienced in the field of herbal
                            medicine and many more.</p>
                    </div>
                </li>

                <li class="contentBx">
                    <label for="a-3">#3 Can I contribute to the development of this website? <span><i class="fa-solid fa-caret-right"></i></span></label>
                    <input type="radio" name="accordion" id="a-3">
                    <div class="acc-content">
                        <p>You can contribute to the development of this website. We would really appreciate any
                            contribution you can give us. You can donate your extra money to run this website. We hope
                            that this website can help all users who want to learn or just want to know about a disease
                            and how to treat it.</p>
                    </div>
                </li>

                <li class="contentBx">
                    <label for="a-4">#4 Are there events to share experiences between santri at their respective
                        Islamic boarding schools? <span><i class="fa-solid fa-caret-right"></i></span></label>
                    <input type="radio" name="accordion" id="a-4">
                    <div class="acc-content">
                        <p>We dedicate this website to all humanity in this world, especially to santri who are
                            memorizing and murojaah the Quran. We provide a forum for santri to share their
                            experiences at Islamic boarding schools with many people.</p>
                    </div>
                </li>

                <li class="contentBx">
                    <label for="a-5">#5 Empty <span><i class="fa-solid fa-caret-right"></i></span></label>
                    <input type="radio" name="accordion" id="a-5">
                    <div class="acc-content">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, accusamus molestiae labore,
                            ullam voluptatibus sequi soluta unde dignissimos iusto accusantium non temporibus error
                            ipsam dolores assumenda voluptatum officiis libero minima.</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- end accordion -->

    <!-- quotes -->
    <section>
        <div class="dq-container">
            <div class="dq-card">
                <div class="dq-close"><i class="ri-close-line"></i></div>
                <div class="dq-text">
                    <h1>Today Quote is</h1>
                    <p>
                        <?= $randomQuote ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end quotes -->

    <!-- footer -->
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
    <!-- end footer -->
</body>

<script src="js/script.js"></script>
<script src="js/video.js"></script>
<script src="js/popup.js"></script>

<script>
    // USER FUNCTION
    let subMenu = document.querySelector(".sub-menu-wrap");

    function toggleMenu() {
        subMenu.classList.toggle("open-menu");
    }
</script>

<script>
    // Ambil elemen dengan class "counter"
    const counters = document.querySelectorAll('.counter');

    // Fungsi untuk melakukan animasi menghitung
    function startCounting() {
        counters.forEach(counter => {
            const target = +counter.innerText; // Ambil nilai target dari teks counter
            const increment = target / 100; // Hitung nilai increment per langkah

            let current = 0;

            // Jalankan animasi menghitung dengan interval
            const timer = setInterval(() => {
                current += increment;
                counter.innerText = Math.ceil(current); // Tampilkan nilai yang telah dihitung

                // Berhenti saat mencapai nilai target
                if (current >= target) {
                    clearInterval(timer);
                    counter.innerText = target;
                }
            }, 10);
        });
    }

    // Panggil fungsi untuk memulai animasi menghitung setelah elemen dimuat
    window.addEventListener('load', startCounting);
</script>

</html>