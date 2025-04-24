<?php
    require 'nusoap.php';

    $client = new nusoap_client("http://localhost:8080/service.php?wsdl");
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <form action="client.php" method="POST">
        <h2>Loan Web Service Client</h2>

        <div>
            <label for="amount">Loan amount: RM</label>
            <input type="text" name="amount" placeholder="100000" required>
        </div>
        <div>
            <label for="duration">Loan duration:</label>
            <input type="text" name="duration" placeholder="15" required>
        </div>
        <div>
            <label for="rate">Interest rate:</label>
            <input type="text" name="rate" placeholder="2.5" required>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</body>

<?php
    $error = $client->getError();
    if ($error) {
        echo "Constructor error: $error";
        exit();
    }

    if(isset($_POST['amount'])){

        $params = [
            'loanAmount' => $_POST['amount'],
            'annualInterestRate' => $_POST['rate'],
            'numberOfYears' => $_POST['duration']
        ];

        $monthly = $client->call('getMonthlyPayment', $params);
        $total = $client->call('getTotalPayment', $params);

        if ($client->fault) {
            echo "Fault: ";
            print_r($monthly);
        } else {
            $error = $client->getError();
            if ($error) {
                echo "Error: $error";
            } else {
                echo "Monthly Payment: RM" . number_format($monthly, 2) . "<br>";
                echo "Total Payment: RM" . number_format($total, 2);
            }
        }
    }
?>

</html>