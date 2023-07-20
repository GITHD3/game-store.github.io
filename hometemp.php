<?php
session_start();

// Check if the game ID is provided in the URL
if (isset($_GET['gameName'])) {
    $gameName = $_GET['gameName'];
    
}

// Retrieve the game ID from the session
$gameName = $_SESSION['gameName'];
?>

<!-- Rest of the code -->

<div class="card">
    <!-- Display the game details for the game ID -->
    <h5>Game ID: <?php echo $gameName; ?></h5>
</div>

<?php
// Remove the game ID from the session
unset($_SESSION['gameName']);
?>

<!-- Rest of the code -->
