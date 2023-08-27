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
            padding: 5px 7px !important;
    }

    .Maincontent {
        padding: 20px;
    }

    .headingnews {
        text-align: center;
        margin-bottom: 20px;
        transition: all 0.5s ease;
    }

    hr {
        color: #17171e !important;
        opacity: 1 !important;
    }

    .card1,
    .card2 {
        max-width: 300px !important;
        height: 100%;
        border: none;
        border-radius: 6px;
        overflow: hidden;
        background-color: rgb(0, 0, 0, 0.1);
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
        padding: 0px;
    }

    .card2 {
        width: calc(50% - 20px);
        margin: 10px;
    }

    .image-container {
        position: relative;
    }

    .image-container2 img {
        border-radius: 12px;
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
        justify-content: start;
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

    .b1 {
        display: flex;
    }

    .a1 {
        width: auto;
        margin-right: -130px;
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        align-items: start;
        align-content: flex-start;
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
        width: 78%;
    }

    .a1card {
        max-width: 100%;
        height: auto;
        transition: all 0.3s ease-in-out;
    }

    .a1card:hover {
        filter: brightness(1.13);
    }

    .texta1card {
        font-size: 16px;
        font-family: sans-serif;
        text-align: center;
        color: lightgray;
        outline: 1px solid #17171e;
        margin-top: 4px;
        background-color: rgb(0, 0, 0, 0.3);
        border-radius: 10px;
        padding: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .texta1card:hover {
        font-size: 16.1px;
        text-align: center;
        color: whitesmoke;
        outline: 1px solid #17171e;
        background-color: rgb(0, 0, 0, 0.4);
        border-radius: 11px;


    }

    @media (max-width: 992px) {
        .texta1card {
            font-size: 12px;
        }

        .main2 {
            flex-direction: column;
            justify-self: center;
        }

        .cardimage {
            width: 300px;
        }

        .a1 {
            flex-direction: row;
            flex-wrap: wrap;
            gap: 10px;
        }

        .hover-text {
            font-size: 8.4px;
            font-weight: 200px;
            margin-bottom: 0px;
        }

        .image-container2 {
            border: none;
            width: 100%;
        }

        .image-container img {
            border-radius: 12px;
            border: none;
            height: 230px;
        }

        .a1card {
            max-width: 100%;
            height: 120px;
            outline: 1px solid black;
            border-radius: 17px;
        }

        .main {
            flex-direction: row;
            flex-wrap: wrap;
            justify-self: center;
            gap: 0px;
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

    @keyframes snakeBorderAnimation {

        0% {
            transition: 0.3s;
            border-radius: 0%;
        }

        33% {
            transition: 0.3s;
            border-radius: 30%;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        66% {
            transition: 0.3s;
            border-radius: 20%;
        }

        99% {
            transition: 0.3s;
            border-radius: 30%;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
    }


    @keyframes colorChangeAnimation {

        0%,
        100% {
            color: #F3EAD3;
        }

        50% {
            color: whitesmoke;
        }
    }

    .headingmain {
        display: flex;
        justify-content: center;
    }

    .headingnews {
        text-align: center;
        padding: 20px;
        border: 2px solid skyblue;
        width: calc(fit-content() + 20px);
        animation: snakeBorderAnimation 6s infinite;
        transform-origin: center;
    }

    .headingnews2 {
        font-size: 24px;
        animation: colorChangeAnimation 6s infinite;
        color: Orange;
        font-family: 'Satoshi', sans-serif !important;
        margin: 0;
        font-family: sans-serif;
    }


    .btnn2 {


        width: fit-content;
        border: none;
        margin: 0px;
        border-radius: 0px;
        padding: 0px;

    }

    .btnn {
        color: whitesmoke !important;
        background-color: #3f4797;
        width: fit-content;
        border: 1px solid #17171e;
        margin: 0px;
        border-radius: 3px;
        padding: 9px;
        transition: all 0.3s ease;
    }

    .btnn:hover {
        color: azure;
        border-radius: 7px;
        background-color: #4b59b9;
    }

    .texta1card-a {
        text-decoration: none;
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
                    <div class="hover-text flex-wrap">
                        This free update adds new areas, missions, powers, collectibles, enemies,
                        and a new roguelite mode to the game. It also brings Ghostwire: Tokyo to Xbox consoles for the
                        first time. <form id="form-btn-2" method="POST" action="seppage.php">
                            <input type="hidden" value="Ghostwire Tokyo" name="gameName">
                            <button type="submit" class="btnn">More</button>
                        </form>


                    </div>
                </div>
                <h6 style="color:grey;">
                    <text-muted><small>1 month ago</small></text-muted>
                </h6>
            </div>
            <div class="col card2">
                <div class="image-container">
                    <img class="cardimage imgcard2" src="img/Watch Dogs.webp" alt="Image">
                    <div class="hover-text">The games are set in a near-future where technology has become increasingly
                        pervasive.
                        The games focus on hacking and social engineering as gameplay mechanics.
                        The games have been praised for their graphics and gameplay, but criticized for their story and
                        characters.<form id="form-btn-2" method="POST" action="seppage.php">
                            <input type="hidden" value="Watch Dogs" name="gameName">
                            <button type="submit" class="btnn">More</button>
                        </form>
                    </div>
                </div>
                <h6 style="color:grey;">
                    <text-muted><small>7 Days ago</small></text-muted>
                </h6>
            </div>
            <div class="col card2">
                <div class="image-container">
                    <img class="cardimage imgcard2" src="img/DayZ.webp" alt="Image">
                    <div class="hover-text">The latest update for DayZ, 1.21 Update 3, was released on June 20, 2023.
                        The developers have confirmed that they will continue to support DayZ throughout 2023. They have
                        also teased some new content that is in the works, such as a new map and a new zombie AI.
                        <form id="form-btn-2" method="POST" action="seppage.php">
                            <input type="hidden" value="DayZ" name="gameName">
                            <button type="submit" class="btnn">More</button>
                        </form>
                    </div>
                </div>
                <h6 style="color:grey;">
                    <text-muted><small>10 Days ago</small></text-muted>
                </h6>
            </div>
        </div>
        <hr id="hrdisplayed">
        <div class="row main2">
            <div class="col a1">
                <a href="seppage.php?gameName=MultiVersus" class="texta1card-a">
                    <div class="image-container2">
                        <img class="a1card" src="img 2/MultiVersus.webp" alt="Image">
                        <div class="texta1card">
                            : Seizing the championship title at The Game Awards 2022, MultiVersus reigns supreme as the
                            unrivaled victor in the fighting game arena, securing the esteemed accolade for Best
                            Fighting Game. It's not just a game; it's a triumph in every punch, a victory in every move,
                            and an experience that defines excellence
                        </div>
                    </div>
                </a>
                <a href="seppage.php?gameName=Gord" class="texta1card-a">
                    <div class="image-container2">
                        <img class="a1card" src="img 2/Gord.webp" alt="Image">
                        <div class="texta1card">
                            : GORD Game: Evolving Beyond Limits! From release till now, updates have slain critics'
                            concerns and infused new realms of excitement. Unleash the power within!
                        </div>
                    </div>
                </a>
                <a href="seppage.php?gameName=Cyberpunk2077" class="texta1card-a">
                    <div class="image-container2">
                        <img class="a1card" src="img 2/Cyberpunk2077.webp" alt="Image">
                        <div class="texta1card">
                            : The upcoming expansion, Phantom Liberty, is set to be released on September 26, 2023.
                            It will add new quests, weapons, and enemies to the game.
                            CD Projekt Red is also working on a sequel to Cyberpunk 2077, but it is still in the early
                            stages of development.
                        </div>
                    </div>
                </a>
                <a href="seppage.php?gameName=Grand Theft Auto V" class="texta1card-a">
                    <div class="image-container2">
                        <img class="a1card" src="img 2/Grand Theft Auto V.webp" alt="Image">
                        <div class="texta1card">GTA V is still the most-watched game on Twitch. In 2021, GTA V was the
                            most-watched game on Twitch, with over 3.1 billion hours watched. This is likely due to the
                            popularity of GTA RP, a mode where players join a dedicated GTA server and roleplay as
                            different
                            characters.</div>
                    </div>
                </a>
                <br>
            </div>
            <style>
            .timenews {
                width: fit-content;
                align-self: end;
            }
            </style>
            <div class="col b1">
                <div class="row v1">
                    <div class="v1child">
                        <img class="v1childimg" src="img/Froza Horizon 5.webp">
                        <p>Forza Horizon 5 breaks records with its vast 50% larger map than its predecessor. Dynamic
                            weather adds thrill to gameplay. Nominated for Game of the Year at The Game Awards 2021. <a
                                href="seppage.php?gameName=Froza Horizon 5"> Click
                                For More!!</a></p>
                        <div class="timenews">
                            <h6 class="b-0" style="color:grey;">
                                <text-muted><small>2 Years ago</small></text-muted>
                            </h6>
                        </div>
                    </div>
                    <div class="v1child">
                        <img class="v1childimg" src="img/Wolfenstein New Order.webp">
                        <p>Wolfenstein: The New Order, where the Axis Powers reign after WWII. As B.J. Blazkowicz, lead
                            the resistance against Nazi rule. Acclaimed and commercially successful, it earned Game of
                            the Year nominations at The Game Awards 2014, selling over 2 million copies in its debut
                            week <a href="seppage.php?gameName=Wolfenstein New Order"> Click
                                For More!!</a></p>
                        <div class="timenews">
                            <h6 class="b-0" style="color:grey;">
                                <text-muted><small>1 Year ago</small></text-muted>
                            </h6>
                        </div>
                    </div>
                    <div class="v1child">
                        <img class="v1childimg" src="img/Need For Speed Most Wanted.webp">
                        <p>Most Played Car Racing Game! <a href="seppage.php?gameName=Need For Speed Most Wanted"> Click
                                For More!!</a></p>
                        <div class="timenews">
                            <h6 class="b-0" style="color:grey;">
                                <text-muted><small>10 Days ago</small></text-muted>
                            </h6>
                        </div>
                    </div>
                    <div class="v1child">
                        <img class="v1childimg" src="img/Minecraft.webp">
                        <p>The Trails & Tales Update has been released, introducing new story elements, items, and
                            mobs.<br>The ongoing Minecraft Championship (MCC) Season 2 features 10 teams competing in
                            diverse challenges.<br> <a href="seppage.php?gameName=Minecraft"> Click For More!!</a></p>
                            <div class="timenews">
                                <h6 class="b-0" style="color:grey;"><text-muted><small>15 Days ago</small></text-muted></h6>
                </div>
                    </div>
                    <div class="v1child">
                        <img class="v1childimg" src="img/PlayerUnknown's Battlegrounds.webp">
                        <p>PUBG Mobile's ban in India during September 2020, citing addiction and gambling concerns, was
                            lifted in March 2022.
                            PUBG: New State arrives this November 2022, featuring dynamic gameplay with drivable
                            vehicles and advanced weapon attachments.<br> <a
                                href="seppage.php?gameName=PlayerUnknown's Battlegrounds"> Click For
                                More!!</a></p>
                                <div class="timenews">
                                <h6 class="b-0" style="color:grey;"><text-muted><small>8 Month ago</small></text-muted></h6>
                </div>
                    </div>
                    <div class="v1child">
                        <img class="v1childimg" src="img/Call Of Duty Modern Warfare.webp">
                        <p>It was the first Call of Duty game to be rated M for Mature by the ESRB. This was due to its
                            realistic violence and depictions of terrorism. <a
                                href="seppage.php?gameName=Call Of Duty Modern Warfare"> Click For More!!</a>
                        </p>
                        <div class="timenews">
                                <h6 class="b-0" style="color:grey;"><text-muted><small>11 Days ago</small></text-muted></h6>
                </div>
                    </div>
                    <div class="v1child">
                        <img class="v1childimg" src="img/Valorant.webp">
                        <p>Valorant boasts 15+ million monthly players, cementing its place as a premier competitive
                            FPS. Riot Games reveals the upcoming agent, 'Giraffe,' a recon specialist, set to debut in
                            Episode 7 Act 3<a href="seppage.php?gameName=Valorant"> Click For More!!</a></p>
                            <div class="timenews">
                                <h6 class="b-0" style="color:grey;"><text-muted><small>19 Days ago</small></text-muted></h6>
                </div>
                    </div>
                    <div class="v1child">
                        <img class="v1childimg" src="img/Sleeping Dogs.webp">
                        <p>Escaping its True Crime beginnings, Sleeping Dogs triumphs anew with Square Enix after the
                            franchise's cancellation.<a href="seppage.php?gameName=Sleeping Dogs"> Click For More!!</a>
                        </p>
                        <div class="timenews">
                                <h6 class="b-0" style="color:grey;"><text-muted><small>20 Days ago</small></text-muted></h6>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>
