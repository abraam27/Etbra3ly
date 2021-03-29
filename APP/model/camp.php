<?php
require_once '../../config.php';
require_once '../../lib/DatabaseModel.php';
class Camp extends DatabaseModel
{
    // property
    protected $campID;
    protected $name;
    protected $address;
    protected $district;
    protected $city;
    protected $date;
    protected $time;
    protected $moreDetails;
    protected $hospitalID;
    // table name
    protected static $tableName = "camp";
    // all fields in tabel
    protected $tableFields = array(
        'name',
        'address',
	'district',
        'city',
        'date',
	'time',
        'moreDetails',
	'hospitalID'
    );
    public function __construct($name, $address, $district, $city, $date, $time, $moreDetails, $hospitalID,  $campID="")
    {
        $this->name = $name;
        $this->address = $address;
	$this->district = $district;
        $this->city = $city;
	$this->date = $date;
        $this->time = $time;
	$this->moreDetails = $moreDetails;
        $this->hospitalID = $hospitalID;
        $this->campID = $campID;
    }
    public static function retreiveTheHospitalCamps($hospitalID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM camp WHERE hospitalID = '$hospitalID'");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allCamps = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allCamps;
    }
    public static function retreiveUpdatedCamps()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM camp WHERE visible = 1 ORDER BY campID DESC limit 4");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allCamps = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allCamps;
    }
    public static function retreiveAllCamps()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM camp WHERE visible = 1 ORDER BY campID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allCamps = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allCamps;
    }
    public static function retreiveAllCampsForAdmin()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM camp ORDER BY campID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allCamps = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allCamps;
    }
    public static function campShow($campID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("UPDATE camp SET visible = 1 WHERE campID = '$campID'");
        // execute sql query
        if($sql->execute()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}