<?php
require('../model/booking_db.php');

$stripeToken = ltrim(rtrim(filter_input(INPUT_POST, "stripeToken", FILTER_SANITIZE_STRING)));
if (empty($stripeToken))
{
    echo 'stripe token';
    exit();
}

$price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_FLOAT);
if (!isset($price))
{
    if (!filter_var($price, FILTER_VALIDATE_INT))
    {
        echo 'price';
        exit();
    }
}

require_once 'configuration.php';
// make stripe payment
require_once('./Stripe/init.php');
\Stripe\Stripe::setApiKey($privateStripeKey);
try
{
    $charge = \Stripe\Charge::create(array(
                "amount" => $price."00",
                "currency" => "eur",
                "card" => $stripeToken,
                "description" => "Stripe Sales Example")
    );
}
catch (Stripe_CardError $e)
{
    echo("Your card has been declined.<br>Error Details: " . $e . "<br><br><a href='index.html'>Click here to continue</a>");
    die();
}
catch (Exception $e)
{
    echo("Your card has been declined.<br>Error Details: " . $e . "<br><br><a href='index.html'>Click here to continue</a>");
    die();
}
// end of Stripe payment code

include_once '../model/database.php';

$date = filter_input(INPUT_POST, "date");
$Atime = filter_input(INPUT_POST, "arrivalTime");
$Dtime = filter_input(INPUT_POST, "departureTime");
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$UID = $_SESSION["userID"];

$email = get_email($UID);

$query = "INSERT INTO booking (UID, date, arrivalTime, departureTime) VALUES (:UID, :date, :arrivalTime, :departureTime)";
$statement = $db->prepare($query);
$statement->bindValue(":UID", $UID);
$statement->bindValue(":date", $date);
$statement->bindValue(":arrivalTime", $Atime);
$statement->bindValue(":departureTime", $Dtime);
$statement->execute();
$statement->closeCursor();


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
            body
            {
                text-align:center;
            }
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
<body>
<center><div class="main-content" class="center">

    <form class="form-validation" id="dor_payment_form">
        <br><br>
        <center><h1 class="font-weight-light" style="color:#0090FF;">Order Confirmed</h1></center>
        <center><h6 class="font-weight-light">#000001</h6></center>
        <center><img src="../img/qrHD.png" alt=""/></center>
        <center><h3 class="font-weight-light"></h3></center>
    <br>
    <br>

    <h3 class="font-weight-light">Your payment is confirmed. Thank you for your order.</h3></center>
    <center><a href="../booking/my_current_bookings.php" class="btn btn-block btn-lg bg-primary text-white" style="width:200px;">View Bookings</a></center>
    </form>

    </div> </center>
</body>

<?php 
// send confirmation email
$subject = "Stripe Example";
$comment = "Your payment is confirmed. Thank you for your order.";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//mail($email, $subject, $comment, $headers);
?>
</html>