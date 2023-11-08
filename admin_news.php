<?php session_start(); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/heroicons/2.4.0/dist/heroicons.min.js"></script>

<?php include 'navbar.php'; ?>

<div class="flex">
    <div class="w-full ml-16">
        <div class="text-center container py-3 pt-4">
            <h4 class="heading" style="font-family: 'Press Start 2P'; font-size: 22px; color:black;">
                <strong>ParaCrash Game Store</strong>
            </h4>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
        </div>

        <?php
        $dsn = 'mysql:host=localhost;dbname=game4';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gamename = $_POST['gamename'];
            $new_gamename = $_POST['new_gamename'];
            $content = $_POST['content'];
            $ndate = $_POST['new_date'];
            $part = $_POST['part'];

            $query = "UPDATE news SET gamename = :new_gamename, content = :content, date = :ndate WHERE gamename = :gamename AND part = :part";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':new_gamename', $new_gamename);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':ndate', $ndate);
            $stmt->bindParam(':gamename', $gamename);
            $stmt->bindParam(':part', $part);
            $stmt->execute();


            echo "<center><div class=\"success-message\">News updated successfully!</div></center>";
        }
        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
            <title>News Section</title>
            <style>
                body {
                    background-image: linear-gradient(slateblue, #0C97FA);
                    background-repeat: no-repeat !important;
                    background-attachment: fixed !important;
                    background-size: cover !important;
                    height: 100% !important;
                }

                @media (min-width:700px) {
                    body {
                        padding-bottom: 19px;
                    }
                }

                .success-message {
                    background-color: #404ce3;
                    color: beige;
                    padding: 10px 20px;
                    border-radius: 9px;
                    margin: 10px 0px;
                    text-align: center;
                    font-weight: bold;
                    width: fit-content;
                }
            </style>

        </head>

        <body>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

            <style>
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
            </style>

            <div id="cardadmin" class="card max-w-xs mx-auto text-center">
                <div class="list-group list-group-flush" id="links">
                    <a class="linkpages block list-group-item py-2 px-4" href="admin1.php">Customer Details</a>
                    <a class="linkpages block list-group-item py-2 px-4" href="admin2.php">Game Details</a>
                    <a class="linkpages block list-group-item py-2 px-4" href="AdGamesAdd.php">Create Game</a>
                    <a class="linkpages block list-group-item py-2 px-4" href="deactivate.php">Deactivate Game</a>
                    <a class="linkpages block list-group-item py-2 px-4" href="adGame.php">Update Game</a>
                    <a class="linkpages block list-group-item py-2 px-4" href="category.php">Category</a>
                    <a class="linkpages block list-group-item py-2 px-4" href="admin_news.php">News</a>
                </div>
            </div>

            <center>
                <h1 class="py-3 pt-4">News Section</h1>
            </center>
    </div>
</div>

<!-- Display and update Part 1 News -->
<?php
$queryPart1 = "SELECT gamename, content FROM news WHERE part = 1";
$stmtPart1 = $pdo->prepare($queryPart1);
$stmtPart1->execute();
$newsPart1 = $stmtPart1->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="flex-1 p-4">
    <?php foreach ($newsPart1 as $item): ?>
        <div class="bg-white p-4 mb-4 rounded shadow">
            <h3>
                <?php echo $item['gamename']; ?>
            </h3>
            <p>
                <?php echo $item['content']; ?>
            </p>

            <form method="post">
                <input type="hidden" name="part" value="1">
                <input type="hidden" name="gamename" value="<?php echo $item['gamename']; ?>">
                <div class="form-group">
                    <label for="new_gamename">Update Game Name:</label>
                    <input type="text" class="form-control" id="new_gamename" name="new_gamename" required>
                </div>
                <div class="form-group">
                    <label for="content">Update Content:</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update News</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<!-- Display and update Part 2 News -->
<?php
$queryPart2 = "SELECT gamename, content FROM news WHERE part = 2";
$stmtPart2 = $pdo->prepare($queryPart2);
$stmtPart2->execute();
$newsPart2 = $stmtPart2->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="flex-1 p-4">
    <?php foreach ($newsPart2 as $item): ?>
        <div class="bg-white p-4 mb-4 rounded shadow">
            <h3>
                <?php echo $item['gamename']; ?>
            </h3>
            <p>
                <?php echo $item['content']; ?>
            </p>

            <form method="post">
                <input type="hidden" name="part" value="2">
                <input type="hidden" name="gamename" value="<?php echo $item['gamename']; ?>">
                <div class="form-group">
                    <label for="new_gamename">Update Game Name:</label>
                    <input type="text" class="form-control" id="new_gamename" name="new_gamename" required>
                </div>
                <div class="form-group">
                    <label for="content">Update Content:</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update News</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

</body>

</html>

<?php include 'footer.php'; ?>