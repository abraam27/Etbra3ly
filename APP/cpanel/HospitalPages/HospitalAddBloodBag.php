<?php
    require_once 'HospitalSession.php';
    require_once '../../model/bloodbag.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../../lib/organization.php';
    require_once '../template/HospitalTemplate/head.tpl';
    $hospital = Organization::retreiveOrganizationById($_SESSION['organizationID']);
    $countMessages = 0;
    $countMessages = Request::countRequests(Request::retreiveAllRequestsOfOrganization($hospital['organizationID'])) + BloodRequest::countRequests(BloodRequest::retreiveAllBloodRequests($hospital['organizationID']));
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5896" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5896" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5896" />
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
                background: #fff;
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
    require_once '../template/HospitalTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Add Blood Bag
                </h3>

                <p class="page-breadcrumb">
                    <a href="HospitalHome.php">Home</a> / Add Blood Bag / <a href="HospitalBloodBagList.php">Blood Bags</a>
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if(isset($_POST['add'])){
        //collect data
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
        $bloodBagID = $bloodBag->add();
        if(is_numeric($bloodBagID)){
            echo '<div class="container greenMessage">
                    <p>Blood Bag # '.$bloodBagID.'  has been Saved Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
        } else {
            echo '<div class="container redMessage">
                    <p>Blood Bag is not saved <i class="fa fa-frown-o"></i> Please try Again !</p>
		</div>';
        }
    }
?>
<section>
        <div class="container">

            <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                  <input type="hidden" name="formID" value="81192947976575" />
                  <div class="form-all">
                        <ul class="form-section page-section">
                          <li id="cid_11" class="form-input-wide" data-type="control_head">
                                <div class="form-header-group ">
                                  <div class="header-text httal htvam">
                                        <h2 id="header_11" class="form-header" data-component="header">
                                          Add Blood Bag
                                        </h2>
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
                          <li class="form-line jf-required" data-type="control_dropdown" id="id_25">
                                <label class="form-label form-label-left form-label-auto" id="label_25" for="input_25">
                                  Blood Group
                                  <span class="form-required">
                                        *
                                  </span>
                                </label>
                                <div id="cid_25" class="form-input jf-required">
                                  <select class="form-dropdown validate[required]" id="input_25" name="bloodGroup" style="width:150px" data-component="dropdown" required="">
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
                                </div>
                          </li>
                          <li class="form-line jf-required" data-type="control_datetime" id="id_13">
                                <label class="form-label form-label-left form-label-auto" id="label_13" for="lite_mode_13">
                                  Collection Date
                                  <span class="form-required">
                                        *
                                  </span>
                                </label>
                                <div id="cid_13" class="form-input jf-required">
                                  <div data-wrapper-react="true">
                                        <div style="display:none">
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                <input type="tel" class="form-textbox validate[required, limitDate]" id="day_13" name="cday" size="2" data-maxlength="2" value="" required="" />
                                                <span class="date-separate">
                                                   /
                                                </span>
                                                <label class="form-sub-label" for="day_13" id="sublabel_day" style="min-height:13px"> Day </label>
                                          </span>
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                <input type="tel" class="form-textbox validate[required, limitDate]" id="month_13" name="cmonth" size="2" data-maxlength="2" value="" required="" />
                                                <span class="date-separate">
                                                   /
                                                </span>
                                                <label class="form-sub-label" for="month_13" id="sublabel_month" style="min-height:13px"> Month </label>
                                          </span>
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                <input type="tel" class="form-textbox validate[required, limitDate]" id="year_13" name="cyear" size="4" data-maxlength="4" value="" required="" />
                                                <label class="form-sub-label" for="year_13" id="sublabel_year" style="min-height:13px"> Year </label>
                                          </span>
                                        </div>
                                        <span class="form-sub-label-container" style="vertical-align:top">
                                          <input type="text" class="form-textbox validate[required, limitDate, validateLiteDate]" id="lite_mode_13" size="12" data-maxlength="12" data-age="" value="" required="" data-format="ddmmyyyy" data-seperator="/" placeholder="dd/mm/yyyy" />
                                          <label class="form-sub-label" for="lite_mode_13" id="sublabel_litemode" style="min-height:13px">  </label>
                                        </span>
                                        <span class="form-sub-label-container" style="vertical-align:top">
                                          <img alt="Pick a Date" id="input_13_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle" data-component="datetime" />
                                          <label class="form-sub-label" for="input_13_pick" style="min-height:13px">  </label>
                                        </span>
                                  </div>
                                </div>
                          </li>
                          <li class="form-line jf-required" data-type="control_datetime" id="id_24">
                                <label class="form-label form-label-left form-label-auto" id="label_24" for="lite_mode_24">
                                  Expiry Date
                                  <span class="form-required">
                                        *
                                  </span>
                                </label>
                                <div id="cid_24" class="form-input jf-required">
                                  <div data-wrapper-react="true">
                                        <div style="display:none">
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                <input type="tel" class="form-textbox validate[required, limitDate]" id="day_24" name="eday" size="2" data-maxlength="2" value="" required="" />
                                                <span class="date-separate">
                                                   /
                                                </span>
                                                <label class="form-sub-label" for="day_24" id="sublabel_day" style="min-height:13px"> Day </label>
                                          </span>
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                <input type="tel" class="form-textbox validate[required, limitDate]" id="month_24" name="emonth" size="2" data-maxlength="2" value="" required="" />
                                                <span class="date-separate">
                                                   /
                                                </span>
                                                <label class="form-sub-label" for="month_24" id="sublabel_month" style="min-height:13px"> Month </label>
                                          </span>
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                <input type="tel" class="form-textbox validate[required, limitDate]" id="year_24" name="eyear" size="4" data-maxlength="4" value="" required="" />
                                                <label class="form-sub-label" for="year_24" id="sublabel_year" style="min-height:13px"> Year </label>
                                          </span>
                                        </div>
                                        <span class="form-sub-label-container" style="vertical-align:top">
                                          <input type="text" class="form-textbox validate[required, limitDate, validateLiteDate]" id="lite_mode_24" size="12" data-maxlength="12" data-age="" value="" required="" data-format="ddmmyyyy" data-seperator="/" placeholder="dd/mm/yyyy" />
                                          <label class="form-sub-label" for="lite_mode_24" id="sublabel_litemode" style="min-height:13px">  </label>
                                        </span>
                                        <span class="form-sub-label-container" style="vertical-align:top">
                                          <img alt="Pick a Date" id="input_24_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle" data-component="datetime" />
                                          <label class="form-sub-label" for="input_24_pick" style="min-height:13px">  </label>
                                        </span>
                                  </div>
                                </div>
                          </li>
                          <li class="form-line" data-type="control_button" id="id_22">
                                <div id="cid_22" class="form-input-wide">
                                  <div style="text-align:center" class="form-buttons-wrapper">
                                      <button id="input_22" type="submit" class="form-submit-button" data-component="button" name="add" value="add">
                                          ADD
                                        </button>
                                  </div>
                                </div>
                          </li>

                        </ul>
                  </div>

                </form>


        </div>
</section>
<?php
    require_once '../template/HospitalTemplate/footer.tpl';
?>
<!-- form js -->
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.5896" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("13", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); }, 0); });
 } 
 JotForm.setCalendar("13", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""});

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("24", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); }, 0); });
 } 
 JotForm.setCalendar("24", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""});
        JotForm.clearFieldOnHide="disable";
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,null,null,null,null,null,null,null,null,null,null,{"name":"addBlood","qid":"11","text":"Add Blood Bag","type":"control_head"},null,{"description":"","name":"collectionDate","qid":"13","text":"Collection Date","type":"control_datetime"},null,null,null,null,null,null,null,null,{"name":"add","qid":"22","text":"ADD","type":"control_button"},{"description":"","name":"amount","qid":"23","subLabel":"","text":"Amount (Unit/Bag)","type":"control_textbox"},{"description":"","name":"expiryDate","qid":"24","text":"Expiry Date","type":"control_datetime"},{"description":"","name":"bloodGroup","qid":"25","subLabel":"","text":"Blood Group","type":"control_dropdown"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,null,null,null,null,null,null,null,null,null,null,{"name":"addBlood","qid":"11","text":"Add Blood Bag","type":"control_head"},null,{"description":"","name":"collectionDate","qid":"13","text":"Collection Date","type":"control_datetime"},null,null,null,null,null,null,null,null,{"name":"add","qid":"22","text":"ADD","type":"control_button"},{"description":"","name":"amount","qid":"23","subLabel":"","text":"Amount (Unit/Bag)","type":"control_textbox"},{"description":"","name":"expiryDate","qid":"24","text":"Expiry Date","type":"control_datetime"},{"description":"","name":"bloodGroup","qid":"25","subLabel":"","text":"Blood Group","type":"control_dropdown"}]);}, 20); 
</script>
<script type="text/javascript">JotForm.ownerView=true;</script>
<?php
    require_once '../template/HospitalTemplate/end.tpl';
?>