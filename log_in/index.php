<?php
require('../model/database.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) 
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) 
    {
        $action = 'login_form';
    }
}

if ($action == 'login_form') 
{
    include('login_form.php');
}

?>

