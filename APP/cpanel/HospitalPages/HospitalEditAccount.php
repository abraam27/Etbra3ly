<?php
    require_once 'HospitalSession.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../../lib/organization.php';
    require_once '../template/HospitalTemplate/head.tpl';
    $flag;
    if(isset ($_POST['edit'])){
        //collect data
        $organizationID = $_POST['organizationID'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $logo = $_FILES['logo']['name'];
        $logoTmp = $_FILES['logo']['tmp_name'];
        $updatedHospital = new Organization($name, $address, $district, $city, $phone1, $phone2, $email, $username, $password, "Hospital", $logo, $logoTmp, $_SESSION['organizationID']);
        if($updatedHospital->updateOrganiztionById()){
            $flag = 1;
        }else{
            $flag = 2;
        }
    }
    $hospital = Organization::retreiveOrganizationById($_SESSION['organizationID']);
    $countMessages = 0;
    $countMessages = Request::countRequests(Request::retreiveAllRequestsOfOrganization($hospital['organizationID'])) + BloodRequest::countRequests(BloodRequest::retreiveAllBloodRequests($hospital['organizationID']));
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
    require_once '../template/HospitalTemplate/navbar.tpl';
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
                    <a href="HospitalHome.php">Home</a> / Edit Profile
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if($flag == 1){
        echo '<div class="container greenMessage">
                <p>Your Information has been Updated Successfully <i class="fa fa-smile-o"></i> !</p>
            </div>';
    }elseif ($flag == 2) {
        echo '<div class="container redMessage">
                <p>Your Information is not Updated <i class="fa fa-frown-o"></i> Please try Again !</p>
            </div>';
    }
?>
        <section>
                <div class="container">
<!--  Content -->	
                            <div class="left-container-donor-account">
                                    <section>
                                        <?php
                                            echo '<form class="jotform-form" action="'.$_SERVER['PHP_SELF'].'" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="formID" value="81192947976575" />
                                                    <div class="form-all">
                                                          <ul class="form-section page-section">
                                                            <li id="cid_58" class="form-input-wide" data-type="control_head">
                                                                  <div class="form-header-group ">
                                                                    <div class="header-text httal htvam">
                                                                          <h2 id="header_58" class="form-header" data-component="header">
                                                                            Edit Account
                                                                          </h2>
                                                                    </div>
                                                                  </div>
                                                            </li>
                                                            <li class="form-line jf-required" data-type="control_textbox" id="id_60">
                                                                  <label class="form-label form-label-left form-label-auto" id="label_60" for="input_60">
                                                                    Name
                                                                    <span class="form-required">
                                                                          *
                                                                    </span>
                                                                  </label>
                                                                  <div id="cid_60" class="form-input jf-required">
                                                                    <input type="text" id="input_60" name="name" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="20" value="'.$hospital['name'].'" data-component="textbox" required="" />
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
                                                                                <td colSpan="2">
                                                                                  <span class="form-sub-label-container" style="vertical-align:top">
                                                                                    <input type="text" id="input_7_addr_line1" name="address" class="form-textbox validate[required] form-address-line" value="'.$hospital['address'].'" data-component="address_line_1" required="" />
                                                                                    <label class="form-sub-label" for="input_7_addr_line1" id="sublabel_7_addr_line1" style="min-height:13px"> Street Address </label>
                                                                                  </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                  <td width="50%">
                                                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                                                          <input type="text" id="input_63_city" name="district" class="form-textbox validate[required] form-address-city" size="21" value="'.$hospital['district'].'" data-component="city" required="" />
                                                                                          <label class="form-sub-label" for="input_63_city" id="sublabel_63_city" style="min-height:13px"> District </label>
                                                                                    </span>
                                                                                  </td>
                                                                                  <td>
                                                                                    <span class="form-sub-label-container" style="vertical-align:top">
                                                                                          <select class="form-dropdown validate[required] form-address-state" name="city" id="input_63_state" data-component="state" required="">
                                                                                            <option selected="" value="'.$hospital['city'].'"> '.$hospital['city'].' </option>
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
                                                                    Phone1
                                                                    <span class="form-required">
                                                                          *
                                                                    </span>
                                                                  </label>
                                                                  <div id="cid_64" class="form-input jf-required">
                                                                    <input type="text" id="input_64" name="phone1" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="20" value="'.$hospital['phone1'].'" data-component="textbox" required="" />
                                                                  </div>
                                                            </li>
                                                            <li class="form-line jf-required" data-type="control_textbox" id="id_64">
                                                                  <label class="form-label form-label-left form-label-auto" id="label_64" for="input_64">
                                                                    Phone2
                                                                    <span class="form-required">
                                                                          *
                                                                    </span>
                                                                  </label>
                                                                  <div id="cid_64" class="form-input jf-required">
                                                                    <input type="text" id="input_64" name="phone2" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="20" value="'.$hospital['phone2'].'" data-component="textbox" required="" />
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
                                                                          <input type="email" id="input_59" name="email" class="form-textbox validate[required, Email]" size="30" value="'.$hospital['email'].'" data-component="email" required="" />
                                                                          <label class="form-sub-label" for="input_59" style="min-height:13px"> youremail@gmail.com </label>
                                                                    </span>
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
                                                                    <input type="text" id="input_68" name="username" data-type="input-textbox" class="form-textbox validate[required]" size="25" value="'.$hospital['username'].'" data-component="textbox" required="" />
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
                                                                      <input type="password" id="input_23" name="password" data-type="input-textbox" class="form-textbox validate[required]" size="25" value="'.$hospital['password'].'" data-component="textbox" required="" />
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
                                                                            <input type="file" id="input_69" name="logo" multiple="" class="form-upload-multiple" data-imagevalidate="yes" data-file-accept="pdf, doc, docx, xls, xlsx, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" data-file-maxsize="10854" data-file-minsize="0" data-file-limit="" data-component="fileupload" />
                                                                          </div>
                                                                    </div>
                                                                  </div>
                                                            </li>
                                                            <li class="form-line" data-type="control_button" id="id_57">
                                                                  <div id="cid_57" class="form-input-wide">
                                                                    <div style="text-align:center" class="form-buttons-wrapper">
                                                                        <button id="input_57" type="submit" class="form-submit-button" data-component="button" name="edit" value="edit">
                                                                            EDIT
                                                                          </button>
                                                                    </div>
                                                                  </div>
                                                            </li>

                                                          </ul>
                                                    </div>


                                                  </form>';      

                                                                    
                                        ?>
                                        

                                    </section>
                            </div>			
			</div>
		</section>
<?php
    require_once '../template/HospitalTemplate/footer.tpl';
?>
<!-- form js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    require_once '../template/HospitalTemplate/end.tpl';
?>
