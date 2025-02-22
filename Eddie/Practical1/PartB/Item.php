<?php
    // Base class
    class Item {
        protected $itemCode;
        protected $description;
        protected $price;
        
        //initialize an object's properties upon creation of the object
        public function __construct($itemCode, $description, $price) {
            $this->itemCode = $itemCode;
            $this->description = $description;
            $this->price = $price;
        }

        // Getters
        public function getItemCode() { return $this->itemCode; }
        public function getDescription() { return $this->description; }
        public function getPrice() { return $this->price; }

        // Method to display item details (to be overridden in child classes)
        public function displayItem() {
            return "Item Code: {$this->itemCode}, Description: {$this->description}, Price: RM{$this->price}";
        }
    }
?>




