<?php
require_once '../../config.php';
require_once '../../lib/DatabaseModel.php';
class AttendCamp extends DatabaseModel
{
    // property
    protected $campID;
    protected $donorID;
    // table name
    protected static $tableName = "attendcamp";
    // all fields in tabel
    protected $tableFields = array(
        'campID',
        'donorID'
    );
    public function __construct($campID, $donorID)
    {
        $this->campID = $campID;
        $this->donorID = $donorID;
    }
    public static function retreiveAllDonorIDsAttendTheCamp($campID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT donorID FROM attendcamp WHERE campID = '$campID'");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allDonors = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allDonors;
    }
    public static function deleteCampDonors($campID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM attendcamp WHERE campID = '$campID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function retreiveAllCampsAttendByTheDonor($donorID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM attendcamp WHERE donorID = '$donorID' ORDER BY campID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allCamps = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allCamps;
    }
}