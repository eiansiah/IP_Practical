<?php
    require 'ObjectAdapter.php';

    echo "<b>Using Stripe Payment (Object Adapter Method)</b><br><br>";

    $adapter = new ObjectAdapter(new Stripe());
    $adapter->setCreditCardNo("1234567890123456");
    $adapter->setCustomerName("Max Smith");
    $adapter->setCardExpMonth("06");
    $adapter->setCardExpYear("27");
    $adapter->setCardCVVNo("123");
    $adapter->setAmount(100.50);

    echo $adapter->getCreditCardNo() . "\n";
    echo $adapter->getCustomerName() . "\n";
    echo $adapter->getCardExpMonth() . "\n";
    echo $adapter->getCardExpYear() . "\n";
    echo $adapter->getCardCVVNo() . "\n";
    echo $adapter->getAmount() . "\n";

?>