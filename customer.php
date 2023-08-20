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
      margin-top: 50px;
      padding-top: 100px;
      padding-bottom: 100px;
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

  <div class="container h-90 pt-10">
    <div class="row d-flex justify-content-center align-items-center h-100 full-height">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="img/user.png" alt="Avatar" class="img-fluid my-6" style="width: 80px;" />
              <h5>
                <?php echo $fn . " " . $ln; ?>
              </h5>
              <form method="POST">
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
    <?php
    if (isset($_POST['submit'])) {
      ?>
      <center>
        <div class="changetable col-lg-6 mb-1 mb-lg-0">
          <form method="POST" action="">
            <table class="table2">
              <tr>
                <p class="texttable text-center"><strong>Change Information</strong><br>
                  <hr class="p-0 mt-0">
                </p><br>
                <th style="width: 50%;">First Name</th>
                <th style="width: 50%;">Last Name</th>
              </tr>
              <tr>
                <td><input type="text" class="inputtable" name="new_FN"></input></td>
                <td><input type="text" class="inputtable" name="new_LN"></input></td>
              </tr>
              <tr>
                <th style="width: 50%;">Phone</th>
                <th style="width: 50%;">Date of Birth</th>
              </tr>
              <tr>
                <td><input type="contact" class="inputtable" name="new_PHONE"></input></td>
                <td><input type="date" class="inputtable" name="new_DATE"></input></td>
              </tr>
              <tr>
                <td><br>
                  <button type="submit" name="submit2" id="changebtn2">Submit</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </center>
      <?php
      if (isset($_POST['submit2'])) {
        $newFirstName = $_POST['new_FN'];
        $newLastName = $_POST['new_LN'];
        $newPhone = $_POST['new_PHONE'];
        $newDateOfBirth = $_POST['new_DATE'];

        if (!empty($newFirstName)) {
          $sql = "UPDATE customer SET firstname = :firstname WHERE customerid = :customerid";
        } elseif (!empty($newLastName)) {
          $sql = "UPDATE customer SET lastname = :lastname WHERE customerid = :customerid";
        } elseif (!empty($newPhone)) {
          $sql = "UPDATE customer SET contactno = :contactno WHERE customerid = :customerid";
        } elseif (!empty($newDateOfBirth)) {
          $sql = "UPDATE customer SET dob = :dob WHERE customerid = :customerid";
        }

        if (isset($sql)) {
          try {
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':customerid', $Id);

            if (isset($newFirstName)) {
              $stmt->bindValue(':firstname', $newFirstName);
            }

            if (isset($newLastName)) {
              $stmt->bindValue(':lastname', $newLastName);
            }

            if (isset($newPhone)) {
              $stmt->bindValue(':contactno', $newPhone);
            }

            if (isset($newDateOfBirth)) {
              $stmt->bindValue(':dob', $newDateOfBirth);
            }

            $stmt->execute();

            echo "Customer information updated successfully.";
          } catch (PDOException $e) {
            echo "Error updating customer information: " . $e->getMessage();
          }
        }
      }
    }
    ?>

  </div>

</body>

</html>
<?php include 'footer.php'; ?>