<?php
require_once '../../config.php';
class Process
{
    // property
    private $processID;
    private $donorID;
    private $organizationID;
    private $donatedBloodBagID;
    private $neededBloodBagID;
    private $date;
    private $processType;
    
    public function __construct($donorID, $organizationID, $donatedBloodBagID, $date, $processType, $neededBloodBagID = "" ,  $processID="")
    {
        $this->donorID = $donorID;
        $this->organizationID = $organizationID;
        $this->donatedBloodBagID = $donatedBloodBagID;
        $this->date = $date;
        $this->processType = $processType;
        $this->neededBloodBagID = $neededBloodBagID;
        $this->processID = $processID;
    }
    public function addDonationProcess()
    {
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO process (donorID,organizationID,donatedBloodBagID,date,processType) VALUES ('$this->donorID','$this->organizationID','$this->donatedBloodBagID','$this->date','$this->processType')");
        if($sql->execute()){
            return TRUE;
        }else{
            return false;
        }
    }
    public function addExchangeProcess()
    {
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO process (donorID,organizationID,donatedBloodBagID,neededBloodBagID,date,processType) VALUES ('$this->donorID','$this->organizationID','$this->donatedBloodBagID','$this->neededBloodBagID','$this->date','$this->processType')");
        if($sql->execute()){
            return TRUE;
        }else{
            return false;
        }
    }
    public static function deleteProcessByID($processID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM process WHERE processID='$processID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function UpdateProcess()
    {
        global $dbh;
        $sql = $dbh->prepare("Update process SET processID='$this->processID', donorID='$this->donorID', organizationID='$this->organizationID', donatedBloodBagID='$this->donatedBloodBagID', neededBloodBagID='$this->neededBloodBagID', date='$this->date', processType='$this->processType'");
        if($sql->execute()){
            return TRUE;
        }else{
            return false;
        }
    }
    public static function retrieveAllProcesses()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM process");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allprocesses = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allprocesses;
    }
    public static function retreiveProcessByID($processID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM process WHERE processID = '$processID'");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $process = $sql->fetch(PDO::FETCH_ASSOC);
        return $process;
    }
    public static function retrieveDonorIDByBloodBagID($bloodBagID,$processType)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT *  FROM process WHERE donatedBloodBagID ='$bloodBagID' AND processType='$processType'");
        if($sql->execute()){
            $donationProcess = $sql->fetch(PDO::FETCH_ASSOC);
            return $donationProcess['donorID'];
        }else{
            return false;
        }
    }
    public static function retrieveProcessesByDonorID($donorID)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT *  FROM process WHERE donorID ='$donorID' ORDER BY processID DESC");
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    public static function deleteDonorById($donorID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM process WHERE donorID='$donorID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
}