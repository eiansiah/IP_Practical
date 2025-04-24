<?php
// index.php
require 'Loan.php';

header("Content-Type: application/json");

$path = $_SERVER['REQUEST_URI'];

// Parse query parameters
$loanAmount = (float)$_GET['amount'];
$numberOfYears = (int)$_GET['years'];
$annualInterestRate = (float)$_GET['rate'];

$loan = new Loan($annualInterestRate, $numberOfYears, $loanAmount);

if (strpos($path, '/monthly-payment') !== false) {
    echo json_encode([
        "monthlyPayment" => round($loan->getMonthlyPayment(), 2)
    ]);
} elseif (strpos($path, '/total-payment') !== false) {
    echo json_encode([
        "totalPayment" => round($loan->getTotalPayment(), 2)
    ]);
} else {
    http_response_code(404);
    echo json_encode(["error" => "Endpoint not found"]);
}
