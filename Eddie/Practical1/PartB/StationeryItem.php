<?php
    // Child class for stationery items
    class StationeryItem extends Item {
        private $weight;

        #[\Override]
        public function __construct($itemCode, $description, $price, $weight) {
            parent::__construct($itemCode, $description, $price);
            $this->weight = $weight;
        }

        public function getWeight() 
        { 
            return $this->weight; 
        }

        // Override displayItem for StationeryItem
        #[\Override]
        public function displayItem() {
            return parent::displayItem() . ", Weight: {$this->weight}g";
        }
    }
?>