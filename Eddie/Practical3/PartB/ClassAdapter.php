<?php
require_once 'PayPalInterface.php';
require_once 'StripeInterface.php';

class ClassAdapter implements Stripe, PayPal {
    public function getCreditCardNo(){
        return $this->getCustCardNo();
    }

    public function getCustomerName(){
        return $this->getCardOwnerName();
    }
    
    public function getCardExpMonth(){
        return $this->getCardExpMonthDate();
    }
    
    public function getCardExpYear(){
        //New
         return substr($this->getCardExpMonthDate(), -2);
    }
    
    public function getCardCVVNo(){
        return $this->getCVVNo();
    }
    
    public function getAmount(){
        return $this->getTotalAmount();
    }
    
    public function setCreditCardNo($creditCardNo){
        return $this->setCustCardNo($creditCardNo);
    }
    
    public function setCustomerName($customerName){
        return $this->setCardOwnerName($customerName);
    }
    
    public function setCardExpMonth($cardExpMonth){
        return $this->setCardExpMonthDate($cardExpMonth);
    }
    
    public function setCardExpYear($cardExpYear){
        // New
        return $this->setCardYear($this->getCardExpMonthDate() . $cardExpYear);
    }
    
    public function setCardCVVNo($cardCVVNo){
        return $this->setCVVNo($cardCVVNo);
    }
    
    public function setAmount($amount){
        return $this->setTotalAmount($amount);
    }

}
    // Usage
    $payment = new StripeAdapter();
    $payment->setCreditCardNo("1234567890123456");
    $payment->setCustomerName("Max Smith");
    $payment->setCardExpMonth("06");
    $payment->setCardExpYear("27");
    $payment->setCardCVVNo("123");
    $payment->setAmount(100.50);

    echo $payment->getCreditCardNo();
    echo $payment->getCustomerName(); 
    echo $payment->getCardExpMonth(); 
    echo $payment->getCardExpYear(); 
    echo $payment->getCardCVVNo(); 
    echo $payment->getAmount();


