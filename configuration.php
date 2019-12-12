<?php
/* * ************************ You need to set the values below to match your project ************************ */

// localhost website and localhost database
$localHostSiteFolderName = "Stripe_v1";

$localhostDatabaseName = "plusonedata";
$localHostDatabaseHostAddress = "localhost";
$localHostDatabaseUserName = "root";
$localHostDatabasePassword = "";



// remotely hosted website and remotely hosted database       /* you will need to get the server details below from your host provider */
$serverWebsiteName = "http://mysql02.comp.dkit.ie/D00123456"; /* use this address if hosting website on the college students' website server */

$serverDatabaseName = "D00123456";
$serverDatabaseHostAddress = "mysql02.comp.dkit.ie";         /* use this address if hosting database on the college computing department database server */
$serverDatabaseUserName = "D00123456";
$serverDatabasePassword = "ABCD";




$useLocalHost = true;      /* set to false if your database is NOT hosted on localhost */

$useTestStripeKey = true;

if ($useTestStripeKey == true)
{
    $privateStripeKey = "sk_test_0NCGIDjLGHnUY0FFdWMoRTUg"; 
    $publicStripeKey = "pk_test_9Mlvrlq3uIh4FI9xACReVtRF"; 
}
else // live system
{
    $privateStripeKey = "place your private live key"; 
    $publicStripeKey = "place your public live key here"; 
}

/* * ******************************* WARNING                                 ******************************** */
/* * ******************************* Do not modify any code BELOW this point ******************************** */

if ($useLocalHost == true)
{
    $siteName = "http://localhost/" . $localHostSiteFolderName;
    $dbName = $localhostDatabaseName;
    $dbHost = $localHostDatabaseHostAddress;
    $dbUsername = $localHostDatabaseUserName;
    $dbPassword = $localHostDatabasePassword;
}
else  // using remote host
{
    $siteName = $serverWebsiteName;
    $dbName = $serverDatabaseName;
    $dbHost = $serverDatabaseHostAddress;
    $dbUsername = $serverDatabaseUserName;
    $dbPassword = $serverDatabasePassword;
}


chmod("configuration.php", 0600); // do not allow anyone to view this file
?>