<?php

class Food extends Item {
    
    private $unit;
    
    public function __construct($itemCode, $description, $price, $unit) {
        parent::__construct ($itemCode, $description, $price);
        $this->unit = $unit;
    }
    
    public function getUnit(){
        return $this->unit;
    }
    
    public function setUnit($unit){
        $this->unit = $unit;
    }
    
    #[\Override]
    public function displayItem(){
        return parent::displayItem() . ", Unit: $this->unit";
    }
    
}

?>

