<?php
    require_once 'DonorSession.php';
    require_once '../../model/comment.php';
    require_once '../../lib/donor.php';
    require_once '../template/DonorTemplate/head.tpl';
    $loginDonor = Donor::retreiveDonorById($_SESSION['donorID']);
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.6489" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.6489" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.6489" />
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
<style>
    th,td{
            text-align: center
        }
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
                            My Comments
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="DonorHome.php">Home</a> / Comments
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->
		
		
		<?php
                    
                    if(isset($_POST['add'])){
                        $comment = $_POST['comment'];
                        $date = date("d-m-20y");
                        $comment = new Comment($comment, $loginDonor['donorID'], $date);
                        if(is_numeric($comment->add())){
                            echo '<div class="container greenMessage">
                                    <p>Your Comment has been Saved Successfully <i class="fa fa-smile-o"></i> !</p>
                                </div>';
                        }else{
                            echo '<div class="container redMessage">
                                    <p>Your Comment is not saved <i class="fa fa-frown-o"></i> Please try Again !</p>
                                </div>';
                        }
                    }
                    if(isset($_GET['action'])){
                        if($_GET['action'] == "delete"){
                            $commentID = $_GET['commentID'];
                            if(Comment::delete($commentID)){
                                echo '<div class="container greenMessage">
                                    <p>Your Comment has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
                                </div>';
                            }else{
                                echo '<div class="container redMessage">
                                    <p>Your Comment is not Deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
                                </div>';
                            }
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
                                    <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                      <input type="hidden" name="formID" value="81192947976575" />
                                      <div class="form-all">
                                            <ul class="form-section page-section">
                                              <li id="cid_58" class="form-input-wide" data-type="control_head">
                                                    <div class="form-header-group ">
                                                      <div class="header-text httal htvam">
                                                            <h2 id="header_58" class="form-header" data-component="header">
                                                              Add Comment
                                                            </h2>
                                                      </div>
                                                    </div>
                                              </li>
                                              <li class="form-line" data-type="control_textarea" id="id_59">
                                                    <label class="form-label form-label-left form-label-auto" id="label_59" for="input_59"> Your Comment </label>
                                                    <div id="cid_59" class="form-input">
                                                      <textarea id="input_59" class="form-textarea" name="comment" cols="40" rows="6" data-component="textarea"></textarea>
                                                    </div>
                                              </li>
                                              <li class="form-line" data-type="control_button" id="id_57">
                                                    <div id="cid_57" class="form-input-wide">
                                                      <div style="text-align:center" class="form-buttons-wrapper">
                                                          <button id="input_57" type="submit" class="form-submit-button" data-component="button" name="add" value="add">
                                                              ADD
                                                            </button>
                                                      </div>
                                                    </div>
                                              </li>

                                            </ul>
                                      </div>


                                    </form>

                                    <table class="table">
                                            <thead class="thead-dark">
                                                    <tr>
                                                            <th scope="col">My Comments</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">DELETE</th>

                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $comments = Comment::retreiveCommentsByDonorID($loginDonor['donorID']);
                                                    if(is_array($comments) && count($comments)>0){
                                                        foreach ($comments as $comment) {
                                                            echo '<tr>
                                                                    <td>'.$comment['comment'].'</td>
                                                                    <td width="120px">'.$comment['date'].'</td>
                                                                    <td width="100px"><a href="?action=delete&id='.$comment['commentID'].'">DELETE</a></td>
                                                                </tr>';
                                                        }
                                                    }else{
                                                        echo '<tr>
                                                                <td colspan="3" style="text-align:center" scope="row"> There is no Comments !!!</td>
                                                            </tr>';
                                                    }
                                                ?>
                                            </tbody>
                                    </table>

                                </section>
                            </div>			
			</div>
		</section>
<?php
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- JS -->
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
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.6489" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
        JotForm.clearFieldOnHide="disable";
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"name":"add","qid":"57","text":"ADD","type":"control_button"},{"name":"addComment","qid":"58","text":"Add Comment","type":"control_head"},{"description":"","name":"yourComment","qid":"59","subLabel":"","text":"Your Comment","type":"control_textarea"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"name":"add","qid":"57","text":"ADD","type":"control_button"},{"name":"addComment","qid":"58","text":"Add Comment","type":"control_head"},{"description":"","name":"yourComment","qid":"59","subLabel":"","text":"Your Comment","type":"control_textarea"}]);}, 20); 
</script>
<?php
    require_once '../template/DonorTemplate/end.tpl';
?>