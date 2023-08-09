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
    ?></div>
    <div class="contain">
    <div class="login-box" >
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
                <input type="date" name="dob" required="">
                <label>Date of Birth</label>
            </div>
            <div class="user-box">
                <input name="email" type="email" required="">
                <label>Email Adrdess</label>
            </div>
            <div class="user-box">
                <input type="password" name="pass" required="">
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
    </div></div>
    
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
    margin: 0;
    padding: 0;
}



.scrolling-wrapper {
    overflow-x: scroll;
    overflow-y: hidden;
    white-space: nowrap;
}
.contain{
    display:flex;
    justify-content: center;
    align-items: center;
    padding-top: 15px;
    padding-bottom: 15px;
}

.login-box {
    margin-bottom: 0px  ;
    width: 400px;
    padding: 40px;
    
    background: rgba(0, 0, 0, 0.5);
    box-sizing: border-box;
    border-radius: 7px;
    z-index: 10;
    transition: all 0.4s ease;
}
.login-box:hover{
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
</html><?php include 'footer.php'; ?>
