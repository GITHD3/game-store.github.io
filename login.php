<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['e'];
    $password = $_POST['pass'];

    $host = "localhost";
    $username = "root";
    $db_password = "";
    $database = "game4";

    $conn = mysqli_connect($host, $username, $db_password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the hashed password from the database for the given email
    $stmt = $conn->prepare("SELECT customerid, firstname, emailaddress, password FROM customer WHERE emailaddress=?");
    $stmt->bind_param("s", $email);

    if (!$stmt->execute()) {
        die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($customerid, $firstname, $emailaddress, $stored_password);
        $stmt->fetch();

        // Close the statement after fetching the password
        $stmt->close();
        mysqli_close($conn);

        if ($password === $stored_password) {
            // Password matches, allow the user to log in
            $_SESSION['id'] = $customerid;
            $_SESSION['name'] = $firstname;

            if ($email === "harshadmin@gmail.com" && $password === "dedakiya") {
                // Redirect to admin1.php
                header("Location: admin1.php");
                exit;
            } else {
                // Login successful, but not an admin
                header("Location: main1.php");
                exit;
            }
        } else {
            // Login failed - incorrect password
            echo '<script>alert("Incorrect email or password");</script>';
        }
    } else {
        // Login failed - user not found
        echo '<script>alert("Incorrect email or password");</script>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Login Form</title>
  <link rel="stylesheet" href="login.css">
  <?php include 'cdns.php'; ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

</head>

<body>
  <?php include 'navbar.php'; ?>

  <div class="login-box">
    <h2>LOGIN</h2>
    <form method="post" action="">
      <div class="user-box">
        <input type="email" name="e" pattern="[a-z0-9._%+-]+@gmail.com" required="">
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="password" name="pass" required="">
        <label>Password</label>
      </div>
      <div Class="btnbox">
        <button type="submit" id="btn1" name="submit">Submit</button>
      </div>
    </form>
  </div>
</body>
<style>
  body {
    background: linear-gradient(#404ccc, #03e9f4);
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 100%;
  }

  #btn1 {
    position: absolute;
    height: 34px;
    max-width: 175px;
    min-width: 120px;
    outline: none;
    color: white;
    cursor: pointer;
    font-size: 14px;
    /* border: 1px solid #03e9f4; */
    background: rgb(33 37 41);
    font-family: 'Raleway', sans-serif;
    color: #c3dfe0;
    border: 1.5px solid #03e9f4;
    border-radius: 7px;
    margin-right: 10px;
  }

  #btn1:hover {
    background: #03e9f4;
    color: black;

  }

  .btnbox {
    padding-top: 9px;
    padding-bottom: 33px;
  }
</style>

</html>