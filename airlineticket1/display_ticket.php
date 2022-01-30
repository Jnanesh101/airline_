<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=newairline', 'jnanesh', 'jnanesh');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$tickets = array();
$stmt = $pdo->query("SELECT * FROM testticket");
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
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>USER Id</th>
                <th>air_port</th>
                <th>arrival_time</th>
                <th>departure_time</th>
                <th>dest_port</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $tobj) : ?>
                <tr>
                    <td>
                        <?php echo ($tobj["user_id"]); ?>
                    </td>
                  <td>
                        <?php echo ($tobj["airport"]); ?>
                    </td>
                 <td>
                        <?= $tobj["arrival_time"] ?>
                    </td>
                    <td>
                        <?= $tobj["depature_time"] ?>
                    </td>
                    <td>
                        <?= $tobj["dep_port"] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>