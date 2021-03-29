<?php
require_once '../../config.php';
class Donor
{
    // property, attrs, fields, member vars
    private $SSN;
    private $donorID;
    private $firstName;
    private $middleName;
    private $lastName;
    private $dateOfBirth;
    private $gender;
    private $district;
    private $city;
    private $phoneNo;
    private $email;
    private $bloodGroup;
    private $username;
    private $password;
    private $lastDonationDate;
    private $photo;
    private $photoTmp;
    private $bloodBankID;
    // behavior, member function, method, action
    public function __construct($SSN, $firstName, $middleName, $lastName, $dateOfBirth, $gender, $district, $city, $phoneNo, $email, $bloodGroup, $lastDonationDate="", $username="", $password="", $photo="", $photoTmp="", $bloodBankID="", $donorID="")
    {
        $this->SSN = $SSN;
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->gender = $gender;
        $this->district = $district;
        $this->city = $city;
        $this->phoneNo = $phoneNo;
        $this->email = $email;
        $this->bloodGroup = $bloodGroup;
        $this->username = $username;
        $this->password = $password;
        $this->lastDonationDate = $lastDonationDate;
        $this->photo = $photo;
        $this->photoTmp = $photoTmp;
        $this->bloodBankID = $bloodBankID;
        $this->donorID = $donorID;
    }
    public function addDonor()
    {   
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM donor WHERE username='$this->username' ");
        $sql->execute();
        $donor = $sql->fetch(PDO::FETCH_ASSOC);
        if(is_numeric($donor['donorID'])){
            return false;
        }else{
            if(is_uploaded_file($this->photoTmp)){
                // rename image
                $this->photo = time() . $this->photo;
                if(move_uploaded_file($this->photoTmp, "../../upload/".$this->photo)){
                    // get connection
                    global $dbh;
                    $sql = $dbh->prepare("INSERT INTO donor(SSN, firstName, middleName, lastName, dateOfBirth, gender, district, city, phoneNo, email, bloodGroup, username, password, photo) VALUES('$this->SSN', '$this->firstName', '$this->middleName', '$this->lastName', '$this->dateOfBirth', '$this->gender', '$this->district', '$this->city', '$this->phoneNo', '$this->email', '$this->bloodGroup', '$this->username', '$this->password', '$this->photo')");
                    if($sql->execute()){
                        return $dbh->lastInsertId();;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                global $dbh;
                $sql = $dbh->prepare("INSERT INTO donor(SSN, firstName, middleName, lastName, dateOfBirth, gender, district, city, phoneNo, email, bloodGroup, username, password) VALUES('$this->SSN', '$this->firstName', '$this->middleName', '$this->lastName', '$this->dateOfBirth', '$this->gender', '$this->district', '$this->city', '$this->phoneNo', '$this->email', '$this->bloodGroup', '$this->username', '$this->password')");
                if($sql->execute()){
                    return $dbh->lastInsertId();;
                }else{
                    return false;
                }
            }
        }
        
    }
    public function addDonorByBloodBank()
    {
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO donor(SSN, firstName, middleName, lastName, dateOfBirth, gender, district, city, phoneNo, email, bloodGroup) VALUES('$this->SSN', '$this->firstName', '$this->middleName', '$this->lastName', '$this->dateOfBirth', '$this->gender', '$this->district', '$this->city', '$this->phoneNo', '$this->email', '$this->bloodGroup')");
        if($sql->execute()){
            return $dbh->lastInsertId();
        }else{
            return false;
        }
    }
    public static function deleteDonorById($donorID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM donor WHERE donorID='$donorID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function updateLastDonationDateOfDonor($donorID,$lastDonationDate)
    {
        global $dbh;
        $sql = $dbh->prepare("UPDATE donor SET lastDonationDate = '$lastDonationDate' WHERE donorID='$donorID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function updateDonorByBloodBankID($donorID,$bloodBankID)
    {
        global $dbh;
        $sql = $dbh->prepare("UPDATE donor SET bloodBankID = '$bloodBankID' WHERE donorID='$donorID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function updateDonorInfoByBloodBankID($donorID)
    {
        global $dbh;
        $sql = $dbh->prepare("UPDATE donor SET SSN='$this->SSN', firstName='$this->firstName', middleName='$this->middleName', lastName='$this->lastName', dateOfBirth='$this->dateOfBirth', gender='$this->gender', district='$this->district', city='$this->city', phoneNo='$this->phoneNo', email='$this->email', bloodGroup='$this->bloodGroup', lastDonationDate='$this->lastDonationDate' WHERE donorID='$donorID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function updateDonorById($donorID)
    {   
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM donor WHERE username='$this->username' ");
        $sql->execute();
        $donor = $sql->fetch(PDO::FETCH_ASSOC);
        if(!is_numeric($donor['donorID']) || $this->donorID == $donor['donorID']){
            if( $this->photo == ""){
                global $dbh;
                $sql = $dbh->prepare("UPDATE donor SET SSN='$this->SSN', firstName='$this->firstName', middleName='$this->middleName', lastName='$this->lastName', dateOfBirth='$this->dateOfBirth', gender='$this->gender', district='$this->district', city='$this->city', phoneNo='$this->phoneNo', email='$this->email', bloodGroup='$this->bloodGroup', photo='$this->photo', username='$this->username', password='$this->password', lastDonationDate='$this->lastDonationDate' WHERE donorID='$donorID'");
                if($sql->execute()){
                    return true;
                }else{
                    return false;
                }
            }else{
                if(is_uploaded_file($this->photoTmp)){
                    // rename image
                    $this->photo = time(). $this->photo;
                    if(move_uploaded_file($this->photoTmp, "../../upload/".$this->photo)){
                        // get connection
                        global $dbh;
                        $sql = $dbh->prepare("UPDATE donor SET SSN='$this->SSN', firstName='$this->firstName', middleName='$this->middleName', lastName='$this->lastName', dateOfBirth='$this->dateOfBirth', gender='$this->gender', district='$this->district', city='$this->city', phoneNo='$this->phoneNo', email='$this->email', bloodGroup='$this->bloodGroup', photo='$this->photo', username='$this->username', password='$this->password', lastDonationDate='$this->lastDonationDate' WHERE donorID='$donorID'");
                        if($sql->execute()){
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                }
            }
        }
    }
    public static function retreiveDonorById($donorID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM donor WHERE donorID='$donorID'");
        $sql->execute();
        $donor = $sql->fetch(PDO::FETCH_ASSOC);
        return $donor;
    }
    public static function retreiveAllDonors()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM donor ORDER BY donorID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $alldonors = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $alldonors;
    }
    public static function retreiveAllDonorsByBloodBankID($bloodBankID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM donor WHERE bloodBankID='$bloodBankID'");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $alldonors = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $alldonors;
    }
    //web service
    public static function retreiveAllDonorsByCity($city)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM donor WHERE city = '$city' ORDER BY donorID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $alldonors = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $alldonors;
    }
    //web service
    public static function retreiveAllDonorsByBloodGroup($bloodGroup)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM donor WHERE bloodGroup = '$bloodGroup' ORDER BY donorID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $alldonors = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $alldonors;
    }
    public static function retreiveAllDonorsByBloodGroupAndCity($bloodGroup,$city)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM donor WHERE bloodGroup = '$bloodGroup' AND city = '$city' ORDER BY donorID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $alldonors = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $alldonors;
    }
    
    public static function countDonorsByBloodGroup($bloodGroup)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM donor WHERE bloodGroup='$bloodGroup' AND bloodBankID is null");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $donors = $sql->fetchAll(PDO::FETCH_ASSOC);
        return count($donors);
    }
    public static function DonorLogin($name,$password)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * from donor WHERE (username = '$name' or email = '$name') And password = '$password'");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if(is_array($fetch)){
            return $fetch["donorID"];
        }else{
            return FALSE;
        }
    }
}