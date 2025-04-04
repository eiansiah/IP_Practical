<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'connection1C.php';

    $code = $_POST["code"];
    $title = $_POST["title"];
    $credit = $_POST["credit"];
    $year = $_POST["year"];

    $sql = "INSERT INTO subjects (code, title, credit, yearOfStudy) VALUES (?,?,?,?)";
    $insertData = $pdoObj->prepare($sql);
    $insertData->execute(array($_POST['code'], $_POST['title'], $_POST['credit'], $_POST['year']));

    header('Location: practical1C.php');
}
?>