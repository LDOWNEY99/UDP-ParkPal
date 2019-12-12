<?php
require('../model/database.php');
require('../model/booking_db.php');
require('../model/user_db.php');
require('../model/previous_bookings_db.php');
$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) 
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) 
    {
        $action = 'show_current_bookings';
    }
}

if ($action == 'booking_add_form') 
{
    include('booking_add_form.php');
}

if ($action == 'show_current_bookings')
{
    include('my_current_bookings.php');
}

if ($action == 'delete_booking') 
{
    $bookingId = filter_input(INPUT_POST, 'bookingId', FILTER_VALIDATE_INT);
    
        delete_booking($bookingId);
    
} 



