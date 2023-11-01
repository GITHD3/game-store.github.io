<!DOCTYPE html>
<html>
<?php
ob_start();
?>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Aspekta:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Aspekta' !important;
            src: url('path/to/aspekta-font.woff2') format('woff2'),
                url('path/to/aspekta-font.woff') format('woff');
            /* Add other font formats as needed */
            font-weight: normal;
            font-style: normal;
        }

        .navbar {
            position: sticky;
            top: 3px;
            width: 90%;
            padding-right: 10px;
            padding-left: 10px;
            margin-right: auto;
            margin-left: auto;
            border-radius: 13px;
            outline: 1px solid #171717;
            background: rgba(0, 0, 0, 0.65);
            backdrop-filter: blur(10px);
            font-family: 'Aspekta', sans-serif !important;
            z-index: 20;
        }

        #imgnavbar {
            width: 100px;
            margin: 0px;
        }

        .navbar-brand {
            color: #03e9f4;
        }

        @media (max-width:1000px) {
            .navbar-brand {
                display: none;
            }
        }

        .nav-link {
            width: 90px;
            text-align: center;
            color: lemonchiffon !important;
            border-radius: 7px;
            outline: 1px solid slateblue;
            transition: all 0.3s ease !important;
            font-weight: 500 !important;
            background-color: #101014 !important;
        }

        .nav-link:hover {
            outline: none;
            background-color: #03e9f4 !important;
            color: black !important;
            box-shadow: 0px 0px 5px #03e9f4, 0px 0px 25px #03e9f4, 0px 0px 50px #03e9f4, 0px 0px 100px #03e9f4;
        }

        .navbar-toggler {
            margin-left: 7px;
            border: none;
            border-radius: 7px;
            transition: background-color 0.3s ease;
            background-color:#03e9f4 !important;
        }
        
        .navbar-toggler:hover {
            background-color: rgba(3, 233, 244, 0.5) !important;
        }

        ul {
            gap: 7px;
            justify-content: space-evenly;
        }

        li {

            padding: 0px 12px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg ">

        <!-- Show this only on mobile to medium screens -->
        <a class="navbar-brand d-lg-none" href="main1.php">Discover</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggle"
            aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">

            <ul class="navbar-nav">
                <li class="nav-item navitems ">
                    <a class="nav-link" href="main1.php">Discover</a>
                </li>
                <li class="nav-item navitems ">
                    <a class="nav-link" href="browse.php">Browse</a>
                </li>

                <li class="nav-item navitems ">
                    <a class="nav-link" href="news.php">News</a>
                </li>
            </ul>

            <img class="navbar-brand d-none d-lg-block" id="imgnavbar" src="img/ww.png"></img>

            <ul class="navbar-nav">
                <li class="nav-item navitems ">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item navitems ">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>

                <?php if (isset($_SESSION['name'])) { ?>
                    <li class="nav-item navitems  dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Profile
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="customer.php">Profile</a></li>
                            <li><a class="dropdown-item" href="#" onclick="logout()">Log Out</a></li>
                            <li><a class="dropdown-item" href="feed.php">Feedback</a></li>
                            <?php 
                            $fn = $_SESSION['name'];
                            $email = $_SESSION['email'];
                            if ($fn == 'Harsh' && $email == 'harshadmin@gmail.com') { ?>
                                <li><a class="dropdown-item" href="admin1.php">Admin</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="nav-item navitems  dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Sign Up
                        </a>
                        <ul class="dropdown-menu">
                    
                            <li><a class="dropdown-item" href="registeration.php">Sign Up</a></li>
                            <li><a class="dropdown-item" href="login.php">Log In</a></li>
                        </ul>
                    </li>
                <?php } ?>
                </li>
            </ul>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    function logout() {
            <?php
            session_destroy();
            ?>
            location.reload(); // Refresh the page after logout
            location.reload(); // Refresh the page after logout
        }
</script>
</html>