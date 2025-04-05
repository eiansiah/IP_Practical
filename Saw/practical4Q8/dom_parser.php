<?php
    require 'bank.php';

    class DOMParser{
        private $accounts;

        public function __construct($filename){
            $this->accounts = new SplObjectStorage();
            $this->readfromXML($filename);
            $this->display();
        }


        private function readfromXML($filename){
            $xml = simplexml_load_file($filename);
            $list = $xml->account;

            foreach($list as $acc){
                $tmp = new Account($acc->number, $acc->balance);
                $this->accounts->attach($tmp);
            }
        }

        public function display(){
            echo "<h2>Account List</h2>";

            foreach ($this->accounts as $acc){
                print $acc . "<br>";
            }
        }
    }

    $worker = new DOMParser("account.xml");
?>