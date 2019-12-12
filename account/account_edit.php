<?php
session_start();
include_once '../model/database.php';
include_once '../model/user_db.php';


$userID = $_SESSION["userID"];
$email = filter_input(INPUT_POST, 'email');
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$vehicleReg = filter_input(INPUT_POST, 'vehicleReg');
$address = filter_input(INPUT_POST, 'address');
$phoneNumber = filter_input(INPUT_POST, 'phoneNumber');

$query = 'UPDATE users SET 
                email = :email,
                firstName = :firstName,
                lastName = :lastName,
                vehicleReg = :vehicleReg,
                address = :address,
                phoneNumber = :phoneNumber
                WHERE userID = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":firstName", $firstName);
    $statement->bindValue(":lastName", $lastName);
    $statement->bindValue(":vehicleReg", $vehicleReg); 
    $statement->bindValue(":address", $address); 
    $statement->bindValue(":phoneNumber", $phoneNumber); 
    $statement->bindValue(':userID', $userID);
    $statement->execute();
    $statement->closeCursor();
    
    
    include_once 'account_list.php';
?>

<!--<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/landing-page.css" rel="stylesheet" type="text/css"/>
        <link href="css/landing-page.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        Your account has been edited! <a href="../log_in/loggedin.php">Exit</a>

    </div>
</body>
</html>-->

