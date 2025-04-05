<?php

class Account{
    private $number;
    private $balance;

	public function __construct($number = "", $balance = 0)
    {
		$this->number = $number;
		$this->balance = $balance;
    }

    public function getNumber(){
		return $this->number;
	}

	public function setNumber($number){
		$this->number = $number;
	}

	public function getBalance(){
		return $this->balance;
	}

	public function setBalance($balance){
		$this->balance = $balance;
	}

	public function __toString()
	{
		return "Account No.: " . $this->number . " Balance: RM " . $this->balance;
	}
}

?>
