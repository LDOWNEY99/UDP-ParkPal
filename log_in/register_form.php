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
                text-align: left;
            }
            form
            {
                width:15%;

            }
            span
            {
                font-style: italic;
            }

            a:hover
            {
                text-decoration:none;
            }
        </style>
    <main>
        <!-- Navigation -->
        <nav class="navbar navbar-light static-top" style="background-color: #9CBFE2;">
            <div class="container">
                <a class="navbar-brand text-white" href="../index.html">Parkpal</a>

            </div>

        </nav>
        <a href="index.php">
            <img src="../img/backarrow.png" width="50px" height="50px" alt="" style="margin-left:20px;">
        </a>


        <center> <h1 class="font-weight-light" ><span style="color: #0090FF;">Register your account</span></h1></center>
        <center> <h6 class="font-weight-light" ><span style="color: #778899;">Please fill out all the fields below and press register to create your account, simple as that!</span></h6></center>
        <div id ="addForm">
            <center> <form action="register.php" method="post" id="register_form">
                    <?php
                    $form_error = filter_input(INPUT_GET, "form_error", FILTER_SANITIZE_STRING);
                    if (isset($form_error)) {
                        echo $form_error;
                    }
                    ?>
                    <?php
                    $email_error = filter_input(INPUT_GET, "email_error", FILTER_SANITIZE_STRING);
                    if (isset($email_error)) {
                        echo $email_error;
                    }
                    ?>

                    <center>
                        <div class="form">
                            <label class="font-weight-light"></label>   
                            <input type="text" name="email" required class="form-control font-weight-light" placeholder="Email Address"/> 
                        </div>
                        <div class="form">     
                            <label class="font-weight-light"></label>
                            <input type="text" name="firstName" required class="form-control font-weight-light" placeholder="First Name"/>
                        </div>
                        <div class="form">
                            <label class="font-weight-light"></label>
                            <input type="text" name="lastName" required class="form-control font-weight-light" placeholder="Last Name"/>
                        </div>
                        <div class="form">
                            <label class="font-weight-light"></label>
                            <input type="text" name="vehicleReg" required class="form-control font-weight-light" placeholder="Vehicle Registration"/>
                        </div>
                        <div class="form">
                            <label class="font-weight-light"></label>
                            <input type="text" name="address" required class="form-control font-weight-light" placeholder="Address"/>
                        </div>
                        <div class="form">
                            <label class="font-weight-light"></label>
                            <input type="text" name="phoneNumber" required class="form-control font-weight-light" placeholder="Phone Number"/>
                        </div>
                        <div class="form">
                            <label class="font-weight-light"></label>
                            <input type="Password" name="password" required class="form-control font-weight-light" placeholder="Password"/>
                        </div>
                    </center>
                    <?php
                    $short_pw = filter_input(INPUT_GET, "short_pw", FILTER_SANITIZE_STRING);
                    if (isset($short_pw)) {
                        echo $short_pw;
                    }
                    ?>
                    <?php
//                $password_valid = filter_input(INPUT_GET, "password_valid", FILTER_SANITIZE_STRING);
//                if (isset($password_valid)) {
//                    echo $password_valid;
//                }
//                
                    ?>

                    <center>
                        <label class="font-weight-light"></label>
                        <input type="Password" name="password2" required class="form-control font-weight-light" placeholder="Confirm Password"/>
                    </center>
                    <?php
                    $password_error = filter_input(INPUT_GET, "password_error", FILTER_SANITIZE_STRING);
                    if (isset($password_error)) {
                        echo $password_error;
                    }
                    ?>
                    </p>   
                    <label>&nbsp;</label>
                    <input class="btn btn-block btn-lg btn-primary" type="submit" value="Register"/>
                </form> 
        </div></center>
    <br>
    <br>
    <center>            <div class="col-lg-6 h-100 text-center my-auto">
            <ul class="list-inline mb-2">
                <li class="list-inline-item">
                    <a href="../contact.html" class="font-weight-light">Contact us</a>
                </li>
                <li class="list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                    <a href="../about.html" class="font-weight-light">About us</a>
                </li>
                <li class="list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                    <a href="../hours.html" class="font-weight-light">Operating Hours</a>
                </li>
            </ul>

        </div>

    </center>
</main>