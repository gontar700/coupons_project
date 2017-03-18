<?php
function __autoload($classname)
{
    include $classname.".php";
}
function deleteCoupon($id)
{
    $ob = new CouponsPlatformDAO("localhost", "gontar_700", "pboimyYi1", "gontar_couponsdeliveryplatform");
    $ob->deleteCoupon($id);
    return "Coupon number: ".$id." has been deleted";
}
if(isset($_GET['id']))
{
    echo deleteCoupon(trim($_GET['id']));
}
?>

