<!DOCTYPE html>

<html>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game4";

// Create connection
$dbconn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
}
?>

<head>
    <link href='https://fonts.googleapis.com/css?family=Aspekta' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Satoshi' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Nohemi' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <title>News Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="news.css">
</head>

<body>
    <?php include 'navbar.php';
    $currentDate = date('Y-m-d');
    if (isset($_SESSION['dob'])) {
        $dob = $_SESSION['dob'];
        $dobObj = new DateTime($dob);
        $currentDateObj = new DateTime($currentDate);
        $age = $currentDateObj->diff($dobObj)->y;
    } else if (!isset($_SESSION['dob'])) {
        $age = 18;
    }
    ?>

    <div class="Maincontent container">
        <div class="heading-container headingmain">
            <div class="headingnews">
                <h2 class="headingnews2">News</h2>
            </div>
        </div>

        <hr id="hrdisplayed">
        <div class="row main2">
            <div class="col a1">
                <?php

                try {
                    $query = "SELECT gamename, content FROM news where part = 1";
                    $statement = $dbconn->prepare($query);
                    $statement->execute();
                    $result = $statement->get_result();
                    $news = $result->fetch_all(MYSQLI_ASSOC);
                    foreach ($news as $item) {
                        $gamename = $item['gamename'];
                        $content = $item['content'];

                        ?>

                        <a href="seppage.php?gameName=<?php echo $gamename; ?>" class="texta1card-a">
                            <div class="image-container2">
                                <img class="a1card" src="img 2/<?php echo $gamename; ?>.webp" alt="Image">
                                <div class="texta1card">
                                    :
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        </a>

                    <?php }
                } catch (PDOException $e) {
                    echo "Something Wrong , Please try after some time .";
                } ?>
            </div>

            <div class="col b1">
                <div class="row v1">
                    <?php
                    $query = "SELECT gamename, content, date FROM news WHERE part = 2";
                    $statement = $dbconn->prepare($query);
                    $statement->execute();
                    $statement->store_result();

                    if ($statement->num_rows > 0) {
                        $statement->bind_result($gamename, $content, $date);

                        while ($statement->fetch()) { ?>
                            <div class="v1child">
                                <img class="v1childimg" src="img/<?php echo $gamename; ?>.webp">
                                <p>
                                    <?php echo $content; ?>
                                </p>
                                <div class="timenews">
                                    <h6 class="b-0" style="color: grey;">
                                        <text-muted><small>
                                                <?php echo $date; ?>
                                            </small></text-muted>
                                    </h6>
                                </div>
                            </div>
                        <?php }
                    } else {
                        echo "0 results";
                    }
                    ?>



                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>