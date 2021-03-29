<?php
    // Setting output buffer
    ob_start();
    if(!session_start()){
        session_start();
    }
    // Error Handling
    error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
    require_once '../template/AdminTemplate/head.tpl';
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.6537" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.6537" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.6537" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?"/>
<style type="text/css">
    .form-label-left{
        width:150px;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px;
    }
    .form-all{
        width:750px;
        color:#555 !important;
        font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
        font-size:17px;
    }
</style>

<style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
.form-label.form-label-auto {
        
        display: inline-block;
        float: left;
        text-align: left;
      
      } /*PREFERENCES STYLE*/
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
  
    
  
    .form-line {
      margin-top: 12px;
      margin-bottom: 12px;
    }
  
    .form-all {
      width: 750px;
    }
  
    .form-label-left,
    .form-label-right,
    .form-label-left.form-label-auto,
    .form-label-right.form-label-auto {
      width: 150px;
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
      background-color: #f5f5f5;
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
      background-color: #fff;
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
    require_once '../template/AdminTemplate/head2.tpl';
?>
<!-- header -->
<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username . $password;
        if($username == "Admin" && $password == "Admin"){
            $_SESSION["Admin"] = "Admin";
            // header used  to redirect to another page 
            header("location: AdminMessagesList.php");
            exit();
        }else{
            header("location: AdminLogin.php?message=error when login");
            exit();
        }
    }
?>
<section>
			
        <div class="container">
            <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="formID" value="81702046199559" />
                <div class="form-all">
                  <ul class="form-section page-section">
                    <li id="cid_1" class="form-input-wide" data-type="control_head">
                      <div class="form-header-group ">
                        <div class="header-text httal htvam">
                          <h2 id="header_1" class="form-header" data-component="header">
                            Admin Login
                          </h2>
                        </div>
                      </div>
                    </li>
                    <li class="form-line" data-type="control_textbox" id="id_3">
                      <label class="form-label form-label-left form-label-auto" id="label_3" for="input_3"> Username </label>
                      <div id="cid_3" class="form-input">
                        <input type="text" id="input_3" name="username" data-type="input-textbox" class="form-textbox" size="20" value="" data-component="textbox" />
                      </div>
                    </li>
                    <li class="form-line" data-type="control_textbox" id="id_4">
                      <label class="form-label form-label-left form-label-auto" id="label_4" for="input_4"> Password </label>
                      <div id="cid_4" class="form-input">
                        <input type="password" id="input_4" name="password" data-type="input-textbox" class="form-textbox" size="20" value="" data-component="textbox" />
                      </div>
                    </li>
                    <li class="form-line" data-type="control_button" id="id_2">
                      <div id="cid_2" class="form-input-wide">
                        <div style="text-align:center" class="form-buttons-wrapper">
                            <button id="input_2" type="submit" class="form-submit-button" data-component="button" name="login" value="login">
                            LOGIN
                          </button>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
            </form>
        </div>


</section>
<!-- START FOOTER  -->

<footer class="footer-distributed">

        <div class="footer-left">

                <h3><img src="images/logo-footer.png"/></h3>

                <p class="footer-links">
                        <a href="#">Home</a>
                        ·					·
                        <a href="#">About</a>
                        ·
                        <a href="#">Faq</a>
                        ·
                        <a href="#">Contact</a>
                </p>

                <p class="footer-company-name">Etbra3ly &copy; 2018</p>
        </div>

        <div class="footer-center">

                <div>
                        <i class="fa fa-map-marker"></i>
                        <p><span>64 El Shazly Street</span> Giza, Egypt</p>
                </div>

                <div>
                        <i class="fa fa-phone"></i>
                        <p>o1278055444</p>
                </div>

                <div>
                        <i class="fa fa-envelope"></i>
                        <p><a href="mailto:support@company.com" style="color:#FE3C47">support@company.com</a></p>
                </div>

        </div>

        <div class="footer-right">

                <p class="footer-company-about">
                        <span>About Etbra3ly</span>
                        A big Blood System help people to find blood that need Quickly and 
                        Help Blood banks and Hospitals to share blood bags and reduce to waste it.
                </p>


                <div class="col-md-4col-sm-12">
                        <div class="top-bar-social" style="margin-top:30px;float:left">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>   
                </div> 

        </div>

</footer>

<!-- END FOOTER  -->

<!-- Back To Top Button  -->

<a id="backTop">Back To Top</a>
<!-- form js -->
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.6537" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
      JotForm.alterTexts(undefined);
	JotForm.clearFieldOnHide="disable";
	JotForm.submitError="jumpToFirstError";
    /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,{"name":"foundationLogin","qid":"1","text":"Foundation Login","type":"control_head"},{"name":"submit2","qid":"2","text":"Submit","type":"control_button"},{"description":"","name":"typeA","qid":"3","subLabel":"","text":"Type a question","type":"control_textbox"},{"description":"","name":"typeA4","qid":"4","subLabel":"","text":"Type a question","type":"control_textbox"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"foundationLogin","qid":"1","text":"Foundation Login","type":"control_head"},{"name":"submit2","qid":"2","text":"Submit","type":"control_button"},{"description":"","name":"typeA","qid":"3","subLabel":"","text":"Type a question","type":"control_textbox"},{"description":"","name":"typeA4","qid":"4","subLabel":"","text":"Type a question","type":"control_textbox"}]);}, 20); 
</script>
<?php
    require_once '../template/AdminTemplate/end.tpl';
?>

