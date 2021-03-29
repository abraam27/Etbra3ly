<?php
    require_once 'DonorSession.php';
    require_once '../../model/attendcamp.php';
    require_once '../../model/camp.php';
    require_once '../../lib/organization.php';
    require_once '../../lib/donor.php';
    require_once '../template/DonorTemplate/head.tpl';
    
    $loginDonor = Donor::retreiveDonorById($_SESSION['donorID']);
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
    require_once '../template/DonorTemplate/navbarAccount.tpl';
?>	
		<!--  PAGE HEADING -->

        <section class="page-header" data-stellar-background-ratio="1.2">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 text-center">


                        <h3>
                            My Camps
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="DonorHome.php">Home</a> / Camps
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->
	<?php
            if(isset($_GET['action'])){
                $attendcampID = $_GET['id'];
                if(AttendCamp::delete($attendcampID)){
                    echo '<div class="container greenMessage">
                            <p>Your Attendance has been Canceled Successfully <i class="fa fa-smile-o"></i> !</p>
                        </div>';
                }else{
                    echo '<div class="container redMessage">
                            <p>Your Attendace is not Canceled <i class="fa fa-frown-o"></i> Please try Again !</p>
                        </div>';
                }
            }
        ?>
		
		
        <section>
            <div class="container">
<!-- right list -->
<?php
    require_once '../template/DonorTemplate/verticalList.tpl';
?>
<!--  Content -->	
                <div class="left-container-donor-account">
                        <section>
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
                                                        <th scope="col">City</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Time</th>
                                                        <th scope="col">Organizer</th>
                                                        <th scope="col">CANCEL</th>

                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $count = 1;
                                                $AttendCamps = AttendCamp::retreiveAllCampsAttendByTheDonor($loginDonor['donorID']);
                                                if (is_array($AttendCamps) && count($AttendCamps)>0) {
                                                    foreach ($AttendCamps as $AttendCamp) {
                                                        $camp = Camp::readById($AttendCamp['campID']);
                                                        $hospital = Organization::retreiveOrganizationById($camp['hospitalID']);
                                                        echo '<tr>
                                                            <th scope="row">'.$count++.'</th>
                                                            <td><a href="DonorCampDetials.php?id='.$camp['campID'].'">'.$camp['name'].'</a></td>
                                                            <td>'.$camp['city'].'</td>
                                                            <td>'.$camp['date'].'</td>
                                                            <td>'.$camp['time'].'</td>
                                                            <td><a href="DonorHospitalDetails.php?id='.$camp['hospitalID'].'">'.$hospital['name'].'</a></td>';
                                                        if((strtotime($camp['date'])-strtotime(date("d-m-20y")))/(60*60*24) > 0 ){
                                                            echo '<td> <a href="?action=cancel&id='.$AttendCamp['attendcampID'].'">CANCEL</a></td>
                                                                </tr>';
                                                        } else {
                                                            echo '<td>FINISHED</td>
                                                                </tr>';
                                                        }
                                                    }
                                                }else{
                                                    echo '<tr>
                                                            <td colspan="7" style="text-align:center" scope="row"> There is no Comments !!!</td>
                                                        </tr>';
                                                }
                                            ?>
                                        </tbody>
                                </table>

                        </section>
                </div>
				
							
            </div>
        </section>
<?php
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- JS -->
<?php
    require_once '../template/DonorTemplate/end.tpl';
?>