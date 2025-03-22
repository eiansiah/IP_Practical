<?php

require_once 'target.php';

class ObjectAdapter implements PayPalInterface{
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
        $tokenArray = explode("/", $this->stripe->getCardExpMonthDate());
        return $tokenArray[0];
    }

    public function getCardExpYear() {
        $tokenArray = explode("/", $this->stripe->getCardExpMonthDate());
        return $tokenArray[1];
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
        $this->stripe->setCardExpMonthDate($this->getCardExpMonth(). "/". $cardExpYear);
    }

    public function setCardCVVNo($cardCVVNo) {
        $this->stripe->setCVVNo($cardCVVNo);
    }

    public function setAmount($amount) {
        $this->stripe->setTotalAmount($amount);
    }
}
?>