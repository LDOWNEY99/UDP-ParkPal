<?php
function get_bookings($UID) {
    global $db;
    $query = 'SELECT * FROM booking WHERE UID = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(":userID", $UID);
    $statement->execute();
    $bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $bookings;
}


function get_email($UID){
    global $db;
    $query = 'SELECT `email` FROM `users` WHERE `userID` = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(":userID", $UID);
    $statement->execute();
    $email2 = $statement->fetchAll();
    $statement->closeCursor();
    foreach ($email2 as $e)
{
    $email =  $e['email'];
}
    
    return $email;
    
}


function get_bookings_admin() {
    global $db;
    $query = 'SELECT * FROM booking ORDER BY date';
    $statement = $db->prepare($query);
    $statement->execute();
    $bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $bookings;
}
