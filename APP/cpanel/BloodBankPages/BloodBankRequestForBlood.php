<?php
    require_once 'BloodBankSession.php';
    require_once '../../model/bloodbag.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../../lib/organization.php';
    require_once '../../lib/donor.php';
    require_once '../template/BloodBankTemplate/head.tpl';
    $bloodBank = Organization::retreiveOrganizationById($_SESSION['organizationID']);
    $countMessages = 0;
    $countMessages = Request::countRequests(Request::retreiveAllRequestsOfOrganization($bloodBank['organizationID'])) + BloodRequest::countRequests(BloodRequest::retreiveAllBloodRequests($bloodBank['organizationID']));
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
    require_once '../template/BloodBankTemplate/navbar.tpl';
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
                    <a href="BloodBankHome.php">Home</a> / Request for blood
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    //print_r(BloodBag::retreiveAllBloodbagsAvailable("A+", "Small", "Giza", "Blood bank"));
    //echo count(BloodBag::retreiveAllOraganiztionIDsOfAvailableBloogBags("A+", "Small", "Giza", "Hospital"));
    if(isset($_POST['submit'])){
        $numberOfBags = $_POST['num'];
        $bloodGroup = $_POST['bloodGroup'];
        $amount = $_POST['amount'];
        $donatedOrganizationID = $_POST['organizationID'];
        $neededOrganizationID = $bloodBank['organizationID'];
        if($donatedOrganizationID == 0){
            $donors = Donor::retreiveAllDonorsByBloodBankID($bloodBank['organizationID']);
            $count = 0;
            if(is_array($donors) && count($donors)>0){
                foreach ($donors as $donor) {
                    if($donor['bloodGroup'] == $bloodGroup && strtotime(date("d-m-20y"))-strtotime($donor['lastDonationDate'])/(60*60*24) > 90){
                        $message = 'Please '.$donor['firstname'].', 
                        come to '.$bloodBank['name'].' to donate';
                        $headers = 'From: '.$bloodBank['email'].'';
                        mail($donor['email'], "Donation", $message, $headers);
                        $count++;
                    }
                }
                if($count>0){
                    echo '<div class="container greenMessage">
                            <p>'.$count.' Email has been sent Successfully <i class="fa fa-smile-o"></i> !</p>
                        </div>';
                }
                else{
                    echo '<div class="container redMessage">
                            <p>The Emails is not Sent <i class="fa fa-frown-o"></i> Please try Again !</p>
                        </div>';
                }
            }else{
                echo '<div class="container redMessage">
                    <p>The Emails is not Sent <i class="fa fa-frown-o"></i> Please try Again !</p>
		</div>';
            }
        }
        $bloodRequest = new BloodRequest($neededOrganizationID, $donatedOrganizationID, $bloodGroup, $amount, $numberOfBags, date("d-m-20y"));
        //print_r($bloodRequest);
        if(is_numeric($bloodRequest->add())){
            echo '<div class="container greenMessage">
                    <p>Your Request has been Sent Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
        }else{
            echo '<div class="container redMessage">
                    <p>Your Request is not Sent <i class="fa fa-frown-o"></i> Please try Again !</p>
		</div>';
        }
    }
?>
<section>

        <div class="container">

            <?php  
            if(isset($_POST['select'])){
                $name = $_POST['name'];
                $num = $_POST['num'];
                $bloodGroup = $_POST['bloodGroup'];
                $amount = $_POST['amount'];
                $bloodBankBloodBags = BloodBag::retreiveAllBloodbagsAvailable($bloodGroup, $amount, $bloodBank['city'], "Blood Bank");
                //print_r($bloodBankBloodBags);
                $bloodBankIDs = BloodBag::retreiveAllOraganiztionIDsOfAvailableBloogBags($bloodGroup, $amount, $bloodBank['city'], "Blood Bank");
                //print_r($bloodBankIDs);
                $bloodBankCount = 0;
                $selectedBloodBankIDs[] = null;
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
                //print_r($selectedBloodBankIDs);
                //print_r($selectedHospitalIDs);
                echo '<form class="jotform-form" action="'. $_SERVER['PHP_SELF'].'" method="POST">
                      <input type="hidden" name="formID" value="81192947976575" />
                      <div class="form-all">
                            <ul class="form-section page-section">
                              <li id="cid_11" class="form-input-wide" data-type="control_head">
                                    <div class="form-header-group ">
                                      <div class="header-text httal htvam">
                                            <h2 id="header_11" class="form-header" data-component="header">
                                              Blood Bag Request
                                            </h2>
                                      </div>
                                    </div>
                              </li>
                              <li class="form-line jf-required" data-type="control_textbox" id="id_49">
                                    <label class="form-label form-label-left form-label-auto" id="label_49" for="input_49">
                                      Name
                                      <span class="form-required">
                                            *
                                      </span>
                                    </label>
                                    <div id="cid_49" class="form-input jf-required">
                                      <input type="text" id="input_49" name="name" data-type="input-textbox" class="form-textbox validate[required]" size="30" value="'.$name.'" data-component="textbox" required="" />
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
                                            <option selected="" value="'.$bloodGroup.'"> '.$bloodGroup.' </option>
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
                                            <option selected="" value="'.$num.'"> '.$num.' </option>
                                            <option value="1"> 1 </option>
                                            <option value="2"> 2 </option>
                                            <option value="3"> 3 </option>
                                            <option value="4"> 4 </option>
                                            <option value="5"> 5 </option>
                                            <option value="6"> 6 </option>
                                            <option value="7"> 7 </option>
                                            <option value="8"> 8 </option>
                                            <option value="9"> 9 </option>
                                            <option value="10"> 10 </option>
                                      </select>
                                    </div>
                              </li>
                              <li class="form-line jf-required" data-type="control_dropdown" id="id_25">
                                    <label class="form-label form-label-left form-label-auto" id="label_25" for="input_25">
                                      Choose Blood Bank
                                      <span class="form-required">
                                            *
                                      </span>
                                    </label>
                                    <div id="cid_25" class="form-input jf-required">
                                      <select class="form-dropdown validate[required]" id="input_25" name="organizationID" style="width:150px" data-component="dropdown" required="">
                                        <option value=""> Select Please ! </option>';
                                          if(is_array($selectedBloodBankIDs) && count($selectedBloodBankIDs)>0 && is_numeric($selectedBloodBankIDs[0])){
                                              for($i=0 ; $i<count($selectedBloodBankIDs) ; $i++){
                                                  
                                                  $selectedBloodBank = Organization::retreiveOrganizationById($selectedBloodBankIDs[$i]);
                                                  echo '<option value="'.$selectedBloodBank['organizationID'].'"> '.$selectedBloodBank['name'].' </option>';
                                              }
                                          }else{
                                              echo '<optgroup label="Send Emails to Donors">
                                              <option value="0"> SEND </option>
                                              </optgroup>';
                                          }
                                echo '</select>
                                    </div>
                              </li>
                              <li class="form-line" data-type="control_button" id="id_22">
                                    <div id="cid_22" class="form-input-wide">
                                      <div style="text-align:center" class="form-buttons-wrapper">
                                          <button id="input_22" type="submit" class="form-submit-button" data-component="button" name="submit" value="submit">
                                              Submit
                                            </button>
                                      </div>
                                    </div>
                              </li>

                            </ul>
                      </div>

                    </form>';
            
                
            }else{
                    echo '<form class="jotform-form" action="'. $_SERVER['PHP_SELF'].'" method="POST">
                      <input type="hidden" name="formID" value="81192947976575" />
                      <div class="form-all">
                            <ul class="form-section page-section">
                              <li id="cid_11" class="form-input-wide" data-type="control_head">
                                    <div class="form-header-group ">
                                      <div class="header-text httal htvam">
                                            <h2 id="header_11" class="form-header" data-component="header">
                                              Blood Request
                                            </h2>
                                      </div>
                                    </div>
                              </li>
                              <li class="form-line jf-required" data-type="control_textbox" id="id_49">
                                    <label class="form-label form-label-left form-label-auto" id="label_49" for="input_49">
                                      Name
                                      <span class="form-required">
                                            *
                                      </span>
                                    </label>
                                    <div id="cid_49" class="form-input jf-required">
                                      <input type="text" id="input_49" name="name" data-type="input-textbox" class="form-textbox validate[required]" size="30" value="'.$bloodBank['name'].'" data-component="textbox" required="" />
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
                                            <option value=""> Please Select !</option>
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
                                            <option value=""> Please Select !</option>
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
                                      <select class="form-dropdown validate[required]" id="input_25" name="num" style="width:150px" data-component="dropdown" required="">
                                            <option value=""> Please Select ! </option>
                                            <option value="1"> 1 </option>
                                            <option value="2"> 2 </option>
                                            <option value="3"> 3 </option>
                                            <option value="4"> 4 </option>
                                            <option value="5"> 5 </option>
                                            <option value="6"> 6 </option>
                                            <option value="7"> 7 </option>
                                            <option value="8"> 8 </option>
                                            <option value="9"> 9 </option>
                                            <option value="10"> 10 </option>
                                      </select>
                                    </div>
                              </li>
                              <li class="form-line" data-type="control_button" id="id_22">
                                    <div id="cid_22" class="form-input-wide">
                                      <div style="text-align:center" class="form-buttons-wrapper">
                                          <button id="input_22" type="submit" class="form-submit-button" data-component="button" name="select" value="select">
                                              Select Organization
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
    require_once '../template/BloodBankTemplate/end.tpl';
?>
