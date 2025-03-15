<?php
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

// Initialize variables
$emailErr = "";
$roleErr = "";
$email = NULL;
$role = NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Please enter a valid email";
    } else {
        $email = $security->validateInput($_POST["email"]);
    }

    if (empty($_POST["role"])) {
        $roleErr = "<br/>Role selection is required";
    } else {
        $role = $security->validateInput($_POST["role"]);
    }
}

// Fetch stall data
$sql = "SELECT * FROM stalls";
$result = $conn->query($sql);

$stalls = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $stalls[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Management System</title>
    <style>
        .occupied { background-color: red; color: white; }
        .available { background-color: green; color: white; }
    </style>
</head>
<body>

    <?php if (empty($email) || $role == "guest"): ?>
        <p style="color: red;"><?= htmlspecialchars($emailErr) ?></p>
        <script>
            setTimeout(function() { 
                window.history.back(); 
            }, 5000);
        </script>
    <?php endif; ?>
    
    <?php if (($role == "hawker" && !empty($email)) || ($role == "admin" && $email == $admin_email)): ?>
        <h3>Stall Database</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Stall ID</th>
                    <th>Stall Owner</th>
                    <th>Description</th>
                    <th>Fee</th>
                    <th>Availability</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stalls as $stall): ?>
                    <tr class="<?= $stall['Availability'] ? 'available' : 'occupied' ?>">
                        <td><?= htmlspecialchars($stall['StallID']) ?></td>
                        <td><?= $stall['StallOwner'] ?: 'None' ?></td>
                        <td><?= htmlspecialchars($stall['Description']) ?></td>
                        <td><?= htmlspecialchars($stall['Fee']) ?></td>
                        <td><?= $stall['Availability'] ? "Available" : "Occupied" ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- Hawkers: Request a Stall -->
    <?php if ($role == "hawker" && !empty($email)): ?>
        <h3>Request a Stall</h3>
        <form method="POST" action="stall_action.php" autocomplete="off">
            <label for="stall_id">Stall ID:</label>
            <input type="text" name="stall_id" required>
            <input type="hidden" name="hawker_email" value="<?= $email ?>">
            <label for="description">Business Description:</label>
            <input type="text" name="description" required>
            <button type="submit" name="request_stall">Request Stall</button>
        </form>
    <?php endif; ?>

    <!--Admin: Allocate a Stall (Only if email matches admin and role is admin) -->
    <?php if ($role == "admin" && $email == $admin_email): ?>
        <h3>Allocate a Stall</h3>
        <form method="POST" action="stall_action.php" autocomplete="off">
            <input type="hidden" name="admin_email" value="<?= htmlspecialchars($email) ?>">
            <label for="stall_id">Stall ID:</label>
            <input type="text" name="stall_id" required>
            <label for="stall_owner">Stall Owner Name:</label>
            <input type="text" name="stall_owner" required>
            <label for="stall_description">Stall Description:</label>
            <input type="text" name="stall_description" required>
            <button type="submit" name="allocate_stall">Allocate Stall</button>
        </form>
    <?php endif; ?>
        
    <?php if ($role == "guest"): ?>
        <h3>You do not have permission to allocate or request stalls.</h3>
    <?php endif; ?>

</body>
</html>
