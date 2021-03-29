<?php
require_once '../../lib/DatabaseModel.php';
class Report extends DatabaseModel
{
    // property
    protected $reportID;
    protected $title;
    protected $details;
    protected $deadline;
    protected $foundationID;
    // table name
    protected static $tableName = "report";
    // all fields in tabel
    protected $tableFields = array(
        'title',
        'details',
        'deadline',
        'foundationID'
    );
    public function __construct($title, $details, $deadline, $foundationID, $reportID="")
    {
        $this->title = $title;
        $this->details = $details;
		$this->deadline = $deadline;
        $this->foundationID = $foundationID;
        $this->reportID = $reportID;
    }
    public static function retreiveReportsForAdmin()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM report ORDER BY reportID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allreports = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allreports;
    }
    public static function readReport($reportID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("UPDATE report SET view = 1 WHERE reportID = '$reportID'");
        // execute sql query
        if($sql->execute()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}