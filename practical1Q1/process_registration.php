
<?php 
    if (!preg_match("/^[a-zA-Z]++$/", $_POST["name"])) {
?>
    <h1>Invalid name entered!!!</h1> 
<?php 
    }elseif (!preg_match("/^[0-9]+$/", $_POST["mobile"])) {
?>
    <h1>Invalid mobile data entered!!!</h1> 
<?php 
    }elseif (!isset($_POST["gender"])) {
?>
    <h1>Please select gender!!!</h1> 
<?php }else{ ?>
    <h1>Registration Successful</h1>
    <p><?php if ($_POST["gender"] == "m") 
        { echo "Mr " ;} 
        else { echo "Ms ";}
        echo $_POST["name"];
    ?></p>
    <p>Mobile Number: <?php echo $_POST["mobile"]; ?></p>
<?php } ?>