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
      background-color: #333333; /* Initial background color */
      animation: backgroundAnimation 4s ease-in-out forwards; /* Animation to transition the background color */
    }

    .logo-img {
      max-width: 100%;
      height: auto;
    }

    @keyframes backgroundAnimation {
      0% { background-color: #333333; }
      50% { background-color: whitesmoke; }
      100% { background-color: #333333; }
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
    }, 4000); // Redirect after 4 seconds (2 seconds of each color)

  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
