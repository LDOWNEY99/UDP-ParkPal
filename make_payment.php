<?php
require ('../model/database.php');
require('../model/user_db.php');
require('../model/previous_bookings_db.php');
require('../model/booking_db.php');
//$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if (!isset($_SESSION)) {
    session_start();
}
$UID = $_SESSION["userID"];

$email = get_email($UID);


$date = filter_input(INPUT_POST, "date");
$Atime = filter_input(INPUT_POST, "arrivalTime");
$Dtime = filter_input(INPUT_POST, "departureTime");




if (isset($_POST['saveBooking']) &&
        $_POST['saveBooking'] == 'Yes') {

    $query = "INSERT INTO stored_booking (`bookingId`, `UID`, `date`, `arrivalTime`, `departureTime`) VALUES (' ', :UID, :date, :arrivalTime, :departureTime)";
    $statement = $db->prepare($query);
    $statement->bindValue(":UID", $UID);
    $statement->bindValue(":date", $date);
    $statement->bindValue(":arrivalTime", $Atime);
    $statement->bindValue(":departureTime", $Dtime);
    $statement->execute();
    $statement->closeCursor();
}


$time1 = new DateTime($Atime);
$time2 = new DateTime($Dtime);


$interval = $time1->diff($time2);

$hours = $interval->h;

$price = $hours;



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
    <head>

    </head>
    <body>
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

    <center><form class="form-validation" id="dor_payment_form">
            <br>
            <center><h2 class="font-weight-light">Payment</h2></center>
            <center><img src="../img/shopping-cart.png" width="150px" height="150px" alt=""/></center>
            <hr>
            <center><h5 class="font-weight-light">Breakdown</h5></center>
            <hr>
            <center><h7 class="font-weight-light">Price per Hour : €1</h7></center>
            <center><h7 class="font-weight-light">Hours booked : <?Php echo $hours; ?></h7></center>
            
            <center><h7 class="font-weight-light">Date : <?Php echo $date; ?></h7></center>
            <center><h7 class="font-weight-light">Arrival : <?Php echo $Atime; ?></h7></center>
            
            
            <center><h7 class="font-weight-light">departure : <?Php echo $Dtime; ?></h7></center>
            <hr>

            <center><h5 class="font-weight-light">Price</h5></center>
            <input class ="font-weight-light form-control" style="text-align:center;" type="text" value = "€<?php echo $price ?>" tabIndex="-1" readonly><br><hr>
        </form></center>

    <center>
        <form  class="font-weight-light" action="payment_confirmation.php" style="text-align: center" method="post">
            <input type="hidden" name = "price" value = "<?php echo $price ?>">
            <input type="hidden" name = "email" value="<?php echo $email ?>" >
            <input type="hidden" name = "date" value="<?php echo $date ?>" >
            <input type="hidden" name = "arrivalTime" value="<?php echo $Atime ?>">
            <input type="hidden" name = "departureTime" value="<?php echo $Dtime ?>">


<?php require_once 'configuration.php'; ?>
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"    

                data-image=""
                data-key="<?php echo $publicStripeKey ?>"
                data-email= "<?php echo $email ?>"
                data-currency="EUR"
                data-amount="<?php echo $price . '00' ?>"
                data-name="Parkpal"
                data-description="Book Space"
                data-locale="auto">
            </script>

        </form></center><br>
    <center><form style="text-align: center">
            <button type="button" class ="cancel_button btn btn-block bg-danger text-white"onclick = "window.history.back()"><span>Change Details</span></button>
        </form></center>
</body>