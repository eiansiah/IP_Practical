<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mydot Coffee</title>
</head>
<body>
    <h1>MyDot Coffee</h1>
    <form action="coffee.php" method="POST">
        Number of bags: 
        <input name="bags"> <br>
        <button type="submit">Calculate</button>
    </form>

    <?php 
        if(isset($_POST["bags"])){ 
            $volumes = array(25 => 5, 50 => 10, 100 => 15, 150 => 20, 200 => 25, 300 => 30);
            $currentOrderedRange = 0;
            $currentDiscount = 1;

            // Search from last index to front
            foreach($volumes as $key => $discount){
                if($_POST["bags"] >= $key){
                    $currentOrderedRange = $key;
                    $currentDiscount = $discount;
                }
            }

            $price = $_POST["bags"] * 5.5;
            $discount = $price *  $currentDiscount / 100;

            echo "Price for ".$_POST["bags"]." bags = RM ".number_format($price, 2, ".", ",")."<br>";
            echo "Discount = RM".number_format($discount, 2, ".", ",")."<br>";
            echo "Your total charge = RM ".number_format($price - $discount, 2, ".", ",")."<br>";

            if($_POST["bags"] > 1000){
                echo "<b>You will get 1 free movie ticket :)</b>";
            }
        }
    ?>
</body>
</html>
