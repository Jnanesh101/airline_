<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=newairline', 'jnanesh', 'jnanesh');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$valid_request = false;
$message = "";
$tickets = array();

if (isset($_GET["user_id"])) {
    $sql = "SELECT * FROM testticket where user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":user_id" => $_GET["user_id"]));
    $tickets = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($tickets) {
        $valid_request = true;
        // Record can be deleted   database
    } else {
        $message = "Car details not found for " . htmlentities($_GET["user_id"]);
    }
} else {
    $message = "Invalid Request URL - ID not found.";
}

if ($valid_request) {
    // Deleting
    $sql = "DELETE FROM testticket where user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":user_id" => $_GET["user_id"]));
    $message = "Deleted ticket " . $tickets["airport"] . " with ID " . $tickets["user_id"];
    header("location: display_delete_ticket.php");
    return;
}
echo ("<pre>");
print_r($_GET);
echo ("</pre>");
?>
<html>

<head></head>

<body>
    <?php if ($valid_request) : ?>
        <h1 style="color: blue;"><?= $message ?></h1>
    <?php else : ?>
        <h1 style="color: red;"><?= $message ?></h1>
    <?php endif ?>
    

</body>

</html>