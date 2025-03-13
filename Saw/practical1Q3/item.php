<?php
    class item
    {
        private $code;
        private $description;
        private $price;

        public function __construct($code, $description, $price)
        {
            $this->code = $code;
            $this->description = $description;
            $this->price = $price;
        }

        public function getItemCode()
        {
            return $this->code;
        }
        public function getDescription()
        {
            return $this->description;
        }
        public function getPrice()
        {
            return $this->price;
        }

        public function displayItem()
        {
            return "Item Code: {$this->code}, Description: {$this->description}, Price: RM ".number_format($this->price, 2);
        }
    }
?>