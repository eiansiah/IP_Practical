<?php
require "connection.php";

$data = $conn->query("SELECT * FROM subjects")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
    <p>Updated records:</p>

    <table>
        <tr>
            <th>Code</th>
            <th>Title</th>
            <th>Credit</th>
            <th>Year of study</th>
        </tr>

        <?php
        foreach ($data as $row) {
            echo "
                    <tr>
                        <td>
                            {$row['code']}
                        </td>
                        <td>
                            {$row['title']}
                        </td>
                        <td>
                            {$row['credit']}
                        </td>
                        <td>
                            {$row['yearOfStudy']}
                        </td>
                    </tr>
                ";
        }
        ?>
    </table>

    <br>
    <br>
    <a href="add_subject.php">Add subject</a>
</body>

</html>