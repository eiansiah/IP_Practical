<?php
require_once 'PayPalInterface.php';
require_once 'StripeInterface.php';
// Object Adapter
class ObjectAdapter implements PayPal {
    private $stripe;

    public function __construct(Stripe $stripe) {
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
        $this->stripe->setCardExpMonthDate($cardExpMonth);
    }

    public function setCardExpYear($cardExpYear) {
        $this->stripe->setCardExpMonthDate($this->stripe->getCardExpMonthDate() . $cardExpYear);
    }

    public function setCardCVVNo($cardCVVNo) {
        $this->stripe->setCVVNo($cardCVVNo);
    }

    public function setAmount($amount) {
        $this->stripe->setTotalAmount($amount);
    }
}

// Usage
$stripe = new class implements Stripe {
    private $custCardNo, $cardOwnerName, $cardExpMonthDate, $cvvNo, $totalAmount;

    public function getCustCardNo() { return $this->custCardNo; }
    public function getCardOwnerName() { return $this->cardOwnerName; }
    public function getCardExpMonthDate() { return $this->cardExpMonthDate; }
    public function getCVVNo() { return $this->cvvNo; }
    public function getTotalAmount() { return $this->totalAmount; }

    public function setCustCardNo($custCardNo) { $this->custCardNo = $custCardNo; }
    public function setCardOwnerName($cardOwnerName) { $this->cardOwnerName = $cardOwnerName; }
    public function setCardExpMonthDate($cardExpMonthDate) { $this->cardExpMonthDate = $cardExpMonthDate; }
    public function setCVVNo($cvvNo) { $this->cvvNo = $cvvNo; }
    public function setTotalAmount($totalAmount) { $this->totalAmount = $totalAmount; }
};

$adapter = new ObjectAdapter($stripe);
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

