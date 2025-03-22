<?php
require_once 'PayPalInterface.php';
require_once 'StripeInterface.php';

// Stripe Payment Class
class StripePayment implements Stripe {
    private $custCardNo;
    private $cardOwnerName;
    private $cardExpMonthDate;
    private $cvvNo;
    private $totalAmount;

    public function getCustCardNo() {
        return $this->custCardNo;
    }

    public function getCardOwnerName() {
        return $this->cardOwnerName;
    }

    public function getCardExpMonthDate() {
        return $this->cardExpMonthDate;
    }

    public function getCVVNo() {
        return $this->cvvNo;
    }

    public function getTotalAmount() {
        return $this->totalAmount;
    }

    public function setCustCardNo($custCardNo) {
        $this->custCardNo = $custCardNo;
    }

    public function setCardOwnerName($cardOwnerName) {
        $this->cardOwnerName = $cardOwnerName;
    }

    public function setCardExpMonthDate($cardExpMonthDate) {
        $this->cardExpMonthDate = $cardExpMonthDate;
    }

    public function setCVVNo($cvvNo) {
        $this->cvvNo = $cvvNo;
    }

    public function setTotalAmount($totalAmount) {
        $this->totalAmount = $totalAmount;
    }
}

// Stripe to PayPal Adapter
class ClassAdapter implements PayPal {
    private $stripe;

    public function __construct(StripePayment $stripe) {
        $this->stripe = $stripe;
    }

    public function getCreditCardNo() {
        return $this->stripe->getCustCardNo();
    }

    public function getCustomerName() {
        return $this->stripe->getCardOwnerName();
    }
    
    public function getCardExpMonth() {
        return substr($this->stripe->getCardExpMonthDate(), 0, 2);
    }
    
    public function getCardExpYear() {
        return substr($this->stripe->getCardExpMonthDate(), -2);
    }
    
    public function getCardCVVNo() {
        return $this->stripe->getCVVNo();
    }
    
    public function getAmount() {
        return $this->stripe->getTotalAmount();
    }
    
    public function setCreditCardNo($creditCardNo) {
        $this->stripe->setCustCardNo($creditCardNo);
    }
    
    public function setCustomerName($customerName) {
        $this->stripe->setCardOwnerName($customerName);
    }
    
    public function setCardExpMonth($cardExpMonth) {
        $expDate = $cardExpMonth . $this->getCardExpYear();
        $this->stripe->setCardExpMonthDate($expDate);
    }
    
    public function setCardExpYear($cardExpYear) {
        $expDate = $this->getCardExpMonth() . $cardExpYear;
        $this->stripe->setCardExpMonthDate($expDate);
    }
    
    public function setCardCVVNo($cardCVVNo) {
        $this->stripe->setCVVNo($cardCVVNo);
    }
    
    public function setAmount($amount) {
        $this->stripe->setTotalAmount($amount);
    }
}

// Usage Example
$stripePayment = new StripePayment();
$payment = new ClassAdapter($stripePayment);

// Set values
$payment->setCreditCardNo("1234567890123456");
$payment->setCustomerName("Max Smith");
$payment->setCardExpMonth("06");
$payment->setCardExpYear("27");
$payment->setCardCVVNo("123");
$payment->setAmount(100.50);

// Output values
echo "Credit Card No: " . $payment->getCreditCardNo() . "\n";
echo "Customer Name: " . $payment->getCustomerName() . "\n";
echo "Card Exp Month: " . $payment->getCardExpMonth() . "\n";
echo "Card Exp Year: " . $payment->getCardExpYear() . "\n";
echo "CVV No: " . $payment->getCardCVVNo() . "\n";
echo "Amount: " . $payment->getAmount() . "\n";
?>



