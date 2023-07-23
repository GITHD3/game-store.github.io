<?php
if (isset($_POST['submit'])) {
    $pw = $_POST['pass'];
    $output = [];
    $exit_code = 0;
    exec("C:\Users\Harsh\AppData\Local\Programs\Python\Python311\python.exe test.py $pw 2>&1", $output, $exit_code);

    // Check for errors
    if ($exit_code !== 0) {
        // There was an error executing the Python script
        echo "Error occurred while executing the Python script:<br>";
        foreach ($output as $line) {
            echo $line . "<br>";
        }
    } else {
        // Output the result
        $hashed_password = $output[0] ?? null;
        echo "Hashed Password: " . $hashed_password;
    }
}
?>
