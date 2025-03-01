
<!DOCTYPE html>
<html>
    <head>
        <title>College DB</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>

        <p>Updated Records</p>

        <table>
            <tr>
                <th>Code</th>
                <th>Title</th>
                <th>Credit</th>
                <th>Year of Study</th>
            </tr>

            <?php
            require 'connection1C.php';

            $record = $pdoObj->query("SELECT * FROM collegedb.subjects")->fetchAll();
            foreach ($record as $row) {
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

    </body>
</html>    

