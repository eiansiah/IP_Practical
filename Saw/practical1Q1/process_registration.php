<?php
if (empty($_POST["name"]) || empty($_POST["mobile"])) {
?>
    <h1>Please do not leave empty fields.</h1>
<?php
} elseif (!preg_match("/^[a-zA-Z]++$/", $_POST["name"])) {
?>
    <h1>Name can only contain lowercase and uppercase letters!!!</h1>
<?php
} elseif (!preg_match("/^[0-9]+$/", $_POST["mobile"])) {
?>
    <h1>Mobile phone can only contain digits!!!</h1>
<?php
} elseif (!isset($_POST["gender"])) {
?>
    <h1>Please select gender!!!</h1>
<?php } else { ?>
    <h1>Registration Successful</h1>
    <p>
        <?php if ($_POST["gender"] == "m") {
            echo "Mr ";
        } else {
            echo "Ms ";
        }
        echo $_POST["name"];
        ?>
    </p>
    <p>Mobile Number: <?php echo $_POST["mobile"]; ?></p>
<?php } ?>
