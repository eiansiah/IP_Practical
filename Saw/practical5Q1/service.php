<?php
    require 'nusoap.php';
    require "Loan.php";
 
    $server = new nusoap_server();
    $server->configureWSDL("Loan payment", "urn:loanpayment");

    $server->register('getMonthlyPayment', ['loanAmount' => 'xsd:float', 'numberOfYears' => 'xsd:integer', 'annualInterestRate' => 'xsd:float'], ['return' => 'xsd:float']
    );

    $server->register('getTotalPayment', ['loanAmount' => 'xsd:float', 'numberOfYears' => 'xsd:integer', 'annualInterestRate' => 'xsd:float'], ['return' => 'xsd:float']
    );

    function getMonthlyPayment($loanAmount, $numberOfYears, $annualInterestRate){
        $loan = new Loan($annualInterestRate, $numberOfYears, $loanAmount);
        return $loan->getMonthlyPayment();
    }

    function getTotalPayment($loanAmount, $numberOfYears, $annualInterestRate){
        $loan = new Loan($annualInterestRate, $numberOfYears, $loanAmount);
        return $loan->getTotalPayment();
    }

    $server->service(file_get_contents("php://input"));
?>