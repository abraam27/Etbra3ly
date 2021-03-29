<?php
    require_once 'DonorSession.php';
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
    require_once '../template/DonorTemplate/navbarAccount.tpl';
?>
<!--  PAGE HEADING -->

        <section class="page-header" data-stellar-background-ratio="1.2">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 text-center">


                        <h3>
                            My Profile
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="DonorHome.php">Home</a> / <a href="DonorEditProfile.php">Edit Profile</a>
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->
		
            <section>
                    <div class="container">
<!-- right list -->
<?php
    require_once '../template/DonorTemplate/verticalList.tpl';
?>
<!--  Content -->	
                    <div class="left-container-donor-account">
                            <section>
                                <?php
                                    
                                    echo '<ul class="form-section page-section">
                                              <li id="cid_10" class="form-input-wide" data-type="control_head">
                                                    <div class="form-header-group ">
                                                      <div class="header-text httal htvam">
                                                            <h1 id="header_10" class="form-header" data-component="header">
                                                              <img src="../../upload/'.$loginDonor['photo'].'" width="200px" length="200px" style="border-radius: 5%;"/>  '.$loginDonor['firstName'].' '.$loginDonor['middleName'].' '.$loginDonor['lastName'].'
                                                            </h1>
                                                      </div>
                                                    </div>
                                              </li>
                                            </ul>
                                            <table class="table">
                                                <tbody>
                                                        <tr>
                                                            <th scope="row">SSN : </th>
                                                            <td width="500px">'.$loginDonor['SSN'].'</td>
                                                    </tr>
                                                    <tr>
                                                            <th scope="row">Birthdate : </th>
                                                            <td>'.$donor['dateOfBirth'].'</td>
                                                    </tr>
                                                    <tr>
                                                            <th scope="row">Age : </th>
                                                            <td>'.round((strtotime(date("d-m-20y"))-strtotime($loginDonor['dateOfBirth']))/(60*60*24*365)).'</td>
                                                    </tr>
                                                    <tr>
                                                            <th scope="row">Phone : </th>
                                                            <td>'.$loginDonor['phoneNo'].'</td>
                                                    </tr>
                                                    <tr>
                                                            <th scope="row">Email : </th>
                                                            <td>'.$loginDonor['email'].'</td>
                                                    </tr>
                                                    <tr>
                                                            <th scope="row">District : </th>
                                                            <td>'.$loginDonor['district'].'</td>
                                                    </tr>
                                                    <tr>
                                                            <th scope="row">City : </th>
                                                            <td>'.$loginDonor['city'].'</td>
                                                    </tr>
                                                    <tr>
                                                            <th scope="row">Gender : </th>
                                                            <td>'.$loginDonor['gender'].'</td>
                                                    </tr>
                                                    <tr>
                                                            <th scope="row">Blood Group : </th>
                                                            <td>'.$loginDonor['bloodGroup'].'</td>
                                                    </tr>
                                                    <tr>
                                                            <th scope="row">Last Donation Date : </th>
                                                            <td>'.$loginDonor['lastDonationDate'].'</td>
                                                    </tr>
                                                </tbody>
                                            </table>';
                                ?>
                            </section>
                    </div>


                </div>
        </section>
<?php
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- JS -->
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