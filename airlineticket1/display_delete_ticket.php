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








<?php 
session_start() ;

$servername = "localhost";
$username = "gaurav";
$password = "airline";
$dbname = "airplanesystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$tickets= array();


$dest = $_POST['pickp'] ;
echo $dest ;

$towhere = $_POST['desti'] ;
echo $towhere;
$sql = "SELECT `aroute`.airplane_id,`airplane`.a_name,AVG(`rating`.`stars`)as stars,`aroute`.`pickup_location`,`aroute`.to_location FROM `aroute`,`airplane`,`rating` where `aroute`.pickup_location ='$dest' and `aroute`.to_location ='$towhere' and `aroute`.`airplane_id`=`airplane`.`airplane_id` and `aroute`.`airplane_id`=`rating`.`airplane_id`";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($tickets, $row);
    echo "id: " . $row["airplane_id"]. "<button name='getTickets' value='getTickets'>Get Tickets</button><br>"; 
  }
} else {
  echo "0 results";
}?>
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
                <th>AId</th>
                <th>Airplane Name</th>
                <th>pick up desti</th>
                <th>to where</th>
                <th>Rating</th>
                <th>Get Tickets</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ind) : ?>
                <tr>
                    <td>
                        <?= $ind["airplane_id"]?>
                    </td>
                    <td>
                        <?= $ind["a_name"] ?>
                    </td>
                    <td>
                        <?= $ind["pickup_location"] ?>
                    </td>
                    <td>
                        <?= $ind["to_location"] ?>
                    </td>
                    <td>
                        <?= $ind["stars"]?>
                    </td>
                    <td>
                    
                    <a href=<?= "\"select_seat.php?airplane_id=" . $ind["airplane_id"] . "\""  ?>><button>Get Ticket</button></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
  <?php $conn->close(); ?>



V
