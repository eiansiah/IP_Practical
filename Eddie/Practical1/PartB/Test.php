<?php
    include 'Item.php';
    include 'FoodItem.php';
    include 'StationeryItem.php';

    $items = [
        new FoodItem("F001", "Cup Noodles", 3.50, "1 pack"),
        new FoodItem("F002", "Sandwich", 5.00, "1 piece"),
        new StationeryItem("S001", "Notebook", 2.50, 500),
        new StationeryItem("S002", "Ballpoint Pen", 1.20, 15)
    ];

    // Display all items using polymorphism
    // Polymorphism = bjects of different classes that share a common parent class 
    echo "<h2>Campus Convenience Store Items</h2>";
    foreach ($items as $item) {
        echo "<p>" . $item->displayItem() . "</p>";
    }
?>
