<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <style>
    .video-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }

    .video-container video {
      object-fit: fill;
      width: 103%;
      height: 100%;
    }

    .logo-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      animation: backgroundAnimation 2s ease-in-out forwards;
    }

    .logo-img {
      max-width: 100%;
      height: auto;
      animation: borderAnimation 2s linear infinite;
    }

    @keyframes backgroundAnimation {
      0% {
        background-color: #0096F4;
      }

      100% {
        background-color: whitesmoke;
      }
    }

    @keyframes borderAnimation {
      0%,
      100% {
        box-shadow: 80%;
        border-radius: 100%;
      }

      50% {
        border-radius: 100%;
        box-shadow: 0 0 10px 5px #0096F4, 0 0 80px 60px #0096F4;
        background-color: #0096F4;
      }
    }
  </style>
</head>

<body>
  <div class="video-container">
    <video autoplay muted loop>
      <source src="gif/VideoTitle.mp4" type="video/mp4">
      Welcome to ParaCrash Game-Store
    </video>
  </div>

 

  <script>
    setTimeout(function () {
      window.location.href = "main1.php";
    }, 5500);
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
