<?php 
    require "weather.php";
    require "listeners.php";

    $subject = new Weather();

    $con = new Condition();
    $stat = new Statistics();
    $fore = new Forecast();
    $subject->attach($con);
    $subject->attach($stat);
    $subject->attach($fore);

    $subject->setTemperatureWithTime(20, "2025-03-15 02:00:45");
    $subject->setTemperatureWithTime(30, "2025-03-15 03:00:45");
    $subject->setTemperatureWithTime(15, "2025-03-15 04:00:45");
    $subject->setTemperatureWithTime(21, "2025-03-15 05:00:45");
    $subject->setTemperature(10);
    $subject->setHumidity(50);
    $subject->setPressureWithTime(20, "2025-03-15 05:00:45");
    $subject->setPressureWithTime(20, "2025-03-15 06:00:45");
    $subject->setPressure(80);

    $subject->notify();

    $subject->detach($con);
    $subject->detach($stat);
    $subject->detach($fore);
    
    // wont update
    $subject->setTemperature(20);
    $subject->setHumidity(100);
    $subject->notify();
?>
