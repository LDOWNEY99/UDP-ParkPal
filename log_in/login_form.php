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
                
            a:hover
            {
                text-decoration:none;
            }

        </style>
        <!-- Navigation -->
    <nav class="navbar navbar-light static-top" style="background-color: #9CBFE2;">
        <div class="container">
            <a class="navbar-brand text-white" href="../index.html">Parkpal</a>
            
        </div>
    </nav>

    <main>
        <br>
        <center><h1 class="font-weight-light" ><span style="color: #0090FF;">Login</span></h1></center>
        <center><img src="../img/myAccountHD.png" width="15%" alt=""/></center>
        <center><form action="login.php" method="post" id="index.php">  
                <?php
                $form_error = filter_input(INPUT_GET, "form_error", FILTER_SANITIZE_STRING);
                if (isset($form_error)) {
                    echo $form_error;
                }
                $login_error = filter_input(INPUT_GET, "login_error", FILTER_SANITIZE_STRING);
                if (isset($login_error)) {
                    echo $login_error;
                }
                ?>
                </p>
                <div class="form"> <!--width="20%"-->
                    <label class="font-weight-light" ></label>   
                    <input type="text" name="email" required class="form-control font-weight-light"  placeholder="Email Address"/>

                </div>

                <div class="form">
                    <label class="font-weight-light"></label>
                    <input type="Password" name="password" required class="form-control font-weight-light" placeholder="Password"/> 
                    <br>
                </div>
                <input type="submit" class="btn btn-block btn-lg btn-primary" value="Login"/>
            </form></center>
    </main>

    <aside>
        <br>
        <center><p class="font-weight-light">If you are not already registered then you can <a href="register_form.php">register here.</a></p></cemter>
    </aside>
    <br>
    <br>
    <br>
    <br>
    <br>
</center>
        <center>
<div class="bottomCopyright">

        <div class="col-lg-6 h-100 text-center my-auto">
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
    
        <!--<img src="../img/parkpal.png" width="80px" height="25px" alt=""/>&copy;-->
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
