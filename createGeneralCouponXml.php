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
$id = $doc->createElement('id');
$coupon->appendChild($id);
$categoryId = $doc->createElement('category_id');
$coupon->appendChild($categoryId);
$businessId = $doc->createElement('business_id');
$coupon->appendChild($businessId);
$name =  $doc->createElement('name');
$coupon->appendChild($name);
$description = $doc->createElement('description');
$coupon->appendChild($description);
$imageFileName = $doc->createElement('imageFileName');
$doc->save("coupon_data_general.xml");
echo "General coupon XML file was created!<br>";
?>
<div align="center" style="font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif"><a href="mainMenu.php">Return to main menu</a></div></h1>

