<?php
session_start();

include 'navbar.php';
?>
<link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
<div class="text-center container pt-4 py-3">
    <h4 class="heading" style="
    font-family: 'Press Start 2P';font-size: 22px; color:black;"><strong>ParaCrash Game Store</strong></h4>
</DIV>
<?php
// Check if the admin is authenticated

// Database connection configuration
$dsn = 'mysql:host=localhost;dbname=game4';
$username = 'root';
$password = '';

// Create a PDO instance
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch customer details from the customer table
try {
    $query = "SELECT * FROM customer";
    $stmt = $pdo->query($query);
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching customer details: " . $e->getMessage());
}

$gameName = $releaseDate = $genre = '';
$gameid = '';
$developerName = '';
$publisherName = '';
$price = '';
$gameSize = '';
$gameType = '';
$description = '';
$mini_description = '';
$memoryRequired = '';
$operatingSystem = '';
$processorRequired = '';
$storageRequired = '';
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gameName = $_POST['gameName'];
    $releaseDate = $_POST['releaseDate'];
    $genre = $_POST['genre'];
    if (empty($gameName) || empty($releaseDate) || empty($genre)) {
        $error = 'All fields are required.';
    } else {
        try {
            $gameid = $_POST['gameid'];
            $developerName = $_POST['developerName'];
            $publisherName = $_POST['publisherName'];
            $price = $_POST['price'];
            $gameSize = $_POST['gameSize'];
            $gameType = $_POST['gameType'];
            $description = $_POST['description'];
            $mini_description = $_POST['mini_description'];
            $memoryRequired = $_POST['memoryRequired'];
            $operatingSystem = $_POST['operatingSystem'];
            $processorRequired = $_POST['processorRequired'];
            $storageRequired = $_POST['storageRequired'];

            $insertQuery = "INSERT INTO games (gameid, gamename, developer_name, publisher_name, price, genre_name, gamesize, gametype, description, mini_description, memory_required, operating_system, processor_required, storage_required, release_date) 
                VALUES (:gameid, :gamename, :developerName, :publisherName, :price, :genre, :gameSize, :gameType, :description, :mini_description, :memoryRequired, :operatingSystem, :processorRequired, :storageRequired, :releaseDate)";

            $stmt = $pdo->prepare($insertQuery);

            $params = array(
                ':gameid' => $gameid,
                ':gamename' => $gameName,
                ':developerName' => $developerName,
                ':publisherName' => $publisherName,
                ':price' => $price,
                ':genre' => $genre,
                ':gameSize' => $gameSize,
                ':gameType' => $gameType,
                ':description' => $description,
                ':mini_description' => $mini_description,
                ':memoryRequired' => $memoryRequired,
                ':operatingSystem' => $operatingSystem,
                ':processorRequired' => $processorRequired,
                ':storageRequired' => $storageRequired,
                ':releaseDate' => $releaseDate
            );

            $stmt->execute($params);

            // Redirect to the game page or display a success message
            echo "<br><pre>Added</pre>";
        } catch (PDOException $e) {
            $error = 'Error inserting game: Try After Some Time ' . $e->getMessage() . $e->getLine();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/satoshi" rel="stylesheet">
                
    <title>Admin Page</title>
    <style>
       @import url('https://fonts.cdnfonts.com/css/satoshi');


        body {
            background: linear-gradient(#404ccc, #03e9f4);
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100% !important;
        }

        .btn {
            font-family: 'Satoshi', sans-serif;
            border-radius: 10px;
            font-size: 16px;
            transition-duration: 0.3s;
            border: 1px solid black;
        }

        .btn:hover {
            background-color: rgba(255, 255, 255, 0.5);
            color: #171717;
            border: 1px solid #171717;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        h2,
        form {

            padding-left: 19px;

        }

        table {
            margin: auto;
            width: 90%;
            border-collapse: collapse;
            border: 2px solid white;
            margin-top: 13px;
        }

        th,
        td {
            border: 2px solid white;
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        h1 {
            padding-left: 19px;

        }

        input {
            border-radius: 4px;
            border: 2px solid white;
            padding-left: 19px;

        }

        label {
            padding-left: 19px;

            padding-right: 5px;
        }

        .inputs {
            padding-left: 19px;
            border: 2px solid beige;
            border-radius: 10px;
            padding: 10px 10px;
            flex: 0 0 48%;
            box-sizing: border-box;
            margin: 0 1%;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
        }

        @media (min-width:500px) {
            .priamrykeyupdates {
                padding-left: 42px;
                padding-top: 2px;
                padding-bottom: 2px;

            }
        }
    </style>
</head>

<body>
    <style>
        #cardadmin {
            background-color: rgba(106, 90, 205, 0.9) !important;
            border-radius: 5px;
            border: 2px solid Black;
        }

        #selectedCategories {
            font-size: 16px;
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            width: 200px;
            height: 40px;
        }

        .custom-select {
            font-size: 16px;
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            width: 200px;
            cursor: pointer;
        }

        .custom-select option {
            font-size: 14px;
        }

        .linkpages {
            background-color: #0C97FA;
            font-size: 18px;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .linkpages:hover {
            color: white;
            background-color: slateblue;
        }

        .categorydiv{
            padding-left:19px;
            padding-bottom: 10px;
            border-radius: 5px;
            border: none;
            background-color: rgb(245, 245, 220 , 0.5);
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

    </style>

    <div id="cardadmin" class="card max-w-xs mb-5 mx-auto text-center">
        <div class="list-group list-group-flush" id="links">
            <a class="linkpages block list-group-item py-2 px-4" href="admin1.php">Customer Details</a>
            <a class="linkpages block list-group-item py-2 px-4" href="admin2.php">Game Details</a>
            <a class="linkpages block list-group-item py-2 px-4" href="AdGamesAdd.php">Create Game</a>
            <a class="linkpages block list-group-item py-2 px-4" href="deactivate.php">Deactivate Game</a>

            <a class="linkpages block list-group-item py-2 px-4" href="adGame.php">Update Game</a>
            <a class="linkpages block list-group-item py-2 px-4" href="category.php">Category</a>
        </div>
    </div>
    <div class="e ">
        <h2 class="text-center">Add Game</h2>
        <form method="POST" action="" id="gameForm">
            <div class="priamrykeyupdates text-center">
                <pre><?php
                try {
                    $query_nuna = "SELECT MAX(gameid) AS last_nuna_gameid FROM games WHERE gameid LIKE 'NUNA__%'";
                    $stmt_nuna = $pdo->query($query_nuna);
                    $result_nuna = $stmt_nuna->fetch(PDO::FETCH_ASSOC);
                    $lastNunaGameID = $result_nuna['last_nuna_gameid'];
                } catch (PDOException $e) {
                    die("Error fetching last NUNA__ game ID: " . $e->getMessage());
                }

                try {
                    $query_una = "SELECT MAX(gameid) AS last_una_gameid FROM games WHERE gameid LIKE 'UNA__%'";
                    $stmt_una = $pdo->query($query_una);
                    $result_una = $stmt_una->fetch(PDO::FETCH_ASSOC);
                    $lastUnaGameID = $result_una['last_una_gameid'];
                } catch (PDOException $e) {
                    die("Error fetching last UNA__ game ID: " . $e->getMessage());
                }

                try {
                    $query_nua = "SELECT MAX(gameid) AS last_nua_gameid FROM games WHERE gameid LIKE 'NUA__%'";
                    $stmt_nua = $pdo->query($query_nua);
                    $result_nua = $stmt_nua->fetch(PDO::FETCH_ASSOC);
                    $lastNuaGameID = $result_nua['last_nua_gameid'];
                } catch (PDOException $e) {
                    die("Error fetching last NUA__ game ID: " . $e->getMessage());
                }

                echo "Last NUNA__ Game ID: " . $lastNunaGameID . "<br>";
                echo "Last UNA__ Game ID: " . $lastUnaGameID . "<br>";
                echo "Last NUA__ Game ID: " . $lastNuaGameID . "<br>";
                ?></pre>

            </div>
            <div class="flex-container">
                <div class="inputs">
                    <label for="gameid">Game ID:</label>
                    <input type="text" id="gameid" name="gameid" value="<?php echo htmlspecialchars($gameid); ?>"
                        required>

                    <div></div><br>
                    <label for="gameName">Game Name:</label>
                    <input type="text" id="gameName" name="gameName" value="<?php echo htmlspecialchars($gameName); ?>"
                        required>

                    <div></div><br>
                    <label for="developerName">Developer Name:</label>
                    <input type="text" id="developerName" name="developerName"
                        value="<?php echo htmlspecialchars($developerName); ?>" required>
                    <div></div><br>
                    <label for="publisherName">Publisher Name:</label>
                    <input type="text" id="publisherName" name="publisherName"
                        value="<?php echo htmlspecialchars($publisherName); ?>" required>
                    <div></div><br>
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>"
                        required>

                    <div></div><br>
                    <label for="gameSize">Game Size:</label>
                    <input type="text" id="gameSize" name="gameSize" value="<?php echo htmlspecialchars($gameSize); ?>"
                        required>

                    <div></div><br>
                    <label for="gameType">Game Type:</label>
                    <input type="text" id="gameType" name="gameType" value="<?php echo htmlspecialchars($gameType); ?>"
                        required>

                    <div></div><br>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description"
                        required><?php echo htmlspecialchars($description); ?></textarea>

                    <div></div><br>
                    <label for="mini_description">Mini - Description:</label>
                    <textarea id="mini_description" name="mini_description"
                        required><?php echo htmlspecialchars($mini_description); ?></textarea>
                    <div></div><br>
                    <label for="memoryRequired">Memory Required:</label>
                    <input type="number" id="memoryRequired" name="memoryRequired"
                        value="<?php echo htmlspecialchars($memoryRequired); ?>" required>
                    <div></div><br>
                    <label for="operatingSystem">Operating System:</label>
                    <input type="text" id="operatingSystem" name="operatingSystem"
                    value="<?php echo htmlspecialchars($operatingSystem); ?>" required>
                    <div></div><br>
                    <label for="processorRequired">Processor Required:</label>
                    <input type="text" id="processorRequired" name="processorRequired"
                    value="<?php echo htmlspecialchars($processorRequired); ?>" required>
                    <div></div><br>
                    <label for="storageRequired">Storage Required:</label>
                    <input type="text" id="storageRequired" name="storageRequired"
                    value="<?php echo htmlspecialchars($storageRequired); ?>" required>
                    <div></div><br>
                    <label for="releaseDate">Release Date:</label>
                    <input type="date" id="releaseDate" name="releaseDate"
                    value="<?php echo htmlspecialchars($releaseDate); ?>" required>
                    <div></div><br>
                </div>
                <div class="inputs">
                    <div class="flex categorydiv">
                        <label class="inline-block" for="genre">Category:</label>
                        <?php
                        $sql = "SELECT category FROM genre;";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $category = $row["category"];
                            echo "<div class='form-check'>
                <input class='form-check-input' id='smae2same' type='checkbox' name='selectedCategories[]' value='$category' id='category_$category'>
                <label class='form-check-label' id='smae2same' for='category_$category'>$category</label>
              </div>";
                        }
                        ?>
                        <div id="selectedCategoriesDisplay"></div>

                        <input type="text" name="genre" id="genre" required>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const checkboxes = document.querySelectorAll('input[type=checkbox]');
                            const selectedCategoriesDisplay = document.getElementById('selectedCategoriesDisplay');

                            checkboxes.forEach(checkbox => {
                                checkbox.addEventListener('change', function () {
                                    const selectedCategories = Array.from(checkboxes)
                                        .filter(cb => cb.checked)
                                        .map(cb => cb.value);

                                    selectedCategoriesDisplay.textContent = selectedCategories.join(', ');
                                    genreInput.value = selectedCategories.join(',');
                                });
                            });
                        });
                    </script>




                    <div></div><br>
                    <button class="btn" type="submit">Add Game</button>
                </div>
            </div>
            <?php if (!empty($error)): ?>
                <p style="color: red;">
                    <?php echo $error; ?>
                </p>
            <?php endif; ?>
        </form>
</body>

</html>
<?php include 'footer.php'; ?>