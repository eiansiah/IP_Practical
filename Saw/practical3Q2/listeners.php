<?php 
    class Condition implements \SplObserver{
        private $temperature;
        private $humidity;

        public function update(\SplSubject $subject): void
        {
            $temp = $subject->getTemperature();
            $this->temperature = end($temp)[0];
            $this->humidity = $subject->getHumidity();

            $this->display();
        }

        public function display(){
            echo "----------------------------------------------<br>";
            echo "Current temperature: $this->temperature C <br>";
            echo "Current humidity: $this->humidity% <br>";
            echo "----------------------------------------------<br>";
        }
    }

    class Statistics implements \SplObserver{
        private $temperature;

        public function update(\SplSubject $subject): void
        {
            $this->temperature = $subject->getTemperature();

            $this->display();
        }

        public function display(){
            $total = 0;
            $min = [99999, ];
            $max = [-99999, ];

            foreach($this->temperature as $temp){
                $total += $temp[0];

                if($temp[0] < $min[0]){
                    $min = $temp;
                }else if($temp[0] > $max[0]){
                    $max = $temp;
                }
            }

            $avg = $total / count($this->temperature);

            echo "----------------------------------------------<br>";
            echo "AVG temperature: {$avg} C <br>";
            echo "MIN temperature: {$min[0]} C during {$min[1]} <br>";
            echo "MAX temperature: {$max[0]} C during {$max[1]} <br>";
            echo "----------------------------------------------<br>";
        }
    }

    class Forecast implements \SplObserver{
        private $pressure;

        public function update(\SplSubject $subject): void
        {
            $this->pressure = $subject->getPressure();

            $this->display();
        }

        public function display(){
            echo "----------------------------------------------<br>";
            echo "Current pressure: {$this->pressure[count($this->pressure) - 1][0]} hPA during {$this->pressure[count($this->pressure) - 1][1]}<br>";
            echo "Previous pressure: {$this->pressure[count($this->pressure) - 2][0]} hPA during {$this->pressure[count($this->pressure) - 2][1]}<br>";

            $forecast = "";
            if(end($this->pressure) > $this->pressure[count($this->pressure) - 2]){
                $forecast = "Improving weather on the way!";
            }else if(end($this->pressure) < $this->pressure[count($this->pressure) - 2]){
                $forecast = "Watch out for cooler, rainy weather";
            }else{
                $forecast = "More of the same";
            }

            echo "Forecast: $forecast <br>";

            echo "----------------------------------------------<br>";
        }
    }
?>
