<?php
/**
 * Created by PhpStorm.
 * User: danielgontar
 * Date: 8/14/2015
 * Time: 1:51 PM
 */
function __autoload($classname)
{
    include $classname.".php";
}
class Business
{
    private $id;    // business id , H.P (HEBREW)
    private $name;
    private $street;
    private $number;
    private $city;
    private $zip;
    private $telephone;
    private $email;
    private $website;
    private $latitude;
    private $longtitude;

    function __construct($idVal, $nameNal, $streetVal, $numberVal, $cityVal,
                                 $zipVal, $telephoneVal, $emailVal, $websiteVal, $latitudeVal,
                                 $longtitudeVal)
    {
        $this->setId($idVal);
        $this->setName($nameVal);
        $this->setStreet($streetVal);
        $this->setNumber($numberVal);
        $this->setCity($cityVal);
        $this->setZip($zipVal);
        $this->setTelephone($telephoneVal);
        $this->setEmail($emailVal);
        $this->setWebsite($websiteVal);
        $this->setLatitude($latitudeVal);
        $this->setLongtitude($longtitudeVal);
    }

    function setId($idval)
    {
        $idPattern = '/[0-9]{8,9}/';
        If (preg_match($idPattern, $idVal)) // check that it is in correct form
        {
            $this->id = $idVal;
        }
        Else
        {
            throw new DbConnectionException ("$idval is not correct");
        }
    }

    function setName($nameVal)
    {
        if (isset($nameVal)) // check that nameval is not empty
        {
            $this->name = $nameVal;
        }
        Else
        {
            throw new DbConnectionException ("$idval is not correct");
        }
    }
    function setStreet($streetVal)
    {
        if (isset($streetVal)) // check that nameval is not empty
        {
            $this->street = $streetVal;
        }
        Else
        {
            throw new DbConnectionException ("$streetVal is not correct");
        }
    }

    function setNumber($numberVal)
    {
        $numPattern = '/[0-9]{1}/';
        If (preg_match($numPattern, $numberVal))
        {
            $this->number = $numberVal;
        }
        Else
        {
            throw new DbConnectionException ("$numberVal is not correct");
        }
    }

    function setCity($cityVal)
    {
        if (isset($cityVal)) // check that cityval is not empty
        {
            $this->city = $cityVal;
        }
        Else
        {
                    throw new DbConnectionException ("$cityVal is not correct");
        }
    }

    function setZip($zipVal)
    {
        $zipPattern = '/[0-9]{5,6}/';
        If (preg_match($zipPattern, $zipVal))
        {
            $this->zip = $zipVal;
        }
        Else
        {
            throw new DbConnectionException ("$zipVal is not correct");
        }
    }
    function setTelephone($telephoneVal)
    {
        $telPattern = '/[0]{1}[2,3,4,8]{1}-[0-9]{7}/';
        If (preg_match($telPattern, $telephoneVal))
        {
            $this->telephone = $telephoneVal;
        }
        Else
        {
            throw new DbConnectionException ("$zipVal is not correct");
        }
    }
    function setEmail($emailVal)
    {
        $emailPattern = '/@/';
        If (preg_match($emailPattern, $emailVal))
        {
            $this->email = $emailVal;
        }
        Else
        {
            throw new DbConnectionException ("$emailVal is not correct");
        }
    }
    function setWebsite($websiteVal)
            {
                $this->website = $websiteVal;
            }
    function setLatitude($latitudeVal)
    {
        $latPattern = '/[0-9]{3}/';
        If (preg_match($latPattern, $latitudeVal))
        {
            $this->latitude = $latitudeVal;
        }
        Else
        {
            echo "Please enter latitude in correct form";
        }
    }
    function setLongtitude($longtitudeVal)
    {
        $longPattern = '/[0-9]{3}/';
        If (preg_match($longPattern, $longtitudeVal))
                {
                    $this->longtitude = $longtitudeVal;
                }
        Else
        {
            echo "Please enter longtitude in correct form";
        }
    }
    function getId()
    {
        return $this->id;
    }
    function getName()
    {
        return $this->name;
    }
    function getStreet()
    {
        return $this->street;
    }
    function getNumber()
    {
        return $this->number;
    }
    function getCity()
    {
        return $this->city;
    }
    function getZip()
    {
        return $this->zip;
    }
    function getTelephone()
    {
        return $this->telephone;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getWebsite()
    {
        return $this->website;
    }
    function getLatitude()
    {
        return $this->latitude;
    }
    function getLongtitude()
    {
        return $this->longtitude;
    }
    function __toString()
    {
        Return "<h2><i><b>The parameters are:</b></i></h2><hr>Id: " . $this->id . "<br>Name: " .
        $this->name . "<br>Street: " . $this->street . "<br>Number: " .
        $this->number . "<br>City: " . $this->city . "<br>Zip: " .
        $this->zip . "<br>Telephone: " . $this->telephone . "<br>Email: " .
        $this->email . "<br>Website: " . $this->website . "<br>Latitude: " .
        $this->latitude . "<br>Longtittude " . $this->longtitude;
    }
}
?>