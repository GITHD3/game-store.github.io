<?php session_start(); ?>
<?php include 'navbar.php'; ?>
<html>
<link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>

<div class="text-center container py-3 pt-4">
    <h4 class="heading" style="font-family: 'Press Start 2P';font-size: 22px; color:black;"><strong>ParaCrash Game
            Store</strong></h4>
</div>
<style>
    body {
        background: linear-gradient(#404ccc, #03e9f4);
        background-repeat: no-repeat !important;
        background-attachment: fixed !important;
        height: 100% !important;
    }


    .btn2 {
        background-color: #51a9ff;
        border: 2px solid black;
        border-radius: 4px;
        color: whitesmoke;
        text-align: center;
        transition: 0.4s;
    }

    .btn2:hover {
        background-color: #1e90ff;
        border: 2px solid grey;
    }

    #cardadmin {
        background-color: rgba(106, 90, 205, 0.9) !important;
        border-radius: 5px;
        border: 2px solid Black;
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

    #ull {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        background-color: rgb(255, 255, 255, 0.3);
        padding: 20px;
        border: none;
        border-radius: 5px;
        line-height: 2.5;
    }

    .newCat {
        border-radius: 15px;
        padding: 20px;
        justify-content: center;
        width: fit-content;
        text-align: center;
        margin-bottom: 20px;
        padding-bottom: 20px;
        padding-left: 20px;
        transition: 0.3s;
        padding-right: 20px;
        box-shadow: rgba(106, 90, 205, 0.19) 0px 10px 20px, rgba(106, 90, 205, 0.23) 0px 6px 6px;
background-color: rgba(255, 255, 255, 0.4);

    }

    .newCat:hover {
        background-color: rgb(255, 255, 255, 0.5);
        box-shadow: rgba(128, 0, 128, 0.8) 0px 20px 30px -10px;

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

<?php
$dsn = 'mysql:host=localhost;dbname=game4';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
try {
    if (isset($pdo)) {
        $query = 'SELECT * FROM genre';
        $stmt = $pdo->query($query);
        $gen = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Exception $w) {
    echo "Error , Try Later";
}
try {
    if (isset($_POST['deleteCategory'])) {
        $catToDelete = $_POST['deleteCategory'];
        $deleteQuery = "DELETE FROM genre WHERE category = ?";
        $deleteStmt = $pdo->prepare($deleteQuery);
        $deleteStmt->execute([$catToDelete]);
    }
} catch (Exception $w) {
    echo "Can't Delete , Try Later";
}
try {
    if (isset($_POST['kishan'])) {
        $catToAlter = $_POST['changes'];
        $catToAlterOG = $_POST['alterCategory2'];
        $alterQuery = "UPDATE `genre` SET `category`= ? WHERE category = ?";
        $al = $pdo->prepare($alterQuery);
        $al->execute([$catToAlter, $catToAlterOG]);
        if (!$al)
            echo "rajai";
    }
} catch (Exception $w) {
    echo "Can't Alter , Try Later";
}
try {
    if (isset($_POST['newCategory'])) {
        $newCategory = $_POST['newCategory'];
        $insertQuery = "INSERT INTO genre (category) VALUES (?)";
        $insertStmt = $pdo->prepare($insertQuery);
        $insertStmt->execute([$newCategory]);
    }
} catch (Exception $w) {
    echo "Can't Add , Try Later";
}
?>

<div class="container">
    <h2 class="text-center">Categories</h2>
    <ul id="ull">
        <?php
        try {
            $dsn = 'mysql:host=localhost;dbname=game4';
            $username = 'root';
            $password = '';

            $pdo = new PDO($dsn, $username, $password);
            $query = 'SELECT * FROM genre';
            $stmt = $pdo->query($query);
            $gen = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($gen as $category):
                ?>
                <div class="mb-2">
                    <form method="post" style="display: inline;" action="category.php">
                        <input name="changes" value="<?php echo $category['category']; ?>">
                        <input name="alterCategory2" type="hidden" value="<?php echo $category['category']; ?>">
                        <button type="submit" name="kishan" class="btn2">Alter</button>
                    </form>
                    <form method="post" style="display: inline;" action="category.php">
                        <input type="hidden" name="deleteCategory" value="<?php echo $category['category']; ?>">
                        <button type="submit" class="btn2">Delete</button>
                    </form>
                </div>
                <?php
            endforeach;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
        ?>
    </ul>
</div>
<?php try { ?>
    <div class="container newCat">
        <h2>Add New Category</h2>
        <form method="post" action="category.php">
            <input type="text" name="newCategory" required>
            <button type="submit" class="btn2">Add</button>
        </form>
    </div>
<?php } catch (PDOException $e) {
    echo "Duplicate Entry or Try Later on .";
} ?>

</body>

</html>
<?php include 'footer.php'; ?>