<?php session_start(); ?>
<?php include 'navbar.php'; ?>
<link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>

<div class="text-center container py-5">
    <h4 class="heading" style="font-family: 'Press Start 2P';font-size: 22px; color:black;"><strong>ParaCrash Game Store</strong></h4>
</div>
<html>
<style>
    body {
        background: linear-gradient(#404ccc, #03e9f4);
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 100%;
        overflow: hidden;
    }

    .card-header,
    .linkpages:link {
        text-decoration: none;
        font-size: 18px;
    }

    .card-header {
        color: black;
        background-color: #DEB887;
    }

    li {
        color: darkslategrey;
    }

    .linkpages:hover {
        color: black;
    }

    #cardadmin2 {
        padding-left: 16px;
    }
    #select {
            margin-top: 2px;
            background-color: rgba(30, 144, 255, 0.4);
            border: 2px solid white;
            border-radius: 13px;
            color: whitesmoke;
            font-style: bold;
            text-align: center;
            padding: 7px;
            max-width: 100px;
            font-size: 18px;
            transition: 0.4s;
        }

        #select:hover {
            background-color: dodgerblue;
            border: 2px solid white;
            border-radius: 13px;
            color: whitesmoke;
            
            font-style: bold;
            text-align: center;
            padding: 7px;
            max-width: 100px;
            font-size: 18px;
        }
</style>
<div id="cardadmin2">
    <div class="card " id="cardadmin" style="width: 17rem;">
        <div class="card-header">
            Admin:
        </div>
        <ul class="list-group list-group-flush" id="links">
            <a class="linkpages" href="admin1.php">
                <li class="list-group-item">Customer Details</li>
            </a>
            <a class="linkpages" href="admin2.php">
                <li class="list-group-item">Game Details</li>
            </a>
            <a class="linkpages" href="AdGamesAdd.php">
                <li class="list-group-item">Create Game</li>
            </a>
            <a class="linkpages" href="adGame.php">
                <li class="list-group-item">Update Game</li>
            </a>
            <a class="linkpages" href="deletegame.php">
                <li class="list-group-item">Delete Game</li>
            </a>
        </ul>
    </div>
</div>
<br>

<body>
    <?php
    $dsn = 'mysql:host=localhost;dbname=game4';
    $username = 'root';
    $password = '';

    // Create a PDO instance
    try {
        $pdo = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
    if (isset($pdo)) {
        $query = 'SELECT gamename FROM games';
        $stmt = $pdo->query($query);
        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

<form method="post" action="" style="padding-left: 16px;">
      <div class="mb-3">
        <label for="GAMENAME" class="form-label">Select a Game to Delete :</label>
        <select name="GAMENAME" id="GAMENAME" class="form-select" required>
          <option value="">Select a game</option>
          <?php foreach ($games as $g): ?>
            <option value="<?= $g['gamename'] ?>"> <?= $g['gamename'] ?> </option>
          <?php endforeach; ?>
        </select>
        <button type="submit" name="selectgame" id="select" class="btn btn-primary">Select</button>
      </div>
    </form>

    <?php if (isset($_POST['selectgame'])) { 
        $sg = $_POST['GAMENAME'];
        $q2 = 'DELETE FROM `games` WHERE gamename = ?';
        $stmt2 = $pdo->prepare($q2);
        $stmt2->execute([$sg]);
        if ($stmt2->rowCount() > 0) {
    ?>
          <h2 style="padding-left: 16px;">Deleted:
            <?= $sg ?>
          </h2>
        <?php } else {
          echo "<br><pre>Not Deleted";
        }
    }
  }
  ?>
</body>

</html>
<?php include 'footer.php'; ?>