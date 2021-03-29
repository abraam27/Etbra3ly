<?php
    require_once 'HospitalSession.php';
    require_once '../../lib/donor.php';
    require_once '../../model/bloodbag.php';
    require_once '../../lib/process.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../../lib/organization.php';
    require_once '../template/HospitalTemplate/head.tpl';
    $hospital = Organization::retreiveOrganizationById($_SESSION['organizationID']);
    $countMessages = 0;
    $countMessages = Request::countRequests(Request::retreiveAllRequestsOfOrganization($hospital['organizationID'])) + BloodRequest::countRequests(BloodRequest::retreiveAllBloodRequests($hospital['organizationID']));
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.6470" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.6470" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.6470" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<style type="text/css">
        .form-label-left{
                width:205px;
        }
        .form-line{
                padding-top:12px;
                padding-bottom:12px;
        }
        .form-label-right{
                width:205px;
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
          width: 205px;
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
    require_once '../template/HospitalTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->

<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Add Donation Process
                </h3>

                <p class="page-breadcrumb">
                    <a href="HospitalHome.php">Home</a> / Add Donation Process
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if(isset($_POST['save'])){
        //collect data
        $donorID = $_POST['donorID'];
        $bloodGroup = $_POST['bloodGroup'];
        $amount = $_POST['amount'];
        $cday = $_POST['cday'];
        $cmonth = $_POST['cmonth'];
        $cyear = $_POST['cyear'];
        $collectionDate = $cday . '-' . $cmonth . '-' . $cyear;
        $eday = $_POST['eday'];
        $emonth = $_POST['emonth'];
        $eyear = $_POST['eyear'];
        $expiryDate = $eday . '-' . $emonth . '-' . $eyear;
        $bloodBag = new BloodBag($bloodGroup, $amount, $collectionDate, $expiryDate, $hospital['organizationID']);
        $donatedBloodBagID = $bloodBag->add();
        if(is_numeric($donatedBloodBagID)){
            $process = new Process($donorID, $hospital['organizationID'], $donatedBloodBagID, date("d-m-20y"), "Donation");
            if($process->addDonationProcess()){
                Donor::updateLastDonationDateOfDonor($donorID, $collectionDate);
                echo '<div class="container greenMessage">
                    <p>The Donation Process has been Saved Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
            }else{
                echo '<div class="container redMessage">
                    <p>The Donation Process did not save <i class="fa fa-frown-o"></i> Please try Again !</p>
		</div>';
                $bloodBag->delete($donatedBloodBagID);
            }
        }else{
            echo '<div class="container redMessage">
                    <p>Blood Bag not save <i class="fa fa-frown-o"></i> Please try Again !</p>
		</div>';
        }
    }
?>
<section>
        <div class="container">
            <?php
                if(isset($_GET['id'])){
                    $requestID = $_GET['id'];
                    $request = Request::retreiveRequestByID($requestID);
                    $donor = Donor::retreiveDonorById($request['donorID']);
                    $age = round((strtotime(date("d-m-20y"))-strtotime($donor['dateOfBirth']))/(60*60*24*365));
                    echo '<form class="jotform-form" action="'.$_SERVER['PHP_SELF'].'" method="POST">
                            <input type="hidden" name="formID" value="81192947976575" />
                            <input type="hidden" name="donorID" value="'.$donor['donorID'].'" />
                            <div class="form-all">
                                  <ul class="form-section page-section">
                                    <li id="cid_11" class="form-input-wide" data-type="control_head">
                                          <div class="form-header-group ">
                                            <div class="header-text httal htvam">
                                                  <h2 id="header_11" class="form-header" data-component="header">
                                                    Donation Process
                                                  </h2>
                                            </div>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_fullname" id="id_56">
                                          <label class="form-label form-label-left form-label-auto" id="label_56" for="first_56">
                                            Donor Name
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_56" class="form-input jf-required">
                                            <div data-wrapper-react="true">
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                    <input type="text" id="first_56" name="firstName" class="form-textbox validate[required]" size="10" value="'.$donor['firstName'].'" data-component="first" required="" readonly/>
                                                    <label class="form-sub-label" for="first_56" id="sublabel_first" style="min-height:13px"> First Name </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                    <input type="text" id="middle_56" name="middleName" class="form-textbox" size="10" value="'.$donor['middleName'].'" data-component="middle" required="" readonly/>
                                                    <label class="form-sub-label" for="middle_56" id="sublabel_middle" style="min-height:13px"> Middle Name </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                    <input type="text" id="last_56" name="lastName" class="form-textbox validate[required]" size="15" value="'.$donor['lastName'].'" data-component="last" required="" readonly/>
                                                    <label class="form-sub-label" for="last_56" id="sublabel_last" style="min-height:13px"> Last Name </label>
                                                  </span>
                                            </div>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_textbox" id="id_57">
                                          <label class="form-label form-label-left form-label-auto" id="label_57" for="input_57">
                                            Age
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_57" class="form-input jf-required">
                                            <input type="text" id="input_57" name="dateOfBirth" data-type="input-textbox" class="form-textbox validate[required]" size="10" value="'.$age.'" data-component="textbox" required="" readonly/> 
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_textbox" id="id_58">
                                          <label class="form-label form-label-left form-label-auto" id="label_58" for="input_58">
                                            Contact NO
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_58" class="form-input jf-required">
                                            <input type="text" id="input_58" name="phoneNo" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="20" value="'.$donor['phoneNo'].'" data-component="textbox" required="" readonly/>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_textbox" id="id_59">
                                          <label class="form-label form-label-left form-label-auto" id="label_59" for="input_59">
                                            City
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_59" class="form-input jf-required">
                                            <input type="text" id="input_59" name="district" data-type="input-textbox" class="form-textbox validate[required]" size="20" value="'.$donor['city'].'" data-component="textbox" required="" readonly/>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_dropdown" id="id_60">
                                          <label class="form-label form-label-left form-label-auto" id="label_60" for="input_60">
                                            Blood Group
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_60" class="form-input jf-required">
                                            <select class="form-dropdown validate[required]" id="input_60" name="bloodGroup" style="width:150px" data-component="dropdown" required="" readonly>
                                                  <option selected="" value="'.$donor['bloodGroup'].'"> '.$donor['bloodGroup'].' </option>
                                                  
                                            </select>
                                          </div>
                                    </li>
                                    <li class="form-line" data-type="control_divider" id="id_61">
                                          <div id="cid_61" class="form-input-wide">
                                            <div data-component="divider" style="border-bottom:1px solid #e6e6e6;height:1px;margin-left:0px;margin-right:0px;margin-top:5px;margin-bottom:5px">
                                            </div>
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
                                    <li class="form-line jf-required" data-type="control_datetime" id="id_63">
                                          <label class="form-label form-label-left form-label-auto" id="label_63" for="lite_mode_63">
                                            Collection Date
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_63" class="form-input jf-required">
                                            <div data-wrapper-react="true">
                                                  <div style="display:none">
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="tel" class="form-textbox validate[required, limitDate]" id="day_63" name="cday" size="2" data-maxlength="2" value="" required="" />
                                                          <span class="date-separate">
                                                             -
                                                          </span>
                                                          <label class="form-sub-label" for="day_63" id="sublabel_day" style="min-height:13px"> Day </label>
                                                    </span>
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="tel" class="form-textbox validate[required, limitDate]" id="month_63" name="cmonth" size="2" data-maxlength="2" value="" required="" />
                                                          <span class="date-separate">
                                                             -
                                                          </span>
                                                          <label class="form-sub-label" for="month_63" id="sublabel_month" style="min-height:13px"> Month </label>
                                                    </span>
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="tel" class="form-textbox validate[required, limitDate]" id="year_63" name="cyear" size="4" data-maxlength="4" value="" required="" />
                                                          <label class="form-sub-label" for="year_63" id="sublabel_year" style="min-height:13px"> Year </label>
                                                    </span>
                                                  </div>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                    <input type="text" class="form-textbox validate[required, limitDate, validateLiteDate]" id="lite_mode_63" size="12" data-maxlength="12" data-age="" value="" required="" data-format="ddmmyyyy" data-seperator="-" placeholder="dd-mm-yyyy" />
                                                    <label class="form-sub-label" for="lite_mode_63" id="sublabel_litemode" style="min-height:13px">  </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                    <img class="showAutoCalendar" alt="Pick a Date" id="input_63_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle" data-component="datetime" />
                                                    <label class="form-sub-label" for="input_63_pick" style="min-height:13px">  </label>
                                                  </span>
                                            </div>
                                          </div>
                                    </li>
                                    <li class="form-line jf-required" data-type="control_datetime" id="id_64">
                                          <label class="form-label form-label-left form-label-auto" id="label_64" for="lite_mode_64">
                                            Expired Date
                                            <span class="form-required">
                                                  *
                                            </span>
                                          </label>
                                          <div id="cid_64" class="form-input jf-required">
                                            <div data-wrapper-react="true">
                                                  <div style="display:none">
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="tel" class="form-textbox validate[required, limitDate]" id="day_64" name="eday" size="2" data-maxlength="2" value="" required="" />
                                                          <span class="date-separate">
                                                             -
                                                          </span>
                                                          <label class="form-sub-label" for="day_64" id="sublabel_day" style="min-height:13px"> Day </label>
                                                    </span>
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="tel" class="form-textbox validate[required, limitDate]" id="month_64" name="emonth" size="2" data-maxlength="2" value="" required="" />
                                                          <span class="date-separate">
                                                             -
                                                          </span>
                                                          <label class="form-sub-label" for="month_64" id="sublabel_month" style="min-height:13px"> Month </label>
                                                    </span>
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="tel" class="form-textbox validate[required, limitDate]" id="year_64" name="eyear" size="4" data-maxlength="4" value="" required="" />
                                                          <label class="form-sub-label" for="year_64" id="sublabel_year" style="min-height:13px"> Year </label>
                                                    </span>
                                                  </div>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                    <input type="text" class="form-textbox validate[required, limitDate, validateLiteDate]" id="lite_mode_64" size="12" data-maxlength="12" data-age="" value="" required="" data-format="ddmmyyyy" data-seperator="-" placeholder="dd-mm-yyyy" />
                                                    <label class="form-sub-label" for="lite_mode_64" id="sublabel_litemode" style="min-height:13px">  </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                    <img class="showAutoCalendar" alt="Pick a Date" id="input_64_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle" data-component="datetime" />
                                                    <label class="form-sub-label" for="input_64_pick" style="min-height:13px">  </label>
                                                  </span>
                                            </div>
                                          </div>
                                    </li>
                                    <li class="form-line" data-type="control_button" id="id_22">
                                          <div id="cid_22" class="form-input-wide">
                                            <div style="text-align:center" class="form-buttons-wrapper">
                                                  <button id="input_22" type="submit" class="form-submit-button" data-component="button" name="save" value="save">
                                                    SAVE
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
</section>
<?php
    require_once '../template/HospitalTemplate/footer.tpl';
?>
<!-- form js -->
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.6470" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("53", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); }, 0); });
 } 
 JotForm.setCalendar("53", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""});

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("63", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); }, 0); });
 } 
 JotForm.setCalendar("63", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""});

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("64", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); }, 0); });
 } 
 JotForm.setCalendar("64", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""});
        JotForm.clearFieldOnHide="disable";
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,null,null,null,null,null,null,null,null,null,null,{"name":"donationProcess","qid":"11","text":"Donation Process","type":"control_head"},null,null,null,null,null,null,null,null,null,null,{"name":"submit","qid":"22","text":"Submit","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"date","qid":"53","text":"Date","type":"control_datetime"},null,null,{"description":"","name":"donorName","qid":"56","text":"Donor Name","type":"control_fullname"},{"description":"","name":"age","qid":"57","subLabel":"","text":"Age","type":"control_textbox"},{"description":"","name":"contactNo","qid":"58","subLabel":"","text":"Contact NO","type":"control_textbox"},{"description":"","name":"district","qid":"59","subLabel":"","text":"District","type":"control_textbox"},{"description":"","name":"bloodGroup","qid":"60","subLabel":"","text":"Blood Group","type":"control_dropdown"},{"name":"divider","qid":"61","type":"control_divider"},{"description":"","name":"amountunitbag62","qid":"62","subLabel":"","text":"Amount(Unit/Bag)","type":"control_textbox"},{"description":"","name":"collectionDate","qid":"63","text":"Collection Date","type":"control_datetime"},{"description":"","name":"expiredDate","qid":"64","text":"Expired Date","type":"control_datetime"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,null,null,null,null,null,null,null,null,null,null,{"name":"donationProcess","qid":"11","text":"Donation Process","type":"control_head"},null,null,null,null,null,null,null,null,null,null,{"name":"submit","qid":"22","text":"Submit","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"date","qid":"53","text":"Date","type":"control_datetime"},null,null,{"description":"","name":"donorName","qid":"56","text":"Donor Name","type":"control_fullname"},{"description":"","name":"age","qid":"57","subLabel":"","text":"Age","type":"control_textbox"},{"description":"","name":"contactNo","qid":"58","subLabel":"","text":"Contact NO","type":"control_textbox"},{"description":"","name":"district","qid":"59","subLabel":"","text":"District","type":"control_textbox"},{"description":"","name":"bloodGroup","qid":"60","subLabel":"","text":"Blood Group","type":"control_dropdown"},{"name":"divider","qid":"61","type":"control_divider"},{"description":"","name":"amountunitbag62","qid":"62","subLabel":"","text":"Amount(Unit/Bag)","type":"control_textbox"},{"description":"","name":"collectionDate","qid":"63","text":"Collection Date","type":"control_datetime"},{"description":"","name":"expiredDate","qid":"64","text":"Expired Date","type":"control_datetime"}]);}, 20); 
</script>
<?php
    require_once '../template/HospitalTemplate/end.tpl';
?>
