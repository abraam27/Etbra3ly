<?php
    require_once 'AdminSession.php';
    require_once '../../lib/organization.php';
    require_once '../../model/camp.php';
    require_once '../../lib/gallery.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in=2;
?>
<!-- form style -->
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-light.css?3.3.5398"/>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5398" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<style type="text/css">
                .form-label-left{
                                width:150px;
                }
                .form-line{
                                padding-top:12px;
                                padding-bottom:12px;
                }
                .form-label-right{
                                width:150px;
                }
                .form-all{
                                width:700px;
                                color:#555 !important;
                                font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
                                font-size:15px;
                }
                .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
                                color: false;
                }

</style>

<style type="text/css" id="form-designer-style">
                /* Injected CSS Code */
/*PREFERENCES STYLE*/
                .form-all {
                  font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, Tahoma, sans-serif, sans-serif;
                }
                .form-all .qq-upload-button,
                .form-all .form-submit-button,
                .form-all .form-submit-reset,
                .form-all .form-submit-print {
                  font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, Tahoma, sans-serif, sans-serif;
                }
                .form-all .form-pagebreak-back-container,
                .form-all .form-pagebreak-next-container {
                  font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, Tahoma, sans-serif, sans-serif;
                }
                .form-header-group {
                  font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, Tahoma, sans-serif, sans-serif;
                }
                .form-label {
                  font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, Tahoma, sans-serif, sans-serif;
                }

                .form-label.form-label-auto {

                display: inline-block;
                float: left;
                text-align: left;

                }

                .form-line {
                  margin-top: 12px 36px 12px 36px px;
                  margin-bottom: 12px 36px 12px 36px px;
                }

                .form-all {
                  width: 700px;
                }

                .form-label-left,
                .form-label-right,
                .form-label-left.form-label-auto,
                .form-label-right.form-label-auto {
                  width: 150px;
                }

                .form-all {
                  font-size: 15px
                }
                .form-all .qq-upload-button,
                .form-all .qq-upload-button,
                .form-all .form-submit-button,
                .form-all .form-submit-reset,
                .form-all .form-submit-print {
                  font-size: 15px
                }
                .form-all .form-pagebreak-back-container,
                .form-all .form-pagebreak-next-container {
                  font-size: 15px
                }

                .supernova .form-all, .form-all {
                  border: 1px solid transparent;
                }

                .form-all {
                  color: #555;
                }
                .form-header-group .form-header {
                  color: #555;
                }
                .form-header-group .form-subHeader {
                  color: #555;
                }
                .form-label-top,
                .form-label-left,
                .form-label-right,
                .form-html,
                .form-checkbox-item label,
                .form-radio-item label {
                  color: #555;
                }
                .form-sub-label {
                  color: #6f6f6f;
                }


                .form-textbox,
                .form-textarea,
                .form-radio-other-input,
                .form-checkbox-other-input,
                .form-captcha input,
                .form-spinner input {
                  background-color: undefined;
                }

                .supernova {
                  background-image: none;
                }
                #stage {
                  background-image: none;
                }

                .form-all {
                  background-image: none;
                }

  .ie-8 .form-all:before { display: none; }
  .ie-8 {
                margin-top: auto;
                margin-top: initial;
  }

  /*PREFERENCES STYLE*//*__INSPECT_SEPERATOR__*/
                /* Injected CSS Code */
</style>
<style>
    th,td{
            text-align: center
        }
</style>
<?php
    if (isset($_GET['action'] , $_GET['id'])){
        $action = $_GET['action'];
        $campID = $_GET['id'];
        switch ($action){
            case 'delete':
                if(Gallery::deleteAllImagesMyCampID($campID)){
                    if(Camp::delete($campID)){
                        echo '<div class="container greenMessage">
                                <p>The Camp has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
                            </div>';
                    }else{
                        echo '<div class="container redMessage">
                                <p>The Camp is not Deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
                            </div>';
                    }
                }else{
                    echo '<div class="container redMessage">
                            <p>The Camp is not Deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
                        </div>';
                }
                
            case 'show':
                Camp::campShow($campID);
        }
    }
?>
<?php
    require_once '../template/AdminTemplate/head2.tpl';
?>

<!-- header -->
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Camps
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / Camps
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    require_once '../template/AdminTemplate/navbar.tpl';
?>
<!-- content -->
<div class="well">
    <ul class="form-section page-section">
              <li id="cid_10" class="form-input-wide" data-type="control_head">
                    <div class="form-header-group ">
                      <div class="header-text httal htvam">
                            <h1 id="header_10" class="form-header" data-component="header">
                              Camps
                            </h1>
                      </div>
                    </div>
              </li>
    </ul>
    <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Camp Name</th>
                    <th scope="col">Organizer</th>
                    <th scope="col">Show</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                    $camps = Camp::retreiveAllCampsForAdmin();
                    if (is_array($camps) && count($camps)>0){
                        foreach ($camps as $camp) {
                            $hospital = Organization::retreiveOrganizationById($camp['hospitalID']);
                            echo '<tr>
                                    <td>'.$count++.'</td>
                                    <td><a href="AdminCampDetails.php?id='.$camp['campID'].'">'.$camp['name'].'</a></td>
                                    <td><a href="AdminHospitalDetails.php?id='.$hospital['organizationID'].'">'.$hospital['name'].'</a></td>';
                            if($camp['visible']){
                                echo '<td><a href="?action=show&id='.$camp['campID'].'">VISIBLE</a></td>';
                            }else{
                                echo '<td>INVISIBLE</td>';
                            }
                            echo '<td><a href="?action=delete&id='.$camp['campID'].'">DELETE</a></td>
                                </tr>';     
                                    
                        }
                    }
                ?> 
                
            </tbody>
    </table>
</div>
<?php
    require_once '../template/AdminTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/AdminTemplate/end.tpl';
?>

