<?php
    require_once 'AdminSession.php';
    require_once '../../lib/organization.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in=1;
?>
<!-- form style -->
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-light.css?3.3.5398"/>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5398" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<?php
    require_once '../template/AdminTemplate/head2.tpl';
?>
<!-- header -->
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Foundations
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / Foundation Details
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    require_once '../template/AdminTemplate/navbar.tpl';
?>
<!-- content -->
<div class="well">
    <?php
        if(isset($_GET['id'])){
            $foundation = Organization::retreiveOrganizationById($_GET['id']);
            echo '<ul class="form-section page-section">
                    <li id="cid_10" class="form-input-wide" data-type="control_head">
                          <div class="form-header-group ">
                            <div class="header-text httal htvam">
                                  <h1 id="header_10" class="form-header" data-component="header">
                                    <img src="../../upload'.$foundation['logo'].'" width="200px" length="200px" style="border-radius: 5%;"/>  '.$foundation['name'].'
                                  </h1>
                            </div>
                          </div>
                    </li>
                  </ul>
                  <table class="table">

                          <tbody>
                                  <tr>
                                          <th scope="row">Phone#1 : </th>
                                          <td>'.$foundation['phone1'].'</td>
                                  </tr>
                                  <tr>
                                          <th scope="row">Phone#2 : </th>
                                          <td>'.$foundation['phone2'].'</td>
                                  </tr>
                                  <tr>
                                          <th scope="row">Email : </th>
                                          <td>'.$foundation['email'].'</td>
                                  </tr>
                                  <tr>
                                          <th scope="row">Address : </th>
                                          <td width="600px">'.$foundation['address'].'</td>
                                  </tr>
                                  <tr>
                                          <th scope="row">District : </th>
                                          <td>'.$foundation['district'].'</td>
                                  </tr>
                                  <tr>
                                          <th scope="row">City : </th>
                                          <td>'.$foundation['city'].'</td>
                                  </tr>
                          </tbody>
                  </table>';
        }
        
    ?>
    
</div>
<?php
    require_once '../template/AdminTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/AdminTemplate/end.tpl';
?>

