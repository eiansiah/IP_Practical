<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject</title>
</head>

<?php 
    if(isset($_POST["code"])){
        require 'connection.php';

        $sql = "INSERT INTO subjects (code, title, credit, yearOfStudy) VALUES (?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$_POST["code"], $_POST["title"], $_POST["credit"], $_POST["year"]]);

        header('Location: show_subject.php');
        die();
    }
?>

<body>
    <h1><u>Add New Subject</u></h1>
    <form method="POST">
        <label for="code">Subject Code:</label><br>
        <input type="text" name="code"><br><br>

        <label for="title">Title: </label><br>
        <input type="text" name="title"><br><br>

        <label for="credit">Credit: </label><br>
        <input type="text" name="credit"><br><br>

        <label for="year">Year of Study</label><br>
        <input type="text" name="year"><br><br>

        <button type="submit">Add</button>
    </form>
</body>
</html>