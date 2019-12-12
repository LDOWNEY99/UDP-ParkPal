<?php
require('../model/database.php');
require('../model/user_db.php');



$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_account_details';
    }
}

if ($action == 'show_account_details') {
    include 'account_list.php'; 
} 

if ($action == 'show_edit_form') {
    include 'account_edit_form.php'; 
} 

if ($action == 'edit_account')
{
    include 'account_edit.php';
}
