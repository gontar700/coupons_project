<?php
/**
 * Created by PhpStorm.
 * User: danielgontar
 * Date: 8/14/2015
 * Time: 1:58 PM
 */
    interface ICouponsDAO
    {
        function getCoupon($id);
        function addCoupon(Coupon $ob);
        function getCoupons();
        function updateCoupon(Coupon $ob);
        function getCouponCsvFormat();
    }
?>