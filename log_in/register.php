<?php
//Add the database connection
include_once '../model/database.php';
$valid = TRUE;
//Check for blank input
if (empty(filter_input(INPUT_POST, "email")) || empty(filter_input(INPUT_POST,"firstName")) || empty(filter_input(INPUT_POST,"vehicleReg")) || empty(filter_input(INPUT_POST,"address"))  || empty(filter_input(INPUT_POST,"phoneNumber"))  || empty(filter_input(INPUT_POST,"lastName")) || empty(filter_input(INPUT_POST,"password")) || empty(filter_input(INPUT_POST,"password2"))){
    $form_error = "All form fields must be completed";
header("location: register_form.php?form_error=" . $form_error);
$valid = FALSE;
}
else {
    //Create variables for the information submitted by the user
    $email = filter_input(INPUT_POST, "email");
    $firstName = filter_input(INPUT_POST,"firstName");
    $lastName = filter_input(INPUT_POST,"lastName");
    $address = filter_input(INPUT_POST,"address");
    $phoneNumber = filter_input(INPUT_POST,"phoneNumber");
    $vehicleReg = filter_input(INPUT_POST,"vehicleReg");
    $password1 = filter_input(INPUT_POST,"password");
    $password2 = filter_input(INPUT_POST,"password2");
}


//check valid email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $email_error = "Invalid email, emails must be in the form of: example@example.example"; 
   header("location: register_form.php?email_error=" . $email_error);
    $valid = FALSE;
}
//Check passwords
if ($password1 != $password2){
    $password_error = "Both passwords entered must match.";
    header("location: register_form.php?password_error=" . $password_error);
    $valid = FALSE;
}
//Check length of password
if (strlen($password1) <= 8) {
    $short_pw = "Password must be at least 8 characters long";
    header("location: register_form.php?short_pw=" . $short_pw);
    $valid = FALSE;
}
//check password complexity
$uppercase = preg_match('@[A-Z]@', $password1);
$lowercase = preg_match('@[a-z]@', $password1);
$number = preg_match('@[0-9]@', $password1);

if (!$uppercase || !$lowercase || !$number){
    $password_valid = "Passwords must contain at least one uppercase letter, one lowercase letter and one number.";
    header("location: register_form.php?password_valid=" . $password_valid);
    $valid = FALSE;
    }

//Add user to databse
if ($valid){
    //Hash the password
    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
    //Create the SQL insert statement
    $query = "INSERT INTO users (email, firstName, lastName, vehicleReg, address, phoneNumber, password) VALUES (:email, :firstName, :lastName, :vehicleReg, :address, :phoneNumber, :password)";
    //Use PDO to sanatise the input
    $statement = $db->prepare($query);
    //Bind the variable to the placeholders in the query
    $statement->bindValue(":email", $email);
    $statement->bindValue(":firstName", $firstName);
    $statement->bindValue(":lastName", $lastName);
    $statement->bindValue(":vehicleReg", $vehicleReg); 
    $statement->bindValue(":address", $address); 
    $statement->bindValue(":phoneNumber", $phoneNumber); 
    $statement->bindValue(":password", $hashed_password);
 
    //Add the user to the database
    $statement->execute();
    $statement->closeCursor();

 //   $registration = "You have been registered";
    header("location: index.php");
}