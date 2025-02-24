<?php
    require 'item.php';
    require 'food.php';
    require 'stationery.php';

    $items = [
        new food("F001", "Maggi", 5.99, "1 pack"),
        new food("F002", "Sandwich", 5.00, "1 piece"),
        new stationery("S001", "Notebook", 2.50, 500),
        new stationery("S002", "Ballpoint Pen", 1.20, 15)
    ];

    echo "<h2>TARUMT Convenience Store</h2>";

    foreach ($items as $item) {
        echo "<p>" . $item->displayItem() . "</p>";
    }
?>