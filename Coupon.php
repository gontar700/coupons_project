<?php
/**
 * Created by PhpStorm.
 * User: danielgontar
 * Date: 8/14/2015
 * Time: 1:54 PM
 */
    class Coupon
    {
        private $id;
        private $categoryId;
        private $businessId;
        private $name;
        private $description;
        private $imageFileName;

        function __construct($idVal, $categoryIdVal, $businessIdVal, $nameVal, $descriptionVal,
                             $imageFileNameVal)
        {
            $this->setID($idVal);
            $this->setCategoryId($categoryIdVal);
            $this->setBusinessId($businessIdVal);
            $this->setName($nameVal);
            $this->setDescription($descriptionVal);
            $this->setImageFileNameVal($imageFileNameVal);
        }

        function setId($idVal)
        {
            $idpattern = '/[0-9]{1,9}/';
            if (preg_match($idpattern, $idVal)) // check that it is in correct form
            {
                $idpattern1 = '/[!@#$%^&*()_+~]/'; // another check : that there is not any special charecters
                $idpattern2 = '/[a-z]/';
                if (!preg_match($idpattern1, $idVal) && !preg_match($idpattern2, $idVal)) {
                    $this->id = $idVal;
                } else {
                    throw new DbConnectionException ("idpattern is not correct");
                }
            } else {
                throw new DbConnectionException ("idpattern is not correct");
            }
        }

        function setCategoryId($categoryIdVal)
        {
            $catIdPattern = '/[0-9]{1,9}/';
            if (preg_match($catIdPattern, $categoryIdVal)) // check that it is in correct form
            {
                $catIdPattern1 = '/[!@#$%^&*()_+~]/';
                $catIdPattern2 = '/[a-z]/';
                if (!preg_match($catIdPattern1, $categoryIdVal) /* && !preg_match($catIdPattern2, $categoryIdVal)*/) {
                    $this->categoryId = $categoryIdVal;
                } else {
                    throw new DbConnectionException ("categoryIdVal is not correct");
                }
            } else {
                throw new DbConnectionException ("categoryIdVal is not correct");
            }
        }

        function setBusinessId($businessIdVal)
        {
            $businessIdPattern = '/[0-9]{1,9}/';
            if (preg_match($businessIdPattern, $businessIdVal)) // check that it is in correct form
            {
                $businessIdPattern1 = '/[!@#$%^&*()_+~]/'; // another check : that there is not any special charecters
                $businessIdPattern2 = '/[a-z]/';
                if (!preg_match($businessIdPattern1, $businessIdVal) && !preg_match($businessIdPattern2, $businessIdVal)) {
                    $this->businessId = $businessIdVal;
                } else {
                    throw new DbConnectionException ("businessIdVal is not correct");
                }
            } else {
                throw new DbConnectionException ("businessIdVal is not correct");
            }
        }

        function setName($nameVal)
        {
            $namePattern = '/[a-z]{2,12}/';
            if (preg_match($namePattern, $nameVal)) // check that it is in correct form
            {
                $namePattern1 = '/[!@#$%^&*()_+~]/';
                $namePattern2 = '/[0-9]/';
                if (!preg_match($namePattern1, $nameVal) /* && !preg_match($namePattern2, $nameVal)*/) {
                    $this->name = $nameVal;
                } else {
                    throw new DbConnectionException ("nameVal is not correct");
                }
            } else {
                throw new DbConnectionException ("nameVal is not correct");
            }
        }

        function setDescription($descriptionVal)
        {
            $descriptionPattern = '/[a-z\s]{2,20}/';
            if (preg_match($descriptionPattern, $descriptionVal)) // check that it isn't empty
            {
                $descriptionPattern1 = '/[!@#$%^&*()_+~]/';
                if (!preg_match($descriptionPattern1, $descriptionVal)) {
                    $this->description = $descriptionVal;
                } else {
                    throw new DbConnectionException ("descriptionVal is not correct");
                }
            } else {
                throw new DbConnectionException ("descriptionVal is not correct");
            }
        }

        function setImageFileNameVal($imageFileNameVal)
        {
            $imageFileNamePattern = '/[a-z][._]/';
            if (preg_match($imageFileNamePattern, $imageFileNameVal)) // check that it is in correct form
            {
                $imageFileNamePattern1 = '/[!@#$%^&*()+~]/';
                if (!preg_match($imageFileNamePattern1, $imageFileNameVal)) {
                    $this->imageFileName = $imageFileNameVal;
                } else {
                    throw new DbConnectionException ("imageFileNameVal is not correct");
                }
            } else {
                throw new DbConnectionException ("imageFileNameVal is not correct");
            }
        }

        function getId()
        {
            return $this->id;
        }

        function getCategoryId()
        {
            return $this->categoryId;
        }

        function getBusinessId()
        {
            return $this->businessId;
        }

        function getName()
        {
            return $this->name;
        }

        function getDescription()
        {
            return $this->description;
        }

        function getImageFileNameVal()
        {
            return $this->imageFileName;
        }

        function __toString()
        {
            return "<h2><i><b>The parameters are:</b></i></h2><hr>Id: " . $this->id . "<br>Category Id: " .
            $this->categoryId . "<br>Business Id: " . $this->businessId . "<br>Name: " .
            $this->name . "<br>Description: " . $this->description . "<br>Image file name: " .
            $this->imageFileName . "<hr>";
        }
    }
?>