<?php
/**
 * Created by PhpStorm.
 * User: danielgontar
 * Date: 8/25/2015
 * Time: 10:44 AM
 */
$doc = new DOMDocument('1.0');
$doc->formatOutput = true;
$coupon = $doc->createElement('coupon');
$doc->appendChild($coupon);
$id = $doc->createElement('id' , '000001');
$coupon->appendChild($id);
$categoryId = $doc->createElement('category_id', '000001');
$coupon->appendChild($categoryId);
$businessId = $doc->createElement('business_id' , '511752677');
$coupon->appendChild($businessId);
$name =  $doc->createElement('name' , 'Free shoko pie');
$coupon->appendChild($name);
$description = $doc->createElement('description' , 'Free shoko pie in big mac meal');
$coupon->appendChild($description);
$imageFileName = $doc->createElement('imageFileName', 'image_mcdonald1.jpg');
$doc->save("coupon_data_specific.xml");
echo "Specific coupon XML file was created!<br>";
?>
<div align="center" style="font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif"><a href="mainMenu.php">Return to main menu</a></div></h1>

