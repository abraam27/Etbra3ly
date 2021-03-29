<?php
require_once '../../config.php';
require_once '../../lib/DatabaseModel.php';
class BloodRequest extends DatabaseModel
{
    // property
    protected $bloodrequestID;
    protected $neededOrganizationID;
    protected $donatedOrganizationID;
    protected $bloodGroup;
    protected $amount;
    protected $numberOfBags;
    protected $date;
    // table name
    protected static $tableName = "bloodrequest";
    // all fields in tabel
    protected $tableFields = array(
        'neededOrganizationID',
        'donatedOrganizationID',
	'bloodGroup',
        'amount',
	'numberOfBags',
        'date'
    );
    public function __construct($neededOrganizationID, $donatedOrganizationID, $bloodGroup, $amount, $numberOfBags, $date, $bloodrequestID="")
    {
        $this->neededOrganizationID = $neededOrganizationID;
        $this->donatedOrganizationID = $donatedOrganizationID;
        $this->bloodGroup = $bloodGroup;
        $this->amount = $amount;
        $this->numberOfBags = $numberOfBags;
        $this->date = $date;
        $this->bloodrequestID = $bloodrequestID;
    }
    public static function retreiveAllBloodRequests($donatedOrganizationID,$view = 0)
    {
        if($view == 0){
            // get connection
            global $dbh;
            $sql = $dbh->prepare("SELECT * FROM bloodrequest WHERE view = 0 and donatedOrganizationID = '$donatedOrganizationID' ORDER BY bloodrequestID ASC");
            // execute sql query
            $sql->execute();
            // fetch data to specfic format like associative array
            $requests = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $requests;
        }else{
            // get connection
            global $dbh;
            $sql = $dbh->prepare("SELECT * FROM bloodrequest WHERE donatedOrganizationID = '$donatedOrganizationID' ORDER BY bloodrequestID ASC");
            // execute sql query
            $sql->execute();
            // fetch data to specfic format like associative array
            $requests = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $requests;
        }
        
    }
    public static function updateView($bloodrequestID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("UPDATE bloodrequest SET view = 1 WHERE bloodrequestID = '$bloodrequestID'");
        // execute sql query
        if($sql->execute()){
            return TRUE;
        }else{
            return FALSE;
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