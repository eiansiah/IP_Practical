<html>
    <head>
        <title>My Dot Coffee (Q2)</title>
    </head>

    <body>
        <h2>MyDot Coffee</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <p>Number of bags:<br><input type="number" name="bagNo" min="1"></p>            
            <p>
                <input type="submit" value="Calculate" name="calculate" />
            </p>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $total_price = $_POST ["bagNo"] * 5.5;

            if ($_POST ["bagNo"] >= 300) {
                $final_price = $total_price * 0.70;
                $discount_ammout = $total_price * 0.30;
            } else if ($_POST ["bagNo"] >= 200) {
                $final_price = $total_price * 0.75;
                $discount_ammout = $total_price * 0.25;
            } else if ($_POST ["bagNo"] >= 150) {
                $final_price = $total_price * 0.80;
                $discount_ammout = $total_price * 0.20;
            } else if ($_POST ["bagNo"] >= 100) {
                $final_price = $total_price * 0.85;
                $discount_ammout = $total_price * 0.15;
            } else if ($_POST ["bagNo"] >= 50) {
                $final_price = $total_price * 0.90;
                $discount_ammout = $total_price * 0.10;
            } else if ($_POST ["bagNo"] >= 25) {
                $final_price = $total_price * 0.95;
                $discount_ammout = $total_price * 0.05;
            } else {
                $final_price = $total_price;
                $discount_ammout = 0;
            }

            echo "</br>Price for ", $_POST ["bagNo"], " bags = RM ", number_format($total_price,2);
            echo "</br>Discount = RM ", number_format($discount_ammout,2);
            echo "</br>Your total charge = RM ", number_format($final_price,2);

            if ($total_price > 1000) {
                echo "</br><b>You will get 1 free movie ticket :)</b>";
            }
        }
        ?>
    </body>
</html>

