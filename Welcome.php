<?php
session_start();

if (isset($_POST['submit'])) {
    $fn = $_POST['first'];
    $ln = $_POST['last'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $tmp = $_POST['pass'];
    $hashed_password = password_hash($tmp, PASSWORD_DEFAULT);
    $pw = $hashed_password;
    $contact = $_POST['no'];

    $host = "localhost";
    $username = "root";
    $pass = '';
    $database = "game4";

    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $pass);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare("SELECT * FROM customer WHERE emailaddress = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        header("Location: registeration.php");
        exit;
    } else {
        $stmt = $conn->prepare("SELECT MAX(customerid) AS maxid FROM customer");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastId = $result['maxid'];
        $newId = $lastId + 1;

        $stmt = $conn->prepare("INSERT INTO customer (firstname, lastname, customerid, dob, emailaddress, password, contactno) 
        VALUES (:firstname, :lastname, :cid , :dob, :emailaddress, :password, :contactno)");

        $stmt->execute([
            ":firstname" => $fn,
            ":lastname" => $ln,
            ":cid" => $newId,
            ":dob" => $dob,
            ":emailaddress" => $email,
            ":password" => $pw,
            ":contactno" => $contact,
        ]);

        $_SESSION['name'] = $fn;
        $_SESSION['email'] = $email;
        $_SESSION['dob'] = $dob;

        $qm = $conn->prepare("SELECT customerid FROM customer WHERE firstname = :firstname AND emailaddress = :email AND dob = :dob");
        $qm->bindParam(":firstname", $fn);
        $qm->bindParam(":email", $email);
        $qm->bindParam(":dob", $dob);
        $qm->execute();

        $result = $qm->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $customerid = $result['customerid'];
            $_SESSION['id'] = $customerid;
        } else {
            echo "No customer found with the provided details.";
        }

        $conn = null;

        header("Location: main1.php");
        exit;
    }
}
?>
