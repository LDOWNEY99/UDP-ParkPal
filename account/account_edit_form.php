<?php
include_once '../model/user_db.php';
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
        <center>
            <h1 class="font-weight-light">
                <span style="color: #0090FF;">Edit Account Details</span>
            </h1>
        </center>
        <br>
        <center>
            <form id="test" style="font-style:italic;" action="index.php" method="post" id="">
                <input type="hidden" name="action" value="edit_account">
                <input type="hidden" name="userID" value="<?php echo $user['userID']; ?>">
                <h6>Email:</h6>
                <input type="input" name="email"
                       required class="form-control font-weight-light" placeholder="Email:" value="<?php echo $user['email']; ?>">
                <br>
                <h6>First Name:</h6>
                <input type="input" name="firstName" required class="form-control font-weight-light" placeholder="First Name" value="<?php echo $user['firstName']; ?>">
                <br>
                <h6>Second Name:</h6> 
                <input type="input" name="lastName" required class="form-control font-weight-light" placeholder="Last Name" value="<?php echo $user['lastName']; ?>">
                <br>
                <h6>Registration:</h6>
                <input type="input" name="vehicleReg" required class="form-control font-weight-light" placeholder="Registration" value="<?php echo $user['vehicleReg']; ?>">
                <br>
                <h6>Address:</h6>
                <input type="input" name="address" required class="form-control font-weight-light" placeholder="Address" value="<?php echo $user['address']; ?>">
                <br>
                <h6>Number:</h6>
                <input type="input" name="phoneNumber" required class="form-control font-weight-light" placeholder="Phone Number" value="<?php echo $user['phoneNumber']; ?>">
                <br>
                <center><input type="submit" class="btn btn-block btn-lg btn-primary"  value="Save Changes"></center>
            </form>

        </center>
        <br>
        </center>
    </main>
