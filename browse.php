<?php
session_start();
include 'navbar.php';
$dsn = "mysql:host=localhost;dbname=game4";
                        $username = "root";
                        $password = "";

                        $db = new PDO($dsn, $username, $password);
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Aspekta' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Satoshi' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Nohemi' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <title>Browse Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <style>
        body {
            background: linear-gradient(0deg, #48AAAD, slateblue);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            height: 100% !important;
        }

        .container {
            display: flex;
            justify-content: center;
            padding-top: 20px;
            gap: 30px;
            max-width: 98%;
            padding-bottom: 20px;
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
            padding-bottom: 20px;
        }

        .sidebar {
            width: 20%;
            height: fit-content;
        }

        @media (max-width: 830px) {
            .container {
                flex-wrap: wrap;
            }

            .main,
            .sidebar {
                width: 100%;
                text-align: center;
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



        .flip-card {
            background-color: rgba(0, 0, 0, 0.1);
            width: 220px;
            height: 270px;
            display: flex;
            perspective: 1000px;
            padding-left: 2px;
            padding-right: 2px;
        }

        .texta1card-a {
            text-decoration: none;
            color: #28282B;
            cursor: grab;
        }

        .texta1card-a:hover {
            color: #36454F;
            background-color: #FCF5E5;

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
            background-color: rgba(0, 0, 0, 0.1);
            color: black;
        }

        .flip-card-back {
            background-image: linear-gradient(slategray, darkgrey);
            color: #28282B;
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
            padding-left: 60px;
        }
    </style>
</head>

<body>
    <link href="https://fonts.cdnfonts.com/css/games" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="container">

        <div class="main">
            <form method="POST">
                <div class="temp">
                    <input class="input1" type="text" name="searchstring" placeholder="Browse">
                    <button class="input2" type="submit" name="submit"><i class="fa fa-search"></i></button><br><br>

                </div>
                <style>
                    /* Assuming you have included Font Awesome CSS for the icon */
                    /* If not, add the link to Font Awesome CSS in your HTML head section */

                    .search-box {
                        display: flex;
                        align-items: center;
                        max-width: 400px;
                        /* You can adjust the maximum width as needed */
                        margin: 0 auto;
                        /* Center the search box */
                        border: 2px solid #ccc;
                        overflow: hidden;
                        /* Prevent the icon from overflowing */
                        color: whitesmoke;
                    }

                    .input1 {
                        flex: 1;
                        padding: 10px 15px;
                        border-radius: 10px;
                        font-size: 16px;
                        border: none;
                        background-color: rgba(135, 206, 250, 0.9);
                        text-align: center;
                        overflow: hidden;
                        font-family: 'Nohemi', sans-serif;
                    }

                    .input2 {
                        border-radius: 10px;
                        background-color: #007bff;
                        /* Change this color as per your design */
                        color: #fff;
                        border: none;
                        padding: 10px 15px;
                        cursor: pointer;
                        transition: background-color 0.3s ease;
                    }

                    /* Adjust the icon size */
                    .input2 i {
                        font-size: 20px;
                    }

                    /* Responsive styles */
                    @media screen and (max-width: 768px) {
                        .search-box {
                            max-width: 100%;
                            /* Adjust the width for mobile screens */
                        }
                    }

                    .btnn {
                        font-size: 18px;
                        background-color: #171717;
                        transition: 0.3s;
                        border-radius: 7px;
                        color: #e5dbdb;
                        font-family: 'Satoshi', sans-serif;
                    }

                    .btnn:hover {
                        color: white;
                        background-color: black;
                    }

                    h1,
                    h2,
                    h3,
                    h4,
                    h5,
                    h6 {
                        font-family: 'Nohemi', sans-serif;
                    }

                    p {
                        font-family: 'Satoshi', sans-serif;
                    }
                </style>

                <?php
                $temp = true;
                if (isset($_SESSION['dob'])) {
                    $dob = $_SESSION['dob'];
                    $temp = false;
                    $dobObj = new DateTime($dob);
                    $currentDateObj = new DateTime();
                    $age = $currentDateObj->diff($dobObj)->y;
                }



                if (isset($_POST['submit']) || isset($_POST['listvalue'])) {
                    try {
                        
                        if (isset($_POST['searchstring']) || isset($_POST['listvalue'])) { // Check if searchstring is set
                            if (isset($_POST['searchstring']))
                                $searchString = $_POST['searchstring'];
                            else if (isset($_POST['listvalue']))
                                $searchString = $_POST['listvalue'];


                                if ($searchString == "All") {
                                    if ($temp == true or $age >= 18) {
                                        $sql = "SELECT * FROM `games` ORDER BY release_date DESC";
                                    } else {
                                        $sql = "SELECT * FROM `games` WHERE gameid LIKE '%NA%' ORDER BY release_date DESC";
                                    }
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();
                                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                
                                } else {
                                    if ($temp == true or $age >= 18) {
                                        $sql = "SELECT * FROM `games` WHERE 
                                                (gamename LIKE CONCAT('%', :searchString, '%') OR 
                                                publisher_name LIKE CONCAT('%', :searchString, '%') OR 
                                                developer_name LIKE CONCAT('%', :searchString, '%') OR 
                                                genre_name LIKE CONCAT('%', :searchString, '%'))";
                                    } else {
                                        $sql = "SELECT * FROM `games` WHERE 
                                                (gamename LIKE CONCAT('%', :searchString, '%') OR 
                                                publisher_name LIKE CONCAT('%', :searchString, '%') OR 
                                                developer_name LIKE CONCAT('%', :searchString, '%') OR 
                                                genre_name LIKE CONCAT('%', :searchString, '%'))
                                                AND gameid LIKE '%NA%'";
                                    }
                                    $stmt = $db->prepare($sql);
                                    $stmt->bindValue(':searchString', '%' . $searchString . '%');
                                    $stmt->execute();
                                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                }
                                


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
                                                            <img id="img1" src="img/<?php echo $row['gamename']; ?>.webp">
                                                        </div>
                                                    </div>
                                                    <div class="flip-card-back">
                                                        <a href="seppage.php?gameName=<?php echo $row['gamename']; ?>" class="texta1card-a">
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

                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php


                                    }
                                    ?>
                                </div>
                                <?php
                            } else {
                                ?>
                                <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                                <p class="ngf">No Result found</p>
                                <style>
                                    .ngf {
                                        font-family: "Trebuchet MS", Tahoma, sans-serif;
                                        color: white;
                                        padding-left: 63px;
                                        font-weight: bold;
                                    }
                                </style>
                                <?php
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
            .genrelist {
                text-decoration: none;
                border: none;
                background: none;
                color: black;
                font-weight: 550;
                text-align: left;
                padding-top: 7px;
                font-family: 'Aspekta', sans-serif;
            }

            .rigthsidelist {
                list-style-type: circle;
                color: #1e1e1e;
            }
        </style>
        <div class="sidebar">
        <form method="POST" action="">
    <ul class="rigthsidelist">
        <?php
        $sql = "SELECT * FROM genre;";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $genre = $row["category"];
            echo "<li><button class='genrelist' type='Submit' name='listvalue' value='$genre'>$genre</button></li>";
        }
        ?>
    </ul>
</form>

        </div>
    </div>
</body>

</html>
<?php include 'footer.php'; ?>