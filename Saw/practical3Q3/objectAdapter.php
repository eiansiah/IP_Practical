<?php
    // reference: https://hashemirafsan.medium.com/adapter-design-pattern-in-php-a-real-world-example-dbbf47cad867

    require 'paypal.php';
    require 'stripe.php';

    class StripeAdapter implements IPaypal{
        public function __construct(public Stripe $stripe){}

        public function getCreditCardNo(){
            return $this->stripe->getCustCardNo();
        }

        public function getCustomerName(){
            return $this->stripe->getCardOwnerName();
        }

        public function getCardExpMonth(){
            $mdate = $this->stripe->getCardExpMonthDate();

            $old = strtotime($mdate);
            return date('m', $old);
        }

        public function getCardExpYear(){
            $mdate = $this->stripe->getCardExpMonthDate();

            $old = strtotime($mdate);
            return date('Y', $old);
        }

        public function getCardCVVNo(){
            return $this->stripe->getCVVNo();
        }

        public function getAmount(){
            return $this->stripe->getTotalAmount();
        }

        public function setCreditCardNo($creditCardNo){
            return $this->stripe->setCustCardNo($creditCardNo);
        }

        public function setCustomerName($customerName){
            return $this->stripe->setCardOwnerName($customerName);
        }

        public function setCardExpMonth($cardExpMonth){
            $mdate = $this->stripe->getCardExpMonthDate();
            $old = strtotime($mdate);
            $year = date('Y', $old);

            $new = $year.'-'.$cardExpMonth;	
            return $this->stripe->setCardExpMonthDate($new);
        }

        public function setCardExpYear($cardExpYear){
            $mdate = $this->stripe->getCardExpMonthDate();
            $old = strtotime($mdate);
            $month = date('m', $old);

            $new = $cardExpYear.'-'.$month;	

            return $this->stripe->setCardExpMonthDate($new);
        }

        public function setCardCVVNo($cardCVVNo){
            return $this->stripe->setCVVNo($cardCVVNo);
        }

        public function setAmount($amount){
            return $this->stripe->setTotalAmount($amount);
        }
    }
?>