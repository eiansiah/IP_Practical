<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mydot Coffee</title>
</head>
<body>
    <h1>MyDot Coffee</h1>
    <form action="mydot_coffee.php" method="POST">
        Number of bags: 
        <input name="bag"> <br>
        <button type="submit">Calculate</button>
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $bagErr = "";
            $bag = NULL;
            
            if (empty($_POST["bag"])){
                echo $bagErr = "<br/>A value is required";
            }elseif (!preg_match("/^[0-9]+$/",$_POST["bag"])) {
                echo $bagErr = "<br/>Only digits allowed";
            }else {
                $bag = prepareInput($_POST["bag"]);  
            }
            
            if ($bag != NULL){
                $volumes = array(25 => 5, 50 => 10, 100 => 15, 150 => 20, 200 => 25, 300 => 30);
                // define variable so that if value is below 25 it will not be undefined
                $currentOrderedRange = 0;
                $currentDiscount = 0;
                
                foreach($volumes as $index => $discount){
                if($bag >= $index){
                    $currentOrderedRange = $index;
                    $currentDiscount = $discount;
                    }
                }

                $price = $bag * 5.5;
                $discount = $price *  $currentDiscount / 100;
                $finalCharge = $price - $discount;
                
                echo "<br>Price for ".$bag." bags = RM ".number_format($price, 2, ".", ",")."<br>";
                echo "Discount = RM ".number_format($discount, 2, ".", ",")."<br>";
                echo "Your total charge = RM ".number_format($finalCharge, 2, ".", ",")."<br>";
                
                if ($finalCharge > 1000){
                    echo "<b>You will get 1 free movie ticket :)</b>";
                }
            }  
        }
        
        function prepareInput ($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
</body>
</html>