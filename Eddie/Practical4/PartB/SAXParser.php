<?php

require_once 'Account.php';

class SAXParser {
    private $accounts; // Array of Account objects
    private $filename;
    private $accTmp; // Temporary Account object
    private $tmpValue; // Temporary value to store element data
    private $parser; // XML Parser

    public function __construct($filename) {
        $this->filename = $filename;
        $this->accounts = array();
        $this->parseDocument();
        $this->printData();
    }

    // Handles start elements (e.g., <account>)
    public function startElement($parser, $name, $attrs) {
        if ($name == 'ACCOUNT') {
            $this->accTmp = new Account(); // Create a new Account object
        }
    }

    // Handles end elements (e.g., </balance>)
    public function endElement($parser, $name) {
        if ($name == 'ACCOUNT') {
            $this->accounts[] = $this->accTmp; // Store the completed Account object
        } elseif ($name == 'NUMBER') {
            $this->accTmp->setNumber($this->tmpValue);
        } elseif ($name == 'BALANCE') {
            $this->accTmp->setBalance(floatval($this->tmpValue));
        }
    }

    // Handles character data (e.g., text inside <balance>)
    public function characters($parser, $data) {
        if (!empty(trim($data))) {
            $this->tmpValue = trim($data);
        }
    }

    // Parses the XML document
    private function parseDocument() {
        $this->parser = xml_parser_create();
        xml_set_element_handler($this->parser, [$this, "startElement"], [$this, "endElement"]);
        xml_set_character_data_handler($this->parser, [$this, "characters"]);

        if (!($handle = fopen($this->filename, "r"))) {
            die("Could not open XML file.");
        }

        while ($data = fread($handle, 4096)) {
            xml_parse($this->parser, $data, feof($handle));
        }

        fclose($handle);
        xml_parser_free($this->parser);
    }

    // Prints out the account details
    public function printData() {
        echo "<h2>Account Listing</h2>";

        $totalBalance = 0;
        foreach ($this->accounts as $acc) {
            echo $acc . "<br />";
            $totalBalance += $acc->getBalance();
        }

        echo "<h3>Total Balance: " . $totalBalance . "</h3>";
    }
}

// Run the SAX parser
$bankAccount = new SAXParser("Account.xml");

?>
