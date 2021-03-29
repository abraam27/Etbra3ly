<?php
    require_once 'DonorSession.php';
    require_once '../../model/bloodbag.php';
    require_once '../../lib/donor.php';
    require_once '../../lib/organization.php';
    require_once '../../lib/request.php';
    require_once '../template/DonorTemplate/head.tpl';
    $loginDonor = Donor::retreiveDonorById($_SESSION['donorID']);
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.6481" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.6481" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.6481" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<style type="text/css">
        .form-label-left{
                width:200px;
        }
        .form-line{
                padding-top:12px;
                padding-bottom:12px;
        }
        .form-label-right{
                width:200px;
        }
        .form-all{
                width:900px;
                color:#555 !important;
                font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
                font-size:17px;
        }
        .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
                color: false;
        }

</style>

<style type="text/css" id="form-designer-style">
        /* Injected CSS Code */
/*PREFERENCES STYLE*/
        .form-all {
          font-family: Lucida Grande, sans-serif;
        }
        .form-all .qq-upload-button,
        .form-all .form-submit-button,
        .form-all .form-submit-reset,
        .form-all .form-submit-print {
          font-family: Lucida Grande, sans-serif;
        }
        .form-all .form-pagebreak-back-container,
        .form-all .form-pagebreak-next-container {
          font-family: Lucida Grande, sans-serif;
        }
        .form-header-group {
          font-family: Lucida Grande, sans-serif;
        }
        .form-label {
          font-family: Lucida Grande, sans-serif;
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
          width: 900px;
        }

        .form-label-left,
        .form-label-right,
        .form-label-left.form-label-auto,
        .form-label-right.form-label-auto {
          width: 200px;
        }

        .form-all {
          font-size: 17px
        }
        .form-all .qq-upload-button,
        .form-all .qq-upload-button,
        .form-all .form-submit-button,
        .form-all .form-submit-reset,
        .form-all .form-submit-print {
          font-size: 17px
        }
        .form-all .form-pagebreak-back-container,
        .form-all .form-pagebreak-next-container {
          font-size: 17px
        }

        .supernova .form-all, .form-all {
          background-color: #fff;
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

        .supernova {
          background-color: undefined;
        }
        .supernova body {
          background: transparent;
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
<?php
    require_once '../template/DonorTemplate/navbar.tpl';
?>
    <!--  PAGE HEADING -->

<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Exchange Blood !!
                </h3>

                <p class="page-breadcrumb">
                    <a href="DonorHome.php">Home</a> / Exchange Request !!
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    
    if(isset($_POST['submit'])){
        $needBloodGroup = $_POST['bloodGroup'];
        $numberOfBags = $_POST['num'];
        $amount = $_POST['amount'];
        $day = $_POST['nday'];
        $month = $_POST['nmonth'];
        $year = $_POST['nyear'];
        $date = $_POST['date'];
        $organizationID = $_POST['organizationID'];
        if((strtotime(date("d-m-20y"))-strtotime($loginDonor['lastDonationDate']))/(60*60*24) >= 90){
            $exchangeRequest = new Request($loginDonor['donorID'], $organizationID, $date, "Exchange", $amount, 0, $needBloodGroup, $numberOfBags);
            if($exchangeRequest->addExchangeRequest()){
                echo '<div class="container greenMessage">
                        <p>Your Request has been Sent Successfully <i class="fa fa-smile-o"></i> !</p>
                    </div>';
            }else{
                echo '<div class="container redMessage">
                        <p>Your Request is not Sent <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
            }
        }else{
            echo '<div class="container redMessage">
                    <p>Sorry but yoy can\'t donate becouse the last Donation Date is '.$loginDonor['lastDonationDate'].' less than 3 months <i class="fa fa-frown-o"></i></p>
                </div>';
        }
        
    }
?>
<section id="requestForBlood">

        <div class="container">
            <?php
                if(isset($_POST['select'])){
                    $day = $_POST['day'];
                    $month = $_POST['month'];
                    $year = $_POST['year'];
                    $date = $day . '-' . $month . '-' . $year;
                    $numberOfBags = $_POST['numberOfBags'];
                    $needBloodGroup = $_POST['needBloodGroup'];
                    $amount = $_POST['amount'];
                    $bloodBankBloodBags = BloodBag::retreiveAllBloodbagsAvailable($needBloodGroup, $amount, $loginDonor['city'], "Blood Bank");
                    //print_r($bloodBankBloodBags);
                    $bloodBankIDs = BloodBag::retreiveAllOraganiztionIDsOfAvailableBloogBags($needBloodGroup, $amount, $loginDonor['city'], "Blood Bank");
                    //print_r($bloodBankIDs);
                    $selectedBloodBankIDs[] = null;
                    $bloodBankCount = 0;
                    for($i=0 ; $i<count($bloodBankIDs) ; $i++){
                        $count=0;
                        foreach ($bloodBankBloodBags as $BloodBag) {
                            if($bloodBankIDs[$i] == $BloodBag['organizationID']){
                                $bloodBankCount++;
                            }
                        }   
                        //echo $bloodBankCount .'AAAAAAAAAAAA';
                        if($bloodBankCount >= $num){
                            $selectedBloodBankIDs[$count++] = $bloodBankIDs[$i];
                        }
                    }
                    echo '<form class="jotform-form" action="'.$_SERVER['PHP_SELF'].'" method="post">
                            <input type="hidden" name="formID" value="81192947976575" />
                            <input type="hidden" name="date" value="'.$date.'" />
                            <div class="form-all">
                                  <ul class="form-section page-section">
                                    <li id="cid_58" class="form-input-wide" data-type="control_head">
                                          <div class="form-header-group ">
                                            <div class="header-text httal htvam">
                                                  <h2 id="header_58" class="form-header" data-component="header">
                                                    Exchange !
                                                  </h2>
                                            </div>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_dropdown" id="id_66">
                                          <label class="form-label form-label-left form-label-auto" id="label_66" for="input_66">
                                            Blood Group
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_66" class="form-input jf-required">
                                            <span class="form-sub-label-container" style="vertical-align:top">
                                                  <select class="form-dropdown validate[required]" id="input_66" name="bloodGroup" style="width:150px" data-component="dropdown" required="">
                                                    <option value="'.$needBloodGroup.'"> '.$needBloodGroup.' </option>
                                                    <option value="A+"> A+ </option>
                                                    <option value="A-"> A- </option>
                                                    <option value="B+"> B+ </option>
                                                    <option value="B-"> B- </option>
                                                    <option value="O+"> O+ </option>
                                                    <option value="O-"> O- </option>
                                                    <option value="AB+"> AB+ </option>
                                                    <option value="AB-"> AB- </option>
                                                  </select>
                                                  <label class="form-sub-label" for="input_66" style="min-height:13px"> Select Blood Group you want to Exchange </label>
                                            </span>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_dropdown" id="id_25">
                                            <label class="form-label form-label-left form-label-auto" id="label_25" for="input_25">
                                              Amount (unit/Bag)
                                              <span class="form-required">
                                                    *
                                              </span>
                                            </label>
                                            <div id="cid_25" class="form-input jf-required">
                                              <select class="form-dropdown validate[required]" id="input_25" name="amount" style="width:150px" data-component="dropdown" required="">';
                                                    if($amount == "Small"){
                                                        echo '<option selected="" value="Small"> 50 </option>
                                                            <option value="Medium"> 50-100 </option>
                                                            <option value="Large"> >100 </option>';
                                                    }elseif($amount == "Medium") {
                                                        echo '<option value="Small"> 50 </option>
                                                            <option selected="" value="Medium"> 50-100 </option>
                                                            <option value="Large"> >100 </option>';
                                                    }else{
                                                        echo '<option value="Small"> 50 </option>
                                                            <option value="Medium"> 50-100 </option>
                                                            <option selected="" value="Large"> >100 </option>';
                                                    }

                                    echo '</select>
                                        </div>
                                      </li>
                                    <li class="form-line jf-required" data-type="control_dropdown" id="id_25">
                                          <label class="form-label form-label-left form-label-auto" id="label_25" for="input_25">
                                            Number of Bags
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_25" class="form-input jf-required">
                                            <select class="form-dropdown validate[required]" id="input_25" name="num" style="width:150px" data-component="dropdown" required="">
                                                  <option selected="" value="'.$numberOfBags.'"> '.$numberOfBags.' </option>
                                                  <option value="1"> 1 </option>
                                                  <option value="2"> 2 </option>
                                                  <option value="3"> 3 </option>
                                            </select>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_datetime" id="id_61">
                                          <label class="form-label form-label-left form-label-auto" id="label_61" for="lite_mode_61">
                                            Donation Date
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_61" class="form-input jf-required">
                                            <div data-wrapper-react="true">
                                                  <div style="display:none">
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="tel" class="form-textbox validate[required, limitDate]" id="day_61" name="nday" size="2" data-maxlength="2" value="'.$day.'" required="" />
                                                          <span class="date-separate">
                                                             -
                                                          </span>
                                                          <label class="form-sub-label" for="day_61" id="sublabel_day" style="min-height:13px"> Day </label>
                                                    </span>
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="tel" class="form-textbox validate[required, limitDate]" id="month_61" name="nmonth" size="2" data-maxlength="2" value="'.$month.'" required="" />
                                                          <span class="date-separate">
                                                             -
                                                          </span>
                                                          <label class="form-sub-label" for="month_61" id="sublabel_month" style="min-height:13px"> Month </label>
                                                    </span>
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="tel" class="form-textbox validate[required, limitDate]" id="year_61" name="nyear" size="4" data-maxlength="4" value="'.$year.'" required="" />
                                                          <label class="form-sub-label" for="year_61" id="sublabel_year" style="min-height:13px"> Year </label>
                                                    </span>
                                                  </div>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                    <input type="text" class="form-textbox validate[required, limitDate, validateLiteDate]" id="lite_mode_61" size="12" data-maxlength="12" data-age="" value="'.$day.'/'.$month.'/'.$year.'" required="" data-format="ddmmyyyy" data-seperator="-" placeholder="dd-mm-yyyy" />
                                                    <label class="form-sub-label" for="lite_mode_61" id="sublabel_litemode" style="min-height:13px">  </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                    <img class="showAutoCalendar" alt="Pick a Date" id="input_61_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle" data-component="datetime" />
                                                    <label class="form-sub-label" for="input_61_pick" style="min-height:13px">  </label>
                                                  </span>
                                            </div>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_dropdown" id="id_65">
                                          <label class="form-label form-label-left form-label-auto" id="label_65" for="input_65">
                                            Blood Bank
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_65" class="form-input jf-required">
                                            <span class="form-sub-label-container" style="vertical-align:top">
                                                  <select class="form-dropdown validate[required]" id="input_65"  name="organizationID" style="width:160px" data-component="dropdown" required="">
                                                    <option value=""> Select Please ! </option>';
                                                      
                                                        if(is_array($selectedBloodBankIDs) && count($selectedBloodBankIDs)>0 && is_numeric($selectedBloodBankIDs[0])){

                                                          for($i=0 ; $i<count($selectedBloodBankIDs) ; $i++){

                                                              $selectedBloodBank = Organization::retreiveOrganizationById($selectedBloodBankIDs[$i]);
                                                              echo '<option value="'.$selectedBloodBank['organizationID'].'"> '.$selectedBloodBank['name'].' </option>';
                                                          }

                                                        }else{
                                                            echo '<option disable>No Blood Banks Availanble</option>';
                                                        }
                                                    
                                                  echo'</select>
                                                  <label class="form-sub-label" for="input_65" style="min-height:13px"> Choose The Hospital or The Blood Bank want to donate on it. </label>
                                            </span>
                                          </div>
                                    </li>
                                    <li class="form-line" data-type="control_button" id="id_57">
                                          <div id="cid_57" class="form-input-wide">
                                            <div style="text-align:center" class="form-buttons-wrapper">
                                                <button id="input_57" type="submit" class="form-submit-button" data-component="button" name="submit" value="submit">
                                                    Submit
                                                  </button>
                                            </div>
                                          </div>
                                    </li>
                                  </ul>
                            </div>
                          </form>';
                }else{
                    echo '<form class="jotform-form" action="'.$_SERVER['PHP_SELF'].'" method="post">
                            <input type="hidden" name="formID" value="81192947976575" />
                            <div class="form-all">
                                  <ul class="form-section page-section">
                                    <li id="cid_58" class="form-input-wide" data-type="control_head">
                                          <div class="form-header-group ">
                                            <div class="header-text httal htvam">
                                                  <h2 id="header_58" class="form-header" data-component="header">
                                                    Exchange !
                                                  </h2>
                                            </div>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_dropdown" id="id_66">
                                          <label class="form-label form-label-left form-label-auto" id="label_66" for="input_66">
                                            Blood Group
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_66" class="form-input jf-required">
                                            <span class="form-sub-label-container" style="vertical-align:top">
                                                  <select class="form-dropdown validate[required]" id="input_66" name="needBloodGroup" style="width:150px" data-component="dropdown" required="">
                                                    <option value=""> Please Select ! </option>
                                                    <option value="A+"> A+ </option>
                                                    <option value="A-"> A- </option>
                                                    <option value="B+"> B+ </option>
                                                    <option value="B-"> B- </option>
                                                    <option value="O+"> O+ </option>
                                                    <option value="O-"> O- </option>
                                                    <option value="AB+"> AB+ </option>
                                                    <option value="AB-"> AB- </option>
                                                  </select>
                                                  <label class="form-sub-label" for="input_66" style="min-height:13px"> Select Blood Group you want to Exchange </label>
                                            </span>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_dropdown" id="id_25">
                                          <label class="form-label form-label-left form-label-auto" id="label_25" for="input_25">
                                            Amount (unit/Bag)
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_25" class="form-input jf-required">
                                            <select class="form-dropdown validate[required]" id="input_25" name="amount" style="width:150px" data-component="dropdown" required="">
                                                  <option value=""> Please Select ! </option>
                                                  <option value="Small"> 50 </option>
                                                  <option value="Medium"> 50-100 </option>
                                                  <option value="Large"> >100 </option>
                                            </select>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_dropdown" id="id_25">
                                          <label class="form-label form-label-left form-label-auto" id="label_25" for="input_25">
                                            Number of Bags
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_25" class="form-input jf-required">
                                            <select class="form-dropdown validate[required]" id="input_25" name="numberOfBags" style="width:150px" data-component="dropdown" required="">
                                                  <option selected="" value=""> Please Select ! </option>
                                                  <option value="1"> 1 </option>
                                                  <option value="2"> 2 </option>
                                                  <option value="3"> 3 </option>
                                                  <option value="4"> 4 </option>
                                                  <option value="5"> 5 </option>
                                                  <option value="6"> 6 </option>
                                            </select>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_datetime" id="id_61">
                                          <label class="form-label form-label-left form-label-auto" id="label_61" for="lite_mode_61">
                                            Donation Date
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_61" class="form-input jf-required">
                                            <div data-wrapper-react="true">
                                                  <div style="display:none">
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="tel" class="form-textbox validate[required, limitDate]" id="day_61" name="day" size="2" data-maxlength="2" value="" required="" />
                                                          <span class="date-separate">
                                                             -
                                                          </span>
                                                          <label class="form-sub-label" for="day_61" id="sublabel_day" style="min-height:13px"> Day </label>
                                                    </span>
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="tel" class="form-textbox validate[required, limitDate]" id="month_61" name="month" size="2" data-maxlength="2" value="" required="" />
                                                          <span class="date-separate">
                                                             -
                                                          </span>
                                                          <label class="form-sub-label" for="month_61" id="sublabel_month" style="min-height:13px"> Month </label>
                                                    </span>
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="tel" class="form-textbox validate[required, limitDate]" id="year_61" name="year" size="4" data-maxlength="4" value="" required="" />
                                                          <label class="form-sub-label" for="year_61" id="sublabel_year" style="min-height:13px"> Year </label>
                                                    </span>
                                                  </div>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                    <input type="text" class="form-textbox validate[required, limitDate, validateLiteDate]" id="lite_mode_61" size="12" data-maxlength="12" data-age="" value="" required="" data-format="ddmmyyyy" data-seperator="-" placeholder="dd-mm-yyyy" />
                                                    <label class="form-sub-label" for="lite_mode_61" id="sublabel_litemode" style="min-height:13px">  </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                    <img class="showAutoCalendar" alt="Pick a Date" id="input_61_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle" data-component="datetime" />
                                                    <label class="form-sub-label" for="input_61_pick" style="min-height:13px">  </label>
                                                  </span>
                                            </div>
                                          </div>
                                    </li>
                                    <li class="form-line" data-type="control_button" id="id_57">
                                          <div id="cid_57" class="form-input-wide">
                                            <div style="text-align:center" class="form-buttons-wrapper">
                                                <button id="input_57" type="submit" class="form-submit-button" data-component="button" name="select" value="select">
                                                    Select Blood Bank
                                                  </button>
                                            </div>
                                          </div>
                                    </li>
                                  </ul>
                            </div>
                          </form>';
                }
            ?>
                

        </div>

</section>>
<?php
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- form js -->
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.6481" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("61", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); }, 0); });
 } 
 JotForm.setCalendar("61", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""});
        JotForm.clearFieldOnHide="disable";
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"name":"submit","qid":"57","text":"Submit","type":"control_button"},{"name":"exchange","qid":"58","text":"Exchange !","type":"control_head"},null,null,{"description":"","name":"donationDate","qid":"61","text":"Donation Date","type":"control_datetime"},null,null,null,{"description":"","name":"hospitalbloodBank","qid":"65","subLabel":"Choose The Hospital or The Blood Bank want to donate on it.","text":"Hospital/Blood Bank","type":"control_dropdown"},{"description":"","name":"bloodGroup","qid":"66","subLabel":"Select Blood Group you want to Exchange ","text":"Blood Group","type":"control_dropdown"},{"description":"","name":"amount","qid":"67","subLabel":"","text":"Amount (unit/Bag)","type":"control_textbox"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"name":"submit","qid":"57","text":"Submit","type":"control_button"},{"name":"exchange","qid":"58","text":"Exchange !","type":"control_head"},null,null,{"description":"","name":"donationDate","qid":"61","text":"Donation Date","type":"control_datetime"},null,null,null,{"description":"","name":"hospitalbloodBank","qid":"65","subLabel":"Choose The Hospital or The Blood Bank want to donate on it.","text":"Hospital/Blood Bank","type":"control_dropdown"},{"description":"","name":"bloodGroup","qid":"66","subLabel":"Select Blood Group you want to Exchange ","text":"Blood Group","type":"control_dropdown"},{"description":"","name":"amount","qid":"67","subLabel":"","text":"Amount (unit/Bag)","type":"control_textbox"}]);}, 20); 
</script>
<?php
    require_once '../template/DonorTemplate/end.tpl';
?>
