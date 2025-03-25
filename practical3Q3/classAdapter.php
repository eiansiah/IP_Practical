<?php
    // reference: https://hashemirafsan.medium.com/adapter-design-pattern-in-php-a-real-world-example-dbbf47cad867

    require 'paypal.php';
    require 'stripe.php';

    class StripeAdapter extends Stripe implements IPaypal{
        public function getCreditCardNo(){
            return $this->getCustCardNo();
        }

        public function getCustomerName(){
            return $this->getCardOwnerName();
        }

        public function getCardExpMonth(){
            $mdate = $this->getCardExpMonthDate();

            $old = strtotime($mdate);
            return date('m', $old);
        }

        public function getCardExpYear(){
            $mdate = $this->getCardExpMonthDate();

            $old = strtotime($mdate);
            return date('Y', $old);
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
            $mdate = $this->getCardExpMonthDate();
            $old = strtotime($mdate);
            $year = date('Y', $old);
            $day = date('d', $old);

            $new = $year.'-'.$cardExpMonth.'-'.$day;	
            return $this->setCardExpMonthDate($new);
        }

        public function setCardExpYear($cardExpYear){
            $mdate = $this->getCardExpMonthDate();
            $old = strtotime($mdate);
            $month = date('m', $old);
            $day = date('d', $old);

            $new = $cardExpYear.'-'.$month.'-'.$day;	

            return $this->setCardExpMonthDate($new);
        }

        public function setCardCVVNo($cardCVVNo){
            return $this->setCVVNo($cardCVVNo);
        }

        public function setAmount($amount){
            return $this->setTotalAmount($amount);
        }
    }
?>