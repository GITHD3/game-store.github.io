<?php
if (isset($_POST['submit'])) {
    $user_input_password = $_POST['pass'];
    $hashed_password = password_hash("harsh", PASSWORD_DEFAULT);

    // Compare the hashed password from PHP with the user input password
    if (password_verify($user_input_password, $hashed_password)) {
        echo "Password matches!";
    } else {
        echo "Password does not match!";
    }
}
?>

<form action="" method="post">
    Password: <input type="password" name="pass">
    <input type="submit" name="submit" value="Check Password">
</form>
