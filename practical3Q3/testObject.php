<?php
    require 'objectAdapter.php';

    echo "<b>Using Stripe Payment (Object Adapter Method)</b><br><br>";

    $paypal = new StripeAdapter(new Stripe());

    $paypal->setCustomerName("Abu");
    $paypal->setCreditCardNo("1234");
    $paypal->setCardExpMonth(date('m'));
    $paypal->setCardExpYear(date('Y'));
    $paypal->setCardCVVNo("123");
    $paypal->setAmount(9999);
    
    echo 'Name: '.$paypal->getCustomerName().'<br>';
    echo 'No: '.$paypal->getCreditCardNo().'<br>';
    echo 'CVV: '.$paypal->getCardCVVNo().'<br>';
    echo 'Exp Month: '.$paypal->getCardExpMonth().'<br>';
    echo 'Exp Year: '.$paypal->getCardExpYear().'<br>';
    echo 'Amount: '.$paypal->getAmount().'<br>';

    echo '------------------------------------------<br>';

    $paypal->setCardExpMonth('06');
    $paypal->setCardExpYear('2029');
    echo 'New Month: '.$paypal->getCardExpMonth().'<br>';
    echo 'New Year: '.$paypal->getCardExpYear().'<br>';
?>