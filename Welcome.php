<?php
session_start();

if (isset($_POST['submit'])) {
    $fn = $_POST['first'];
    $ln = $_POST['last'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $pw = $_POST['pass'];
    $contact = $_POST['no'];

    $host = "localhost";
    $username = "root";
    $pass = '';
    $database = "game4";

    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $pass);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the email address already exists in the database
    $stmt = $conn->prepare("SELECT * FROM customer WHERE emailaddress = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        ?>
        <script>
            setTimeout(function () {
                window.location.href = "registeration.php";
            }, 3000);
        </script>
        <?php
    } else {
        // Retrieve the last primary key value
        $stmt = $conn->prepare("SELECT MAX(customerid) AS maxid FROM customer");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastId = $result['maxid'];
        $newId = $lastId + 1;

        // Insert the new record into the database
        $stmt = $conn->prepare("INSERT INTO customer (firstname, lastname, customerid, dob, emailaddress, password, contactno) 
        VALUES (:firstname, :lastname, :cid , :dob, :emailaddress, :password, :contactno)");

        $stmt->execute([
            ":firstname" => $fn,
            ":lastname" => $ln,
            ":cid" => $newId,
            ":dob" => $dob,
            ":emailaddress" => $email,
            ":password" => $pw, // Store the plaintext password in the database
            ":contactno" => $contact,
        ]);

        // Store the name in a session variable
        $_SESSION['name'] = $fn;
        $_SESSION['id'] = $newid;
        $_SESSION['email'] = $email;
        $_SESSION['dob'] = $dob;

        // Close the database connection
        $conn = null;

        // Redirect to the main page after successful registration
        header("Location: main1.php");
        exit;
    }
}
