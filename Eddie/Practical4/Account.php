<?php

class Account {
    private $number;
    private $balance;

    public function __construct($number = "", $balance = "") {
        $this->number = $number;
        $this->balance = $balance;
    }

    public function getNumber(){
        return $this->number;
    }
    
    public function getBalance(){
        return $this->balance;
    }
    
    public function setNumber($number){
        $this->number = $number;
    }
    
    public function setBalance($balance){
        $this->balance = $balance;
    }
    
    public function __toString() {
        return "Account Number: " . $this->number . " | Balance: " . $this->balance;
    }
}
