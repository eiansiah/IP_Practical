<?php
    require_once 'bank.php';

    class SAXParser {
        private $bank;
        private $filename;
        private $bankTemp;
        private $tmpValue;

        public function __construct($filename){
            $this->filename = $filename;
            $this->bank = array();
            $this->parseDocument();
            $this->printData();
        }

        public function startElement($parser, $name, $attr) {
            if (!empty($name)) {
                if ($name == 'ACCOUNT') {
                    $this->bankTemp = new Account();
                }
            }
        }

        public function endElement($parser, $name) {
            if ($name == 'ACCOUNT') {
                $this->bank[] = $this->bankTemp;
            } elseif ($name == 'NUMBER') {
                $this->bankTemp->setNumber($this->tmpValue);
            } elseif ($name == 'BALANCE') {
                $this->bankTemp->setBalance($this->tmpValue);
            }   
        }

        public function characters($parser, $data){
            if (!empty($data)) {
                $this->tmpValue = trim($data);
            }
        }

        private function parseDocument() {
            $parser = xml_parser_create();
            xml_set_element_handler($parser, array($this, 'startElement'), array($this, 'endElement'));
            xml_set_character_data_handler($parser, array($this, 'characters'));

            if (!($handle = fopen($this->filename, 'r'))) {
                die('Could not open XML input');
            }

            while ($data = fread($handle, 4096)) {
                xml_parse($parser, $data);
            }
        }

        public function printData(){
            foreach ($this->bank as $account) {
                echo $account->toString() . "<br/>";
            }
        }
    }

    $bankAccount = new SAXParser("bank.xml");
?>