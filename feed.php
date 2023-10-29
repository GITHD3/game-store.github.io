<?php
include("navbar.php");
session_start();

$name = $_SESSION['name'];
$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];

    // Create a directory if it doesn't exist
    if (!is_dir('Feedback')) {
        mkdir('Feedback', 0755, true);
    }

    // Create a TXT file with proper format
    $file = fopen("Feedback/$id.$name.txt", "w");
    fwrite($file, "Id: $id\n");
    fwrite($file, "Name: $name\n");
    fwrite($file, "How would you rate your overall experience with ParaCrash Game Store? - $question1\n");
    fwrite($file, "Did you find the game you were looking for? - $question2\n");
    fwrite($file, "How would you rate the difficulty level of the games available? - $question3\n");
    fwrite($file, "Message:\n$message");
    fclose($file);

    // Feedback submitted
    echo "<script>alert('Feedback submitted successfully!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback | ParaCrash Game Store</title>
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

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            font-family: 'Aspekta', sans-serif;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #03e9f4;
            border-radius: 5px;
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

        select,
        option,
        textarea {
            color: beige !important;
            border: 3px solid slateblue;
            transition: 0.2s;
            background-color: #171717;
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
                Feedback | ParaCrash Game Store</h1>
            <form action="thank.php" method="post">
                <div class="np mb-6">
                    <h5 class="nameplate pb-2 pr-2 pt-2">
                        <?php echo $name; ?>
                    </h5>
                </div>
                <label for="question1">How would you rate your overall experience with ParaCrash Game Store?</label>
                <select name="question1" id="question1" class="w-full p-2   rounded mb-4">
                    <option value="">Select an option</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Good">Good</option>
                    <option value="Fair">Fair</option>
                    <option value="Poor">Poor</option>
                </select>
                <label for="question2">Did you find the game you were looking for?</label>
                <select name="question2" id="question2" class="w-full p-2   rounded mb-4">
                    <option value="">Select an option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <label for="question3">How would you rate the difficulty level of the games available?</label>
                <select name="question3" id="question3" class="w-full p-2   rounded mb-4">
                    <option value="">Select an option</option>
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Difficult">Difficult</option>
                </select>
                <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
                <button type="submit" name="submit" class="btn">Submit Feedback</button>
            </form>
        </div>
    </div>
</body>

</html>