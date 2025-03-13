<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<?php 
    if(isset($_POST["email"])){
        require 'connection.php';

        $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
        $stmt= $conn->prepare($sql); // Database Security
        $stmt->execute([$_POST["email"], $_POST["password"]]);
        $result = $stmt->fetchAll();

        if(!$result){
            echo "<script>alert('Please login to access the page :/');
            window.location = 'login.php'
            </script>";
        }else{
            session_start();
            $_SESSION["email"] = $_POST["email"];
			$_SESSION["role"] = $result[0]["role"];

            header('Location: cart.php');
            die();
        }
    }
?>

<body>
    <h1><u>Login</u></h1>
    <form method="POST">
        <label for="email">Email:</label><br>
        <input type="email" name="email"><br><br>

        <label for="title">Password: </label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>