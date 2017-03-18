<html>
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
try
{
    $couponId = $_POST['couponId'];
    $idpattern = '/\d{1,9}/';
    if (preg_match($idpattern, $couponId)) // check that it is in correct form
    {
        $idpattern1 = '/[!@#$%^&*()_+~]/'; // another check : that there is not any special charecters
        $idpattern2 = '/[a-z]/';
        if (!preg_match($idpattern1, $couponId) && !preg_match($idpattern2, $couponId)) {
            $cleanCouponId = $couponId;
        }
        else
        {
            throw new DbConnectionException ("couponId is not correct1<br>");
        }
    }
    else
    {
        throw new DbConnectionException ("couponId is not correct2<br>");
    }
    $couponCategory = $_POST['categoryId'];
    $catIdPattern = '/[0-9]{1,9}/';
    if (preg_match($catIdPattern, $couponCategory)) // check that it is in correct form
    {
        $catIdPattern1 = '/[!@#$%^&*()_+~]/';
        $catIdPattern2 = '/[a-z]/';
        if (!preg_match($catIdPattern1, $couponCategory) && !preg_match($catIdPattern2, $couponCategory))
        {
            $cleanCouponCategory = $couponCategory;
        }
        else
        {
            throw new DbConnectionException ("couponCategory is not correct <br>");
        }
    }
    else
    {
        throw new DbConnectionException ("couponCategory is not correct <br>");
    }
    $businessId = $_POST['businessId'];
    $businessIdPattern = '/[0-9]{1,9}/';
    if (preg_match($businessIdPattern, $businessId)) // check that it is in correct form
    {
        $businessIdPattern1 = '/[!@#$%^&*()_+~]/'; // another check : that there is not any special charecters
        $businessIdPattern2 = '/[a-z]/';
        if (!preg_match($businessIdPattern1, $businessId) && !preg_match($businessIdPattern2, $businessId))
        {
            $cleanBusinessId = $businessId;
        }
        else
        {
            throw new DbConnectionException ("businessId is not correct <br>");
        }
    }
    else
    {
        throw new DbConnectionException ("businessId is not correct<br>");
    }
    $couponName = $_POST['couponName'];
    $namePattern = '/[a-z]{2,12}/';
    if (preg_match($namePattern, $couponName)) // check that it is in correct form
    {
        $namePattern1 = '/[!@#$%^&*()_+~]/';
        $namePattern2 = '/[0-9]/';
        if (!preg_match($namePattern1, $couponName) /*&& !preg_match($namePattern2, $couponName)*/)
        {
            $cleanCouponName = $couponName;
        }
        else
        {
            throw new DbConnectionException ("couponName is not correct <br>");
        }
    }
    else
    {
        throw new DbConnectionException ("couponName is not correct <br>");
    }
    $couponDescription = $_POST['couponDescription'];
    $descriptionPattern = '/[a-z\s]{2,20}/';
    if (preg_match($descriptionPattern, $couponDescription)) // check that it isn't empty
    {
        $descriptionPattern1 = '/[!@#$%^&*()_+~]/';
        if (!preg_match($descriptionPattern1, $couponDescription)) {
            $cleanCouponDescription = $couponDescription;
        }
        else
        {
            throw new DbConnectionException ("couponDescription is not correct <br>");
        }
    }
    else
    {
        throw new DbConnectionException ("couponDescription is not correct <br>");
    }
    $couponImageFileName = "image_" . $_FILES["file_data"]["name"];
    $imageFileNamePattern = '/[a-z][._]/';
    if (preg_match($imageFileNamePattern, $couponImageFileName)) // check that it is in correct form
    {
        $imageFileNamePattern1 = '/[!@#$%^&*()+~]/';
        if (!preg_match($imageFileNamePattern1, $couponImageFileName)) {
            $cleanCouponImageFileName = $couponImageFileName;
        }
        else
        {
            throw new DbConnectionException ("couponImageFileName is not correct <br>");
        }
    }
    else
    {
        throw new DbConnectionException ("couponImageFileName is not correct <br>");
    }

    $obCouponPlatform = new CouponsPlatformDAO("localhost", "gontar_700", "pboimyYi1", "gontar_couponsdeliveryplatform"); // creating couponsplatformDAO new object
    $obUpdateCoupon = new Coupon($couponId, $couponCategory, $businessId, $couponName, $couponDescription, $couponImageFileName, $obCouponPlatform);
    $obCouponPlatform->updateCoupon($obUpdateCoupon);
    $couponImageFileName = "image_" . $_FILES["file_data"]["name"];
    if (!empty($_FILES["file_data"]["name"]))
    {
        $folder = getcwd() . "/images";
        //var_dump($_FILES["file_data"]["tmp_name"])."<br>";
        if (move_uploaded_file($_FILES["file_data"]["tmp_name"], $folder . "\image_" . $_FILES["file_data"]["name"])) {
            echo "<br>The file was succefully uploaded!<br>";
        } else {
            echo "<br> error with calling move_uploaded_file"."the folder is: "." ".$folder." ".$_FILES["file_data"]["tmp_name"];
        }
    }
    echo "The coupon was updated !<br>";
}
catch (DbConnectionException $e)
{
    echo "<p>" . $e->getmessage();
}
?>
<button id="backBtn" class="btn btn-primary" onclick="back()">Back</button><script>
    function back(){window.location.replace("http://www.danielgontar.com/web_portfolio/coupons_project/updatecoupon.html")}</script></body></html>