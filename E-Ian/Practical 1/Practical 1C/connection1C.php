<?php

$host = 'localhost';
$dbName = 'collegedb';
$user = 'test123';
$password = 'Test123.';
$dsn = 'mysql:host = $host;dbName = $dbName';

try {

    $pdoObj = new PDO($dsn, $user, $password);
    $pdoObj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
    // echo "Connected Successfully";
} catch (PDOException $ex) {
    echo "<p>ERROR: " . $ex->getMessage() . "</p>";
    exit;
}

?>