<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Aspekta' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Satoshi' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Nohemi' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <title>News Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(#3f4797, #404ccc) !important;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            height: max-content !important;
        }

        .Maincontent {
            padding: 20px;
        }

        .headingnews {
            text-align: center;
            margin-bottom: 20px;
            transition: all 0.5s ease;
        }

        .card1,
        .card2 {
            max-width: 300px;
            height: 100%;
            border: none;
            border-radius: 7px;
            overflow: hidden;
        }

        .main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: stretch;
            max-height: 500px;
        }

        .card1 {
            width: 100%;
            margin: 10px;
        }

        .card2 {
            width: calc(50% - 20px);
            margin: 10px;
        }

        .image-container {
            position: relative;
        }

        .image-container img {
            width: 100%;
            height: auto;
        }

        .hover-text {
            font-weight: bold;
            position: absolute;
            top: 0;
            padding: 10px;
            margin: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.75);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .image-container:hover .hover-text {
            opacity: 1;
        }



        .main2 {
            margin-top: 30px;
            display: flex;
        }

        .a1,
        .b1 {
            padding: 20px;
        }

        .a1 {
            width: auto;
            margin-right: 0px;
            display: flex;
            flex-wrap: wrap;
            align-items: start;
        }

        .v1 {
            border-left: 2px solid rgba(23, 23, 23, 0.2);
            height: 100%;
            width: inherit;
        }

        .cardimage {
            max-height: 350px !important;
        }

        .image-container2 {
            max-width: 78%;
        }

        .a1card {
            max-width: 100%;
            height: auto;
        }

        .texta1card {
            font-size: 17px;
            font-family: sans-serif;
            font-weight: bold;
            text-align: center;
            color: #2f1307;
        }

        @media (max-width: 992px) {
            .main2 {
                flex-direction: column;
                justify-self: center;
            }

            .a1 {
                flex-direction: row;
                flex-wrap: nowrap;
                gap: 6px;
                justify-self: center;
                justify-items: center;
            }

            .hover-text {
                font-size: 13px;
            }

            .image-container img {
                height: 200px;
            }

            .a1card {
                max-width: 100%;
                height: 120px;
            }

            .main {
                flex-direction: row;
                flex-wrap: wrap;
                justify-self: center;
            }
        }

        .v1 {
            justify-content: center;
            align-items: start;
        }

        .v1childimg {
            height: 200px;
        }

        .v1child {
            display: flex;
            align-items: center;
            margin-left: 53px;
            background-color: rgba(0, 0, 0, 0.3);
            padding: 10px;
            border-top: 2px solid #331d13;
            border-bottom: 2px solid #331d13;
            transition: all 0.29s ease;
        }

        .v1child:hover {
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        }

        .v1childimg {
            height: 170px;
            width: auto;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
        }

        .v1child p {
            margin: 0;
            padding: 0;
            flex: 1;
            color: whitesmoke;
            text-align: center;
            font-weight: bold;
        }

        .v1child a {
            text-decoration: none;
            color: beige;
            transition: all 0.3s ease;
        }

        .v1child a:hover {
            color: darkgoldenrod;
        }

        .hrv1 {
            margin-left: 53px;
            width: 97%;
        }

        @keyframes borderAnimation {
            0% {
                border-width: 2px;
                border-color: orange;
                color: orange;
                box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
            }

            25% {
                color: peru;
                border-color: peru;
            }

            50% {
                color: Orange;
                border-width: 2px;
                border-color: orange;
                box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
            }

            75% {
                color: peru;
                border-color: peru;
            }

            100% {
                color: Orange;
                border-width: 2px;
                border-color: Orange;
                box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
            }
        }

        .headingmain {
            display: flex;
            justify-content: center;
        }

        .headingnews {
            text-align: center;
            padding: 20px;
            border: 2px solid Orange;
            width: calc(fit-content() + 20px);
            animation: borderAnimation 7s infinite;
        }

        .headingnews2 {
            font-size: 24px;
            animation: borderAnimation 7s infinite;
            color: Orange;
            font-family: 'Satoshi' , sans-serif !important;
            margin: 0;
            font-family: sans-serif;
        }

        .hover-text .formbutton2 button {
            display: block !important;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="Maincontent container">
        <div class="heading-container headingmain">
            <div class="headingnews">
                <h2 class="headingnews2">News</h2>
            </div>
        </div>
        <div class="row main">
            <div class="col card1">
                <div class="image-container">
                    <img class="cardimage" src="img/Ghostwire Tokyo.webp" alt="Image">
                    <div class="hover-text">
                        This free update adds new areas, missions, powers, collectibles, enemies,
                        and a new roguelite mode to the game. It also brings Ghostwire: Tokyo to Xbox consoles for the
                        first time.
                        <div class="fb">
                            <form class="formbutton2" method="POST" action="seppage.php">
                                <input type="hidden" value="Ghostwire Tokyo" name="gameName">
                                <button type="submit" class="btn">More</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col card2">
                <div class="image-container">
                    <img class="cardimage imgcard2" src="img/Watch Dogs.webp" alt="Image">
                    <div class="hover-text">The games are set in a near-future where technology has become increasingly
                        pervasive.
                        The games focus on hacking and social engineering as gameplay mechanics.
                        The games have been praised for their graphics and gameplay, but criticized for their story and
                        characters.</div>
                </div>
            </div>
            <div class="col card2">
                <div class="image-container">
                    <img class="cardimage imgcard2" src="img/DayZ.webp" alt="Image">
                    <div class="hover-text">The latest update for DayZ, 1.21 Update 3, was released on June 20, 2023.
                        This update focused on fixing bugs and improving the overall gameplay experience.
                        The developers have confirmed that they will continue to support DayZ throughout 2023. They have
                        also teased some new content that is in the works, such as a new map and a new zombie AI.</div>
                </div>
            </div>
        </div>
        <hr id="hrdisplayed">
        <div class="row main2">
            <div class="col a1">
                <div class="image-container2">
                    <img class="a1card" src="img 2/Cyberpunk2077.webp" alt="Image">
                    <div class="texta1card">: The upcoming expansion, Phantom Liberty, is set to be released on
                        September
                        26, 2023. It will add new quests, weapons, and enemies to the game.<br>
                        : CD Projekt Red is also working on a sequel to Cyberpunk 2077, but it is still in the early
                        stages of development.</div>
                </div>
                <br>
                <div class="image-container2">
                    <img class="a1card" src="img 2/Grand Theft Auto V.webp" alt="Image">
                    <div class="texta1card">GTA V is still the most-watched game on Twitch. In 2021, GTA V was the
                        most-watched game on Twitch, with over 3.1 billion hours watched. This is likely due to the
                        popularity of GTA RP, a mode where players join a dedicated GTA server and roleplay as different
                        characters.</div>
                </div>
                <br>
            </div>
            <div class="col b1">
                <div class="row v1">
                    <hr class="hrv1">
                    <div class="v1child">
                        <img class="v1childimg" src="img/Need For Speed Most Wanted.webp">
                        <p>Most Played Car Racing Game! <a href="seppage.php">Click For More!!</a></p>
                    </div>
                    <br>
                    <hr class="hrv1">
                    <div class="v1child">
                        <img class="v1childimg" src="img/Minecraft.webp">
                        <p>The Trails & Tales Update has been released, introducing new story elements, items, and
                            mobs.<br>The ongoing Minecraft Championship (MCC) Season 2 features 10 teams competing in
                            diverse challenges.<br> <a href="seppage.php">Click For More!!</a></p>
                    </div>
                    <br>
                    <hr class="hrv1">
                    <div class="v1child">
                        <img class="v1childimg" src="img/Call Of Duty Modern Warfare.webp">
                        <p>It was the first Call of Duty game to be rated M for Mature by the ESRB. This was due to its
                            realistic violence and depictions of terrorism. <a href="seppage.php">Click For More!!</a>
                        </p>
                    </div>
                    <br>
                    <hr class="hrv1">
                    <div class="v1child">
                        <img class="v1childimg" src="img/Valorant.webp">
                        <p>Valorant boasts 15+ million monthly players, cementing its place as a premier competitive
                            FPS. Riot Games reveals the upcoming agent, 'Giraffe,' a recon specialist, set to debut in
                            Episode 7 Act 3<a href="seppage.php">Click For More!!</a></p>
                    </div>
                    <br>
                    <hr class="hrv1">
                </div>
            </div>
        </div>
        <hr>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>