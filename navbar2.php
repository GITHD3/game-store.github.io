<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>
    <div class="main">
        <div class="navbar-wrapper d-flex justify-content-center align-items-center">
            <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
                <div class="container-fluid">
                    <a class="navbar-brand d-md-none" href="#">
                        <img src="img/ww.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li style="margin: 0;padding-bottom: 5px" class="nav-item"><a href="main1.php">
                                    <button class="button nav-link active" aria-current="page">Discover</button>
                                </a></li>
                            <li style="margin: 0;padding-bottom: 5px" class="nav-item"><a href="browse.php">
                                    <button class="button nav-link">Browse</button></a>
                            </li>
                            <!-- <li style="margin: 0;padding-bottom: 5px"class="nav-item"><a href="#">
                                <button class="button nav-link">News</button></a>
                        </li> -->
                            <a class="navbar-brand d-none d-md-block">
                                <img src="img/ww.png" alt="">
                            </a>
                            <li style="margin: 0;padding-bottom: 5px" class="nav-item"><a href="aboutus.php">
                                    <button class="button nav-link">About Us</button></a>
                            </li>
                            <li class="nav-item">
                                <button class="button nav-link" role="button" data-bs-toggle="dropdown">Sign Up
                                    &#9660;</button>
                                <ul class="dropdown-menu mr-1" style="left: auto;">
                                    <li style="margin: 0;padding-bottom: 5px">
                                        <a href="registeration.php">
                                            <button class="button dropdown-item" role="button">Sign Up</button>
                                        </a>
                                    </li>
                                    <li style="margin: 0;padding-bottom: 5px">
                                        <a href="login.php">
                                            <button class="button dropdown-item" role="button">Log In</button>
                                        </a>
                                    </li>
                                    <?php if (isset($_SESSION['name'])) { ?>
                                        <li style="margin: 0;padding-bottom: 5px">
                                            <a href="admin1.php">
                                                <button class="button dropdown-item" role="button">Admin</button>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
<style>
    .navbar-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    a {
        text-decoration: none;
        text-align: center;
        align-items: center;
        padding: 0;
    }

    body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .navbar-brand img {
        width: 80px;
    }

    .navbar-nav {
        align-items: center;
    }

    .navbar .navbar-nav .nav-link {
        color: #fff;
        font-size: 1.1em;
        padding: 0.5em 1em;
    }

    @media screen and (min-width: 768px) {
        .navbar-brand img {
            width: 100px;
        }

        .navbar-brand {
            margin-right: 0;
            padding: 0 1em;
        }
    }

    .navbar {
        border: 1px solid white;
        border-radius: 10px;
    }

    .main {
        padding: 7px;
    }

    .button {
        max-width: 510px;
        display: inline-block;
        height: 34px;
        padding: 0 15px;
        margin-right: 10px;
        border: 1.5px solid #03e9f4;
        border-radius: 7px;
        background: rgb(33 37 41);
        color: #c3dfe0;
        font-size: 14px;
        line-height: 34px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
    }

    .button:hover {
        background-color: #03e9f4;
        color: #050801;
        box-shadow: 0px 0px 5px #03e9f4, 0px 0px 25px #03e9f4, 0px 0px 50px #03e9f4, 0px 0px 100px #03e9f4;
        /* -webkit-box-reflect: below 1px linear-gradient(transparent, #0005);  */
    }
</style>

</html>