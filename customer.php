<!DOCTYPE html>
<html>
<?php session_start(); ?>

<head>
  <title>Customer</title>
  <!-- <link rel="stylesheet" href="login.css"> -->
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('img/wallpaper.webp');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center center;
      overflow-y: smooth;
    }

    /* Hide scrollbar */
    ::-webkit-scrollbar {
      display: none;
    }
    .container {
      margin-top: 50px;
      padding-top: 200px;
      padding-bottom: 310px;
    }

    .card {
      background-color: rgba(255, 255, 255, 0.8);
    }

    .full-height {
      height: 100vh;
    }

    .gradient-custom {
      /* fallback for old browsers */
      background: #f6d365;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));
    }

    
  </style>
</head>

<?php
if (!isset($_SESSION['name'])) {
  echo "Please Log in or Sign up !!";
  exit;
} else {
  $customername = $_SESSION['name'];
  $host = "localhost";
  $username = "root";
  $db_password = "";
  $database = "game4";

  $conn = new PDO("mysql:host=$host;dbname=$database", $username, $db_password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("SELECT customerid, firstname,lastname,dob, emailaddress , contactno FROM customer WHERE firstname = :customername");
  $stmt->bindParam(":customername", $customername);
  $stmt->execute();

  $stmt->setFetchMode(PDO::FETCH_NUM); // Set the fetch mode to numeric array (row)
  $customer = $stmt->fetch();

  $Id = $customer[0];
  $fn = $customer[1];
  $ln = $customer[2];
  $dob = $customer[3];
  $email = $customer[4];
  $no = $customer[5];
}
?>

<body>
  <?php include "navbar.php"; ?>

  <div class="container h-100 pt-20">
    <div class="row d-flex justify-content-center align-items-center h-100 full-height">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="img/user.png" alt="Avatar" class="img-fluid my-6" style="width: 80px;" />
              <h5><?php echo $fn . " " . $ln; ?></h5>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-13 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?php echo $email; ?></p>
                  </div>
                </div>
                
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Date of Birth</h6>
                    <p class="text-muted"><?php echo $dob; ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted"><?php echo $no; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
