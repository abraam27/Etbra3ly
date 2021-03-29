<?php
require_once '../../config.php';
class Organization
{
    // property, attrs, fields, member vars
    private $organizationID;
    private $name;
    private $address;
    private $district;
    private $city;
    private $phone1;
    private $phone2;
    private $email;
    private $username;
    private $password;
    private $type;
    private $logo;
    private $logoTmp;
    // behavior, member function, method, action
    public function __construct($name, $address, $district, $city, $phone1, $phone2, $email, $username, $password, $type, $logo, $logoTmp, $organizationID="")
    {
        $this->name = $name;
        $this->address = $address;
        $this->district = $district;
        $this->city = $city;
        $this->phone1 = $phone1;
        $this->phone2 = $phone2;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->type = $type;
        $this->logo = $logo;
        $this->logoTmp = $logoTmp;
        $this->organizationID = $organizationID;
    }
    public function addOrganization()
    {
        if(is_uploaded_file($this->logoTmp)){
            // rename image
            $this->logo = time() . $this->logo;
            if(move_uploaded_file($this->logoTmp, "../../upload/".$this->logo)){
                // get connection
                global $dbh;
                $sql = $dbh->prepare("INSERT INTO organization(name, address, district, city, phone1, phone2, email, username, password, type, logo) VALUES('$this->name', '$this->address', '$this->district', '$this->city', '$this->phone1', '$this->phone2', '$this->email', '$this->username', '$this->password', '$this->type', '$this->logo')");
                if($sql->execute()){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public static function deleteOrganizationById($organizationID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM bloodbank WHERE organizationID='$organizationID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function updateOrganiztionById()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM organization WHERE username='$this->username' ");
        $sql->execute();
        $organization = $sql->fetch(PDO::FETCH_ASSOC);
        if(!is_numeric($organization['organizationID']) || $this->organizationID == $organization['organizationID']){
            if($this->logo == ""){
                global $dbh;
                $sql = $dbh->prepare("UPDATE organization SET name='$this->name', address='$this->address', district='$this->district', city='$this->city', phone1='$this->phone1', phone2='$this->phone2', email='$this->email', username='$this->username', password='$this->password', type='$this->type' WHERE organizationID='$this->organizationID'");
                if($sql->execute()){
                    return true;
                }else{
                    return false;
                }
            }
            elseif(is_uploaded_file($this->logoTmp)){
                // rename image
                $this->logo = time() . $this->logo;
                if(move_uploaded_file($this->logoTmp, "../../upload/".$this->logo)){
                    // get connection
                    global $dbh;
                    $sql = $dbh->prepare("UPDATE organization SET name='$this->name', address='$this->address', district='$this->district', city='$this->city', phone1='$this->phone1', phone2='$this->phone2', email='$this->email', username='$this->username', password='$this->password', type='$this->type', logo = '$this->logo' WHERE organizationID='$this->organizationID'");
                    if($sql->execute()){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return FALSE;
        }
        
    }
    public static function retreiveOrganizationById($organizationID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM organization WHERE organizationID='$organizationID'");
        $sql->execute();
        $organization = $sql->fetch(PDO::FETCH_ASSOC);
        return $organization;
    }
    public static function retreiveAllOrganizations($type)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM organization WHERE type='$type'");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allOrganizations = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allOrganizations;
    }
    public static function retreiveAllOrganizationsInCity($type,$city)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM organization WHERE type='$type' AND city='$city'");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allOrganizations = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allOrganizations;
    }
    public static function organizationLogin($username,$password,$type)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * from organization WHERE username = '$username' AND password = '$password' AND type = '$type'");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if(is_array($fetch)){
            return $fetch["organizationID"];
        }else{
            return FALSE;
        }
    }
}