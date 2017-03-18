<?php
/**
 * Created by PhpStorm.
 * User: danielgontar
 * Date: 8/14/2015
 * Time: 1:48 PM
 */
    class CouponsPlatformDAO
    {
        private $mysqli; // referance to msqli object
        private $serverName;
        private $username;
        private $password;
        private $dbName;
        function __construct($serverName, $username, $password, $dbName)
        {
            $this->setServerName($serverName);
            $this->setUserName($username);
            $this->setPassword($password);
            $this->setDbName($dbName);
            $this->setConnection($serverName, $username, $password, $dbName);
        }
        function setServerName($serverName)
        {
            if (isset($serverName)) {
                $this->serverName = $serverName;
            }
        }
        function setUserName($username)
        {
            if (isset($username)) {
                $this->username = $username;
            }
        }
        function setPassword($password)
        {
            if (isset($password)) {
                $this->password = $password;
            }
        }
        function setDbName($dbName)
        {
            if (isset($dbName)) {
                $this->dbName = $dbName;
            }
        }
        function setConnection($server_name, $username, $password, $db_name)
        {
            $this->mysqli = new mysqli($server_name, $username, $password, $db_name);
            if (isset($this->mysqli->connect_error))
            {
                throw new dbConnectionException ("<br>" . $this->mysqli->connect_error);
            }
        }
        function getAdminUserName()
        {
            $query = "SELECT `username` From `admin`";
            if (!$this->mysqli->query($query, MYSQLI_STORE_RESULT)) // the query didn't succeeded
            {
                throw new DbConnectionException ("<br>Getting admin's username didn't succeed");
            } else {
                return $this->mysqli->query($query, MYSQLI_STORE_RESULT);
            }
        }
        function getAdminPassword()
        {
            $query = "SELECT `password` From `admin`";
            if (!$this->mysqli->query($query, MYSQLI_STORE_RESULT)) // the query didn't succeeded
            {
                throw new DbConnectionException ("<br>Getting admin's password didn't succeed");
            } else {
                return $this->mysqli->query($query, MYSQLI_STORE_RESULT);
            }
        }
        function getCoupon($id)
        {
            $query = "SELECT `id`, `category_id`, `business_id`, `name`, `description`, `image_file_name` FROM `coupons` WHERE `id` = '$id'";
            if (!$this->mysqli->query($query, MYSQLI_STORE_RESULT)) // the query didn't succeeded
            {
                throw new DbConnectionException ("<br>select query didn't succeed");
            } else {
                return $this->mysqli->query($query, MYSQLI_STORE_RESULT);
            }
        }
        function addCoupon(coupon $ob)
        {
            $id = $ob->getId();
            $categoryId = $ob->getCategoryId();
            $businessId = $ob->getBusinessId();
            $name = $ob->getName();
            $description = $ob->getDescription();
            $imageFileName = $ob->getImageFileNameVal();
            $stmt = $this->mysqli->prepare("INSERT INTO `gontar_couponsdeliveryplatform`.`coupons` VALUES (?, ?, ?, ?, ?, ?)");

            $stmt->bind_param('iiisss', $idCol, $categoryIdCol, $businessIdCol, $nameCol, $descriptionCol, $imageFileNameCol);
            $idCol = $id;
            $categoryIdCol = $categoryId;
            $businessIdCol = $businessId;
            $nameCol = $name;
            $descriptionCol = $description;
            $imageFileNameCol = $imageFileName;
            $stmt->execute();
            /* old insert query method
            $query = "INSERT INTO `couponsdeliveryplatform`.`coupons` (`id`, `category_id`, `business_id`, `name`, `description`, `image_file_name`)
                     VALUES ('$id', '$categoryId','$businessId','$name','$description','$imageFileName')";
            if(!$this->mysqli->query($query)) // the query didn't succeeded
            {
                throw new DbConnectionException ("<br>Insert query didn't succeed");
            }*/
        }
        function getCoupons()
        {
            $query = "SELECT * FROM `coupons`";
            return $this->mysqli->query($query, MYSQLI_STORE_RESULT);
        }
        function updateCoupon(Coupon $ob)
        {
            $id = $ob->getId();
            $categoryId = $ob->getCategoryId();
            $businessId = $ob->getBusinessId();
            $name = $ob->getName();
            $description = $ob->getDescription();
            $imageFileName = $ob->getImageFileNameVal();
            $queryTest = "SELECT * FROM `coupons` WHERE `id` = $id";
            $idTest = $this->mysqli->query($queryTest)->fetch_row()[0];
            if (!isset($idTest)){
                throw new DbConnectionException ("<br>There is no such coupon for update<p>");
            }
            $query = "UPDATE `coupons` SET `category_id`='$categoryId',`business_id`='$businessId',`name`='$name',`description`='$description',`image_file_name`='$imageFileName' WHERE `id` = $id";
            if (!$this->mysqli->query($query)) // the query didn't succeed
            {
                throw new DbConnectionException ("<br>Update query didn't succeed");
            }
        }
        function deleteCoupon($id){
            $query = "DELETE FROM `coupons` WHERE `id` = '$id'";
            if (!$this->mysqli->query($query)) // the query didn't succeeded
            {
                throw new DbConnectionException ("<br>Delete query didn't succeed");
            }
            else
            {
              //  header('location: http://www.danielgontar.com/web_portfolio/coupons_project/deletecoupon.php');
            }
        }
        function readCoupon()
        {
            $query = "SELECT `id`,`name`,`description` FROM `coupons`";
            return $this->mysqli->query($query, MYSQLI_STORE_RESULT);
        }
        function closeConnection()
        {
            $this->mysqli->close();
        }
    }
?>