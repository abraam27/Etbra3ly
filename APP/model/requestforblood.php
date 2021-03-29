<?php
require_once '../../config.php';
require_once '../../lib/DatabaseModel.php';
class RequestForBlood extends DatabaseModel
{
    // property
    protected $requestID;
    protected $name;
    protected $contactNO;
    protected $bloodGroup;
    protected $amount;
    protected $needBloodDate;
    protected $needBloodAddress;
    protected $needBloodDisrict;
    protected $needBloodCity;
    protected $message;
    // table name
    protected static $tableName = "requestforblood";
    // all fields in tabel
    protected $tableFields = array(
        'name',
        'contactNO',
	'bloodGroup',
        'amount',
	'needBloodDate',
        'needBloodAddress',
        'needBloodDisrict',
        'needBloodCity',
        'message'
    );
    public function __construct($name, $contactNO, $bloodGroup, $amount, $needBloodDate, $needBloodAddress, $needBloodDisrict, $needBloodCity, $message,  $requestID="")
    {
        $this->name = $name;
        $this->contactNO = $contactNO;
        $this->bloodGroup = $bloodGroup;
        $this->amount = $amount;
        $this->needBloodDate = $needBloodDate;
        $this->needBloodAddress = $needBloodAddress;
        $this->needBloodDisrict = $needBloodDisrict;
        $this->needBloodCity = $needBloodCity;
        $this->message = $message;
        $this->requestID = $requestID;
    }
    public static function retreiveUpdatedRequests()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM requestforblood WHERE visible = 1 ORDER BY requestforbloodID desc limit 4");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $requests = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $requests;
    }
    public static function retreiveRequestsForAdmin()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM requestforblood ORDER BY requestforbloodID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $requests = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $requests;
    }
    public static function showBloodRequests($requestforbloodID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("UPDATE requestforblood SET visible = 1 WHERE requestforbloodID = '$requestforbloodID'");
        // execute sql query
        if($sql->execute()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}