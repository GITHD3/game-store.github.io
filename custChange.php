<!DOCTYPE html>
<html lang="en">

<?php session_start();
if (!isset($_SESSION['id'])) {
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    echo '<script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Not Authenticated!",
            footer: "<a href=\'\'>Login</a>"
        });
    </script>';
    exit;
} else {
    $host = "localhost";
    $username = "root";
    $db_password = "";
    $database = "game4";

    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $db_password);

    $d = $_SESSION['id'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $no = $_POST['no'];

}
include "navbar.php"; ?><br>

<head>
    <title>Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        body {
            margin: 0;
            padding-bottom: 40px;
            padding: 0;
            background-color: #0e4377 !important;
            background-image: none !important;
            background-repeat: no-repeat;
            background-size: auto !important;
            height: 100vh !important;
        }

        .imggame {
            max-height: 350px;
        }

        /* Hide scrollbar */
        ::-webkit-scrollbar {
            display: none;
        }

        .custom-form {
            background: linear-gradient(#FFE884, #FFF293);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .inputs:after {
            box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
        }

        .custom-form input[type="text"],
        .custom-form input[type="tel"],
        .custom-form input[type="date"] {
            background-color: beige;
        }

        .mainbox {
            outline: 2px solid orange;
            border-radius: 4px;
            transition: all 0.4s;
        }

        .mainbox:hover {
            outline: 2px solid yellow;
            border-radius: 5px;
        }
    </style>
</head>



<body>


    <div class="main class flex items-center justify-center">
        <div class="mainbox custom-form shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-lg w-full">
            <div class=" grid grid-cols-2 gap-4">
                <form class="submitform" method="POST">

                    <div>
                        <label class="block inputs text-gray-700 text-sm font-bold mb-2" for="First">
                            First Name
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="Firstname" id="Firstname" type="text" value="<?php echo $fn; ?>">

                    </div>
                    <div>
                        <label class="block inputs text-gray-700 text-sm font-bold mb-2" for="Last">
                            Last Name
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="Lastname" id="Lastname" type="text" value="<?php echo $ln; ?>">
                    </div>
                    <div>
                        <label class="block inputs text-gray-700 text-sm font-bold mb-2" for="dob">
                            Date of Birth
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="dobname" id="dobname" type="date" value="<?php echo $dob; ?>">
                    </div>
            </div>
            <div class=" r mt-4">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" name="submit2">Submit</button>

            </div>

            </form>
        </div>
    </div>
</body>

</html>
<div style="position: absolute; bottom: 0; width: 100%;">
    <?php include 'footer.php'; ?>
</div>
<?php

if (isset($_POST['submit2'])) {
    try {
        $first_name = $_POST['Firstname'];
        $last_name = $_POST['Lastname'];
        $date_of_birth = $_POST['dobname'];

        $stmt = $conn->prepare("UPDATE `customer` SET `firstname`=:first_name, `lastname`=:last_name,  `dob`=:dov WHERE `customerid`=:customer_id");

        $stmt->bindParam(":first_name", $first_name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":dov", $date_of_birth);
        $stmt->bindParam(":customer_id", $d);

        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $_SESSION['name']=$first_name;
            $_SESSION['dob']=$date_of_birth;
            header('Location: Customer.php'); // Redirect on success
            exit();
        } else {
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "No changes were made.",
                showConfirmButton: false,
                timer: 2000
            });
            </script>';
        }
    } catch (PDOException $e) {
        echo '<script>
        Swal.fire({
            icon: "error",
                title: "Error",
                text: "Can\'t Update Try After Some Time",
                showConfirmButton: false,
                timer: 2000
            });
            </script>';
    }
}
?>