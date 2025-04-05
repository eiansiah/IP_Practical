<?php
    require 'bank.php';

    class SAXParser{
        private $accounts;
        private $filename;
        private $accountTemp;
        private $tmpValue;

        public function __construct($filename){
            $this->filename = $filename;
            $this->accounts = array();
            $this->parseDocument();
            $this->printData();
        }

        public function startElement($parser, $name, $attr){
            if(!empty($name)){
                if($name == 'ACCOUNT'){
                    $this->accountTemp = new Account();
                }
            }
        }

        public function endElement($parser, $name){
            if($name == 'ACCOUNT'){
                $this->accounts[] = $this->accountTemp;
            } elseif($name == 'NUMBER'){
                $this->accountTemp->setNumber($this->tmpValue);
            } elseif($name == "BALANCE"){
                $this->accountTemp->setBalance($this->tmpValue);
            }
        }

        public function characters($parser, $data){
            if(!empty($data)){
                $this->tmpValue = trim($data);
            }
        }

        private function parseDocument(){
            $parser = xml_parser_create();
            xml_set_element_handler($parser, array($this, "startElement"), array($this, "endElement"));
            xml_set_character_data_handler($parser, array($this, "characters"));

            if(!($handle = fopen($this->filename, "r"))){
                die("could not open XML input");
            }

            while($data = fread($handle, 4096)){
                xml_parse($parser, $data);
            }
        }

        public function printData(){
            foreach($this->accounts as $acc){
                echo $acc."<br>";
            }
        }
    }

    $worker = new SAXParser("account.xml");
?>