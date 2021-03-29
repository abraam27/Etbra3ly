<?php
require_once '../../config.php';
class Request
{
    // property
    private $requestID;
    private $donorID;
    private $organizationID;
    private $date;
    private $neededBloodGroup;
    private $numberOfBags;
    private $amount;
    private $view;
    private $requestType;
    public function __construct($donorID, $organizationID, $date, $requestType, $amount="", $view="", $neededBloodGroup="",$numberOfBags="", $requestID="")
    {
        $this->donorID = $donorID;
        $this->organizationID = $organizationID;
        $this->date = $date;
        $this->neededBloodGroup = $neededBloodGroup;
        $this->amount = $amount;
        $this->numberOfBags = $numberOfBags;
        $this->view = $view;
        $this->requestType = $requestType;
        $this->requestID = $requestID;
    }
    public function addDonationRequest()
    {
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO request (donorID,organizationID,date,requestType) VALUES ('$this->donorID','$this->organizationID','$this->date','$this->requestType')");
        if($sql->execute()){
            return TRUE;
        }else{
            return false;
        }
    }
    public function addExchangeRequest()
    {
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO request (donorID,organizationID,date,neededBloodGroup,numberOfBags,amount,requestType) VALUES ('$this->donorID','$this->organizationID','$this->date','$this->neededBloodGroup','$this->numberOfBags','$this->amount','$this->requestType')");
        if($sql->execute()){
            return TRUE;
        }else{
            return false;
        }
    }
    public static function deleteRequestByID($requestID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM request WHERE requestID='$requestID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function UpdateRequest()
    {
        global $dbh;
        $sql = $dbh->prepare("Update request SET requestID='$this->requestID', donorID='$this->donorID', organizationID='$this->organizationID', date='$this->date', neededBloodGroup='$this->neededBloodGroup', amount='$this->amount', requestType='$this->requestType'");
        if($sql->execute()){
            return TRUE;
        }else{
            return false;
        }
    }
    public static function UpdateRequestView($requestID)
    {
        global $dbh;
        $sql = $dbh->prepare("Update request SET view = 1 WHERE requestID = '$requestID'");
        if($sql->execute()){
            return TRUE;
        }else{
            return false;
        }
    }
    public static function retrieveAllrequests()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM request");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allrequests = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allrequests;
    }
    public static function retreiveRequestByID($requestID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM request WHERE requestID = '$requestID'");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $request = $sql->fetch(PDO::FETCH_ASSOC);
        return $request;
    }
    public static function retreiveAllRequestsOfOrganization($organizationID,$view = 0)
    {
        if($view == 0){
            // get connection
            global $dbh;
            $sql = $dbh->prepare("SELECT * FROM request WHERE organizationID = '$organizationID' AND view = 0 ORDER BY requestID ASC");
            // execute sql query
            $sql->execute();
            // fetch data to specfic format like associative array
            $request = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $request;
        }else{
            // get connection
            global $dbh;
            $sql = $dbh->prepare("SELECT * FROM request WHERE organizationID = '$organizationID' ORDER BY requestID ASC");
            // execute sql query
            $sql->execute();
            // fetch data to specfic format like associative array
            $request = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $request;
        }
        
    }
    public static function retreiveAllRequestsOfOrganizationByType($organizationID,$requestType,$view = 0)
    {
        if($view == 0){
            // get connection
            global $dbh;
            $sql = $dbh->prepare("SELECT * FROM request WHERE organizationID = '$organizationID' AND requestType = '$requestType' AND view = 0 ORDER BY requestID ASC");
            // execute sql query
            $sql->execute();
            // fetch data to specfic format like associative array
            $request = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $request;
        }else{
            // get connection
            global $dbh;
            $sql = $dbh->prepare("SELECT * FROM request WHERE organizationID = '$organizationID' AND requestType = '$requestType' ORDER BY requestID ASC");
            // execute sql query
            $sql->execute();
            // fetch data to specfic format like associative array
            $request = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $request;
        }
        
    }
    public static function deleteDonorById($donorID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM request WHERE donorID='$donorID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function countRequests($requests)
    {
        $count = 0;
        foreach ($requests as $request) {
            if((strtotime($request['date'])-strtotime(date("d-m-20y")))/(60*60*24) >= 0){
                $count++;
            }
        }
        return $count;
    }
}