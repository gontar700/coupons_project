<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to Daniel Gontar's coupon platform</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=
    "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css"
          integrity=
          "sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd"
          crossorigin="anonymous">
</head>
</html>
<?php
function __autoload($classname)
{
    include $classname.".php";
}


$ob = new CouponsPlatformDAO("localhost", "gontar_700", "pboimyYi1", "gontar_couponsdeliveryplatform"); // creating couponsplatformDAO new object

$result = $ob->readCoupon();
$vec = []; // array storage
$pos = 0;
foreach ($result as $row)
{
    $vec[$pos] = $row;
    $pos++;
}
$fp1 = fopen('data.csv','w'); // csv
foreach ($vec as $rows)
{
    fputcsv($fp1,$rows);
    fwrite($fp1,"\r\n"); // next line
}
fclose($fp1);
$json = json_encode($vec);
$fp2 = fopen('data.json','w'); // json
fwrite($fp2,$json);
fclose($fp2);

echo "<h1 style=\"text-align: center\">CSV and JSON Files have been created</h1>";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src=
        "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"
        integrity=
        "sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7"
        crossorigin="anonymous"></script>
<div style="position: absolute; left: 50%; class="btn-group">
    <button type="button" class="btn btn-secondary
            dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" style="alignment: center">
        File
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="data.csv">Download coupons table as CSV file</a>
        <a class="dropdown-item" href="data.json">Download coupons table as JSON file</a>
    </div>
<p>
    <p>
    <button type="submit" class="btn btn-primary" onclick="back()" style="position:absolute; left: 7%">Back</button>
    <script>function back(){window.location.replace("mainMenu.php")}</script>

</div>



