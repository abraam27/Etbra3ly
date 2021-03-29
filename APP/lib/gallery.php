<?php
require_once '../../config.php';
class Gallery
{
    // property, attrs, fields, member vars
    private $galleryID;
private $campID;
    private $imageName;
    private $imageTmp;
    // behavior, member function, method, action
    public function __construct($campID, $imageName, $imageTmp="", $galleryID="")
    {
        $this->campID = $campID;
        $this->imageName = $imageName;
        $this->imageTmp = $imageTmp;
	$this->galleryID = $galleryID;
    }
    public function addImageToCamp()
    {
        if(is_uploaded_file($this->imageTmp)){
            // rename image
            $this->imageName = time().$this->imageName;
            if(move_uploaded_file($this->imageTmp, "../../upload/".$this->imageName)){
                // get connection
                global $dbh;
                $sql = $dbh->prepare("INSERT INTO gallery(campID, image) VALUES('$this->campID', '$this->imageName')");
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
    public static function deleteImageCamp($campID , $imageName)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM gallery WHERE campID = '$campID' AND image='$imageName'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function deleteAllImagesMyCampID($campID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM gallery WHERE campID = '$campID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function retreiveAllImagesByIdCamp($campID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT image FROM gallery where campID='$campID'");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $imagesData = $sql->fetchAll(PDO::FETCH_ASSOC);
        // convert two dimension to one dimension
        $allImages = null;
        if(is_array($imagesData) && count($imagesData)>0){
            foreach($imagesData as $imageNews):
                $allImages[] = $imageNews['image'];
            endforeach;
        }
        return $allImages;
    }
    public static function retreiveALLImages()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT image FROM gallery ORDER BY galleryID DESC limit 6");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $imagesData = $sql->fetchALL(PDO::FETCH_ASSOC);
        // convert two dimension to one dimension
        $allImages = null;
        if(is_array($imagesData) && count($imagesData)>0){
            foreach($imagesData as $imageNews):
                $allImages[] = $imageNews['image'];
            endforeach;
        }
        return $allImages;
    }
    public static function retreiveFirstImagesOfCamp($campID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT image FROM gallery where campID='$campID' ORDER BY galleryID DESC limit 1");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $imagesData = $sql->fetch(PDO::FETCH_ASSOC);
        // convert two dimension to one dimension
        return $imagesData['image'];
    }
   
}
