<?php

require_once 'target.php';
require_once 'adaptee.php';

class ClassAdapter extends StripePayment implements PayPalInterface{
    
    public function __construct() {
    }
    
    public function getCreditCardNo() {
        return $this->getCustCardNo();
    }

    public function getCustomerName() {
        return $this->getCardOwnerName();
    }

    public function getCardExpMonth() {
        $tokenArray = explode("/", $this->getCardExpMonthDate());
        return $tokenArray[0];
    }

    public function getCardExpYear() {
        $tokenArray = explode("/", $this->getCardExpMonthDate());
        return $tokenArray[1];
    }

    public function getCardCVVNo() {
        return $this->getCVVNo();
    }

    public function getAmount() {
        return $this->getTotalAmount();
    }

    public function setCreditCardNo($creditCardNo) {
        $this->setCustCardNo($creditCardNo);
    }

    public function setCustomerName($customerName) {
        $this->setCardOwnerName($customerName);
    }

    public function setCardExpMonth($cardExpMonth) {
        $this->setCardExpMonthDate($cardExpMonth);
    }

    public function setCardExpYear($cardExpYear) {
        $this->setCardExpMonthDate($this->getCardExpMonth(). "/". $cardExpYear);
    }

    public function setCardCVVNo($cardCVVNo) {
        $this->setCVVNo($cardCVVNo);
    }

    public function setAmount($amount) {
        $this->setTotalAmount($amount);
    }
}
?>