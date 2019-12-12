<!DOCTYPE html>
<?php
require('../model/database.php');
require('../model/user_db.php');
$users = get_users();
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
    <nav class="navbar navbar-light static-top" style="background-color: #E56565;">
        <div style="display: flex;">
            <a href='../log_in/logout.php'>
               <img src="../img/logout.png" width="30px" height="30px" alt="" style="margin-top: 5px;"/>

            </a>

            <div class="container">
                <a class="navbar-brand text-white">Admin</a>

            </div>

        </div>
        <a href="../account/index.php">
        <img src="../img/admin.png" width="40px" height="40px" alt=""/>
        </a>
    </nav>
    <a href="index.html">
        <img src="../img/backarrow.png" width="50px" height="50px" alt="" style="margin-left:20px;">
    </a>
    <body>
        <br>
        <br>
        <br>
    <center><h1 class="font-weight-light"><span style="color: #E56565">All Users</span></h1></center>
    
    <center><img src="../img/admin.png" width="150px"alt=""/></center>
    <table class="table-hover table table-borderless" style="color:grey; text-align:center;">
                <tr>
                    
                    
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Registration</th>
                    <th>Address</th>
                    <th>Phone</th>
                    
                </tr>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['userID']; ?></td>
                        <td><?php echo $user['firstName']; ?></td>
                        <td><?php echo $user['lastName']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['vehicleReg']; ?></td>
                        <td><?php echo $user['address']; ?></td>
                        <td><?php echo $user['phoneNumber']; ?></td>
                        
                    </tr>
               
                <?php endforeach; ?>
            </table>
    


</body>

</html>