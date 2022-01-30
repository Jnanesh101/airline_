<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=newairline', 'jnanesh', 'jnanesh');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();

if (isset($_POST["sign-up"])) 
{
    if (isset($_POST["name"]) && isset($_POST["email_id"]) && isset($_POST["password"])) 
    {
        if (strlen($_POST["name"]) > 0 && strlen($_POST["email_id"]) > 0 && strlen($_POST["password"]) > 0) 
        {
            $sql = "SELECT * FROM USERS where email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ":email" => $_POST["email_id"],
            ));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) 
            {
                //User account already exists
                $_SESSION["status"] = 0;
                $_SESSION["message"] = "Account with this email id already exists";
                header("location: signup.php");
                return;
            } else 
            {
                //Insert User into DB
                $sql = "INSERT INTO USERS (name, email, password) VALUES (:name, :email, :password)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    "name" => $_POST["name"],
                    "email" => $_POST["email_id"],
                    "password" => $_POST["password"],
                ));

                $_SESSION["email"] = $_POST["email_id"];
                $_SESSION["name"] = $_POST["name"];
                $_SESSION["status"] = 1;
                $_SESSION["message"] = "Successfully signed up!";
                header("location: bookticket.php"); 
                return;
            }
        } 
        else {
            $_SESSION["status"] = 0;
            $_SESSION["message"] = "All fields are required";
        }
    } 
    else {
        $_SESSION["status"] = 0;
        $_SESSION["message"] = "All the required fields are not set";
    }
}

/* if (isset($_POST["cancel"])) 
{
    session_destroy();
    header("location: index.php");
    return;
}
*/
?>
<html>

<head>
    <style>
body{
    padding-top: 5%;
    padding-left: 40%;
}
#email{
    padding-top: 20px;
}
#pass{
    padding-top: 20px;
}
        </style>
    
</head>

<body>
    
    <form method="post">
        <div id="name">
        <label for="name">Enter Name</label>
        <input type="text" name="name" id="name" value=<?= isset($_POST["name"]) ? "\"" . $_POST["name"] . "\"" : "" ?>>
        <br>
        </div>
        <div id="email">
        <label for="email_id">Enter Email   </label>
        <input type="text" name="email_id" id="email_id" value=<?= isset($_POST["email_id"]) ? "\"" . $_POST["email_id"] . "\"" : "" ?>>
        <br>
        </div>  
        <div id="pass">
        <label for="password">Enter Password</label>
        <input type="password" name="password" id="password">
        <br>
        </div>
        <input type="submit" name="sign-up" value="Sign Up">
        <br>

        <input type="reset" name="cancel" value="Cancel">
        <br>

        <a href="login.php">Already have an account?</a>
</div>
    </form>
</body>

<script>
    <?php if (isset($_SESSION["message"])) : ?>
        alert(<?= "\"" . $_SESSION["message"] . "\"" ?>);
    <?php endif ?>
    <?php unset($_SESSION["message"]); ?>
   
</script>

</html>