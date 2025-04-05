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

        
    }
?>