<?php
session_start();
include 'navbar.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <title>Home Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <style>
        body {
            background-image: url(img/wallpaper.webp);
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100%;
        }

        .container {
            display: flex;
            justify-content: center;
            padding-top: 15px;
            gap: 9px;
        }

        .main,
        .sidebar {
            padding-top: 12px;
            /* background-color: rgba(211, 211, 211, 0.2); */
            /* border-radius: 10px;
            border-style: solid;
            border-width: 1px; */

            border-color: rgba(211, 211, 211, 0.5); 
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
            -webkit-backdrop-filter: blur(20px);
            backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 32px;

        }

        .main {
            width: 80%;
            padding-right: 8px;
            padding-left: 8px;
        }

        .sidebar {
            width: 20%;
        }

        @media (max-width: 768px) {
            .container {
                flex-wrap: wrap;
            }

            .main,
            .sidebar {
                width: 100%;
            }

            .sidebar {
                display: none;
            }
        }

        .parent {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 0px;
            gap: 50px;
        }

        .child {
            flex-shrink: 0;
            box-sizing: border-box;
            padding: 10px;
            border-style: solid;
            border-color: slategrey;
            border-radius: 9px;
            padding-top: 10px;
            padding-right: 0px;
            padding-left: 0px;
            max-width: 250px;
            min-width: 200px;
            max-height: 510px;
            min-height: 300px;
            background-color: rgba(218, 218, 218, 1);
        }

        @media (max-width: 767px) {
            .child {
                width: 100%;
            }
        }

        #imgcard {
            max-width: 200px;
        }

        .smalltext {
            color: slategray;
        }

        .input1,
        .input2 {
            color: White;
            background-color: black;
            font-family: Arial, Helvetica, sans-serif;
            border-style: solid;
            border-radius: 4px;
            border-color: slategray;
            padding-left: 6px;
            padding-right: 6px;
            padding-top: 6px;
            padding-bottom: 6px;
        }

        .input1:hover,
        .input2:hover {
            background-color: #363636;
            border-radius: 6px;
            text-decoration: none;
            border-color: darkgrey;
        }

        .flip-card {
            background-color: rgba(218, 218, 218, 0.3);
            width: 220px;
            height: 270px;
            display: flex;
            perspective: 1000px;
            padding-left: 2px;
            padding-right: 2px;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }

        .flip-card-front {
            background-color: #bbb;
            color: black;
        }

        .flip-card-back {
            background-image: linear-gradient(#0652C5, slateblue);
            color: white;
            transform: rotateY(180deg);
        }

        .card-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 20px;
        }

        .card-content a {
            color: white;
            text-decoration: none;
        }

        #img1 {
            padding: 0px;
            width: 200px;
            height: 250px;
        }

        .temp {
            padding-left: 58px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main">
            <form method="POST">
                <div class="temp">
                    <input class="input1" type="text" name="searchstring" placeholder="Enter Game name">
                    <input class="input2" type="submit" name="submit" value="Search"><br><br>
                </div>
                <?php
                if (isset($_POST['submit']) || isset($_POST['listvalue'])) {
                    try {
                        $dsn = "mysql:host=localhost;dbname=game4";
                        $username = "root";
                        $password = "";

                        $db = new PDO($dsn, $username, $password);
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        if(isset($_POST['searchstring']) || isset($_POST['listvalue'])) { // Check if searchstring is set
                            if(isset($_POST['searchstring']))
                            $searchString = $_POST['searchstring'];
                            else if(isset($_POST['listvalue']))
                                $searchString = $_POST['listvalue'];
                           
                           
                            $sql = "SELECT * FROM `games` WHERE gamename LIKE :searchString OR publisher_name LIKE :searchString OR developer_name LIKE :searchString OR genre_name LIKE :searchString";
                            $stmt = $db->prepare($sql);
                            $stmt->bindValue(':searchString', '%' . $searchString . '%');
                            $stmt->execute();
                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if (count($results) > 0) {
                                ?>
                                <div class="parent">
                                    <?php
                                    foreach ($results as $row) {
                                        ?>
                                        <form method="POST" action="seppage.php">

                                            <input type="hidden" name="gameName" value="<?php echo $row['gamename']; ?>">
                                            <div class="flip-card">
                                                <div class="flip-card-inner">
                                                    <div class="flip-card-front">
                                                        <div class="card-content">
                                                            <img id="img1" src="img/<?php echo$row['gamename'];?>.webp">
                                                        </div>
                                                    </div>
                                                    <div class="flip-card-back">
                                                        <div class="card-content">
                                                            <h2>
                                                                <?php echo $row['gamename']; ?>
                                                            </h2>
                                                            <p>
                                                                <?php echo $row['genre_name']; ?><br>
                                                                <?php
                                                                if ($row['price'] == 0) {
                                                                    echo "Free";
                                                                } else {
                                                                    echo "Rs." . $row['price'];
                                                                } ?>
                                                            </p>
                                                            <input type="submit" name="submit2" value="Buy">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['submit2'])) {
                                            $_POST['gameName'] = $gameName;
                                            header("Location: seppage.php");
                                            exit;
                                        }

                                    }
                                    ?>
                                </div>
                                <?php
                            } else {
                                echo "No Game found.";
                            }
                        } else {
                            // echo "Please enter a search string.";
                        }


                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getCode() . $e->getLine();
                    }
                }

                ?>

            </form>
        </div>
        <style>
            .genrelist{
                text-decoration: none;
                border: none;
                background: none;
                color: whitesmoke;
                text-align:left;
                padding-top: 7px;
            }
            .rigthsidelist{
                list-style-type: circle;
                color:grey;
            }

        </style>
        <div class="sidebar">
            <form method="POST" action="">
            <ul class = "rigthsidelist">
                <li><button class="genrelist" type="Submit" name="listvalue" value="Action">Action</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="Action-Adventure">Action-Adventure</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="Racing">Racing</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="Action Role-Play Game">Action Role-Play</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="3D sandbox game">3D sandbox game</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="Educational Video Game">Educational Video Game</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="Survival Horror">Survival Horror</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="Tactical Shooter">Tactical Shooter</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="Puzzle-Platform Video game ">Puzzle-Platform</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="Battle Royale">Battle Royale</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="Real-time Grand Strategy">Real-time Grand Strategy</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="Science-Fiction">Science-Fiction</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="Horror">Horror</button></li>
                <li><button class="genrelist" type="Submit" name="listvalue" value="Survival">Survival</button></li>
            </ul>
            <!-- Add your right side panel content here -->
            </form></div>
    </div>
</body>

</html>