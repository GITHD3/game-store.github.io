<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "game4";
    
    $conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

  session_start(); 

  $stmt = $conn->prepare("SELECT * FROM customer WHERE emailaddress=? AND password=?");
  $stmt->bind_param("ss", $email, $password);

  if (!$stmt->execute()) {
    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
  }

  $result = $stmt->get_result();

  if ($result) {
    $row = $result->fetch_assoc();
    
    if ($row) {
        // Login successful
        // Store the name in a session variable
        $_SESSION['name'] = $row['name'];
        
        $stmt->close();
        mysqli_close($conn);
        header("Location: main1.php");
        exit;
    } else {
        // Login failed
        echo '<script>alert("Incorrect email or password");</script>';
        $stmt->close();
        mysqli_close($conn);
        header("Location: login.php");
        exit;
    }
  } else {
      // Query failed
      echo "Error: " . mysqli_error($conn);
      $stmt->close();
      mysqli_close($conn);
      header("Location: login.php");
      exit;
  }

   
}?>
