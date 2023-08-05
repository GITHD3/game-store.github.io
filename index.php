<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <style>
    .logo-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #0096F4; /* Initial background color */
      animation: backgroundAnimation 2s ease-in-out forwards; /* Animation to transition the background color */
    }

    .logo-img {
      max-width: 100%;
      height: auto;
    }

    @keyframes backgroundAnimation {
      0% { background-color: #0096F4; }
      100% { background-color: whitesmoke; }
    }
  </style>
</head>

<body>
  <div class="logo-container">
    <img class="logo-img" src="img/ww.png" alt="Logo">
  </div>

  <script>
    setTimeout(function() {
      window.location.href = "main1.php";
    }, 2000);

  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
