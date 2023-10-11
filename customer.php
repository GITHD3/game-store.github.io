<!DOCTYPE html>
<html>
<?php session_start(); ?>

<head>
  <title>Customer</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #0e4377 !important;
      background-image: none !important;
      background-repeat: no-repeat;
      background-size: auto !important;
      height: 100% !important;
    }

    /* Hide scrollbar */
    ::-webkit-scrollbar {
      display: none;
    }

    .container {
      padding-top: 30px;
    }

    .card {
      background-color: rgba(255, 255, 255, 0.8);
    }

    .full-height {}

    .gradient-custom {
      background: #f6d365;

      background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

      background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));
    }

    #changebtn {
      padding: 3px 11px;
      border: 2px solid slateblue;
      border-radius: 0px;
      background-color: rgba(255, 255, 255, 0.1);
      transition: 0.2s;
    }

    #changebtn:after .container {
      padding-top: 0px;
    }

    #changebtn:hover {
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      border: 2px solid dodgerblue;
      background-color: rgba(255, 255, 255, 0.3);
    }

    .table2 {
      table-layout: fixed;
      width: 100%;
    }

    .changetable {
      max-width: fit-content;
      align-self: center;
      justify-self: center;
      background: #f6d365;
      background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));
      color: black;
      padding: 15px 15px;
      margin-top: 20px;
      border-radius: 5px;
      width: 100%;
    }

    .inputtable {
      width: 100%;
      border-radius: .5rem;
      border: 2px solid white;
      padding: 5px;
    }

    #changebtn2 {
      padding: 3px 11px;
      border: 2px solid slateblue;
      border-radius: 0px;
      background-color: rgba(255, 255, 255, 0.8);
      transition: 0.2s;
    }

    #changebtn2:hover {
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      border: 2px solid dodgerblue;
      background-color: rgba(255, 255, 255, 0.9);
    }

    @media (max-width: 768px) {
      .changetable {
        max-width: 80%;
      }
    }

    html {
      scroll-behavior: smooth;
    }

    footer {
      position: relative;
      bottom: 0;
      width: 100%;
      text-align: center;
    }

    .container2 {
      padding-bottom: 110px;
    }

    .bgy {
      border: none;
      border-radius: 8px;
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

  $stmt->setFetchMode(PDO::FETCH_NUM);
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

  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100 full-height">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-1" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="img/user.png" alt="Avatar" class="img-fluid my-6" style="width: 80px;" />
              <h5>
                <?php echo $fn . " " . $ln; ?>
              </h5>
              <form method="POST" action="custChange.php">
                <button type="submit" name="submit" id="changebtn">Change Details</button>
              </form>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-13 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted">
                      <?php echo $email; ?>
                    </p>
                  </div>
                </div>

                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Date of Birth</h6>
                    <p class="text-muted">
                      <?php echo $dob; ?>
                    </p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted">
                      <?php echo $no; ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $query = "Select  `gameid`, `bill_date`, `amount` FROM `bill` WHERE customerID = $Id";
  $st = $conn->query($query);
  $resu = $st->fetchAll(PDO::FETCH_ASSOC);
  if ($resu) {
    ?>

    <div class="container container2  pt-2">
      <div class="row d-flex justify-content-center align-items-center h-100 full-height">
        <div class="col col-lg-8 mb-4 mb-lg-0">
          <div class="card mb-3" style="border-radius: .5rem;">
            <div class="card-body p-4">
              <h6>History</h6>
              <hr class="mt-0 mb-4">
              <?php
              $no = 1;
              foreach ($resu as $bill) {
                $tmp = $bill['gameid'];
                $query2 = "Select  `gamename` FROM `games` WHERE gameid = '$tmp';";
                $st2 = $conn->query($query2);
                $resu3 = $st2->fetchAll(PDO::FETCH_COLUMN);
                ?>
                <div class="row pt-1 bgy">
                  <div class="col-md-4 mb-3">
                    <h6>
                      <?php echo $no . "."; ?> Game Name
                    </h6>
                    <p class="text-muted">
                      <?php echo implode(', ', $resu3) ?>
                    </p>
                  </div>
                  <div class="col-md-4 mb-3">
                    <h6>Bill Date</h6>
                    <p class="text-muted">
                      <?php echo $bill['bill_date']; ?>
                    </p>
                  </div>
                  <div class="col-md-4 mb-3">
                    <h6>Amount</h6>
                    <p class="text-muted">
                      <?php echo $bill['amount']; ?>
                    </p>
                  </div>
                </div>
                <hr>
                <?php
                $no += 1;
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php
  } else {

  }
  ?>








</body>

</html>
<div style="position: fixed; bottom: 0; width: 100%;">
  <?php include 'footer.php'; ?>
</div>