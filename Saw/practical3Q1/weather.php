<?php
    require 'subject.php';

    class Weather extends Subject{
        private $temperature;
        private $humidity;
        private $pressure;
        
        public function getTemperature(){
            return $this->temperature;
        }
        
    
        public function setTemperature($temperature){
            $this->temperature[] = [$temperature, date('Y-m-d H:i:s')];
        }

        public function setTemperatureWithTime($temperature, $time){
            $this->temperature[] = [$temperature, $time];
        }
    
        public function getHumidity(){
            return $this->humidity;
        }
    
        public function setHumidity($humidity){
            $this->humidity = $humidity;
        }
    
        public function getPressure(){
            return $this->pressure;
        }
    
        public function setPressure($pressure){
            $this->pressure[] = [$pressure, date('Y-m-d H:i:s')];
        }

        public function setPressureWithTime($pressure, $time){
            $this->pressure[] = [$pressure, $time];
        }
    }
?>