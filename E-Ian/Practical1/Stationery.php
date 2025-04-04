<?php

class Stationery extends Item {
    
    private $weight;
    
    public function __construct($itemCode, $description, $price, $weight) {
        parent::__construct ($itemCode, $description, $price);
        $this->weight = $weight;
    }
    
    public function getWeight(){
        return $this->weight;
    }
    
    public function setWeight($weight){
        $this->weight = $weight;
    }
    
    #[\Override]
    public function displayItem(){
        return parent::displayItem() . ", Weight: $this->weight gram(s)";
    }
    
}

?>

