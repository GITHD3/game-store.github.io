<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

  <?php
  session_start();
  include 'navbar.php';

  if (isset($_POST['submit'])) {
    $email = $_POST['e'];
    $tmp = $_POST['pass'];
    $hashed_password = md5($tmp);
$password = $hashed_password;
    $host = "localhost";
    $username = "root";
    $db_password = "";
    $database = "game4";
    $conn = mysqli_connect($host, $username, $db_password, $database);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the hashed password from the database for the given email
    $stmt = $conn->prepare("SELECT customerid, firstname, emailaddress,dob, password FROM customer WHERE emailaddress=?");
    $stmt->bind_param("s", $email);

    if (!$stmt->execute()) {
      die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $stmt->bind_result($customerid, $firstname, $emailaddress, $dob, $stored_password);
      $stmt->fetch();

      // Close the statement after fetching the password
      $stmt->close();
      mysqli_close($conn);

      if ($password === $stored_password) {
        $_SESSION['id'] = $customerid;
        $_SESSION['name'] = $firstname;
        $_SESSION['dob'] = $dob;
        $_SESSION['email'] = $emailaddress;
        ?>
        <script>
          Swal.fire({
            title: 'Welcome Back <?php echo $_SESSION['name'] ?>!!',
            width: 600,
            padding: '3em',
            color: '#716add',
            background: '#fff',
            imageUrl: 'gif /amongus.gif',
            imageWidth: 700,
            timer: 2500,
            showCancelButton: false,
            willClose: () => {
              window.location.href = 'main1.php';
            }
          });
        </script>

        <?php
        exit;
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

  <title>Login Form</title>
  <link rel="stylesheet" href="login.css">
  <?php include 'cdns.php'; ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

</head>

<body style="position: relative; min-height: 100vh;">

  <div class="login-box">
    <h2>LOGIN</h2>
    <form method="post" action="">
      <div class="user-box">
        <input type="email" name="e" pattern="[a-z0-9._%+-]+@gmail.com" required="">
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="password" id="password" name="pass" required="">
        <div class="show-password">
          <img id="showPassword" src="gif/eyeclose.png" alt="Show Password" onclick="togglePasswordVisibility()">
        </div>
        <label>Password
        </label>
      </div>
      <div Class="btnbox">
        <button type="submit" id="btn1" name="submit">Submit</button>
      </div>
    </form>
  </div>

  <div style=" position: fixed; bottom: 0; width: 100%;">
    <?php include 'footer.php'; ?>
  </div>

  <script>
    function togglePasswordVisibility() {
      var passwordField = document.getElementById('password');
      var eyeIcon = document.getElementById('showPassword');

      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.src = 'gif/eyeopen.png';
      } else {
        passwordField.type = 'password';
        eyeIcon.src = 'gif/eyeclose.png';
      }
    }
  </script>


</body>

<style>
  .user-box {
    position: relative;
  }

  .show-password {
    position: absolute;
    top: 30%;
    right: 5px;
    transform: translateY(-50%);
    cursor: pointer;
  }
  .show-password img[src="gif/eyeopen.png"] {
    height: 13px;
    width: 123%;
}
  .show-password img {
    height: 20px;
    width: 130%;
  }



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

  .login-box {
    transition: all 0.4s ease;
  }

  .login-box:hover {
    box-shadow: 0px 20px 30px -10px #171717;
  }

</style>

</html>
