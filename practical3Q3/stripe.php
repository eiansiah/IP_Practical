<?php
interface IStripe {
    public function getCustCardNo();
    public function getCardOwnerName();
    public function getCardExpMonthDate();
    public function getCVVNo();
    public function getTotalAmount();
    public function setCustCardNo( $custCardNo);
    public function setCardOwnerName($cardOwnerName);
    public function setCardExpMonthDate($cardExpMonthDate);
    public function setCVVNo($cvvNo);
    public function setTotalAmount($totalAmount);
}

class Stripe implements IStripe{
    private $cardNo;
    private $exp;
    private $name;
    private $cvv;
    private $amount;

    public function getCustCardNo(){
        return $this->cardNo;
    }

    public function getCardOwnerName(){
        return $this->name;
    }

    public function getCardExpMonthDate(){
        return $this->exp;
    }

    public function getCVVNo(){
        return $this->cvv;
    }

    public function getTotalAmount(){
        return $this->amount;
    }

    public function setCustCardNo($custCardNo){
        $this->cardNo = $custCardNo;
    }

    public function setCardOwnerName($cardOwnerName){
        $this->name = $cardOwnerName;
    }

    public function setCardExpMonthDate($cardExpMonthDate){
        $this->exp = $cardExpMonthDate;

        return $this->exp;
    }

    public function setCVVNo($cvvNo){
        $this->cvv = $cvvNo;
    }

    public function setTotalAmount($totalAmount){
        $this->amount = $totalAmount;
    }
}