<html>
    <head>
        <title>Registration (Q1)</title>
    </head>
    <body>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if (empty($_POST["name"])|| empty($_POST["mobile"])|| empty($_POST["gender"])) {
                echo "Please do not leave empty fields.";
            } else if (!preg_match("/^[a-zA-Z]*$/", $_POST["name"])){
                echo "Name can only contain lowercase and uppercase letters.";
            } else if (!preg_match("/^[0-9]*$/", $_POST["mobile"])){
                echo "Mobile phone can only contain digits.";
            } else {
                $name = $_POST ["name"];
                $phone = $_POST ["mobile"];
                $gender = $_POST ["gender"];
                
                echo "<h2>Registration Successful!</h2></br>";
                if ($gender == "m") {
                    echo "Mr $name </br> Mobile Number: $phone";
                } else if ($gender == "f") {
                    echo "Ms $name </br> Mobile Number: $phone";
                }
            }
        }
        ?>
    </body>
</html>