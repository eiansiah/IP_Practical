<?php
require_once 'Authentication.php';

session_start();

$auth = new Authentication();

if (!$auth->verifySessionLogin()) {
    die("Access Denied. Please <a href='index.html'>log in</a>.");
}

echo "<h2>Welcome to Your Dashboard, " . $_SESSION['username'] . "!</h2><br><br>";
echo "Click <a href='logout.php'>here</a> to logout.";
?>