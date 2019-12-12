<?php
include_once '../model/database.php';


$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($email == NULL || $password == NULL) 
{
    $form_error = "Fields cannot be blank";
    header("location: index.php?form_error=" . $form_error);
    exit();
}

$query = 'SELECT userID, email, password 
                FROM users
                WHERE email = :email';
$statement = $db->prepare($query);
$statement->bindParam(':email', $email);
$statement->execute();
$results = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();

if (count($results) > 0 && password_verify($password, $results['password'])) 
{
    
    // Start the session
    session_start();

    $_SESSION['userID'] = filter_var($results['userID'], FILTER_VALIDATE_INT);

    include '../booking/my_current_bookings.php';

    exit;
} 

else 
{
    $errMsg .= 'Login Failed, Incorrect details entered!';
}

if (isset($errMsg)) 
{
    echo "<script type='text/javascript'> alert(" . json_encode($errMsg) . "); window.location=document.referrer;</script>";
}

?>