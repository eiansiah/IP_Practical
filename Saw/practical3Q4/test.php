<?php 
    require 'email.php';

    $baseEmail = new Email();
    $baseEmail->setTo("test@test.com");
    $baseEmail->setFrom("test2@test.com");
    $baseEmail->setMessage("Testing....");
    echo $baseEmail->getContent()."<br><br>-------------------<br>";

    $disDeco = new Disclaimer($baseEmail);
    echo "Encrypted Text".$disDeco->getContent()."<br><br>-------------------<br>";

    $encryptDeco = new Encryption($disDeco);
    echo $encryptDeco->getContent()."<br><br>-------------------<br>";

    echo $encryptDeco->decrypt($encryptDeco->getContent());
?>
