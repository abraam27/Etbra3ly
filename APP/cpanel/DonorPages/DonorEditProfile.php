<?php
    require_once 'DonorSession.php';
    require_once '../../lib/donor.php';
    require_once '../template/DonorTemplate/head.tpl';
    $loginDonor = Donor::retreiveDonorById($_SESSION['donorID']);
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.6479" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.6479" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.6479" />
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
    require_once '../template/DonorTemplate/navbarAccount.tpl';
?>
        <!--  PAGE HEADING -->

<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Edit My Profile
                </h3>

                <p class="page-breadcrumb">
                    <a href="DonorHome.php">Home</a> / Edit Profile
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    //collect data
    if(isset ($_POST['edit'])){
        //collect data
        $SSN = $_POST['SSN'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $dateOfBirth = $day . '-' . $month .'-'. $year;
        $gender = $_POST['gender'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $phoneNo = $_POST['phoneNo'];
        $email = $_POST['email'];
        $bloodGroup = $_POST['bloodGroup'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $photo = $_FILES['photo']['name'];
        $photoTmp = $_FILES['photo']['tmp_name'];
        if(is_null($photo)){
            $updatedDonor = new Donor($SSN, $firstName, $middleName, $lastName, $dateOfBirth, $gender, $district, $city, $phoneNo, $email, $bloodGroup, $loginDonor['lastDonationDate'], $username, $password, $loginDonor['photo']);
            if($updatedDonor->updateDonorById($loginDonor)){
                echo '<div class="container greenMessage">
                        <p>Your Information has been Updated Successfully <i class="fa fa-smile-o"></i> !</p>
                    </div>';
            }else{
                echo '<div class="container redMessage">
                        <p>Your Information is not Updated <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
            }
        }
        $updatedDonor = new Donor($SSN, $firstName, $middleName, $lastName, $dateOfBirth, $gender, $district, $city, $phoneNo, $email, $bloodGroup, $loginDonor['lastDonationDate'], $username, $password, $photo, $photoTmp);
        if($updatedDonor->updateDonorById($loginDonor)){
            echo '<div class="container greenMessage">
                    <p>Your Information has been Updated Successfully <i class="fa fa-smile-o"></i> !</p>
                </div>';
        }else{
            echo '<div class="container redMessage">
                    <p>Your Information is not Updated <i class="fa fa-frown-o"></i> Please try Again !</p>
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
                                            <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="formID" value="81192947976575" />
                                                <div class="form-all">
                                                      <ul class="form-section page-section">
                                                        <li id="cid_58" class="form-input-wide" data-type="control_head">
                                                              <div class="form-header-group ">
                                                                <div class="header-text httal htvam">
                                                                      <h2 id="header_58" class="form-header" data-component="header">
                                                                        Edit Profile
                                                                      </h2>
                                                                </div>
                                                              </div>
                                                        </li>
                                                        <li class="form-line jf-required" data-type="control_textbox" id="id_60">
                                                              <label class="form-label form-label-left form-label-auto" id="label_60" for="input_60">
                                                                SSN
                                                                <span class="form-required">
                                                                      *
                                                                </span>
                                                              </label>
                                                              <div id="cid_60" class="form-input jf-required">
                                                                  <input type="text" id="input_60" name="SSN" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="20" value="<?php echo $loginDonor['SSN'];?>" data-component="textbox" required="" />
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
                                                                        <input type="text" id="first_56" name="firstName" class="form-textbox validate[required]" size="10" value="<?php echo $loginDonor['firstName'];?>" data-component="first" required="" />
                                                                        <label class="form-sub-label" for="first_56" id="sublabel_first" style="min-height:13px"> First Name </label>
                                                                      </span>
                                                                      <span class="form-sub-label-container" style="vertical-align:top">
                                                                        <input type="text" id="middle_56" name="middleName" class="form-textbox" size="10" value="<?php echo $loginDonor['middleName'];?>" data-component="middle" required="" />
                                                                        <label class="form-sub-label" for="middle_56" id="sublabel_middle" style="min-height:13px"> Middle Name </label>
                                                                      </span>
                                                                      <span class="form-sub-label-container" style="vertical-align:top">
                                                                        <input type="text" id="last_56" name="lastName" class="form-textbox validate[required]" size="15" value="<?php echo $loginDonor['lastName'];?>" data-component="last" required="" />
                                                                        <label class="form-sub-label" for="last_56" id="sublabel_last" style="min-height:13px"> Last Name </label>
                                                                      </span>
                                                                </div>
                                                              </div>
                                                        </li>
                                                        <li class="form-line jf-required" data-type="control_datetime" id="id_61">
                                                              <label class="form-label form-label-left form-label-auto" id="label_61" for="lite_mode_61">
                                                                BirthDate
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
                                                                        <input type="text" class="form-textbox validate[required, limitDate, validateLiteDate]" id="lite_mode_61" size="12" data-maxlength="12" data-age="" value="<?php echo $loginDonor['dateOfBirth'];?>" required="" data-format="ddmmyyyy" data-seperator="-" placeholder="dd-mm-yyyy" />
                                                                        <label class="form-sub-label" for="lite_mode_61" id="sublabel_litemode" style="min-height:13px">  </label>
                                                                      </span>
                                                                      <span class="form-sub-label-container" style="vertical-align:top">
                                                                        <img class="showAutoCalendar" alt="Pick a Date" id="input_61_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle" data-component="datetime" />
                                                                        <label class="form-sub-label" for="input_61_pick" style="min-height:13px">  </label>
                                                                      </span>
                                                                </div>
                                                              </div>
                                                        </li>
                                                        <li class="form-line jf-required" data-type="control_radio" id="id_62">
                                                              <label class="form-label form-label-left form-label-auto" id="label_62" for="input_62">
                                                                Gender
                                                                <span class="form-required">
                                                                      *
                                                                </span>
                                                              </label>
                                                              <div id="cid_62" class="form-input jf-required">
                                                                <div class="form-single-column" data-component="radio">
                                                                      <span class="form-radio-item" style="clear:left">
                                                                        <span class="dragger-item">
                                                                        </span>
                                                                          <input type="radio" class="form-radio validate[required]" id="input_62_0" name="gender" value="Male" required="" <?php if($loginDonor['gender'] == "Male") echo 'checked=""';?>/>
                                                                        <label id="label_input_62_0" for="input_62_0"> Male </label>
                                                                      </span>
                                                                      <span class="form-radio-item" style="clear:left">
                                                                        <span class="dragger-item">
                                                                        </span>
                                                                        <input type="radio" class="form-radio validate[required]" id="input_62_1" name="gender" value="Female" required="" <?php if($loginDonor['gender'] == "Female") echo 'checked=""';?>/>
                                                                        <label id="label_input_62_1" for="input_62_1"> Female </label>
                                                                      </span>
                                                                </div>
                                                              </div>
                                                        </li>
                                                        <li class="form-line jf-required" data-type="control_address" id="id_63">
                                                              <label class="form-label form-label-left form-label-auto" id="label_63" for="input_63_addr_line1">
                                                                Address
                                                                <span class="form-required">
                                                                      *
                                                                </span>
                                                              </label>
                                                              <div id="cid_63" class="form-input jf-required">
                                                                <table summary="" class="form-address-table" border="0" cellPadding="0" cellSpacing="0">
                                                                      <tbody>
                                                                        <tr>
                                                                              <td width="50%">
                                                                                <span class="form-sub-label-container" style="vertical-align:top">
                                                                                      <input type="text" id="input_63_city" name="district" class="form-textbox validate[required] form-address-city" size="21" value="<?php echo $loginDonor['district']?>" data-component="city" required="" />
                                                                                      <label class="form-sub-label" for="input_63_city" id="sublabel_63_city" style="min-height:13px"> District </label>
                                                                                </span>
                                                                              </td>
                                                                              <td>
                                                                                <span class="form-sub-label-container" style="vertical-align:top">
                                                                                      <select class="form-dropdown validate[required] form-address-state" name="city" id="input_63_state" data-component="state" required="">
                                                                                        <option selected="" value="<?php echo $loginDonor['city']?>"> <?php echo $loginDonor['city']?> </option>
                                                                                        <option value="Alabama"> Alabama </option>
                                                                                        <option value="Alaska"> Alaska </option>
                                                                                      </select>
                                                                                      <label class="form-sub-label" for="input_63_state" id="sublabel_63_state" style="min-height:13px"> City </label>
                                                                                </span>
                                                                              </td>
                                                                        </tr>

                                                                      </tbody>
                                                                </table>
                                                              </div>
                                                        </li>
                                                        <li class="form-line jf-required" data-type="control_textbox" id="id_64">
                                                              <label class="form-label form-label-left form-label-auto" id="label_64" for="input_64">
                                                                Phone ( Available )
                                                                <span class="form-required">
                                                                      *
                                                                </span>
                                                              </label>
                                                              <div id="cid_64" class="form-input jf-required">
                                                                <input type="text" id="input_64" name="phoneNo" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="20" value="<?php echo $loginDonor['phoneNo']?>" data-component="textbox" required="" />
                                                              </div>
                                                        </li>
                                                        <li class="form-line jf-required" data-type="control_email" id="id_59">
                                                              <label class="form-label form-label-left form-label-auto" id="label_59" for="input_59">
                                                                Email
                                                                <span class="form-required">
                                                                      *
                                                                </span>
                                                              </label>
                                                              <div id="cid_59" class="form-input jf-required">
                                                                <span class="form-sub-label-container" style="vertical-align:top">
                                                                      <input type="email" id="input_59" name="email" class="form-textbox validate[required, Email]" size="30" value="<?php echo $loginDonor['email']?>" data-component="email" required="" />
                                                                      <label class="form-sub-label" for="input_59" style="min-height:13px"> youremail@gmail.com </label>
                                                                </span>
                                                              </div>
                                                        </li>
                                                        <li class="form-line jf-required" data-type="control_dropdown" id="id_65">
                                                              <label class="form-label form-label-left form-label-auto" id="label_65" for="input_65">
                                                                Blood Group
                                                                <span class="form-required">
                                                                      *
                                                                </span>
                                                              </label>
                                                              <div id="cid_65" class="form-input jf-required">
                                                                <select class="form-dropdown validate[required]" id="input_65" name="bloodGroup" style="width:160px" data-component="dropdown" required="">
                                                                      <option value="<?php echo $loginDonor['bloodGroup']?>"> <?php echo $loginDonor['bloodGroup']?> </option>
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
                                                        <li class="form-line jf-required" data-type="control_textbox" id="id_68">
                                                              <label class="form-label form-label-left form-label-auto" id="label_68" for="input_68">
                                                                Username
                                                                <span class="form-required">
                                                                      *
                                                                </span>
                                                              </label>
                                                              <div id="cid_68" class="form-input jf-required">
                                                                <input type="text" id="input_68" name="username" data-type="input-textbox" class="form-textbox validate[required]" size="25" value="<?php echo $loginDonor['username']?>" data-component="textbox" required="" />
                                                              </div>
                                                        </li>
                                                        <li class="form-line jf-required" data-type="control_textbox" id="id_23">
                                                              <label class="form-label form-label-left form-label-auto" id="label_23" for="input_23">
                                                                Password
                                                                <span class="form-required">
                                                                      *
                                                                </span>
                                                              </label>
                                                              <div id="cid_23" class="form-input jf-required">
                                                                  <input type="password" id="input_23" name="password" data-type="input-textbox" class="form-textbox validate[required]" size="25" value="<?php echo $loginDonor['password']?>" data-component="textbox" required="" />
                                                              </div>
                                                        </li>
                                                        <li class="form-line" data-type="control_fileupload" id="id_69">
                                                              <label class="form-label form-label-left form-label-auto" id="label_69" for="input_69"> Your Photo </label>
                                                              <div id="cid_69" class="form-input">
                                                                <div data-wrapper-react="true">
                                                                      <div data-wrapper-react="true">
                                                                        <div class="qq-uploader-buttonText-value">
                                                                              Upload Photo
                                                                        </div>
                                                                        <input type="file" id="input_69" name="photo" multiple="" class="form-upload-multiple" data-imagevalidate="yes" data-file-accept="pdf, doc, docx, xls, xlsx, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" data-file-maxsize="10854" data-file-minsize="0" data-file-limit="" data-component="fileupload" />
                                                                      </div>
                                                                </div>
                                                              </div>
                                                        </li>
                                                        <li class="form-line" data-type="control_button" id="id_57">
                                                              <div id="cid_57" class="form-input-wide">
                                                                <div style="text-align:center" class="form-buttons-wrapper">
                                                                    <button id="input_57" type="submit" class="form-submit-button" data-component="button" name="edit" value="edit">
                                                                        Edit
                                                                      </button>
                                                                </div>
                                                              </div>
                                                        </li>

                                                      </ul>
                                                </div>
                                              </form>
                                        
                                    </section>
                            </div>			
			</div>
		</section>
<?php
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- JS -->
<script src="https://cdn.jotfor.ms/js/vendor/imageinfo.js?v=3.3.6479" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/file-uploader/fileuploader.js?v=3.3.6479"></script>
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.6479" type="text/javascript"></script>
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
JotForm.initCaptcha('input_67');
$('input_67_reload').observe('click',function(){ JotForm.reloadCaptcha('input_67') })
        JotForm.clearFieldOnHide="disable";
          setTimeout(function() {
                  JotForm.initMultipleUploads();
          }, 2);
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"password","qid":"23","subLabel":"","text":"Password","type":"control_textbox"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"donorName","qid":"56","text":"Donor Name","type":"control_fullname"},{"name":"register","qid":"57","text":"Register","type":"control_button"},{"name":"beA","qid":"58","text":"Be a blood Donor and Save lifes !","type":"control_head"},{"description":"","name":"email","qid":"59","subLabel":"youremail@gmail.com","text":"Email","type":"control_email"},{"description":"","name":"ssn","qid":"60","subLabel":"","text":"SSN","type":"control_textbox"},{"description":"","name":"birthdate","qid":"61","text":"BirthDate","type":"control_datetime"},{"description":"","name":"gender","qid":"62","text":"Gender","type":"control_radio"},{"description":"","name":"address","qid":"63","text":"Address","type":"control_address"},{"description":"","name":"phone","qid":"64","subLabel":"","text":"Phone ( Available )","type":"control_textbox"},{"description":"","name":"bloodGroup","qid":"65","subLabel":"","text":"Blood Group","type":"control_dropdown"},null,{"description":"","name":"enterThe","qid":"67","text":"Enter the message as it's shown","type":"control_captcha"},{"description":"","name":"username","qid":"68","subLabel":"","text":"Username","type":"control_textbox"},{"description":"","name":"yourPhoto","qid":"69","subLabel":"","text":"Your Photo","type":"control_fileupload"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"password","qid":"23","subLabel":"","text":"Password","type":"control_textbox"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"donorName","qid":"56","text":"Donor Name","type":"control_fullname"},{"name":"register","qid":"57","text":"Register","type":"control_button"},{"name":"beA","qid":"58","text":"Be a blood Donor and Save lifes !","type":"control_head"},{"description":"","name":"email","qid":"59","subLabel":"youremail@gmail.com","text":"Email","type":"control_email"},{"description":"","name":"ssn","qid":"60","subLabel":"","text":"SSN","type":"control_textbox"},{"description":"","name":"birthdate","qid":"61","text":"BirthDate","type":"control_datetime"},{"description":"","name":"gender","qid":"62","text":"Gender","type":"control_radio"},{"description":"","name":"address","qid":"63","text":"Address","type":"control_address"},{"description":"","name":"phone","qid":"64","subLabel":"","text":"Phone ( Available )","type":"control_textbox"},{"description":"","name":"bloodGroup","qid":"65","subLabel":"","text":"Blood Group","type":"control_dropdown"},null,{"description":"","name":"enterThe","qid":"67","text":"Enter the message as it's shown","type":"control_captcha"},{"description":"","name":"username","qid":"68","subLabel":"","text":"Username","type":"control_textbox"},{"description":"","name":"yourPhoto","qid":"69","subLabel":"","text":"Your Photo","type":"control_fileupload"}]);}, 20); 
</script>
<?php
    require_once '../template/DonorTemplate/end.tpl';
?>