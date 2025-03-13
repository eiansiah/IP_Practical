<?php
    class food extends item {
        private $unit;
        
        public function __construct($code, $description, $price, $unit) {
            parent::__construct($code, $description, $price);
            $this->unit = $unit;
        }

        public function getUnit() { 
            return $this->unit; 
        }

        #[\Override]
        public function displayItem() {
            return parent::displayItem() . ", Unit: {$this->unit}";
        }
    }
?>
