<?php
    require_once 'BloodBankSession.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../../lib/organization.php';
    require_once '../../lib/donor.php';
    require_once '../template/BloodBankTemplate/head.tpl';
    $bloodBank = Organization::retreiveOrganizationById($_SESSION['organizationID']);
    $countMessages = 0;
    $countMessages = Request::countRequests(Request::retreiveAllRequestsOfOrganization($bloodBank['organizationID'])) + BloodRequest::countRequests(BloodRequest::retreiveAllBloodRequests($bloodBank['organizationID']));
?>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5968" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5968" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5968" />
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
    require_once '../template/BloodBankTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->

<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Add Donor
                </h3>

                <p class="page-breadcrumb">
                    <a href="BloodBankHome.php">Home</a> / Add Donor
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

        <section id="CreateCamp">
            <?php
                if(isset($_POST['add'])){
                    //collect data
                    $SSN = $_POST['SSN'];
                    $firstName = $_POST['firstName'];
                    $middleName = $_POST['middleName'];
                    $lastName = $_POST['lastName'];
                    $gender = $_POST['gender'];
                    $district = $_POST['district'];
                    $city = $_POST['city'];
                    $phoneNo = $_POST['phoneNo'];
                    $email = $_POST['email'];
                    $bloodGroup = $_POST['bloodGroup'];
                    $day = $_POST['day'];
                    $month = $_POST['month'];
                    $year = $_POST['year'];
                    $dateOfBirth = $day . '-' . $month . '-' . $year;
                    //echo $dateOfBirth;
                    $donor = new Donor($SSN, $firstName, $middleName, $lastName, $dateOfBirth, $gender, $district, $city, $phoneNo, $email, $bloodGroup);
                    $donorID = $donor->addDonorByBloodBank();
                    //echo $donorID;
                    if(is_numeric($donorID)){
                        if($donor->updateDonorByBloodBankID($donorID, $bloodBank['organizationID'])){
                            echo '<div class="container greenMessage">
                                <p>The Donor has been Saved Successfully <i class="fa fa-smile-o"></i> !</p>
                            </div>';
                        } else {
                            echo '<div class="container redMessage">
                                <p>The Donor is not saved <i class="fa fa-frown-o"></i> Please try Again !</p>
                            </div>';
                        }
                        
                    } else {
                        echo '<div class="container redMessage">
                                <p>The Donor is not saved <i class="fa fa-frown-o"></i> Please try Again !</p>
                            </div>';
                    }
                }
            ?>
                <div class="container">

                        <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                          <input type="hidden" name="formID" value="80898327015563" />
                          <div class="form-all">
                                <ul class="form-section page-section">
                                  <li id="cid_10" class="form-input-wide" data-type="control_head">
                                        <div class="form-header-group ">
                                          <div class="header-text httal htvam">
                                                <h1 id="header_10" class="form-header" data-component="header">
                                                  Add Donor
                                                </h1>
                                          </div>
                                        </div>
                                  </li>
                                  <li class="form-line jf-required" data-type="control_textbox" id="id_19">
                                        <label class="form-label form-label-left form-label-auto" id="label_19" for="input_19">
                                          SSN
                                          <span class="form-required">
                                                *
                                          </span>
                                        </label>
                                        <div id="cid_19" class="form-input jf-required">
                                          <input type="text" id="input_19" name="SSN" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="20" value="" data-component="textbox" required="" />
                                        </div>
                                  </li>
                                  <li class="form-line jf-required" data-type="control_fullname" id="id_18">
                                        <label class="form-label form-label-left form-label-auto" id="label_18" for="first_18">
                                          Name
                                          <span class="form-required">
                                                *
                                          </span>
                                        </label>
                                        <div id="cid_18" class="form-input jf-required">
                                          <div data-wrapper-react="true">
                                                <span class="form-sub-label-container" style="vertical-align:top;">
                                                  <input type="text" id="first_18" name="firstName" class="form-textbox validate[required]" size="10" value="" data-component="first" required="" />
                                                  <label class="form-sub-label" for="first_18" id="sublabel_first" style="min-height:13px;"> First Name </label>
                                                </span>
                                                <span class="form-sub-label-container" style="vertical-align:top;">
                                                  <input type="text" id="middle_18" name="middleName" class="form-textbox" size="10" value="" data-component="middle" required="" />
                                                  <label class="form-sub-label" for="middle_18" id="sublabel_middle" style="min-height:13px;"> Middle Name </label>
                                                </span>
                                                <span class="form-sub-label-container" style="vertical-align:top;">
                                                  <input type="text" id="last_18" name="lastName" class="form-textbox validate[required]" size="15" value="" data-component="last" required="" />
                                                  <label class="form-sub-label" for="last_18" id="sublabel_last" style="min-height:13px;"> Last Name </label>
                                                </span>
                                          </div>
                                        </div>
                                  </li>
                                  <li class="form-line jf-required" data-type="control_datetime" id="id_13">
                                        <label class="form-label form-label-left form-label-auto" id="label_13" for="lite_mode_13">
                                          Birthdate
                                          <span class="form-required">
                                                *
                                          </span>
                                        </label>
                                        <div id="cid_13" class="form-input jf-required">
                                          <div data-wrapper-react="true">
                                                <div style="display:none">
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                        <input type="tel" class="form-textbox validate[required, limitDate]" id="day_13" name="day" size="2" data-maxlength="2" value="" required="" />
                                                        <span class="date-separate">
                                                           /
                                                        </span>
                                                        <label class="form-sub-label" for="day_13" id="sublabel_day" style="min-height:13px"> Day </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                        <input type="tel" class="form-textbox validate[required, limitDate]" id="month_13" name="month" size="2" data-maxlength="2" value="" required="" />
                                                        <span class="date-separate">
                                                           /
                                                        </span>
                                                        <label class="form-sub-label" for="month_13" id="sublabel_month" style="min-height:13px"> Month </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                        <input type="tel" class="form-textbox validate[required, limitDate]" id="year_13" name="year" size="4" data-maxlength="4" value="" required="" />
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
                                  <li class="form-line jf-required" data-type="control_email" id="id_22">
                                        <label class="form-label form-label-left form-label-auto" id="label_22" for="input_22">
                                          Email
                                          <span class="form-required">
                                                *
                                          </span>
                                        </label>
                                        <div id="cid_22" class="form-input jf-required">
                                          <span class="form-sub-label-container" style="vertical-align:top;">
                                                <input type="email" id="input_22" name="email" class="form-textbox validate[required, Email]" size="30" value="" data-component="email" required="" />
                                                <label class="form-sub-label" for="input_22" style="min-height:13px;"> example@example.com </label>
                                          </span>
                                        </div>
                                  </li>
                                  <li class="form-line jf-required" data-type="control_address" id="id_23">
                                        <label class="form-label form-label-left form-label-auto" id="label_23" for="input_23_addr_line1">
                                          Location
                                          <span class="form-required">
                                                *
                                          </span>
                                        </label>
                                        <div id="cid_23" class="form-input jf-required">
                                          <table summary="" class="form-address-table" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                  <tr style="display:none;">
                                                        <td colspan="2">
                                                          <span class="form-sub-label-container" style="vertical-align:top;">
                                                                <input type="text" id="input_23_addr_line1" name="q23_address[addr_line1]" class="form-textbox validate[required] form-address-line" value="" data-component="address_line_1" required="" />
                                                                <label class="form-sub-label" for="input_23_addr_line1" id="sublabel_23_addr_line1" style="min-height:13px;"> Street Address </label>
                                                          </span>
                                                        </td>
                                                  </tr>
                                                  <tr style="display:none;">
                                                        <td colspan="2">
                                                          <span class="form-sub-label-container" style="vertical-align:top;">
                                                                <input type="text" id="input_23_addr_line2" name="q23_address[addr_line2]" class="form-textbox form-address-line" size="46" value="" data-component="address_line_2" required="" />
                                                                <label class="form-sub-label" for="input_23_addr_line2" id="sublabel_23_addr_line2" style="min-height:13px;"> Street Address Line 2 </label>
                                                          </span>
                                                        </td>
                                                  </tr>
                                                  <tr>
                                                        <td width="50%">
                                                          <span class="form-sub-label-container" style="vertical-align:top;">
                                                                <input type="text" id="input_23_city" name="district" class="form-textbox validate[required] form-address-city" size="21" value="" data-component="city" required="" />
                                                                <label class="form-sub-label" for="input_23_city" id="sublabel_23_city" style="min-height:13px;"> District </label>
                                                          </span>
                                                        </td>
                                                        <td>
                                                          <span class="form-sub-label-container" style="vertical-align:top;">
                                                                <select class="form-dropdown validate[required] form-address-state" name="city" id="input_23_state" data-component="state" required="">
                                                                    <option selected="" value=""> Please Select ! </option>
                                                                    <option value="Cairo">Cairo</option>
                                                                    <option value="Alexandria">Alexandria</option>
                                                                    <option value="Gizeh">Gizeh</option>
                                                                    <option value="Shubra El-Kheima">Shubra El-Kheima</option>
                                                                    <option value="Port Said">Port Said</option>
                                                                    <option value="Suez">Suez</option>
                                                                    <option value="Luxor">Luxor</option>
                                                                    <option value="El-Mansura">El-Mansura</option>
                                                                    <option value="El-Mahalla El-Kubra">El-Mahalla El-Kubra</option>
                                                                    <option value="Tanta">Tanta</option>
                                                                    <option value="Asyut">Asyut</option>
                                                                    <option value="Ismailia">Ismailia</option>
                                                                    <option value="Fayyum">Fayyum</option>
                                                                    <option value="Zagazig">Zagazig</option>
                                                                    <option value="Aswan">Aswan</option>
                                                                    <option value="Damietta">Damietta</option>
                                                                    <option value="Damanhur">Damanhur</option>
                                                                    <option value="El-Minya">El-Minya</option>
                                                                    <option value="Beni Suef">Beni Suef</option>
                                                                    <option value="Qena">Qena</option>
                                                                    <option value="Sohag">Sohag</option>
                                                                    <option value="Hurghada">Hurghada</option>
                                                                    <option value="6th of October City">6th of October City</option>
                                                                    <option value="Shibin El Kom">Shibin El Kom</option>
                                                                    <option value="Banha">Banha</option>
                                                                    <option value="Kafr el-Sheikh">Kafr el-Sheikh</option>
                                                                    <option value="Arish">Arish</option>
                                                                    <option value="Mallawi">Mallawi</option>
                                                                    <option value="10th of Ramadan City">10th of Ramadan City</option>
                                                                    <option value="Bilbais">Bilbais</option>
                                                                    <option value="Marsa Matruh">Marsa Matruh</option>
                                                                    <option value="Idfu">Idfu</option>
                                                                    <option value="Mit Ghamr">Mit Ghamr</option>
                                                                    <option value="Al-Hamidiyya">Al-Hamidiyya</option>
                                                                    <option value="Desouk">Desouk</option>
                                                                    <option value="Qalyub">Qalyub</option>
                                                                    <option value="Abu Kabir">Abu Kabir</option>
                                                                    <option value="Kafr el-Dawwar">Kafr el-Dawwar</option>
                                                                    <option value="Girga">Girga</option>
                                                                    <option value="Akhmim">Akhmim</option>
                                                                    <option value="Akhmim">Matareya</option>
                                                                </select>
                                                                <label class="form-sub-label" for="input_23_state" id="sublabel_23_state" style="min-height:13px;"> City </label>
                                                          </span>
                                                        </td>
                                                  </tr>
                                                </tbody>
                                          </table>
                                        </div>
                                  </li>
                                  <li class="form-line jf-required" data-type="control_radio" id="id_24">
                                        <label class="form-label form-label-left form-label-auto" id="label_24" for="input_24">
                                          Gender
                                          <span class="form-required">
                                                *
                                          </span>
                                        </label>
                                        <div id="cid_24" class="form-input jf-required">
                                          <div class="form-single-column" data-component="radio">
                                                <span class="form-radio-item" style="clear:left;">
                                                  <span class="dragger-item">
                                                  </span>
                                                  <input type="radio" class="form-radio validate[required]" id="input_24_0" name="gender" value="Male" required="" />
                                                  <label id="label_input_24_0" for="input_24_0"> Male </label>
                                                </span>
                                                <span class="form-radio-item" style="clear:left;">
                                                  <span class="dragger-item">
                                                  </span>
                                                  <input type="radio" class="form-radio validate[required]" id="input_24_1" name="gender" value="Female" required="" />
                                                  <label id="label_input_24_1" for="input_24_1"> Female </label>
                                                </span>
                                          </div>
                                        </div>
                                  </li>
                                  <li class="form-line jf-required" data-type="control_dropdown" id="id_17">
                                        <label class="form-label form-label-left form-label-auto" id="label_17" for="input_17">
                                          Blood Group
                                          <span class="form-required">
                                                *
                                          </span>
                                        </label>
                                        <div id="cid_17" class="form-input jf-required">
                                          <select class="form-dropdown validate[required]" id="input_17" name="bloodGroup" style="width:150px;" data-component="dropdown" required="">
                                                <option value="">  </option>
                                                <option selected="" value="A+"> A+ </option>
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
                                  <li class="form-line" data-type="control_button" id="id_9">
                                        <div id="cid_9" class="form-input-wide">
                                          <div style="text-align:center;" class="form-buttons-wrapper">
                                              <button id="input_9" type="submit" class="form-submit-button form-submit-button-light" data-component="button" name="add">
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
    require_once '../template/BloodBankTemplate/footer.tpl';
?>
<!--form js-->

<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.5968" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
          setTimeout(function() {
                  $('input_51').hint('ex: 100');
           }, 20);

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("13", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); }, 0); });
 } 
 JotForm.setCalendar("13", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""});
        JotForm.clearFieldOnHide="disable";
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,null,null,null,null,null,null,null,null,null,null,{"name":"requestFor","qid":"11","text":"Request For Request","type":"control_head"},null,{"description":"","name":"whenYou","qid":"13","text":"When you need blood?","type":"control_datetime"},null,null,null,null,null,null,null,null,{"name":"submit","qid":"22","text":"Submit","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"phoneNumber","qid":"37","subLabel":"","text":"Phone Number","type":"control_textbox"},null,null,null,null,null,null,null,null,{"description":"","name":"patientAddress","qid":"46","text":"Patient Address","type":"control_address"},null,{"description":"","name":"bloodGroup","qid":"48","subLabel":"","text":"Blood Group","type":"control_dropdown"},{"description":"","name":"fullName","qid":"49","subLabel":"","text":"Full Name","type":"control_textbox"},null,{"description":"","name":"howMany","qid":"51","subLabel":"","text":"How many units you need? Amount(Unit/Bag) ","type":"control_number"},{"description":"","name":"message","qid":"52","subLabel":"","text":"Message","type":"control_textarea"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,null,null,null,null,null,null,null,null,null,null,{"name":"requestFor","qid":"11","text":"Request For Request","type":"control_head"},null,{"description":"","name":"whenYou","qid":"13","text":"When you need blood?","type":"control_datetime"},null,null,null,null,null,null,null,null,{"name":"submit","qid":"22","text":"Submit","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"phoneNumber","qid":"37","subLabel":"","text":"Phone Number","type":"control_textbox"},null,null,null,null,null,null,null,null,{"description":"","name":"patientAddress","qid":"46","text":"Patient Address","type":"control_address"},null,{"description":"","name":"bloodGroup","qid":"48","subLabel":"","text":"Blood Group","type":"control_dropdown"},{"description":"","name":"fullName","qid":"49","subLabel":"","text":"Full Name","type":"control_textbox"},null,{"description":"","name":"howMany","qid":"51","subLabel":"","text":"How many units you need? Amount(Unit/Bag) ","type":"control_number"},{"description":"","name":"message","qid":"52","subLabel":"","text":"Message","type":"control_textarea"}]);}, 20); 
</script>
<?php
    require_once '../template/BloodBankTemplate/end.tpl';
?>
