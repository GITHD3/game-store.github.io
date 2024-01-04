<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game4";
include 'navbar.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$mostPlayedQuery = "SELECT gameid, gamename, player_count, price FROM games ORDER BY player_count DESC, price * player_count DESC LIMIT 1";
$mostPlayedResult = $conn->query($mostPlayedQuery);
if ($mostPlayedResult === false) {
    // Handle the case where there's an error in the query execution
    die("Error in executing most played query: " . $conn->error);
} elseif ($mostPlayedResult->num_rows > 0) {
    $mostPlayedData = $mostPlayedResult->fetch_assoc();

    // Fetch number of customers playing the most played game
    $mostPlayedCustomersQuery = "SELECT COUNT(DISTINCT customerID) as most_played_customers FROM bill WHERE gameid = '{$mostPlayedData['gameid']}'";
    $mostPlayedCustomersResult = $conn->query($mostPlayedCustomersQuery);
    $mostPlayedCustomersData = $mostPlayedCustomersResult->fetch_assoc();
} else if($mostPlayedResult <= 0){
    // Handle the case where there are no results
    $mostPlayedData = [
        'gameid' => null,
        'gamename' => 'No Game Found',
        'player_count' => 0,
        'price' => 0
    ];
    $mostPlayedCustomersData = ['most_played_customers' => 0];
}

// Fetch total number of customers
$totalCustomersQuery = "SELECT COUNT(DISTINCT customerid) as total_customers FROM customer";
$totalCustomersResult = $conn->query($totalCustomersQuery);
$totalCustomersData = $totalCustomersResult->fetch_assoc();

// Fetch data for All Games
$allGamesQuery = "SELECT gamename, player_count, price FROM games ORDER BY player_count DESC LIMIT 5";
$allGamesResult = $conn->query($allGamesQuery);
$allGamesData = [];
while ($row = $allGamesResult->fetch_assoc()) {
    $row['revenue'] = $row['price'] * $row['player_count']; // Calculate revenue
    $allGamesData[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Report</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
</head>

<body>

    <div class="A">
        <div class="buttons-container">
            <button id="mostPlayedBtn" class="btnmain" onclick="toggleChart('mostPlayedChart')">Most Played
                Game</button>
        </div>
        <h4 class="heading" style="font-family: 'Press Start 2P'; font-size: 22px;">
            <strong>ParaCrash Report</strong>
        </h4>
        <div class="buttons-container">
            <button id="allGamesBtn" class="btnmain" onclick="toggleChart('allGamesChart')">All Games</button>
        </div>
    </div>


    <div class="mainpie" style="max-width: 60%; margin: auto;">
        <canvas id="mostPlayedChart" height="400"></canvas>
        <canvas id="allGamesChart" style="display: none;" height="400"></canvas>
    </div>

    <script>
        const mostPlayedData = <?php echo json_encode($mostPlayedData); ?>;
        const mostPlayedCustomersData = <?php echo json_encode($mostPlayedCustomersData); ?>;
        const totalCustomersData = <?php echo json_encode($totalCustomersData); ?>;
        const allGamesData = <?php echo json_encode($allGamesData); ?>;

        const mostPlayedCtx = document.getElementById('mostPlayedChart').getContext('2d');
        const mostPlayedChart = new Chart(mostPlayedCtx, {
            type: 'pie',
            data: {
                labels: ['Total Customers', 'Playing ' + mostPlayedData.gamename],
                datasets: [{
                    data: [totalCustomersData.total_customers, mostPlayedCustomersData.most_played_customers],
                    backgroundColor: ['#FF6384', '#36A2EB'],
                }]
            }
        });

        const allGamesCtx = document.getElementById('allGamesChart').getContext('2d');
        const allGamesChart = new Chart(allGamesCtx, {
            type: 'pie',
            data: {
                labels: allGamesData.map(game => game.gamename),
                datasets: [{
                    data: allGamesData.map(game => game.player_count),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#8B4513', '#00FF7F'],
                    label: 'Player Count'
                },
                {
                    data: allGamesData.map(game => game.revenue),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#8B4513', '#00FF7F'],
                    label: 'Revenue'
                }]
            }
        });

        function toggleChart(chartId) {
            if (chartId === 'mostPlayedChart') {
                mostPlayedChart.canvas.style.display = 'block';
                allGamesChart.canvas.style.display = 'none';
            } else {
                mostPlayedChart.canvas.style.display = 'none';
                allGamesChart.canvas.style.display = 'block';
            }
        }
    </script>
</body>

</html>

<style>
    body {
        background-color: skyblue;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        /* Use 100% of the viewport height */
        margin: 0;
        /* Remove default body margin */
    }


    .A {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 150px;
        text-align: center;
    }

    .buttons-container {
        margin: 0 10px;
        text-align: center;
    }

    .btnmain {
        font-family: Arial, Helvetica, sans-serif;
        border-radius: 4px;
        border-color: #9f95db;
        color: beige;
        padding: 7px;
        transition: 0.3s;
        background: rgba(0, 0, 0, 0.65);
    }

    .btnmain:hover {
        box-shadow: 0px 0px 5px #9f95db, 0px 0px 25px #9f95db, 0px 0px 50px #9f95db, 0px 0px 100px #9f95db;
        border: none;
        background-color: #9f95db;
        color: black;
    }
</style>