<?php
    class stationery extends item {
        private $weight;

        public function __construct($code, $description, $price, $weight) {
            parent::__construct($code, $description, $price);
            $this->weight = $weight;
        }

        public function getWeight() 
        { 
            return $this->weight; 
        }

        #[\Override]
        public function displayItem() {
            return parent::displayItem() . ", Weight: {$this->weight} g";
        }
    }
?>