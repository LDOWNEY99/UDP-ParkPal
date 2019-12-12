<?php
require('../model/database.php');
require('../model/booking_db.php');
require('../model/user_db.php');
//include('../lib/full/qrlib.php'); 
//include('../phpqrcode/phpqrcode.php');

if (!isset($_SESSION)) {
    session_start();
}
$bookings = get_bookings($_SESSION["userID"]);
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
        <link href="../css/important.css" rel="stylesheet" type="text/css"/>
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
            tr
            {
                margin-left:100px !important;
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
    <main>
        <br>
        <center><h1 class="font-weight-light" ><span style="color: #0090FF;">My Bookings</span></h1></center>
        <center><img src="../img/book.png" width="200px" alt=""/></center>
        <center>
                    <center><div class="col-12 col-md-3">
                <p>
                    <!--a href ="log_in" for this button -->
                <center><button type="submit" class="btn  btn-lg btn-primary"><a href="../booking/booking_add_form.php" style="color:white;" width="20%">Make a Booking</a></button></center>

            </div>
        </center>
        <section>
            <!-- display a table of bookings -->
          
            <table class="table-hover table table-borderless" style="color:grey; text-align:center;">
                <tr>
                    <th>View</th>
                    <th>Booking ID</th>
                    <th>Date</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Cancel</th>
                   
                </tr>
                <?php foreach ($bookings as $booking) : ?>
      
                    <tr>
                        <td><a href="../QR/QRView.php"><img src="../img/qr.png" width="30px" alt=""/></a></td>
                        <td><?php echo $booking['bookID']; ?></td>
                        <td><?php echo $booking['date']; ?></td>
                        <td><?php echo $booking['arrivalTime']; ?></td>
                        <td><?php echo $booking['departureTime']; ?></td>
                        <td><a href="#"><img src="../img/cancel.png" width="30px" alt=""/></a></td>
                    </tr>
               
                <?php endforeach; ?>
            </table>
           
        </section>
        </center>

          <br>
        <br><br><br><br><br><br><br><br>
    </main>