<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="navcss.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
  <style>
    @import url("https://fonts.googleapis.com/css?family=Raleway:300");
    @import url("https://mdbootstrap.com/wp-content/themes/mdbootstrap4/favicon.ico");

    nav {
      position: sticky;
      top: 0;
      z-index: 12;
    }
    
    .container-fluid {
      width: 80%;
      padding-right: 10px;
      padding-left: 10px;
      margin-right: auto;
      margin-left: auto;
    }

    #UL {
      padding-top: 2px;
    }

    #UL2 {
      z-index: 1;
      justify-content: center;
      padding: 0px;
      align-items: center;
    }

    #UL3 {

      align-items: center;
      padding-top: 2px;
    }

    #UL,
    #UL2 {
      padding: 0;
      margin: 0;
    }

    .vc {
      padding-bottom: 2px;
      padding-right: 2px;
    }

    .blue-btn {
      position: relative;
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

    .blue-btn:hover {
      background-color: #03e9f4;
      color: #050801;
      box-shadow: 0px 0px 5px #03e9f4, 0px 0px 25px #03e9f4, 0px 0px 50px #03e9f4, 0px 0px 100px #03e9f4;
      /* -webkit-box-reflect: below 1px linear-gradient(transparent, #0005);  */
    }

    .dropdown-item {
      width: fit-content;
      max-width: 200px;
      min-width: 127px;
      position: sticky;
      z-index: index 9;
      opacity: 1;
    }

    .dropdown-menu {
      position: relative;
      border: none;
      padding: 0rem 0rem 0rem 0rem;

      background-color: transparent;
    }

    .avatar {
      display: flex;
      align-items: center;
    }

    .avatar img {
      max-width: 20%;
      margin-right: 10px;
    }

    .btn-icon {
      position: absolute;
      top: 50%;
      left: 33%;
      vertical-align: middle;
      transform: translateY(-50%);
      max-width: 34%;
      vertical-align: middle;
    }

    .btn-text {
      display: inline-block;
      max-width: calc(100% - 50px);

      vertical-align: middle;
    }


    .one-line-button {
      white-space: nowrap;
      overflow: hidden;
      display: flex;
      align-items: center;
    }

    @media (min-width: 767px) {
      .navbar-nav.ml-auto.mb-7.mb-lg-0 {
        margin-top: 8px;
      }
    }

    #navbarAZ {
      border-color: rgba(211, 211, 211, 0.5);
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
      -webkit-backdrop-filter: blur(20px);
      backdrop-filter: blur(20px);
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
      border: 1px solid rgba(255, 255, 255, 0.18);
      border-radius: 30px;
      margin: 10px;
    }

    @media (max-width: 1000px) {
      .navbar-toggler[aria-expanded="false"]~.navbar-collapse #imglogotemp {
        display: none;
      }
      .UL2 {
        display: none;
      }
      .dropdown-menu.mr-1 {
        right: auto;
        left: 0;
      }
    }

  </style>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark p-0" id="navbarAZ">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">


        <ul id="UL" class="navbar-nav mr-auto  w-0 p-0">
          <li class="vc nav-item">
            <div class="row d-flex justify-content-center">
              <div class="col-md-auto"><a href="main1.php">
                  <button id="btns" class="blue-btn">Discover</button></a>
              </div>
            </div>
          </li>
          <li class="vc nav-item">
            <div class="row d-flex justify-content-center">
              <div class="col-md-auto"><a href="browse.php">
                  <button id="btns" class="blue-btn">Browse</button></a>
              </div>
            </div>
          </li>
          <li class="vc nav-item">
            <div class="row d-flex justify-content-center">
              <div class="col-md-auto"><a href="news.php">
                  <button id="btns" class="blue-btn">News</button></a>
              </div>
            </div>
          </li>
        </ul>

        <ul class="UL2">
          <img id="imglogotemp" src="img/ww.png" />
        </ul>



        <ul id="UL3" class="navbar-nav ml-auto mb-7 mb-lg-0  w-0 p-0">
          <li class="vc nav-item">
            <div class="p-0 mr-auto">
              <a href="cart.php">
                <button id="btns" class="blue-btn" role="button">Cart</button>
              </a>
            </div>
          </li>
          <li class="vc nav-item">
            <div class="p-0 mr-auto">
              <a href="about.php">
                <button id="btns" class="blue-btn" role="button">About Us</button>
              </a>
            </div>
          </li>
          <?php if (isset($_SESSION['name'])) { ?>

            <li class="vc nav-item">
              <div class="p-0 mr-auto">
                <button class="blue-btn" role="button" data-bs-toggle="dropdown">Profile &#9660;</button>
                <ul class="dropdown-menu mr-1" style="left: auto;">
                  <li style="margin: 0;padding-bottom: 5px">
                    <a href="customer.php">
                      <button class="blue-btn dropdown-item" role="button" style="margin: 0;">Profile</button>
                    </a>
                  </li>
                  <li style="margin: 0;padding-bottom: 5px">
                    <a href="registeration.php">
                      <button class="blue-btn dropdown-item" role="button" style="margin: 0;">Sign Up</button>
                    </a>
                  </li>
                  <li style="margin: 0;">
                    <a href="login.php">
                      <button class="blue-btn dropdown-item" role="button" style="margin: 0;">Log In</button>
                    </a>
                  </li>
                  <?php if (isset($_SESSION['name']) && $_SESSION['name'] == "harsh" && isset($_SESSION['id']) && $_SESSION['id'] == "3") { ?>
                    <li style="margin: 0;">
                      <a href="admin1.php">
                        <button class="blue-btn dropdown-item" role="button" style="margin: 0;">Admin</button>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </li>
            <?php
          } else { ?>
            <li class="vc nav-item">
              <div class="p-0 mr-auto">
                <button class="blue-btn" role="button" data-bs-toggle="dropdown">Sign Up &#9660;</button>
                <ul class="dropdown-menu mr-1" style="left: auto;">

                  <?php if (isset($_SESSION['name']) && $_SESSION['name'] == "harsh" && isset($_SESSION['id']) && $_SESSION['id'] == "3") { ?>
                    <li style="margin: 0;">
                      <a href="admin1.php">
                        <button class="blue-btn dropdown-item" role="button" style="margin: 0;">Admin</button>
                      </a>
                    </li>
                  <?php } ?>
                  <li style="margin: 0;padding-bottom: 5px">
                    <a href="registeration.php">
                      <button class="blue-btn dropdown-item" role="button" style="margin: 0;">Sign Up</button>
                    </a>
                  </li>
                  <li style="margin: 0;">
                    <a href="login.php">
                      <button class="blue-btn dropdown-item" role="button" style="margin: 0;">Log In</button>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          <?php }

          ?>


        </ul>
      </div>
    </div>
  </nav>
</body>

</html>
<style>
  #imglogotemp {

    max-width: 110px;
  }
</style>