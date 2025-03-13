<?php
require 'authentication.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $auth = new Authentication();
    $loginUsername = $_POST['username'];
    $loginPassword = $_POST['password'];
    
    if ($auth->authenticateUser($loginUsername, $loginPassword)) {
        header("Location: loginSuccess.php");
        exit;
    } else {
        echo "Invalid username or password! <a href='index.html'> Please try again.</a>";
    }
}
?>