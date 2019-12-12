<?php
function get_users() {
    global $db;
    $query = 'SELECT * FROM users
              ORDER BY userID';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}


function get_user($userID) {
    global $db;
    $query = 'SELECT * FROM users
              WHERE userID = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(":userID", $userID);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}
