<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0 backward compatibility

require_once "Security.php";
$security = new Security();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tenant_management";

$admin_email = "admin@gmail.com";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Stall Request (Hawker)
    if (isset($_POST["request_stall"])) {
        $stall_id = $security->validateInput($_POST["stall_id"]);
        $hawker_email = $security->validateInput($_POST["hawker_email"]);
        $description = $security->validateInput($_POST["description"]);

        // Check if stall exists
        $check_sql = "SELECT * FROM stalls WHERE StallID = '$stall_id'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows == 0) {
            echo "<p style='color:red;'>Stall not found! Redirecting back...</p>";
            echo "<script>setTimeout(function(){ window.history.back(); }, 5000);</script>";
            exit();
        }

        // Send request email (STALL DOES NOT CHANGE YET)
        $security->sendEmail($hawker_email, "Stall Request Received", "Your stall request for $stall_id has been received.");
        $security->sendEmail($admin_email, "Stall Request Pending", "$hawker_email has requested $stall_id for $description. Please approve.");
            
        echo "Request submitted! Waiting for admin approval.";
        echo "<script>setTimeout(function(){ window.history.back(); }, 7000);</script>";
    }

    // Stall Allocation (Admin)
    if (isset($_POST["allocate_stall"])) {
        $stall_id = $security->validateInput($_POST["stall_id"]);
        $stall_owner = $security->validateInput($_POST["stall_owner"]);
        $stall_description = $security->validateInput($_POST["stall_description"]);

        // Only proceed if the user is the admin
        if ($_POST["admin_email"] == $admin_email) {
            $sql = "UPDATE stalls SET StallOwner='$stall_owner', Description='$stall_description', Availability=0 WHERE StallID='$stall_id'";
            if ($conn->query($sql) === TRUE) {
                $security->sendEmail($stall_owner, "Stall Allocation", "You have been allocated stall $stall_id.");
                echo "Stall allocated successfully!";
                header("refresh:3; url=stall.php");
                
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Unauthorized action!";
        }
    }
}

$conn->close();
?>
