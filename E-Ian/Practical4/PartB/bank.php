<?php
    class Account {
        private $number, $balance;

        public function __construct ($number = "", $balance = "") {
            $this->number = $number;
            $this->balance = $balance;
        }

        public function getNumber() {
            return $this->number;
        }

        public function getBalance() {
            return $this->balance;
        }

        public function setNumber($number) {
            $this->number = $number;
        }

        public function setBalance($balance) {
            $this->balance = $balance;
        }

        public function toString() {
            return "Account Number: " . $this->number . "<br/>" . "Account Balance: RM " . $this->balance;
        }
    }
?>