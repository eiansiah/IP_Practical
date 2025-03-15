<?php

class Weather implements \SplSubject
{
    public $state;
    private $observers;

    public function __construct() {
        $this->observers = new SplObjectStorage();
    }

    public function attach(\SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    
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