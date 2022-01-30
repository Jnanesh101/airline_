

<?php
session_start();
if (isset($_POST["cancel"])) {
   
session_start();
session_destroy();

header("location: signup.php");
return;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
    padding-top: 5%;
    padding-left: 40%;
}
.booking{
padding-top: 10px;
}
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>welecome <?= $_SESSION["name"]  ?></h1>
    <form action=''>
    <div class="booking"><input type="text" placeholder="select boarding location"></div>
    <div class="booking"><input type="text" placeholder="select your destination"></div>
    <div class="booking"><input type='date' placeholder="When do you want to go"></div>
    <div class="booking"><label for="ClassType1">Choose a Class Type:</label>
    <select name="ClassType" id="ClassType">
    <option value="CLASS">Class</option> 
    <option value="BuisnessClass">BuisnessClass</option>
    <option value="FirstClass">First Class</option>
    <option value="PremiumEconomy">Premium Economy</option>
    <option value="Economy">Economy</option>
    </select>
    </div>
    <span class="booking"><input type='submit'></div>
    <button>Reset info</button></span>
    <div class="booking"><button class='random_button'>Select Random Information</button></div>
    <input type="submit" name="cancel" value="Cancel">
        <br>
    </form>
</body>
</html> 