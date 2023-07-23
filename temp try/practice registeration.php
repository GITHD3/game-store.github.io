<?php


if (isset($_POST['submit'])) {
    
    $pw = $_POST['pass'];

   
    
        // Use the Python script to hash the password (for non-admin passwords)
        $output = [];
        exec("python hashCr.py $pw", $output);
        // $hashed_password = $output[0]; // Get the first element of the $output array, which contains either the admin flag or the hashed password.
        $hashed_password = $output[0] ?? null;

        echo $hashed_password;
        echo $pw;
        

    }

?>
