<?php
require ('../model/database.php');
require('../model/user_db.php');
require('../model/previous_bookings_db.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$UID = $_SESSION["userID"];

$previousBookings = getPreviousBookings($UID);

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Parkpal</title>

        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="../css/landing-page.min.css" rel="stylesheet">
        <style>
            div.form
            {
                display: block;
                text-align: center;
            }
            form
            {
                display: inline-block;
                margin-left: auto;
                margin-right: auto;
                text-align: left;
            }
            .bottomCopyright
            {

            }
            span
            {
                font-style: italic;
            }
        </style>
        <!-- Navigation -->
    <nav class="navbar navbar-light static-top" style="background-color: #9CBFE2;">
        <div style="display: flex;">
            <a href='../log_in/logout.php'>
               <img src="../img/logout.png" width="30px" height="30px" alt="" style="margin-top: 5px;"/>

            </a>

            <div class="container">
                <a class="navbar-brand text-white">Parkpal</a>

            </div>

        </div>
        <a href="../account/index.php">
        <img src="../img/myAccount.png" width="40px" height="40px" alt=""/>
        </a>
    </nav>
    <a href="../booking/my_current_bookings.php">
        <img src="../img/backarrow.png" width="50px" height="50px" alt="" style="margin-left:20px;">
    </a>
<center><h1 class="font-weight-light" ><span style="color: #0090FF;">My Previous Bookings</span></h1></center>
    <center><img src="../img/book.png" width="200px" alt=""/></center>
<table class="table-hover table table-borderless" style="color:grey; text-align:center;">
            <tr>
                <th>Date</th>
                <th>Arrival</th>
                <th>Departure</th>
                <th>Confirm</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($previousBookings as $booking) : ?>
            <tr>
            <form method="post" action="make_payment2.php">
                <td><?php echo date('D',strtotime($booking['date'])); ?></td>
                <td><?php echo $booking['arrivalTime']; ?></td>
                <td><?php echo $booking['departureTime']; ?></td>
                <input type="hidden" name = "date" value="<?php echo $booking['date'] ?>" >
<input type="hidden" name = "arrivalTime" value="<?php echo $booking['arrivalTime'] ?>">
<input type="hidden" name = "departureTime" value="<?php echo $booking['departureTime'] ?>">
                <td><input class="btn bg-primary text-white" type="submit" value="Confirm"></td>
                
            </form>
            <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_booking">
                    <input type="hidden" name="bookingId"
                           value="<?php echo $booking['bookingId']; ?>">
                   
                    <input class="btn bg-danger text-white" type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
    </table>
