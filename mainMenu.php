<html>
<head><title>Welcome to Daniel Gontar's coupon platform </title>
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
<body>
<?php
session_start();
echo "<div style='color: blue'>welcome back ".$_SESSION['username']."</div>" ?>
<h1 style="text-align: center">Please choose your operation</h1>
<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src=
        "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"
        integrity=
        "sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7"
        crossorigin="anonymous"></script>
<div class="btn-group">
    <button type="button" class="btn btn-secondary
            dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        File
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="getcoupons.php">Get all coupons</a>
        <a class="dropdown-item" href="getcoupon.html">Get one coupon</a>
        <a class="dropdown-item" href="addcoupon.html">Add new coupon</a>
        <a class="dropdown-item" href="updatecoupon.html">Update coupon</a>
        <a class="dropdown-item" href="deletecoupon.php">Delete coupon</a>
        <a class="dropdown-item" href="couponsCsv.php">Create CSV or JSON files</a>
    </div>
</div>
<div class="col-sm-6">
    <img src="images/couponMenu.jpg" class="img-fluid" alt="Responsive image" >
</div>
<p></p>
    <button type="submit" class="btn btn-primary" onclick="back()">Back</button>
    <script>function back(){window.location.replace("http://www.danielgontar.com/web_portfolio/coupons_project/")}</script>
</body>
</html>
