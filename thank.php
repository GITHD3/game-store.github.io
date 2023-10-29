<?php
include("navbar.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | ParaCrash Game Store</title>
    <link href='https://fonts.googleapis.com/css?family=Aspekta' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        body {
            background-image: url('img 2/gameicon.webp');
            background-repeat: no-repeat !important;
            background-attachment: fixed !important;
            background-size: cover;
            color: black;
        }

        .container {
            max-width: 600px;
            margin: auto;
            font-family: 'Aspekta', sans-serif;
            padding: 20px;
        }

        .btn {
            padding: 10px 20px;
            background: #03e9f4;
            color: #404ccc;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .nameplate {
            font-family: 'Aspekta', sans-serif;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            background-color: rgb(255, 255, 255, 0.5);
            max-width: fit-content;
            padding: 20px;
            color: #171717;
        }

        .mainformdiv {
            background-color: rgb(255, 255, 255, 0.55);
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
            border-radius: 16px;
            border: none;
            backdrop-filter: blur(5px);
        }
    </style>
</head>

<body>
    <div class="container mainformdiv2">
        <div class="container mainformdiv mt-10">
            <h1 class="text-3xl font-bold mb-4" style="font-family: 'Press Start 2P'; font-size: 22px; color: #171717">
                Thank You for Your Feedback!</h1>
            <p class="mb-6">We appreciate your valuable feedback. It helps us improve our services.</p>
        </div>
    </div>

    <script>
        
            setTimeout(function () {
                window.location.href = 'main1.php';
            }, 2000);
    </script>

</body>

</html>
