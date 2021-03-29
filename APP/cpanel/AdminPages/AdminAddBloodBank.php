<?php
    require_once 'AdminSession.php';
    require_once '../../lib/organization.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in=1;
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.6507" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.6507" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.6507" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<style type="text/css">
    .form-label-left{
        width:200px;
    }
    .form-label-right{
        width:200px;
    }
    .form-all{
        width:750px;
        color:#555 !important;
        font-family:'Arial';
        font-size:15px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color: #616161;
    }

</style>

<style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
/*PREFERENCES STYLE*/
    .form-all {
      font-family: Arial, sans-serif;
    }
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-family: Arial, sans-serif;
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-family: Arial, sans-serif;
    }
    .form-header-group {
      font-family: Arial, sans-serif;
    }
    .form-label {
      font-family: Arial, sans-serif;
    }
  
    .form-label.form-label-auto {
      
    display: inline-block;
    float: left;
    text-align: left;
  
    }
  
    .form-line {
      margin-top: px;
      margin-bottom: px;
    }
  
    .form-all {
      width: 750px;
    }
  
    .form-label-left,
    .form-label-right,
    .form-label-left.form-label-auto,
    .form-label-right.form-label-auto {
      width: 200px;
    }
  
    .form-all {
      font-size: 15px
    }
    .form-all .qq-upload-button,
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-size: 15px
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-size: 15px
    }
  
    .supernova .form-all, .form-all {
      background-color: #ffffff;
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
      background-color: #ffffff;
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
<section class="page-header" data-stellar-background-ratio="1.2">

        <div class="container">

            <div class="row">

                <div class="col-sm-12 text-center">


                    <h3>
                        Blood Banks
                    </h3>

                    <p class="page-breadcrumb">
                        <a href="AdminMessagesList.php">Home</a> / ADD Blood Bank
                    </p>


                </div>

            </div> <!-- end .row  -->

        </div> <!-- end .container  -->

    </section> <!-- end .page-header  -->
    <?php
    if(isset($_POST['add'])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $logoName = $_FILES['logo']['name'];
        $logoTmp = $_FILES['logo']['tmp_name'];
        $bloodBank = new Organization($name, $address, $district, $city, $phone1, $phone2, $email, $username, $password, "Blood Bank", $logo, $logoTmp);
        if($bloodBank->addOrganization()){
            echo '<div class="container greenMessage">
                    <p>The Blood bank has been Added Successfully <i class="fa fa-smile-o"></i> !</p>
                </div>';
        }else{
            echo '<div class="container redMessage">
                    <p>The Blood bank is not Added <i class="fa fa-frown-o"></i> Please try Again !</p>
                </div>';
        }
    }
?>
<?php
    require_once '../template/AdminTemplate/navbar.tpl';
?>

<!-- content -->
<div class="well">
    <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="formID" value="80897926243570" />
      <div class="form-all">
        <ul class="form-section page-section">
          <li id="cid_1" class="form-input-wide" data-type="control_head">
            <div class="form-header-group ">
              <div class="header-text httal htvam">
                <h2 id="header_1" class="form-header" data-component="header">
                  Add Blood Bank
                </h2>
              </div>
            </div>
          </li>
          <li class="form-line jf-required" data-type="control_textbox" id="id_18">
            <label class="form-label form-label-left form-label-auto" id="label_18" for="input_18">
              Name
              <span class="form-required">
                *
              </span>
            </label>
            <div id="cid_18" class="form-input jf-required">
              <input type="text" id="input_18" name="name" data-type="input-textbox" class="form-textbox validate[required]" size="35" value="" data-component="textbox" required="" />
            </div>
          </li>
          <li class="form-line jf-required" data-type="control_address" id="id_7">
            <label class="form-label form-label-left form-label-auto" id="label_7" for="input_7_addr_line1">
              Address
              <span class="form-required">
                *
              </span>
            </label>
            <div id="cid_7" class="form-input jf-required">
              <table summary="" class="form-address-table" border="0" cellPadding="0" cellSpacing="0">
                <tbody>
                  <tr>
                    <td colSpan="2">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_7_addr_line1" name="address" class="form-textbox validate[required] form-address-line" value="" data-component="address_line_1" required="" />
                        <label class="form-sub-label" for="input_7_addr_line1" id="sublabel_7_addr_line1" style="min-height:13px"> Street Address </label>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_7_city" name="district" class="form-textbox validate[required] form-address-city" size="21" value="" data-component="city" required="" />
                        <label class="form-sub-label" for="input_7_city" id="sublabel_7_city" style="min-height:13px"> District </label>
                      </span>
                    </td>
                    <td>
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <select class="form-dropdown validate[required] form-address-state" name="city" id="input_7_state" data-component="state" required="">
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
                        <label class="form-sub-label" for="input_7_state" id="sublabel_7_state" style="min-height:13px"> City </label>
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </li>
          <li class="form-line jf-required" data-type="control_textbox" id="id_19">
            <label class="form-label form-label-left form-label-auto" id="label_19" for="input_19">
              Phone#1
              <span class="form-required">
                *
              </span>
            </label>
            <div id="cid_19" class="form-input jf-required">
              <input type="text" id="input_19" name="phone1" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="20" value="" data-component="textbox" required="" />
            </div>
          </li>
          <li class="form-line" data-type="control_textbox" id="id_20">
            <label class="form-label form-label-left form-label-auto" id="label_20" for="input_20"> Phone#2 </label>
            <div id="cid_20" class="form-input">
              <input type="text" id="input_20" name="phone2" data-type="input-textbox" class="form-textbox validate[Numeric]" size="20" value="" data-component="textbox" />
            </div>
          </li>
          <li class="form-line jf-required" data-type="control_email" id="id_21">
            <label class="form-label form-label-left form-label-auto" id="label_21" for="input_21">
              Email
              <span class="form-required">
                *
              </span>
            </label>
            <div id="cid_21" class="form-input jf-required">
              <span class="form-sub-label-container" style="vertical-align:top">
                <input type="email" id="input_21" name="email" class="form-textbox validate[required, Email]" size="30" value="" data-component="email" required="" />
                <label class="form-sub-label" for="input_21" style="min-height:13px"> organizationName@gmail.com </label>
              </span>
            </div>
          </li>
          <li class="form-line jf-required" data-type="control_textbox" id="id_22">
            <label class="form-label form-label-left form-label-auto" id="label_22" for="input_22">
              Username
              <span class="form-required">
                *
              </span>
            </label>
            <div id="cid_22" class="form-input jf-required">
              <input type="text" id="input_22" name="username" data-type="input-textbox" class="form-textbox validate[required]" size="20" value="" data-component="textbox" required="" />
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
              <input type="text" id="input_23" name="password" data-type="input-textbox" class="form-textbox validate[required]" size="20" value="" data-component="textbox" required="" />
            </div>
          </li>
          <li class="form-line jf-required" data-type="control_fileupload" id="id_24">
            <label class="form-label form-label-left form-label-auto" id="label_24" for="input_24">
              Logo
              <span class="form-required">
                *
              </span>
            </label>
            <div id="cid_24" class="form-input jf-required">
              <input type="file" id="input_24" name="logo" class="form-upload validate[required]" data-imagevalidate="yes" data-file-accept="pdf, doc, docx, xls, xlsx, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" data-file-maxsize="10854" data-file-minsize="0" data-file-limit="" data-component="fileupload" required="" />
            </div>
          </li>
          <li class="form-line" data-type="control_button" id="id_2">
            <div id="cid_2" class="form-input-wide">
              <div style="text-align:center" class="form-buttons-wrapper">
                  <button id="input_2" type="submit" class="form-submit-button" data-component="button" name="add" value="add">
                  ADD
                </button>
              </div>
            </div>
          </li>
        </ul>
      </div>


    </form>
</div>
<?php
    require_once '../template/AdminTemplate/footer.tpl';
?>
<!-- form js -->
<script src="https://cdn.jotfor.ms/js/vendor/imageinfo.js?v=3.3.6507" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.6507" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
    /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,{"name":"addBlood","qid":"1","text":"Add Blood Bank","type":"control_head"},{"name":"add","qid":"2","text":"ADD","type":"control_button"},null,null,null,null,{"name":"address","qid":"7","text":"Address","type":"control_address"},null,null,null,null,null,null,null,null,null,null,{"description":"","name":"name","qid":"18","subLabel":"","text":"Name","type":"control_textbox"},{"description":"","name":"phone1","qid":"19","subLabel":"","text":"Phone#1","type":"control_textbox"},{"description":"","name":"phone2","qid":"20","subLabel":"","text":"Phone#2","type":"control_textbox"},{"description":"","name":"email","qid":"21","subLabel":"organizationName@gmail.com","text":"Email","type":"control_email"},{"description":"","name":"username","qid":"22","subLabel":"","text":"Username","type":"control_textbox"},{"description":"","name":"password","qid":"23","subLabel":"","text":"Password","type":"control_textbox"},{"description":"","name":"logo","qid":"24","subLabel":"","text":"Logo","type":"control_fileupload"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"addBlood","qid":"1","text":"Add Blood Bank","type":"control_head"},{"name":"add","qid":"2","text":"ADD","type":"control_button"},null,null,null,null,{"name":"address","qid":"7","text":"Address","type":"control_address"},null,null,null,null,null,null,null,null,null,null,{"description":"","name":"name","qid":"18","subLabel":"","text":"Name","type":"control_textbox"},{"description":"","name":"phone1","qid":"19","subLabel":"","text":"Phone#1","type":"control_textbox"},{"description":"","name":"phone2","qid":"20","subLabel":"","text":"Phone#2","type":"control_textbox"},{"description":"","name":"email","qid":"21","subLabel":"organizationName@gmail.com","text":"Email","type":"control_email"},{"description":"","name":"username","qid":"22","subLabel":"","text":"Username","type":"control_textbox"},{"description":"","name":"password","qid":"23","subLabel":"","text":"Password","type":"control_textbox"},{"description":"","name":"logo","qid":"24","subLabel":"","text":"Logo","type":"control_fileupload"}]);}, 20); 
</script>
<script type="text/javascript">JotForm.ownerView=true;</script>

<?php
    require_once '../template/AdminTemplate/end.tpl';
?>

