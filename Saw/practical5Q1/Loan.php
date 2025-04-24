<?php

class Loan
{
    private $annualInterestRate;
    private $numberOfYears;
    private $loanAmount;

    public function __construct($annualInterestRate = 2.5, $numberOfYears = 15, $loanAmount = 100000.0)
    {
        $this->annualInterestRate = $annualInterestRate;
        $this->numberOfYears = $numberOfYears;
        $this->loanAmount = $loanAmount;
    }

    public function getAnnualInterestRate()
    {
        return $this->annualInterestRate;
    }

    public function setAnnualInterestRate($annualInterestRate)
    {
        $this->annualInterestRate = $annualInterestRate;
    }

    public function getNumberOfYears()
    {
        return $this->numberOfYears;
    }

    public function setNumberOfYears($numberOfYears)
    {
        $this->numberOfYears = $numberOfYears;
    }

    public function getLoanAmount()
    {
        return $this->loanAmount;
    }

    public function setLoanAmount($loanAmount)
    {
        $this->loanAmount = $loanAmount;
    }

    public function getMonthlyPayment()
    {
        $monthlyInterestRate = $this->annualInterestRate / 1200;
        $monthlyPayment = $this->loanAmount * $monthlyInterestRate / (1
            - (pow(1 / (1 + $monthlyInterestRate), $this->numberOfYears * 12)));
        return $monthlyPayment;
    }

    public function getTotalPayment()
    {
        $totalPayment = $this->getMonthlyPayment() * $this->numberOfYears * 12;
        return $totalPayment;
    }
}