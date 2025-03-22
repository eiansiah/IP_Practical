<?php
require_once "paypal.php";
require_once "classAdapter.php";
require_once "objectAdapter.php";

echo "<b>Using Original PayPal Payment</b><br>";

$paypal = new Paypal();
$paypal->setCreditCardNo("4561237812345676");
$paypal->setCustomerName("Anwar Ibrahim");
$paypal->setCardExpMonth("12");
$paypal->setCardExpYear("2030");
$paypal->setCardCVVNo("429");
$paypal->setAmount("1000");

echo "Payment Completed via PayPal on Card Number: " . $paypal->getCreditCardNo() . "<br>";
echo "Credit Card No: " . $paypal->getCreditCardNo() . "<br>";
echo "Customer Name: " . $paypal->getCustomerName() . "<br>";
echo "Card Expiry Month: " . $paypal->getCardExpMonth() . "<br>";
echo "Card Expiry Year: " . $paypal->getCardExpYear() . "<br>";
echo "Card CVV No: " . $paypal->getCardCVVNo() . "<br>";
echo "Amount: RM " . $paypal->getAmount() . "<br>";
echo "<br><br><br>";

echo "<b>Using Stripe Payment (Class Adapter Method)</b><br>";

$stripe = new ClassAdapter();
$stripe->setCreditCardNo("4561237812345676");
$stripe->setCustomerName("Anwar Ibrahim");
$stripe->setCardExpMonth("12");
$stripe->setCardExpYear("2030");
$stripe->setCardCVVNo("429");
$stripe->setAmount("1000");

echo "Payment Completed via Stripe on Card Number: " . $stripe->getCreditCardNo() . "<br>";
echo "Credit Card No: " . $stripe->getCreditCardNo() . "<br>";
echo "Customer Name: " . $stripe->getCustomerName() . "<br>";
echo "Card Expiry Month: " . $stripe->getCardExpMonth() . "<br>";
echo "Card Expiry Year: " . $stripe->getCardExpYear() . "<br>";
echo "Card CVV No: " . $stripe->getCardCVVNo() . "<br>";
echo "Amount: RM " . $stripe->getAmount() . "<br>";
echo "<br><br><br>";

echo "<b>Using Stripe Payment (Object Adapter Method)</b><br>";

$stripeNew = new StripePayment();
$stripeObj = new ObjectAdapter($stripeNew);
$stripeObj->setCreditCardNo("4561237812345676");
$stripeObj->setCustomerName("Anwar Ibrahim");
$stripeObj->setCardExpMonth("12");
$stripeObj->setCardExpYear("2030");
$stripeObj->setCardCVVNo("429");
$stripeObj->setAmount("1000");

echo "Payment Completed via Stripe on Card Number: " . $stripeObj->getCreditCardNo() . "<br>";
echo "Credit Card No: " . $stripeObj->getCreditCardNo() . "<br>";
echo "Customer Name: " . $stripeObj->getCustomerName() . "<br>";
echo "Card Expiry Month: " . $stripeObj->getCardExpMonth() . "<br>";
echo "Card Expiry Year: " . $stripeObj->getCardExpYear() . "<br>";
echo "Card CVV No: " . $stripeObj->getCardCVVNo() . "<br>";
echo "Amount: RM " . $stripeObj->getAmount() . "<br>";
echo "<br>";
?>