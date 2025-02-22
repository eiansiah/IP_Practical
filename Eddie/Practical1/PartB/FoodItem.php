<?php
    // Child class for food items
    class FoodItem extends Item {
        private $unit;
        
        
        #[\Override]
        public function __construct($itemCode, $description, $price, $unit) {
            parent::__construct($itemCode, $description, $price);
            $this->unit = $unit;
        }

        public function getUnit() { 
            return $this->unit; 
        }

        // Override displayItem for FoodItem
        #[\Override]
        public function displayItem() {
            return parent::displayItem() . ", Unit: {$this->unit}";
        }
    }
?>