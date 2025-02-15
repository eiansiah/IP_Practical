<html>
    <head>
        <title>title</title>
    </head>
    <body>
           <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nameErr = "";
                $name = NULL;
                $phoneErr = "";
                $phone = NULL;
                $genderErr = "";
                $gender = NULL;
                if (empty($_POST["name"])){
                    echo $nameErr = "<br/>Name is required";
                }elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {
                    echo $nameErr = "<br/>Only letters and white space allowed";
                }else {
                    $name = prepareInput($_POST["name"]);
                    
                }
                if (empty($_POST["mobile"])){
                    echo $phoneErr = "<br/>Mobile phone is required";
                }elseif (!preg_match("[0-9]",$_POST["mobile"])) {
                    echo $phoneErr = "<br/>Only digits allowed";
                }else {
                    $phone = prepareInput($_POST["mobile"]);
                    
                }
                if (empty($_POST["gender"])){
                    echo $genderErr = "<br/>Gender is required";
                }else {
                    $gender = prepareInput($_POST["gender"]);
                }
                
                if ($name != NULL AND $gender != NULL AND $phone != NULL){
                    echo "<H1> Registration Successful! <H1/>";
                    if ($gender == "m"){
                        echo "<p>Mr $name ";
                    } elseif ($gender == "f") {
                        echo "Mrs $name";
                    };
                    echo "<br/>Mobile Number: $phone<!p>";
                }  
            }
            
            function prepareInput ($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
    </body>
</html>
