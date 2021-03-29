<?php
    require_once '../../model/requestforblood.php';
    require_once '../../lib/donor.php';
    require_once '../template/DonorTemplate/head.tpl';
    $loginDonor = Donor::retreiveDonorById($_SESSION['donorID']);
?>
<!-- form style -->
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
    require_once '../template/DonorTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->

<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">

                <h3>
                    Request for blood
                </h3>

                <p class="page-breadcrumb">
                    <a href="DonorHome.php">Home</a> / Request for blood
                </p>

            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if(isset($_POST['Submit'])){
        $name = $_POST['name'];
        $contactNO = $_POST['contactNO'];
        $bloodGroup = $_POST['bloodGroup'];
        $amount = $_POST['amount'];
        $needBloodAddress = $_POST['needBloodAddress'];
        $needBloodDisrict = $_POST['needBloodDisrict'];
        $needBloodCity = $_POST['needBloodCity'];
        $message = $_POST['message'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $needBloodDate = $day . '-' . $month . '-' . $year;

        //echo $needBloodDate . ' - ' . $message;

        $requestForBlood = new RequestForBlood($name, $contactNO, $bloodGroup, $amount, $needBloodDate, $needBloodAddress, $needBloodDisrict, $needBloodCity, $message);
        if(is_numeric($requestForBlood->add())){
            echo '<div class="container greenMessage">
                    <p>Your Request has been Sent Successfully <i class="fa fa-smile-o"></i> !</p>
                </div>';
        } else {
            echo '<div class="container redMessage">
                    <p>Your Request is not Sent <i class="fa fa-frown-o"></i> Please try Again !</p>
                </div>';
        }

    }
?>
<section id="requestForBlood">

        <div class="container">
                <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <input type="hidden" name="formID" value="81192947976575" />
  <div class="form-all">
        <ul class="form-section page-section">
          <li id="cid_11" class="form-input-wide" data-type="control_head">
                <div class="form-header-group ">
                  <div class="header-text httal htvam">
                        <h2 id="header_11" class="form-header" data-component="header">
                          Request For Request
                        </h2>
                  </div>
                </div>
          </li>
          <li class="form-line jf-required" data-type="control_textbox" id="id_49">
                <label class="form-label form-label-left form-label-auto" id="label_49" for="input_49">
                  Full Name
                  <span class="form-required">
                        *
                  </span>
                </label>
                <div id="cid_49" class="form-input jf-required">
                  <input type="text" id="input_49" name="name" data-type="input-textbox" class="form-textbox validate[required]" size="30" value="" data-component="textbox" required="" />
                </div>
          </li>
          <li class="form-line jf-required" data-type="control_textbox" id="id_37">
                <label class="form-label form-label-left form-label-auto" id="label_37" for="input_37">
                  Phone Number
                  <span class="form-required">
                        *
                  </span>
                </label>
                <div id="cid_37" class="form-input jf-required">
                  <input type="text" id="input_37" name="contactNO" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="30" value="" data-component="textbox" required="" />
                </div>
          </li>
          <li class="form-line jf-required" data-type="control_dropdown" id="id_48">
                <label class="form-label form-label-left form-label-auto" id="label_48" for="input_48">
                  Blood Group
                  <span class="form-required">
                        *
                  </span>
                </label>
                <div id="cid_48" class="form-input jf-required">
                  <select class="form-dropdown validate[required]" id="input_48" name="bloodGroup" style="width:150px" data-component="dropdown" required="">
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
          <li class="form-line jf-required" data-type="control_datetime" id="id_13">
                <label class="form-label form-label-left form-label-auto" id="label_13" for="lite_mode_13">
                  When you need blood?
                  <span class="form-required">
                        *
                  </span>
                </label>
                <div id="cid_13" class="form-input jf-required">
                  <div data-wrapper-react="true">
                        <div style="display:none">
                          <span class="form-sub-label-container" style="vertical-align:top">
                                <input type="tel" class="form-textbox validate[required, limitDate]" id="day_13" name="day" size="2" data-maxlength="2" value="07" required="" />
                                <span class="date-separate">
                                   /
                                </span>
                                <label class="form-sub-label" for="day_13" id="sublabel_day" style="min-height:13px"> Day </label>
                          </span>
                          <span class="form-sub-label-container" style="vertical-align:top">
                                <input type="tel" class="form-textbox validate[required, limitDate]" id="month_13" name="month" size="2" data-maxlength="2" value="05" required="" />
                                <span class="date-separate">
                                   /
                                </span>
                                <label class="form-sub-label" for="month_13" id="sublabel_month" style="min-height:13px"> Month </label>
                          </span>
                          <span class="form-sub-label-container" style="vertical-align:top">
                                <input type="tel" class="form-textbox validate[required, limitDate]" id="year_13" name="year" size="4" data-maxlength="4" value="2018" required="" />
                                <label class="form-sub-label" for="year_13" id="sublabel_year" style="min-height:13px"> Year </label>
                          </span>
                        </div>
                        <span class="form-sub-label-container" style="vertical-align:top">
                          <input type="text" class="form-textbox validate[required, limitDate, validateLiteDate]" id="lite_mode_13" size="12" data-maxlength="12" data-age="" value="07/05/2018" required="" data-format="ddmmyyyy" data-seperator="/" placeholder="dd/mm/yyyy" />
                          <label class="form-sub-label" for="lite_mode_13" id="sublabel_litemode" style="min-height:13px">  </label>
                        </span>
                        <span class="form-sub-label-container" style="vertical-align:top">
                          <img alt="Pick a Date" id="input_13_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle" data-component="datetime" />
                          <label class="form-sub-label" for="input_13_pick" style="min-height:13px">  </label>
                        </span>
                  </div>
                </div>
          </li>
          <li class="form-line jf-required" data-type="control_address" id="id_46">
                <label class="form-label form-label-left form-label-auto" id="label_46" for="input_46_addr_line1">
                  Patient Address
                  <span class="form-required">
                        *
                  </span>
                </label>
                <div id="cid_46" class="form-input jf-required">
                  <table summary="" class="form-address-table" border="0" cellPadding="0" cellSpacing="0">
                        <tbody>
                          <tr>
                                <td colSpan="2">
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <input type="text" id="input_46_addr_line1" name="needBloodAddress" class="form-textbox validate[required] form-address-line" value="" data-component="address_line_1" required="" />
                                        <label class="form-sub-label" for="input_46_addr_line1" id="sublabel_46_addr_line1" style="min-height:13px"> Street Address </label>
                                  </span>
                                </td>
                          </tr>
                          <tr style="display:none">
                                <td colSpan="2">
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <input type="text" id="input_46_addr_line2" name="q46_patientAddress[addr_line2]" class="form-textbox form-address-line" size="46" value="" data-component="address_line_2" required="" />
                                        <label class="form-sub-label" for="input_46_addr_line2" id="sublabel_46_addr_line2" style="min-height:13px"> Street Address Line 2 </label>
                                  </span>
                                </td>
                          </tr>
                          <tr>
                                <td width="50%">
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <input type="text" id="input_46_city" name="needBloodDisrict" class="form-textbox validate[required] form-address-city" size="21" value="" data-component="city" required="" />
                                        <label class="form-sub-label" for="input_46_city" id="sublabel_46_city" style="min-height:13px"> District </label>
                                  </span>
                                </td>
                                <td>
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <select class="form-dropdown validate[required] form-address-state" name="needBloodCity" id="input_46_state" data-component="state" required="">
                                            <option selected="" value=""> Please Select </option>
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
                                        <label class="form-sub-label" for="input_46_state" id="sublabel_46_state" style="min-height:13px"> City </label>
                                  </span>
                                </td>
                          </tr>
                          <tr>
                                <td width="50%" style="display:none">
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <input type="text" id="input_46_postal" name="q46_patientAddress[postal]" class="form-textbox validate[required] form-address-postal" size="10" value="" data-component="zip" required="" />
                                        <label class="form-sub-label" for="input_46_postal" id="sublabel_46_postal" style="min-height:13px"> Zip Code </label>
                                  </span>
                                </td>
                                <td style="display:none">
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <select class="form-dropdown validate[required] form-address-country" name="q46_patientAddress[country]" id="input_46_country" data-component="country" required="">
                                          <option value=""> Please Select </option>
                                          <option value="United States"> United States </option>
                                          <option value="Afghanistan"> Afghanistan </option>

                                        </select>
                                        <label class="form-sub-label" for="input_46_country" id="sublabel_46_country" style="min-height:13px"> Country </label>
                                  </span>
                                </td>
                          </tr>
                        </tbody>
                  </table>
                </div>
          </li>
          <li class="form-line" data-type="control_textarea" id="id_52">
                <label class="form-label form-label-left form-label-auto" id="label_52" for="input_52"> Message </label>
                <div id="cid_52" class="form-input">
                  <textarea id="input_52" class="form-textarea" name="message" cols="40" rows="6" data-component="textarea"></textarea>
                </div>
          </li>
          <li class="form-line" data-type="control_button" id="id_22">
                <div id="cid_22" class="form-input-wide">
                  <div style="text-align:center" class="form-buttons-wrapper">
                      <button id="input_22" type="submit" class="form-submit-button" data-component="button" name="Submit" value="submit">
                          Submit
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
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- form js -->
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
    require_once '../template/DonorTemplate/end.tpl';
?>
