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

    
    @media (max-width: 400px) {
      .navbar-toggler[aria-expanded="false"]~.navbar-collapse #imglogotemp {
        display: none;
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
          }
          else{?>
            <li class="vc nav-item">
            <div class="p-0 mr-auto">
              <button class="blue-btn" role="button" data-bs-toggle="dropdown">Sign Up &#9660;</button>
              <ul class="dropdown-menu mr-1" style="left: auto;">
              <li style="margin: 0;padding-bottom: 5px">
                  <a href="customer.php">
                    <button class="blue-btn dropdown-item" role="button" style="margin: 0;">Profile</button>
                  </a>
                </li>
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