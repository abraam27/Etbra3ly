<?php
    require_once 'FoundationSession.php';
    require_once '../../lib/organization.php';
    require_once '../../model/event.php';
    require_once '../template/FoundationTemplate/head.tpl';
    $foundation = Organization::retreiveOrganizationById($_SESSION['organizationID']);
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.6111" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.6111" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.6111" />
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
    require_once '../template/FoundationTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->

<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Create Event
                </h3>

                <p class="page-breadcrumb">
                    <a href="FoundationCreateEvent.php">Home</a> / Create Event
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if(isset($_POST['send'])){
        //collect data
        $title = $_POST['title'];
        $content = $_POST['content'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $date = $day . '-' . $month . '-' . $year;
        $hour = $_POST['hour'];
        $min = $_POST['min'];
        $ampm = $_POST['ampm'];
        $time = $hour . ':' . $min . ' ' . $ampm;
        $address = $_POST['address'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $moreDetails = $_POST['moreDetails'];
        $foundationID = $foundation['organizationID'];
        $event = new Event($title, $content, $date, $time, $address, $district, $city, $moreDetails, $foundationID);
        if(is_numeric($event->add())){
            echo '<div class="container greenMessage">
                    <p>Your Event has been created Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
        }else{
            echo '<div class="container redMessage">
                    <p>Your Event did not Create <i class="fa fa-frown-o"></i> Please try Again !</p>
		</div>';
        }
    }
?>
        <section>

                <div class="container">

                    <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                          <input type="hidden" name="formID" value="81192947976575" />
                          <div class="form-all">
                                <ul class="form-section page-section">
                                  <li id="cid_11" class="form-input-wide" data-type="control_head">
                                        <div class="form-header-group ">
                                          <div class="header-text httal htvam">
                                                <h2 id="header_11" class="form-header" data-component="header">
                                                  Create Event
                                                </h2>
                                          </div>
                                        </div>
                                  </li>
                                  <li class="form-line jf-required" data-type="control_textbox" id="id_49">
                                        <label class="form-label form-label-left form-label-auto" id="label_49" for="input_49">
                                          Title
                                          <span class="form-required">
                                                *
                                          </span>
                                        </label>
                                        <div id="cid_49" class="form-input jf-required">
                                          <input type="text" id="input_49" name="title" data-type="input-textbox" class="form-textbox validate[required]" size="30" value="" data-component="textbox" required="" />
                                        </div>
                                  </li>
                                  <li class="form-line jf-required" data-type="control_textarea" id="id_52">
                                        <label class="form-label form-label-left form-label-auto" id="label_52" for="input_52">
                                          Content
                                          <span class="form-required">
                                                *
                                          </span>
                                        </label>
                                        <div id="cid_52" class="form-input jf-required">
                                          <textarea id="input_52" class="form-textarea validate[required]" name="content" cols="40" rows="6" data-component="textarea" required=""></textarea>
                                        </div>
                                  </li>
                                  <li class="form-line jf-required allowTime" data-type="control_datetime" id="id_53">
                                        <label class="form-label form-label-left form-label-auto" id="label_53" for="lite_mode_53">
                                          Date
                                          <span class="form-required">
                                                *
                                          </span>
                                        </label>
                                        <div id="cid_53" class="form-input jf-required">
                                          <div data-wrapper-react="true">
                                                <div style="display:none">
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                        <input type="tel" class="form-textbox validate[required, limitDate]" id="day_53" name="day" size="2" data-maxlength="2" value="" required="" />
                                                        <span class="date-separate">
                                                           -
                                                        </span>
                                                        <label class="form-sub-label" for="day_53" id="sublabel_day" style="min-height:13px"> Day </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                        <input type="tel" class="form-textbox validate[required, limitDate]" id="month_53" name="month" size="2" data-maxlength="2" value="" required="" />
                                                        <span class="date-separate">
                                                           -
                                                        </span>
                                                        <label class="form-sub-label" for="month_53" id="sublabel_month" style="min-height:13px"> Month </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                        <input type="tel" class="form-textbox validate[required, limitDate]" id="year_53" name="year" size="4" data-maxlength="4" value="" required="" />
                                                        <label class="form-sub-label" for="year_53" id="sublabel_year" style="min-height:13px"> Year </label>
                                                  </span>
                                                </div>
                                                <span class="form-sub-label-container" style="vertical-align:top">
                                                  <input type="text" class="form-textbox validate[required, limitDate, validateLiteDate]" id="lite_mode_53" size="12" data-maxlength="12" data-age="" value="" required="" data-format="ddmmyyyy" data-seperator="-" placeholder="dd-mm-yyyy" />
                                                  <label class="form-sub-label" for="lite_mode_53" id="sublabel_litemode" style="min-height:13px">  </label>
                                                </span>
                                                <span style="white-space:nowrap;display:inline-block" class="allowTime-container">
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                        <div id="at_53">
                                                          at
                                                        </div>
                                                        <label class="form-sub-label" for="at_53" style="min-height:13px">  </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                        <select class="time-dropdown form-dropdown validate[required, limitDate]" id="hour_53" name="hour">
                                                          <option>  </option>
                                                          <option value="01"> 1 </option>
                                                          <option value="02"> 2 </option>
                                                          <option value="03"> 3 </option>
                                                          <option value="04"> 4 </option>
                                                          <option value="05"> 5 </option>
                                                          <option value="06"> 6 </option>
                                                          <option value="07"> 7 </option>
                                                          <option value="08"> 8 </option>
                                                          <option value="09"> 9 </option>
                                                          <option value="10"> 10 </option>
                                                          <option value="11"> 11 </option>
                                                          <option value="12"> 12 </option>
                                                        </select>
                                                        <span class="date-separate">
                                                           :
                                                        </span>
                                                        <label class="form-sub-label" for="hour_53" id="sublabel_hour" style="min-height:13px"> Hour </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                        <select class="time-dropdown form-dropdown validate[required, limitDate]" id="min_53" name="min">
                                                          <option>  </option>
                                                          <option value="00"> 00 </option>
                                                          <option value="15"> 15 </option>
                                                          <option value="30"> 30 </option>
                                                          <option value="45"> 45 </option>
                                                        </select>
                                                        <label class="form-sub-label" for="min_53" id="sublabel_minutes" style="min-height:13px"> Minutes </label>
                                                  </span>
                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                        <select class="time-dropdown form-dropdown validate[required, limitDate]" id="ampm_53" name="ampm">
                                                          <option value="AM"> AM </option>
                                                          <option value="PM"> PM </option>
                                                        </select>
                                                        <label class="form-sub-label" for="ampm_53" style="min-height:13px">  </label>
                                                  </span>
                                                </span>
                                                <span class="form-sub-label-container" style="vertical-align:top">
                                                  <img alt="Pick a Date" id="input_53_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle" data-component="datetime" />
                                                  <label class="form-sub-label" for="input_53_pick" style="min-height:13px">  </label>
                                                </span>
                                          </div>
                                        </div>
                                  </li>
                                  <li class="form-line jf-required" data-type="control_address" id="id_55">
                                        <label class="form-label form-label-left form-label-auto" id="label_55" for="input_55_addr_line1">
                                          Address
                                          <span class="form-required">
                                                *
                                          </span>
                                        </label>
                                        <div id="cid_55" class="form-input jf-required">
                                          <table summary="" class="form-address-table" border="0" cellPadding="0" cellSpacing="0">
                                                <tbody>
                                                  <tr>
                                                        <td colSpan="2">
                                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                                <input type="text" id="input_55_addr_line1" name="address" class="form-textbox validate[required] form-address-line" value="" data-component="address_line_1" required="" />
                                                                <label class="form-sub-label" for="input_55_addr_line1" id="sublabel_55_addr_line1" style="min-height:13px"> Street Address </label>
                                                          </span>
                                                        </td>
                                                  </tr>
                                                  <tr style="display:none">
                                                        <td colSpan="2">
                                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                                <input type="text" id="input_55_addr_line2" name="q55_address[addr_line2]" class="form-textbox form-address-line" size="46" value="" data-component="address_line_2" required="" />
                                                                <label class="form-sub-label" for="input_55_addr_line2" id="sublabel_55_addr_line2" style="min-height:13px"> Street Address Line 2 </label>
                                                          </span>
                                                        </td>
                                                  </tr>
                                                  <tr>
                                                        <td width="50%">
                                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                                <input type="text" id="input_55_city" name="district" class="form-textbox validate[required] form-address-city" size="21" value="" data-component="city" required="" />
                                                                <label class="form-sub-label" for="input_55_city" id="sublabel_55_city" style="min-height:13px"> District </label>
                                                          </span>
                                                        </td>
                                                        <td>
                                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                                <select class="form-dropdown validate[required] form-address-state" name="city" id="input_55_state" data-component="state" required="">
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
                                                                <label class="form-sub-label" for="input_55_state" id="sublabel_55_state" style="min-height:13px"> City </label>
                                                          </span>
                                                        </td>
                                                  </tr>
                                                  <tr>
                                                        <td width="50%" style="display:none">
                                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                                <input type="text" id="input_55_postal" name="q55_address[postal]" class="form-textbox validate[required] form-address-postal" size="10" value="" data-component="zip" required="" />
                                                                <label class="form-sub-label" for="input_55_postal" id="sublabel_55_postal" style="min-height:13px"> Zip Code </label>
                                                          </span>
                                                        </td>
                                                        <td style="display:none">
                                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                                <select class="form-dropdown validate[required] form-address-country" name="q55_address[country]" id="input_55_country" data-component="country" required="">
                                                                  <option value=""> Please Select </option>
                                                                  <option value="United States"> United States </option>
                                                                  <option value="Afghanistan"> Afghanistan </option>
                                                                </select>
                                                                <label class="form-sub-label" for="input_55_country" id="sublabel_55_country" style="min-height:13px"> Country </label>
                                                          </span>
                                                        </td>
                                                  </tr>
                                                </tbody>
                                          </table>
                                        </div>
                                  </li>
                                  <li class="form-line" data-type="control_textarea" id="id_54">
                                        <label class="form-label form-label-left form-label-auto" id="label_54" for="input_54"> More Details </label>
                                        <div id="cid_54" class="form-input">
                                          <textarea id="input_54" class="form-textarea" name="moreDetails" cols="40" rows="6" data-component="textarea"></textarea>
                                        </div>
                                  </li>
                                  <li class="form-line" data-type="control_button" id="id_22">
                                        <div id="cid_22" class="form-input-wide">
                                          <div style="text-align:center" class="form-buttons-wrapper">
                                              <button id="input_22" type="submit" class="form-submit-button" data-component="button" name="send" value="send">
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
    require_once '../template/FoundationTemplate/footer.tpl';
?>
<!-- form JS -->
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.6111" type="text/javascript"></script>
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
        JotForm.clearFieldOnHide="disable";
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,null,null,null,null,null,null,null,null,null,null,{"name":"createEvent","qid":"11","text":"Create Event","type":"control_head"},null,null,null,null,null,null,null,null,null,null,{"name":"submit","qid":"22","text":"Submit","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"title","qid":"49","subLabel":"","text":"Title","type":"control_textbox"},null,null,{"description":"","name":"content","qid":"52","subLabel":"","text":"Content","type":"control_textarea"},{"description":"","name":"date","qid":"53","text":"Date","type":"control_datetime"},{"description":"","name":"moreDetails","qid":"54","subLabel":"","text":"More Details","type":"control_textarea"},{"description":"","name":"address","qid":"55","text":"Address","type":"control_address"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,null,null,null,null,null,null,null,null,null,null,{"name":"createEvent","qid":"11","text":"Create Event","type":"control_head"},null,null,null,null,null,null,null,null,null,null,{"name":"submit","qid":"22","text":"Submit","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"title","qid":"49","subLabel":"","text":"Title","type":"control_textbox"},null,null,{"description":"","name":"content","qid":"52","subLabel":"","text":"Content","type":"control_textarea"},{"description":"","name":"date","qid":"53","text":"Date","type":"control_datetime"},{"description":"","name":"moreDetails","qid":"54","subLabel":"","text":"More Details","type":"control_textarea"},{"description":"","name":"address","qid":"55","text":"Address","type":"control_address"}]);}, 20); 
</script>
<?php
    require_once '../template/FoundationTemplate/end.tpl';
?>
