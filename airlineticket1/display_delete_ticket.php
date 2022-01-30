<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=newairline', 'jnanesh', 'jnanesh');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$tickets= array();
$stmt = $pdo->query("SELECT * FROM testticket order by user_id");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($tickets, $row);
}

// echo("<pre>");
// print_r($cars_array);
// echo("</pre>");
?>
<html>

<head>
    <style>
        body{
    padding-top: 5%;
    padding-left: 40%;
        }
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
  <h1> TICKETS </h1> 
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>airport</th>
                <th>arrival_time</th>
                <th>depature_time</th>
                <th>des_port</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ind) : ?>
                <tr>
                    <td>
                        <?= $ind["user_id"] ?>
                    </td>
                    <td>
                        <?= $ind["airport"] ?>
                    </td>
                    <td>
                        <?= $ind["arrival_time"] ?>
                    </td>
                    <td>
                        <?= $ind["depature_time"] ?>
                    </td>
                    <td>
                        <?= $ind["dep_port"] ?>
                    </td>
                    <td>
                        <a href=<?= "\"deleteticket.php?user_id=" . $ind["user_id"] . "\""  ?>>Delete <?= $ind["airport"] ?></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>