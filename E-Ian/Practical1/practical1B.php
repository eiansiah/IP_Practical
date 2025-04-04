<?php

require ("Item.php");
require ("Food.php");
require ("Stationery.php");

$items = array (
    new Food ("F001", "Chocolate", 5.5, 20),
    new Food ("F002", "Biscuit", 2.5, 30),
    new Stationery ("S001", "Pencil", 1.5, 10),
    new Stationery ("S002", "Marker Pen", 4, 25)
);

echo "<h2> Convenience Store </h2>";
echo "Here are the items available.</br>";

foreach ($items as $storeItem){
    echo "<p>" . $storeItem->displayItem(). "</p>";
}
?>

