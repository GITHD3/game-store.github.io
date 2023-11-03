<?php
include("navbar.php");
session_start();

$name = $_SESSION['name'];
$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    // Ensure the 'Feedback' directory exists
    if (!is_dir('Feedback')) {
        mkdir('Feedback', 0755, true);
    }

    // Get the list of existing feedback files for the user
    $existingFiles = glob("Feedback/$id.$name.*.txt");

    // Limit to a maximum of 3 feedback submissions
    if (count($existingFiles) >= 3) {
        echo "<script>alert('You have already submitted 3 feedbacks. You cannot submit more.');</script>";
    } else {
        // Calculate the next serial number for the feedback
        $nextSerial = count($existingFiles) + 1;

        $feedbackFile = "Feedback/$id.$name.$nextSerial.txt";

        // Create a TXT file with the proper format
        $file = fopen($feedbackFile, "w");
        if ($file) {
            fwrite($file, "Id: $id\n");
            fwrite($file, "Name: $name\n");
            fwrite($file, "How would you rate your overall experience with ParaCrash Game Store? - {$_POST['question1']}\n");
            fwrite($file, "Did you find the game you were looking for? - {$_POST['question2']}\n");
            fwrite($file, "How would you rate the difficulty level of the games available? - {$_POST['question3']}\n");
            fwrite($file, "Message:\n{$_POST['message']}");
            fclose($file);
            echo "<script>alert('Feedback submitted successfully!');</script>";
        } else {
            echo "Error: Unable to open file. Check directory permissions.";
        }
    }
}
?>

<!-- Your HTML form remains unchanged -->



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
            background-image: linear-gradient(slateblue, #bebef1);

            background-repeat: no-repeat !important;
            background-attachment: fixed !important;
            background-size: cover;
            color: beige;

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
        textarea {
            color: beige !important;
            border: 3px solid slateblue;
            transition: 0.2s;
            background-color: #171717;
        }

        .opt {

            padding: 10px;
            color: #EFDECD !important;
            border: 3px solid slateblue;
            border-radius: 10px;
            transition: 0.2s;
            background-color: #302f2f !important;
        }

        .mainformdiv {
            background-color: rgb(23, 23, 23, 0.79);
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
            border-radius: 16px;
            border: none;
            backdrop-filter: blur(6px);
        }
    </style>
</head>

<body>
    <div class="container mainformdiv2">
    <div class="container mainformdiv" style="margin-bottom:18px;">
    <p style="font-family: 'Press Start 2P'; color: #beb6ff">
        MAIL | <a href="mailto:dedakiya000@gmail.com" style="color: #beb6ff; text-decoration: none;">dedakiya000@gmail.com</a>
    </p>
    <p style="font-family: 'Press Start 2P'; color: #beb6ff">
        PHONE | <a href="tel:2003940580" style="color: #beb6ff; text-decoration: none;">2003940580</a>
    </p>
</div>

        <div class="container mainformdiv mt-10">
            <h1 class="text-3xl font-bold mb-4" style="font-family: 'Press Start 2P'; font-size: 22px; color: #beb6ff">
                Feedback | ParaCrash Game Store</h1>
            <form method="post" action="thank.php">
                <div class="np mb-6">
                    <h5 class="nameplate pb-2 pr-2 pt-2">
                        <?php echo $name; ?>
                    </h5>
                </div>
                <label for="question1">How would you rate your overall experience with ParaCrash Game Store?</label>
                <select name="question1" id="question1" class="w-full p-2   rounded mb-4">
                    <option class="opt" value="">Select an option</option>
                    <option class="opt" value="Excellent">Excellent</option>
                    <option class="opt" value="Good">Good</option>
                    <option class="opt" value="Fair">Fair</option>
                    <option class="opt" value="Poor">Poor</option>
                </select>
                <label for="question2">Did you find the game you were looking for?</label>
                <select name="question2" id="question2" class="w-full p-2   rounded mb-4">
                    <option option="opt" value="">Select an option</option>
                    <option option="opt" value="Yes">Yes</option>
                    <option option="opt" value="No">No</option>
                </select>
                <label for="question3">How would you rate the difficulty level of the games available?</label>
                <select name="question3" id="question3" class="w-full p-2   rounded mb-4">
                    <option class="opt" value="">Select an option</option>
                    <option class="opt" value="Easy">Easy</option>
                    <option class="opt" value="Medium">Medium</option>
                    <option class="opt" value="Difficult">Difficult</option>
                </select>
                <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
                <button type="submit" name="submit" class="btn">Submit Feedback</button>
            </form>
        </div>
    </div>
</body>

</html>