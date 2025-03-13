<?php
require 'Authentication.php';

session_start();

$auth = new Authentication();
$auth->logout();

echo "You have been logged out successfully. Click here to <a href='index.html'>log in</a> again.";
?>