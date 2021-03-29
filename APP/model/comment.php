<?php
require_once '../../config.php';
require_once '../../lib/DatabaseModel.php';
class Comment extends DatabaseModel
{
    // property
    protected $commentID;
    protected $comment;
    protected $date;
    protected $visible;
    protected $donorID;
    // table name
    protected static $tableName = "comment";
    // all fields in tabel
    protected $tableFields = array(
        'comment',
        'date',
        'donorID'
    );
    public function __construct($comment, $donorID, $date, $visible="", $commentID="")
    {
        $this->comment = $comment;
        $this->donorID = $donorID;
        $this->date = $date;
	$this->visible = $visible;
        $this->commentID = $commentID;
    }
    public static function retreiveUpdatedComments()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM comment WHERE visible = 1 ORDER BY commentID desc limit 5");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $comments = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }
    public static function retreiveCommentsByDonorID($donorID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM comment WHERE donorID = '$donorID' ORDER BY commentID desc");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $comments = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }
    public static function retreiveCommentsForAdmin()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM comment ORDER BY commentID desc");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $comments = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }
    public static function showComments($commentID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("UPDATE comment SET visible = 1 WHERE campID = '$commentID'");
        // execute sql query
        if($sql->execute()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}