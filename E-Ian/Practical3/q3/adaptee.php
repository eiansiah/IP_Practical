<?php
interface Stripe
{
    public function getCustCardNo();
    public function getCardOwnerName();
    public function getCardExpMonthDate();
    public function getCVVNo();
    public function getTotalAmount();
    public function setCustCardNo($custCardNo);
    public function setCardOwnerName($cardOwnerName);
    public function setCardExpMonthDate($cardExpMonthDate);
    public function setCVVNo($cvvNo);
    public function setTotalAmount($totalAmount);
}

class StripePayment implements Stripe
{
    private $custCardNo;
    private $cardOwnerName;
    private $cardExpMonthDate;
    private $cvvNo;
    private $totalAmount;

    public function getCustCardNo()
    {
        return $this->custCardNo;
    }

    public function getCardOwnerName()
    {
        return $this->cardOwnerName;
    }

    public function getCardExpMonthDate()
    {
        return $this->cardExpMonthDate;
    }

    public function getCVVNo()
    {
        return $this->cvvNo;
    }

    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    public function setCustCardNo($custCardNo)
    {
        $this->custCardNo = $custCardNo;
    }

    public function setCardOwnerName($cardOwnerName)
    {
        $this->cardOwnerName = $cardOwnerName;
    }

    public function setCardExpMonthDate($cardExpMonthDate)
    {
        $this->cardExpMonthDate = $cardExpMonthDate;
    }

    public function setCVVNo($cvvNo)
    {
        $this->cvvNo = $cvvNo;
    }

    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }
}
?>
