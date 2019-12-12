<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getPreviousBookings($UID)
{
    global $db;
    $query = "SELECT * FROM stored_booking WHERE UID = :UID";
$statement = $db->prepare($query);
$statement->bindValue(":UID", $UID);
$statement->execute();
$previousBookings = $statement->fetchAll();
$statement->closeCursor();
return $previousBookings;
}

function delete_booking($bookingId) {
    global $db;
    $query = 'DELETE FROM stored_booking
              WHERE bookingId = :bookingId';
    $statement = $db->prepare($query);
    $statement->bindValue(':bookingId', $bookingId);
    $statement->execute();
    $statement->closeCursor();
}