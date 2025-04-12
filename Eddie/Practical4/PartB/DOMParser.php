<?php
require_once 'Account.php';

class DOMParser {
    private $accounts; // Stores Account objects
    
    public function  __construct($filename) {
        $this->accounts = new SplObjectStorage(); // Creates an object storage
        $this->readFromXML($filename); // Calls method to read the XML file
        $this->display(); // Calls method to display account details
    }   
    
    public function readFromXML($filename){
        $xml = simplexml_load_file($filename); // Loads XML file into an object
        $accountList = $xml->account; // Extracts all <account> elements
        
        foreach ($accountList as $acc){
            $accTemp = new Account($acc->number, $acc->balance); // Creates Account object
            $this->accounts->attach($accTemp);
        }
    }
    
    public function display() {
        echo "<h2>Account Listing</h2>";
        foreach ($this->accounts as $acc) {
            print $acc . "<br />";
        }

        // Calculate total balance
        $totalBalance = 0;
        foreach ($this->accounts as $acc) {
            $totalBalance += floatval($acc->getBalance());
        }

        echo "<h3>Total Balance: " . $totalBalance . "</h3>";
    }
}  
    // Run the parser
    $bankAccount = new DOMParser("Account.xml");
?>

