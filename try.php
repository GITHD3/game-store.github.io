<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <title>Home Page</title>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

    <link href="main1css.css" rel="stylesheet" />
</head>
<style>
    .imglogo {
        max-width: 240px;
    }

    section {
        padding-top: 5px;
    }

    body {
        font-family: sans-serif;
        background: linear-gradient(#404ccc, #03e9f4);
    }
</style>

<body>
    <?php include 'navbar.php'; ?>
    <div class="text-center container py-3">
        <h4 class="heading pt-2" style="font-family: 'Press Start 2P';font-size: 22px; color:black;"><strong>ParaCrash Game Store</strong></h4>
    </div>
    <style>
    </style>
    <div class="row">
        <div id="carouselVideoExample" class="carousel slide carousel-fade col-lg-9" data-mdb-ride="carousel">
            <style>
                  body {
      overflow-y: smooth;
    }

    /* Hide scrollbar */
    ::-webkit-scrollbar {
      display: none;
    }
            </style>

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators justify-content-center">
                    <button type="button" id="slidebutton1" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" id="slidebutton2" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" id="slidebutton3" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <video class="img-fluid" autoplay loop muted>
                            <source src="vid/ghosttokyo.mp4" type="video/mp4" />
                        </video>
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="font-family: 'Raleway', sans-serif;">Ghost Tokyo</h5>
                            <p id="disc">A Beautifully Haunted Tokyo. Explore a unique vision of Tokyo twisted by a supernatural presence.</p>
                            <form method="get" action="seppage.php">
                                <input type="hidden" name="gameName" value="Ghost Tokyo">
                                <button type="submit" name="buy" class="btn btn-dark">BUY</button>
                            </form>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <video class="img-fluid" autoplay loop muted>
                            <source src="vid/paracrash.mp4" type="video/mp4" />
                        </video>
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="font-family: 'Raleway', sans-serif;">ParaCrash</h5>
                            <p id="disc">Prepare for the ultimate skydiving experience with ParaCrash.</p>
                            <form method="get" action="seppage.php">
                                <input type="hidden" name="gameName" value="ParaCrash">
                                <button type="submit" name="buy" class="btn btn-dark">BUY</button>
                            </form>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <video class="img-fluid" autoplay loop muted>
                            <source src="vid/cyperpunk2077.mp4" type="video/mp4" />
                        </video>
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="font-family: 'Raleway', sans-serif;">Cyberpunk 2077</h5>
                            <p id="disc">Become a cyber-enhanced mercenary in the futuristic city of Night City.</p>
                            <form method="get" action="seppage.php">
                                <input type="hidden" name="gameName" value="Cyberpunk 2077">
                                <button type="submit" name="buy" class="btn btn-dark">BUY</button>
                            </form>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
        <div class="col-lg-3 text-center">
            <section class="container my-5">
                <h4 class="heading pt-2" style="font-family: 'Press Start 2P';font-size: 20px;"><strong>Top Sellers</strong></h4>
                <div class="card" style="width: 18rem;">
                    <img src="images/ghosttokyo.jpg" class="card-img-top" alt="Ghost Tokyo">
                    <div class="card-body">
                        <h5 class="card-title">Ghost Tokyo</h5>
                        <p class="card-text">Explore a unique vision of Tokyo twisted by a supernatural presence.</p>
                        <form method="get" action="seppage.php">
                            <input type="hidden" name="gameName" value="Ghost Tokyo">
                            <button type="submit" name="buy" class="btn btn-dark">BUY</button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card" style="width: 18rem;">
                    <img src="images/paracrash.jpg" class="card-img-top" alt="ParaCrash">
                    <div class="card-body">
                        <h5 class="card-title">ParaCrash</h5>
                        <p class="card-text">Prepare for the ultimate skydiving experience.</p>
                        <form method="get" action="seppage.php">
                            <input type="hidden" name="gameName" value="ParaCrash">
                            <button type="submit" name="buy" class="btn btn-dark">BUY</button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card" style="width: 18rem;">
                    <img src="images/cyberpunk2077.jpg" class="card-img-top" alt="Cyberpunk 2077">
                    <div class="card-body">
                        <h5 class="card-title">Cyberpunk 2077</h5>
                        <p class="card-text">Become a cyber-enhanced mercenary in the futuristic city of Night City.</p>
                        <form method="get" action="seppage.php">
                            <input type="hidden" name="gameName" value="Cyberpunk 2077">
                            <button type="submit" name="buy" class="btn btn-dark">BUY</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>
