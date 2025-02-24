<?php
$host = 'localhost';
$dbname = 'collegedb';
$username = 'root';  // Change if necessary
$password = '';      // Change if necessary

try {
    // Establish database connection using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
        // Retrieve and sanitize form data
        $code = trim($_POST["code"]);
        $title = trim($_POST["title"]);
        $credit = intval($_POST["credit"]);
        $yearOfStudy = intval($_POST["year"]);

        // Prepare the SQL statement to insert new record
        $stmt = $pdo->prepare("INSERT INTO subjects (code, title, credit, yearOfStudy) VALUES (:code, :title, :credit, :yearOfStudy)");
        
        // Execute the statement with parameters
        $stmt->execute([
            ':code' => $code,
            ':title' => $title,
            ':credit' => $credit,
            ':yearOfStudy' => $yearOfStudy
        ]);
    }

    // Fetch all records from the database
    $stmt = $pdo->query("SELECT * FROM subjects ORDER BY yearOfStudy, code");
    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Updated Records</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>Updated Records</h2>

<table>
    <tr>
        <th>Code</th>
        <th>Title</th>
        <th>Credit</th>
        <th>Year of Study</th>
    </tr>
    <?php foreach ($subjects as $subject): ?>
    <tr>
        <td><?= htmlspecialchars($subject['code']) ?></td>
        <td><?= htmlspecialchars($subject['title']) ?></td>
        <td><?= htmlspecialchars($subject['credit']) ?></td>
        <td><?= htmlspecialchars($subject['yearOfStudy']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
