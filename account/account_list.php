<?php
if (!isset($_SESSION)) {
    session_start();
}
$user = get_user($_SESSION["userID"]);
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
            tr
            {
                margin-left:100px !important;
            }
            #test
            {
                width:15%;
            }
            h6
            {
                font-style:italic;
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
    
    <main>
        <center>
            <h1 class="font-weight-light">
                <span style="color: #0090FF;">My Account Details</span>
            </h1>
        </center>
        <br>
        <center>
            <h6>Email:</h6>
            <span id="test" required class="form-control font-weight-light"><?php echo $user['email']; ?></span>
            <br>
            <h6>First Name:</h6>
            <span id="test" required class="form-control font-weight-light"><?php echo $user['firstName']; ?></span>
            <br>
            <h6>Second Name:</h6>
            <span id="test" required class="form-control font-weight-light"><?php echo $user['lastName']; ?></span>
            <br>
            <h6>Registration:</h6>
            <span id="test" required class="form-control font-weight-light"><?php echo $user['vehicleReg']; ?></span>
            <br>
            <h6>Address:</h6>
            <span id="test" required class="form-control font-weight-light"><?php echo $user['address']; ?></span>
            <br>
            <h6>Number:</h6>
            <span id="test" required class="form-control font-weight-light"><?php echo $user['phoneNumber']; ?></span>
            <br>
            <form id="test" style="font-style:italic;"  action="index.php" method="post" id="">

                <input type="hidden" name="action" value="show_edit_form">
                <center><input type="submit" class="btn btn-block btn-lg btn-primary" value="Edit details"></center>
            </form>
        </center>
        <br>
    </main>
