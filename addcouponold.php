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
        include $classname . ".php";
    }

    try {
        $couponId = $_POST['couponId'];
        $idpattern = '/[0-9]{1,9}/';
         if (preg_match($idpattern, $couponId)) // check that it is in correct form
         {
             $idpattern1 = '/[!@#$%^&*()_+~]/'; // another check : that there is not any special charecters
             $idpattern2 = '/[a-z]/';
             if (!preg_match($idpattern1, $couponId) && !preg_match($idpattern2, $couponId)) {
                 $cleanCouponId = $couponId;
             } else {
                 throw new DbConnectionException ("$couponId is not correct coupon id <br>");
             }
         } else {
             throw new DbConnectionException ("$couponId is not correct coupon id <br>");
         }
        $couponCategory = $_POST['categoryId'];
        $catIdPattern = '/[0-9]{1,9}/';
        if (preg_match($catIdPattern, $couponCategory)) // check that it is in correct form
        {
            $catIdPattern1 = '/[!@#$%^&*()_+~]/';
            $catIdPattern2 = '/[a-z]/';
            if (!preg_match($catIdPattern1, $couponCategory) && !preg_match($catIdPattern2, $couponCategory)) {
                $cleanCouponCategory = $couponCategory;
            } else {
                throw new DbConnectionException ("$couponCategory is not correct category id <br>");
            }
        } else {
            throw new DbConnectionException ("$couponCategory is not correct category id <br>");
        }
        $businessId = $_POST['businessId'];
        $businessIdPattern = '/[0-9]{1,9}/';
        if (preg_match($businessIdPattern, $businessId)) // check that it is in correct form
        {
            $businessIdPattern1 = '/[!@#$%^&*()_+~]/'; // another check : that there is not any special charecters
            $businessIdPattern2 = '/[a-z]/';
            if (!preg_match($businessIdPattern1, $businessId) && !preg_match($businessIdPattern2, $businessId)) {
                $cleanBusinessId = $businessId;
            } else {
                throw new DbConnectionException ("$businessId is not correct business id <br>");
            }
        } else {
            throw new DbConnectionException ("$businessId is not correct business id<br>");
        }
        $couponName = $_POST['couponName'];
        $namePattern = '/[a-z]{2,12}/';
        if (preg_match($namePattern, $couponName)) // check that it is in correct form
        {
            $namePattern1 = '/[!@#$%^&*()_+~]/';
            $namePattern2 = '/[0-9]/';
            if (!preg_match($namePattern1, $couponName) /*&& !preg_match($namePattern2, $couponName)*/)  {
                $cleanCouponName = $couponName;
            } else {
                throw new DbConnectionException ("$couponName is not correct coupon name <br>");
            }
        } else {
            throw new DbConnectionException ("$couponName is not correct coupon name <br>");
        }
        $couponDescription = $_POST['couponDescription'];
        $descriptionPattern = '/[a-z\s]{2,20}/';
        if (preg_match($descriptionPattern, $couponDescription)) // check that it isn't empty
        {
            $descriptionPattern1 = '/[!@#$%^&*()_+~]/';
            if (!preg_match($descriptionPattern1, $couponDescription)) {
                $cleanCouponDescription = $couponDescription;
            } else {
                throw new DbConnectionException ("$couponDescription is not correct coupon description <br>");
            }
        } else {
            throw new DbConnectionException ("$couponDescription is not correct coupon description <br>");
        }
        $couponImageFileName = "image_" . $_FILES["file_data"]["name"];
        $imageFileNamePattern = '/[a-z][._]/';
        if (preg_match($imageFileNamePattern, $couponImageFileName)) // check that it is in correct form
        {
            $imageFileNamePattern1 = '/[!@#$%^&*()+~]/';
            if (!preg_match($imageFileNamePattern1, $couponImageFileName)) {
                $cleanCouponImageFileName = $couponImageFileName;
            } else {
                throw new DbConnectionException ("$couponImageFileName is not correct image name <br>");
            }
        } else {
            throw new DbConnectionException ("$couponImageFileName is not correct image name <br>");
        }
        //ini_set('upload_tmp_dir','/home/gontar/domains/danielgontar.com/public_html/web_portfolio/coupons_project/tmp');
        // echo ini_get('upload_tmp_dir');
        //var_dump($_SERVER['DOCUMENT_ROOT']);
      $upload_dir = $_SERVER['DOCUMENT_ROOT']."/web_portfolio/coupons_project/images";
       // var_dump($_FILES['file_data']);
       // echo ($_FILES['file_date']['error']);
        if (is_writable($upload_dir)) {

            if (!empty($_FILES["file_data"]["tmp_name"]) && is_dir($upload_dir)) {
                echo $_FILES["file_data"]["tmp_name"];
                if (move_uploaded_file($_FILES["file_data"]["tmp_name"], $upload_dir. $_FILES["file_data"]["name"]))
                {
                    echo "<br>The file was succefully uploaded!";
                }
                else
                {
                    echo "<br> error with calling move_uploaded_file";
                }
            }
            else
            {
             //   echo "<br>tmp_name is empty";
            }
        } else {
           // echo 'Upload old is not writable or old doesn\'t exist';
        }
        $obCoupon = new Coupon ($cleanCouponId, $cleanCouponCategory, $cleanBusinessId, $cleanCouponName, $cleanCouponDescription, $cleanCouponImageFileName);
        $obCouponPlatform = new CouponsPlatformDAO("localhost", "gontar_700", "pboimyYi1", "gontar_couponsdeliveryplatform"); // creating couponsplatformDAO new object
        $obCouponPlatform->addCoupon($obCoupon);
        $obCouponPlatform->closeConnection();
        echo "Coupon was add !<p>";
    }
    catch (DbConnectionException $e) {
        echo "<p>" . $e->getmessage();
    }
?>
<button id="backBtn" class="btn btn-primary" onclick="back()">Back</button><script>function back(){window.location.replace("http://www.danielgontar.com/web_portfolio/coupons_project/addcoupon.html")}</script></body></html>


