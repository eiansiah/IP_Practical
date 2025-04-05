<?php
    require_once 'bank.php';

    class DOMParser {
        private $bank;  

        public function __construct($filename){
            $this->bank = new SplObjectStorage();
            $this->readFromXML($filename);
            $this->display();
        }

        public function readFromXML($filename) {
            $xml = simplexml_load_file($filename);
            $accList = $xml->account;

            foreach ($accList as $accounts) {
                $accTemp = new Account($accounts->number, $accounts->balance);
                $this->bank->attach($accTemp);
            }
        }

        public function display(){
            echo "<h2>Account Details</h2>";
            foreach ($this->bank as $account) {
                echo $account->toString() . "<br/>";
            }
        }
    }

    $bankAccount = new DOMParser('bank.xml');
?>