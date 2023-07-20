<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <title>Home Page</title>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

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
    .side24{
        display:flex;
        flex-direction: column;
    }
    @media (max-width: 768px) {
            .side24{
                flex-direction: row;
            }
        }
</style>

<body>
    <?php include 'navbar.php'; ?>
    <div class="text-center container py-3">
        <h4 class="heading pt-2" style="
    font-family: 'Press Start 2P';font-size: 22px; color:black;"><strong>ParaCrash Game Store</strong></h4>
    </div>
    <style>
    </style>
    <div class="row sides24">
        <div id="carouselVideoExample" class="carousel slide carousel-fade col-lg-9" data-mdb-ride="carousel">
            <!-- Indicators -->
            <!-- <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div> -->
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
                    <button type="button" id="slidebutton1" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" id="slidebutton2" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" id="slidebutton3" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <!-- <img src="..." class="d-block w-100" alt="..."> -->
                        <video class="img-fluid" autoplay loop muted>
                            <source src="vid/ghosttokyo.mp4" type="video/mp4" />
                        </video>
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="font-family: 'Raleway', sans-serif;">Ghostwire Tokyo</h5>
                            <p id="disc">A Beautifully Haunted Tokyo. Explore a unique vision of Tokyo twisted by a
                                supernatural presence.</p>
                            <form method="get" action="seppage.php">
                                <input type="hidden" name="gameName" value="Ghostwire Tokyo">
                                <button type="submit" name="buy" class="btn btn-dark">BUY</button>
                            </form>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <!-- <img src="..." class="d-block w-100" alt="..."> -->
                        <video class="img-fluid" autoplay loop muted>
                            <source src="vid/sleepingdogs.mp4" type="video/mp4" />
                        </video>
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="font-family: 'Raleway', sans-serif;">
                                Sleeping Dogs
                            </h5>
                            <p id="disc">Destroy your opponents in brutal hand-to-hand combat using an unmatched martial
                                arts system.</p>
                            <form method="get" action="seppage.php">
                                <input type="hidden" name="gameName" value="Sleeping Dogs">
                                <button type="submit" name="buy" class="btn btn-dark">BUY</button>
                            </form>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!-- <img src="..." class="d-block w-100" alt="..."> -->
                        <video class="img-fluid" autoplay loop muted>
                            <source src="vid/watchdog.mp4" type="video/mp4" />
                        </video>
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="font-family: 'Raleway', sans-serif;">
                                Watch Dogs
                            </h5>
                            <p id="disc">Watch_Dogs takes place in a fully simulated living city where,
                                using your smartphone, you have real-time control over the city's infrastructure.</p>
                            <form method="get" action="seppage.php">
                                <input type="hidden" name="gameName" value="Watch Dogs">
                                <button type="submit" name="buy" class="btn btn-dark">BUY</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="col mx-9">
            <div class="col-lg-9" id="flipcard">
                <div class="card-container" id="cardContainer1">
                    <div class="card-1 flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="img/Grand Theft Auto V.webp" />
                            </div>
                            <div class="flip-card-back">
                                <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Grand Theft Auto V">
                                    <button type="submit" name="buy" class="btn btn-dark">
                                        <h6 class="card-title mb-3">Grand Theft Auto V</h6>
                                    </button>
                                </form>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">20% OFF Grand Offer</li>
                                    <li class="list-group-item">Never Gonna be Like This!!!</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9" id="flipcard">
                <div class="card-container" id="cardContainer2">
                    <div class="card-1 flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="img/roblox.webp" />
                            </div>
                            <div class="flip-card-back">
                                <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Roblox">
                                    <button type="submit" name="buy" class="btn btn-dark">
                                        <h6 class="card-title mb-3">Roblox</h6>
                                    </button>
                                </form>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">20% OFF Grand Offer</li>
                                    <li class="list-group-item">Never Gonna be Like This!!!</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>

    <div class="carousel-inner">
        <!-- Carousel wrapper -->
        <section class="s1">

            <div class="text-left container "><a class="no" href="#" style="text-decoration:none;">
                    <h4 class="heading2" style="padding-left:10px;">Latest &#129170;</h4>
                </a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="scrollcards">

                        <div class="card">
                            <img class="card-img-top " src="img/Grand Theft Auto V.webp">
                            <div class="card-block">

                                <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Grand Theft Auto V">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Grand Theft Auto V</h6>

                                    </button>
                                </form>

                                <br>
                                <a class="mb-3">
                                    Action-Adventure Game
                                </a>
                                <p class="card-text">Rs.1300</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Grand Theft Auto 3.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Grand Theft Auto 3">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Grand Theft Auto 3</h6>

                                    </button>
                                </form> <br>
                                <a class="mb-3">
                                    Action-Adventure Game
                                </a>
                                <p class="card-text">Rs.900</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Minecraft.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Minecraft">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Minecraft</h6>

                                    </button>
                                </form><br>
                                <a class="mb-3">
                                    3D sandbox game
                                </a>
                                <p class="card-text">Rs.500</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Call Of Duty Modern Warfare.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Call Of Duty Modern Warfare">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">COD - Modern Warfare</h6>

                                    </button>
                                </form><br>
                                <a class="mb-3">
                                    Action
                                </a>
                                <p class="card-text">Rs.2500</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Wolfenstein New Order.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Wolfenstein New Order">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Wolfenstein New Order</h6>

                                    </button>
                                </form> <br>
                                <a class="mb-3">
                                    Action-Adventure
                                </a>
                                <p class="card-text">Rs.1130</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Resident Evil 2.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Resident Evil 2">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Resident Evil 2</h6>

                                    </button>
                                </form><br>
                                <a class="mb-3">
                                    Survival Horror
                                </a>
                                <p class="card-text">Rs.1130</p>
                            </div>
                        </div>

                        <div class="card">
                            <img class="card-img-top " src="img/Assassins Creed Odyssey.webp">
                            <div class="card-block p-0">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Assassins Creed Odyssey">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Assassins Creed Odyssey</h6>

                                    </button>
                                </form><br>
                                <a class="mb-3 p-2">
                                    Action Role-Playing
                                </a>
                                <p class="card-text p-2">Rs.2500</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Counter-Strike Global Offensive.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Counter-Strike Global Offensive">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Counter-Strike: GO </h6>

                                    </button>
                                </form><br>
                                <a class="mb-3">
                                    Tactical shooter
                                </a>
                                <p class="card-text">Free</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/roblox.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Roblox">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Roblox</h6>

                                    </button>
                                </form>
                                <br>
                                <a class="mb-3 ">
                                    Simulation Video Game
                                </a>
                                <p class="card-text">Free</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Cyberpunk2077.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Cyberpunk2077">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Cyberpunk2077</h6>

                                    </button>
                                </form><br>
                                <a class="mb-3 ">
                                    Science-Fiction
                                </a>
                                <p class="card-text">3550</p>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </section>
        <section>

            <div class="text-left container "><a class="no" href="#" style="text-decoration:none;">
                    <h4 class="heading2">Popular &#129170;</h4>
                </a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="scrollcards">

                        <div class="card">
                            <img class="card-img-top " src="img/Grand Theft Auto V.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Grand Theft Auto V">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Grand Theft Auto V</h6>

                                    </button>
                                </form><br>
                                <a class="mb-3">
                                    Action-Adventure Game
                                </a>
                                <p class="card-text">Rs.1300</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Counter-Strike Global Offensive.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Counter-Strike Global Offensive ">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Counter-Strike: GO </h6>

                                    </button>
                                </form> <br>
                                <a class="mb-3">
                                    Tactical shooter
                                </a>
                                <p class="card-text">Free</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Cyberpunk2077.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Cyberpunk2077">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Cyberpunk2077</h6>

                                    </button>
                                </form><br>
                                <a class="mb-3 ">
                                    Science-Fiction
                                </a>
                                <p class="card-text">Rs.3550</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Grand Theft Auto 3.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Grand Theft Auto 3">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Grand Theft Auto 3</h6>

                                    </button>
                                </form> <br>
                                <a class="mb-3">
                                    Action-Adventure Game
                                </a>
                                <p class="card-text">Rs.900</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Assassins Creed Odyssey.webp">
                            <div class="card-block p-0">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Assassins Creed Odyssey">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Assassins Creed Odyssey</h6>

                                    </button>
                                </form> <br>
                                <a class="mb-3 p-2">
                                    Action Role-Playing
                                </a>
                                <p class="card-text p-2">Rs.2500</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Wolfenstein New Order.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Wolfenstein New Order">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Wolfenstein : New Order</h6>

                                    </button>
                                </form><br>
                                <a class="mb-3">
                                    Action-Adventure
                                </a>
                                <p class="card-text">Rs.1130</p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top " src="img/Resident Evil 2.webp">
                            <div class="card-block">
                            <form method="get" action="seppage.php">
                                    <input type="hidden" name="gameName" value="Resident Evil 2">
                                    <button type="submit" name="buy" class="btn btn-dark w-100">
                                        <h6 class=" card-title mb-3">Resident Evil 2</h6>

                                    </button>
                                </form> <br>
                                <a class="mb-3">
                                    Survival Horror
                                </a>
                                <p class="card-text">Rs.1130</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </section>
</body>


</html>
<style>
    .carousel {

        /* Adjust the width as per your requirement */
        display: inline-block;
    }

    #flipcard {
        width: 20%;
        /* Adjust the width as per your requirement */
    }


    .card {
        max-width: 260px;
        display: inline-block;
    }

    .scrolling-wrapper {
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
    }

    .s1 {
        margin-top: 17px
    }



    .card {
        margin: 10px 4px;
        color: white;
        background-color: rgb(33 37 41);
        /* transition: .6s ease; */
    }

    .card-block {
        width: 212px;
        padding: 7px;
    }

    .scrollcards {
        overflow: auto;
        white-space: nowrap;
    }

    ::-webkit-scrollbar {
        width: 0px;
        height: 0px;
        background: transparent;
    }

    div.scrollcards .card {
        display: inline-block;
        text-decoration: none;
        height: 355px;
    }

    .card-img-top {
        /* justify-items:center; */
        height: 220px;
        width: 100%;
    }

    a {
        font-weight: 5px;
    }

    .heading2 {
        /* z-index: 100; */
        /* margin-top: -44px; */
        margin-left: -25px;
        color: rgb(33 37 41);
    }

    .no {
        pointer-events: none;
    }

    @media (max-width: 800px) {
  .sides24 {
    flex-direction: column;
    align-items: center;
  }

  #carouselVideoExample {
    width: 100%;
  }

  #flipcard {
    
    width: 100%;
    margin-top: 10px;
  }
}

    /* Media query for desktop view */
    @media (min-width: 400px) {
        .sides24 {
            flex-direction: row;
        }

        #carouselVideoExample {
            padding-left: 39px;
            width: 70%;
        }

        #flipcard {
            width: 30%;
            margin-top: 0;
        }
    }

    .carousel-control-next-icon,
    .carousel-control-prev-icon {
        display: inline-block;
        top: 50%;
        transform: translateY(-50%);
        height: 0rem;
        background-repeat: no-repeat;
        background-position: 50%;
        background-size: 100% 100%;
    }

    #carouselExampleIndicators {
        width: 90%;
        height: max-content;
        padding-left: 20px;
    }

    #disc {
        font-size: 13px;
        font-family: 'Raleway', sans-serif;
    }

    #slidebutton1,
    #slidebutton2,
    #slidebutton3 {
        width: 55px;
        height: 3px;
        padding: 0;
        margin-right: 4px;
        margin-left: 4px;
    }


    #flipcard {
        width: 100%;
    }

    #cardContainer1 {
        width: 100%;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }

    .flip-card {
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
        text-align: center;
        width: 100%;
        height: 230px;
        border-radius: 20px;
        background-color: transparent;
        perspective: 1000px;
    }

    .flip-card-inner {
        width: 100%;
        position: relative;
        height: 100%;
        transition: 0.65s;
        transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    .flip-card:hover {
        cursor: pointer;
    }

    .flip-card-front,
    .flip-card-back {
        width: 100%;
        height: 100%;
        position: absolute;
        backface-visibility: hidden;
    }

    .flip-card-front,
    .flip-card-back {
        display: grid;
        place-items: center;
    }

    .flip-card-front {
        display: grid;
        place-items: center;
        border: 1px solid rgba(151, 149, 149, 0.466);
        border-radius: 10px;
    }

    .flip-card-back {
        background-color: #191e24;
        transform: rotateY(180deg);
        box-shadow: 10px 10px 10px lightgray;
        border-radius: 10px;
    }

    .flip-card-front img {
        max-width: 90%;
        min-width: 50%;
        background-size: cover;
    }

    .flip-card-back h4 {
        color: #f1c40f;
    }
</style>