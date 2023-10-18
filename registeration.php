<!DOCTYPE html>
<html>
<?php session_start(); ?>

<head>
    <title>Registeration Form</title>

    <?php include 'cdns.php'; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="header">
        <?php
        include 'navbar.php';
        ?>
    </div>
    <div class="contain">
        <div class="login-box">
            <h2>Sign-Up</h2>
            <form action="Welcome.php" method='POST'>
                <div class="user-box">
                    <input type="text" name="first" required="">
                    <label>First Name</label>
                </div>
                <div class="user-box">
                    <input type="text" name="last" required="">
                    <label>Last Name</label>
                </div>
                <div class="user-box">
                    <input type="text" id="customDateInput" name="dob" required="">
                    <label>Date of Birth</label>
                </div>
                <div class="user-box">
                    <input name="email" type="email" required="">
                    <label>Email Adrdess</label>
                </div>
                <div class="user-box">
                    <input type="password" id="password" name="pass" required="">
                    <div class="show-password">
          <img id="showPassword" src="gif/eyeclose.png" alt="Show Password" onclick="togglePasswordVisibility()">
        </div>
                    <label>Password</label>
                </div>
                <div class="user-box">
                    <input type="contact" name="no" required="">
                    <label>Contact No</label>
                </div>
                <div Class="btnbox">
                    <button type="submit" id="btn1" name="submit">Submit</button>
                </div>
            </form>
            <p id="password-strength-message"></p>
        </div>
    </div>

</body>
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

    .show-password img {
        height: 20px;
        width: 130%;
    }

    .show-password img[src="gif/eyeopen.png"] {
        height: 13px;
    width: 123%;
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

    .login-box {
        margin-bottom: 100px;

    }

    #navbar {
        position: relative;

    }

    #footer {
        padding: 20px;
    }

    .contain {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;

    }

    /*add css Code*/



    body {
        font-family: sans-serif;
        background: linear-gradient(#404ccc, #03e9f4);
        position: relative;
        z-index: 1;

        padding: 5px 7px !important;
    }



    .scrolling-wrapper {
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
    }

    .contain {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .login-box {
        margin-bottom: 0px;
        width: 400px;
        padding: 40px;

        background: rgba(0, 0, 0, 0.5);
        box-sizing: border-box;
        border-radius: 7px;
        z-index: 10;
        transition: all 0.4s ease;
    }

    .login-box:hover {
        box-shadow: 0px 20px 30px -10px #171717;
    }

    .login-box h2 {
        margin: 0 0 30px;
        padding: 0;
        color: #fff;
        text-align: center;
    }

    .login-box .user-box {
        position: relative;
    }

    .login-box .user-box input {
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #fff;
        outline: none;
        background: transparent;
    }

    .login-box .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        pointer-events: none;
        transition: .5s;
    }

    .login-box .user-box input:focus~label,
    .login-box .user-box input:valid~label {
        top: -20px;
        left: 0;
        color: #03e9f4;
        font-size: 12px;
    }
</style>
<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var passwordStrengthMessage = document.getElementById("password-strength-message");

        // Define regular expressions for each requirement
        var minLength = 8;
        var uppercaseRegex = /[A-Z]/;
        var lowercaseRegex = /[a-z]/;
        var numberRegex = /[0-9]/;
        var specialCharRegex = /[!@#\$%\^&\*]/;

        // Check each requirement
        var isStrong = true;

        if (password.length < minLength) {
            passwordStrengthMessage.textContent = "Password must be at least " + minLength + " characters long.";
            isStrong = false;
        }

        // Check if the password contains at least one uppercase letter
        if (!uppercaseRegex.test(password)) {
            passwordStrengthMessage.textContent = "Password must contain at least one uppercase letter.";
            isStrong = false;
        }

        // Check if the password contains at least one lowercase letter
        if (!lowercaseRegex.test(password)) {
            passwordStrengthMessage.textContent = "Password must contain at least one lowercase letter.";
            isStrong = false;
        }

        // Check if the password contains at least one number
        if (!numberRegex.test(password)) {
            passwordStrengthMessage.textContent = "Password must contain at least one number.";
            isStrong = false;
        }

        // Check if the password contains at least one special character
        if (!specialCharRegex.test(password)) {
            passwordStrengthMessage.textContent = "Password must contain at least one special character (!@#$%^&*).";
            isStrong = false;
        }

        if (!isStrong) {
            passwordStrengthMessage.style.color = "red";
            return false; // Prevent form submission if password is not strong
        }

        passwordStrengthMessage.textContent = "Password is strong!";
        passwordStrengthMessage.style.color = "green";
        return true; // Allow form submission if password is strong
    }

</script>
<script>
    const dateInput = document.getElementById('customDateInput');

    dateInput.addEventListener('focus', function () {
        this.type = 'date';
    });

    dateInput.addEventListener('blur', function () {
        if (!this.value) {
            this.type = 'text';
        }
    });
</script>

</html>
<?php include 'footer.php'; ?>