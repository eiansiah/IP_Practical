<?php
    interface Stripe {
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