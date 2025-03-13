<?php
    require "connection.php";
    require "auth.php";

    $auth = new Auth("normal"); //Access Control
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to cart</title>
</head>
<body>
    <form action="POST">
        <p>Roti Canai</p>

        <label for="quantity">Quantity: </label><br>
        <input type="range" name="quantity"><br><br>

        <button type="submit">Add to cart</button>
    </form>
</body>
</html>