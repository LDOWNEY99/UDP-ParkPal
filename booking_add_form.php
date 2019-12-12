<!DOCTYPE html>
<?php
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
    <body onload="checkDate()">

        <script>
            function checkDate()
            {

                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth() + 1; //January is 0!

                var yyyy = today.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }
                var today = yyyy + '-' + mm + '-' + dd;
                document.getElementById("date").setAttribute("min", today);
            }

            function time()
            {

                var x = true;
                var time1 = document.getElementById("arrivalTime").value;
                var time2 = document.getElementById("departureTime").value;

                var t1 = time1.split(":");
                var t1h = parseInt(t1[0]);

                var t2 = time2.split(":");
                var t2h = parseInt(t2[0]);


                if (t1h > t2h)
                {
                    alert("arrival time must be before departure time");
                    x = false;
                }
                else if (t1h === t2h)
                {
                     alert("Min one hour between booking times");
                    x = false;
                }
                return x;

            }
        </script>

        <br>
    <center><h1 class="font-weight-light" ><span style="color: #0090FF;">Make a Booking</span></h1></center>
    <center><img src="../img/book.png" width="200px" alt=""/></center>
    <center>
        <h6><a href="previous_bookings.php" class="btn btn-block btn-lg bg-transparent font-weight-light" style="width:200px; color:blue;"> Previous  Bookings </a></h6>
        <form onsubmit="return(time());" action="make_payment.php" method="post">

            <label for="date">Date: </label>
            <input type="date" id="date" name="date" required class="form-control font-weight-light" placeholder="Date" required autofocus><br>

            <label for="arrivalTime">Arrival Time: </label>
            <input type="time" min="07:00" max="21:00"id="arrivalTime" required class="form-control font-weight-light" placeholder="Arrival Time" step="3600" name="arrivalTime"><br>

            <label for="departureTime">Departure Time: </label>
            <input type="time" min="07:00" max="21:00" id="departureTime" required class="form-control font-weight-light" placeholder="Departure Time" step="3600" name="departureTime"><br>

            <label for="saveBooking">Save booking: </label>
            <input type="checkbox" name="saveBooking" value="Yes" />



            <br>
            <br>
            <center>
                <input class="btn btn-block btn-lg btn-primary" type="submit" value="Confirm">
            </center>
        </form>

    </center>
    <br><br>
</body>

</html>

























