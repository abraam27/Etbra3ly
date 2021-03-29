<?php
require_once '../../lib/DatabaseModel.php';
class Event extends DatabaseModel
{
    // property
    protected $eventID;
    protected $title;
    protected $content;
	protected $date;
    protected $time;
	protected $address;
    protected $district;
    protected $city;
	protected $country;
    protected $moreDetails;
	protected $foundationID;
    // table name
    protected static $tableName = "event";
    // all fields in tabel
    protected $tableFields = array(
        'title',
        'content',
        'date',
        'time',
        'address',
        'district',
        'city',
        'moreDetails',
        'foundationID'
    );
    public function __construct($title, $content, $date, $time, $address, $district, $city, $moreDetails, $foundationID,  $eventID="")
    {
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->time = $time;
        $this->address = $address;
        $this->district = $district;
        $this->city = $city;
        $this->moreDetails = $moreDetails;
        $this->foundationID = $foundationID;
        $this->eventID = $eventID;
    }
    public static function retreiveEventsForAdmin()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM event ORDER BY eventID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allevents = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allevents;
    }
    public static function retreiveUpdatedEvents()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM event WHERE view = 1 ORDER BY eventID ASC limit 5");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allevents = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allevents;
    }
    public static function readEvent($eventID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("UPDATE event SET view = 1 WHERE eventID = '$eventID'");
        // execute sql query
        if($sql->execute()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}