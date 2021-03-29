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
<!--form style-->
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
                    Edit Donor
                </h3>

                <p class="page-breadcrumb">
                    <a href="BloodBankHome.php">Home</a> / Edit Donor
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if(isset($_POST['edit'])){
        //collect data
        $donorID = $_POST['donorID'];
        $SSN = $_POST['SSN'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $bday = $_POST['bday'];
        $bmonth = $_POST['bmonth'];
        $byear = $_POST['byear'];
        $dateOfBirth = $bday . '-' . $bmonth .'-'. $byear;
        $gender = $_POST['gender'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $phoneNo = $_POST['phoneNo'];
        $email = $_POST['email'];
        $bloodGroup = $_POST['bloodGroup'];
        $lday = $_POST['lday'];
        $lmonth = $_POST['lmonth'];
        $lyear = $_POST['lyear'];
        $lastDonationDate = $lday . '-' . $lmonth .'-'. $lyear;
        $updatedDonor = new Donor($SSN, $firstName, $middleName, $lastName, $dateOfBirth, $gender, $district, $city, $phoneNo, $email, $bloodGroup, $lastDonationDate);
        //print_r($updatedDonor);
        if($updatedDonor->updateDonorInfoByBloodBankID($donorID)){
            echo '<div class="container greenMessage">
                    <p>The Donor has been Updated Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
        }else{
            echo '<div class="container redMessage">
                    <p>The Donor is not deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
		</div>';
        }
    }
?>
<section>
        <div class="container">
            <?php
                if($_GET['id']){
                    $donorID = $_GET['id'];
                    $donor = Donor::retreiveDonorById($donorID);
                    $bday = substr($donor['dateOfBirth'],0,2);
                    $bmonth = substr($donor['dateOfBirth'],3,2);
                    $byear = substr($donor['dateOfBirth'],6,4);
                    $lday = substr($donor['lastDonationDate'],0,2);
                    $lmonth = substr($donor['lastDonationDate'],3,2);
                    $lyear = substr($donor['lastDonationDate'],6,4);

                    echo '<form class="jotform-form" action="'.$_SERVER['PHP_SELF'].'" method="POST">
                    <input type="hidden" name="formID" value="81192947976575" />
                    <input type="hidden" name="donorID" value="'.$donorID.'" />
                    <div class="form-all">
                          <ul class="form-section page-section">
                            <li id="cid_11" class="form-input-wide" data-type="control_head">
                                  <div class="form-header-group ">
                                    <div class="header-text httal htvam">
                                          <h2 id="header_11" class="form-header" data-component="header">
                                            Edit Donor Information
                                          </h2>
                                    </div>
                                  </div>
                            </li>
                            <li class="form-line" data-type="control_textbox" id="id_43">
                                  <label class="form-label form-label-left form-label-auto" id="label_43" for="input_43"> SSN </label>
                                  <div id="cid_43" class="form-input">
                                    <input type="text" id="input_43" name="SSN" data-type="input-textbox" class="form-textbox validate[Numeric]" size="20" value="'.$donor['SSN'].'" data-component="textbox" />
                                  </div>
                            </li>
                            <li class="form-line" data-type="control_fullname" id="id_35">
                                  <label class="form-label form-label-left form-label-auto" id="label_35" for="first_35"> Donor Name </label>
                                  <div id="cid_35" class="form-input">
                                    <div data-wrapper-react="true">
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                            <input type="text" id="first_35" name="firstName" class="form-textbox" size="10" value="'.$donor['firstName'].'" data-component="first" />
                                            <label class="form-sub-label" for="first_35" id="sublabel_first" style="min-height:13px"> First Name </label>
                                          </span>
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                            <input type="text" id="middle_35" name="middleName" class="form-textbox" size="10" value="'.$donor['middleName'].'" data-component="middle" />
                                            <label class="form-sub-label" for="middle_35" id="sublabel_middle" style="min-height:13px"> Middle Name </label>
                                          </span>
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                            <input type="text" id="last_35" name="lastName" class="form-textbox" size="15" value="'.$donor['lastName'].'" data-component="last" />
                                            <label class="form-sub-label" for="last_35" id="sublabel_last" style="min-height:13px"> Last Name </label>
                                          </span>
                                    </div>
                                  </div>
                            </li>
                            <li class="form-line" data-type="control_datetime" id="id_33">
                                  <label class="form-label form-label-left form-label-auto" id="label_33" for="lite_mode_33"> BirthDate </label>
                                  <div id="cid_33" class="form-input">
                                    <div data-wrapper-react="true">
                                          <div style="display:none">
                                            <span class="form-sub-label-container" style="vertical-align:top">
                                                  <input type="tel" class="form-textbox validate[limitDate]" id="day_33" name="bday" size="2" data-maxlength="2" value="'.$bday.'" />
                                                  <span class="date-separate">
                                                     /
                                                  </span>
                                                  <label class="form-sub-label" for="day_33" id="sublabel_day" style="min-height:13px"> Day </label>
                                            </span>
                                            <span class="form-sub-label-container" style="vertical-align:top">
                                                  <input type="tel" class="form-textbox validate[limitDate]" id="month_33" name="bmonth" size="2" data-maxlength="2" value="'.$bmonth.'" />
                                                  <span class="date-separate">
                                                     /
                                                  </span>
                                                  <label class="form-sub-label" for="month_33" id="sublabel_month" style="min-height:13px"> Month </label>
                                            </span>
                                            <span class="form-sub-label-container" style="vertical-align:top">
                                                  <input type="tel" class="form-textbox validate[limitDate]" id="year_33" name="byear" size="4" data-maxlength="4" value="'.$byear.'" />
                                                  <label class="form-sub-label" for="year_33" id="sublabel_year" style="min-height:13px"> Year </label>
                                            </span>
                                          </div>
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                            <input type="text" class="form-textbox validate[limitDate, validateLiteDate]" id="lite_mode_33" size="12" data-maxlength="12" data-age="" value="'.$donor['dateOfBirth'].'" data-format="ddmmyyyy" data-seperator="/" placeholder="dd/mm/yyyy" />
                                            <label class="form-sub-label" for="lite_mode_33" id="sublabel_litemode" style="min-height:13px">  </label>
                                          </span>
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                            <img alt="Pick a Date" id="input_33_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle" data-component="datetime" />
                                            <label class="form-sub-label" for="input_33_pick" style="min-height:13px">  </label>
                                          </span>
                                    </div>
                                  </div>
                            </li>
                            <li class="form-line" data-type="control_textbox" id="id_37">
                                  <label class="form-label form-label-left form-label-auto" id="label_37" for="input_37"> Phone Number </label>
                                  <div id="cid_37" class="form-input">
                                    <input type="text" id="input_37" name="phoneNo" data-type="input-textbox" class="form-textbox validate[Numeric]" size="20" value="'.$donor['phoneNo'].'" data-component="textbox" />
                                  </div>
                            </li>
                            <li class="form-line" data-type="control_email" id="id_45">
                                  <label class="form-label form-label-left form-label-auto" id="label_45" for="input_45"> Email </label>
                                  <div id="cid_45" class="form-input">
                                    <span class="form-sub-label-container" style="vertical-align:top">
                                          <input type="email" id="input_45" name="email" class="form-textbox validate[Email]" size="30" value="'.$donor['email'].'" data-component="email" />
                                          <label class="form-sub-label" for="input_45" style="min-height:13px"> username@gmail.com </label>
                                    </span>
                                  </div>
                            </li>
                            <li class="form-line" data-type="control_address" id="id_46">
                                  <label class="form-label form-label-left form-label-auto" id="label_46" for="input_46_addr_line1"> Address </label>
                                  <div id="cid_46" class="form-input">
                                    <table summary="" class="form-address-table" border="0" cellPadding="0" cellSpacing="0">
                                          <tbody>
                                            <tr>
                                                  <td width="50%">
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <input type="text" id="input_46_city" name="district" class="form-textbox form-address-city" size="21" value="'.$donor['district'].'" data-component="city" />
                                                          <label class="form-sub-label" for="input_46_city" id="sublabel_46_city" style="min-height:13px"> District </label>
                                                    </span>
                                                  </td>
                                                  <td>
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <select class="form-dropdown form-address-state" name="city" id="input_46_state" data-component="state">
                                                            <option selected="" value="'.$donor['city'].'"> '.$donor['city'].' </option>
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
                                                          <input type="text" id="input_46_postal" name="q46_address[postal]" class="form-textbox form-address-postal" size="10" value="" data-component="zip" />
                                                          <label class="form-sub-label" for="input_46_postal" id="sublabel_46_postal" style="min-height:13px"> Zip Code </label>
                                                    </span>
                                                  </td>
                                                  <td style="display:none">
                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                          <select class="form-dropdown form-address-country" name="q46_address[country]" id="input_46_country" data-component="country">
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
                            </li>';
                        if($donor['gender'] == "Male" || $donor['gender'] == "male"){
                            echo '<li class="form-line" data-type="control_radio" id="id_47">
                                  <label class="form-label form-label-left form-label-auto" id="label_47" for="input_47"> Gender </label>
                                  <div id="cid_47" class="form-input">
                                    <div class="form-single-column" data-component="radio">
                                          <span class="form-radio-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="radio" class="form-radio" id="input_47_0" name="gender" checked="" value="Male" />
                                            <label id="label_input_47_0" for="input_47_0"> Male </label>
                                          </span>
                                          <span class="form-radio-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="radio" class="form-radio" id="input_47_1" name="gender" value="Female" />
                                            <label id="label_input_47_1" for="input_47_1"> Female </label>
                                          </span>
                                    </div>
                                  </div>
                            </li>';
                        } else {
                            echo '<li class="form-line" data-type="control_radio" id="id_47">
                                  <label class="form-label form-label-left form-label-auto" id="label_47" for="input_47"> Gender </label>
                                  <div id="cid_47" class="form-input">
                                    <div class="form-single-column" data-component="radio">
                                          <span class="form-radio-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="radio" class="form-radio" id="input_47_0" name="gender" value="Male" />
                                            <label id="label_input_47_0" for="input_47_0"> Male </label>
                                          </span>
                                          <span class="form-radio-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="radio" class="form-radio" id="input_47_1" name="gender" checked="" value="Female" />
                                            <label id="label_input_47_1" for="input_47_1"> Female </label>
                                          </span>
                                    </div>
                                  </div>
                            </li>';
                        }

                        echo '<li class="form-line" data-type="control_dropdown" id="id_48">
                                    <label class="form-label form-label-left form-label-auto" id="label_48" for="input_48"> Blood Group </label>
                                    <div id="cid_48" class="form-input">
                                      <select class="form-dropdown" id="input_48" name="bloodGroup" style="width:150px" data-component="dropdown">
                                            <option selected="" value="'.$donor['bloodGroup'].'"> '.$donor['bloodGroup'].' </option>
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
                                      Last Donation Date
                                      <span class="form-required">
                                            *
                                      </span>
                                    </label>
                                    <div id="cid_13" class="form-input jf-required">
                                      <div data-wrapper-react="true">
                                            <div style="display:none">
                                              <span class="form-sub-label-container" style="vertical-align:top">
                                                    <input type="tel" class="form-textbox validate[required, limitDate]" id="day_13" name="lday" size="2" data-maxlength="2" value="'.$lday.'" required="" />
                                                    <span class="date-separate">
                                                       /
                                                    </span>
                                                    <label class="form-sub-label" for="day_13" id="sublabel_day" style="min-height:13px"> Day </label>
                                              </span>
                                              <span class="form-sub-label-container" style="vertical-align:top">
                                                    <input type="tel" class="form-textbox validate[required, limitDate]" id="month_13" name="lmonth" size="2" data-maxlength="2" value="'.$lmonth.'" required="" />
                                                    <span class="date-separate">
                                                       /
                                                    </span>
                                                    <label class="form-sub-label" for="month_13" id="sublabel_month" style="min-height:13px"> Month </label>
                                              </span>
                                              <span class="form-sub-label-container" style="vertical-align:top">
                                                    <input type="tel" class="form-textbox validate[required, limitDate]" id="year_13" name="lyear" size="4" data-maxlength="4" value="'.$lyear.'" required="" />
                                                    <label class="form-sub-label" for="year_13" id="sublabel_year" style="min-height:13px"> Year </label>
                                              </span>
                                            </div>
                                            <span class="form-sub-label-container" style="vertical-align:top">
                                              <input type="text" class="form-textbox validate[required, limitDate, validateLiteDate]" id="lite_mode_13" size="12" data-maxlength="12" data-age="" value="'.$donor['lastDonationDate'].'" required="" data-format="ddmmyyyy" data-seperator="/" placeholder="dd/mm/yyyy" />
                                              <label class="form-sub-label" for="lite_mode_13" id="sublabel_litemode" style="min-height:13px">  </label>
                                            </span>
                                            <span class="form-sub-label-container" style="vertical-align:top">
                                              <img alt="Pick a Date" id="input_13_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle" data-component="datetime" />
                                              <label class="form-sub-label" for="input_13_pick" style="min-height:13px">  </label>
                                            </span>
                                      </div>
                                    </div>
                              </li>
                              <li class="form-line" data-type="control_button" id="id_22">
                                    <div id="cid_22" class="form-input-wide">
                                      <div style="text-align:center" class="form-buttons-wrapper">
                                          <button id="input_22" type="submit" class="form-submit-button" data-component="button" name="edit" value="edit">
                                              EDIT
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
    require_once '../template/BloodBankTemplate/footer.tpl';
?>
<!--form JS-->
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.5968" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("33", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); }, 0); });
 } 
 JotForm.setCalendar("33", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""});

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

   JotForm.prepareCalculationsOnTheFly([null,null,null,null,null,null,null,null,null,null,null,{"name":"editDonor","qid":"11","text":"Edit Donor Information","type":"control_head"},null,{"description":"","name":"lastDonation","qid":"13","text":"Last Donation Date","type":"control_datetime"},null,null,null,null,null,null,null,null,{"name":"edit","qid":"22","text":"EDIT","type":"control_button"},null,null,null,null,null,null,null,null,null,null,{"description":"","name":"birthdate","qid":"33","text":"BirthDate","type":"control_datetime"},null,{"description":"","name":"donorName","qid":"35","text":"Donor Name ","type":"control_fullname"},null,{"description":"","name":"phoneNumber","qid":"37","subLabel":"","text":"Phone Number","type":"control_textbox"},null,null,null,null,null,{"description":"","name":"ssn","qid":"43","subLabel":"","text":"SSN","type":"control_textbox"},null,{"description":"","name":"email45","qid":"45","subLabel":"username@gmail.com","text":"Email","type":"control_email"},{"description":"","name":"address","qid":"46","text":"Address","type":"control_address"},{"description":"","name":"gender","qid":"47","text":"Gender","type":"control_radio"},{"description":"","name":"bloodGroup","qid":"48","subLabel":"","text":"Blood Group","type":"control_dropdown"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,null,null,null,null,null,null,null,null,null,null,{"name":"editDonor","qid":"11","text":"Edit Donor Information","type":"control_head"},null,{"description":"","name":"lastDonation","qid":"13","text":"Last Donation Date","type":"control_datetime"},null,null,null,null,null,null,null,null,{"name":"edit","qid":"22","text":"EDIT","type":"control_button"},null,null,null,null,null,null,null,null,null,null,{"description":"","name":"birthdate","qid":"33","text":"BirthDate","type":"control_datetime"},null,{"description":"","name":"donorName","qid":"35","text":"Donor Name ","type":"control_fullname"},null,{"description":"","name":"phoneNumber","qid":"37","subLabel":"","text":"Phone Number","type":"control_textbox"},null,null,null,null,null,{"description":"","name":"ssn","qid":"43","subLabel":"","text":"SSN","type":"control_textbox"},null,{"description":"","name":"email45","qid":"45","subLabel":"username@gmail.com","text":"Email","type":"control_email"},{"description":"","name":"address","qid":"46","text":"Address","type":"control_address"},{"description":"","name":"gender","qid":"47","text":"Gender","type":"control_radio"},{"description":"","name":"bloodGroup","qid":"48","subLabel":"","text":"Blood Group","type":"control_dropdown"}]);}, 20); 
</script>
<?php
    require_once '../template/BloodBankTemplate/end.tpl';
?>
