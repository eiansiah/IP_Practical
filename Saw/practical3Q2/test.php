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

    $subject->setTemperatureWithTime(32, "2025-03-15 02:00:45");
    $subject->setTemperatureWithTime(11, "2025-03-15 03:00:45");
    $subject->setTemperatureWithTime(21, "2025-03-15 04:00:45");
    $subject->setTemperatureWithTime(43, "2025-03-15 05:00:45");
    $subject->setTemperature(12);
    $subject->setHumidity(32);
    $subject->setPressureWithTime(31, "2025-03-15 05:00:45");
    $subject->setPressureWithTime(32, "2025-03-15 06:00:45");
    $subject->setPressure(22);

    $subject->notify();

    $subject->detach($con);
    $subject->detach($stat);
    $subject->detach($fore);
    
    $subject->setTemperature(54);
    $subject->setHumidity(12);
    $subject->notify();
?>
