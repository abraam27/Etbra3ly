<?php
    require_once 'AdminSession.php';
    require_once '../../lib/organization.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in=1;
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5398" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-light.css?3.3.5398"/>
<style>
    th,td{
            text-align: center
        }
</style>
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
                    Blood Banks
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / Blood Banks / <a href="AdminAddBloodBank.php">Add Blood Bank</a>
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if(isset($_GET['id'],$_GET['action'])){
        if(Organization::deleteOrganizationById($_GET['id'])){
            echo '<div class="container greenMessage">
                    <p>The Blood bank has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
                </div>';
        }else{
            echo '<div class="container redMessage">
                    <p>The Blood Bank is not Deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
                </div>';
        }
    }
?>
<?php
    require_once '../template/AdminTemplate/navbar.tpl';
?>
<!-- content -->
<div class="well">
    <ul class="form-section page-section">
              <li id="cid_10" class="form-input-wide" data-type="control_head">
                    <div class="form-header-group ">
                      <div class="header-text httal htvam">
                            <h1 id="header_10" class="form-header" data-component="header">
                              Blood Banks
                            </h1>
                      </div>
                    </div>
              </li>
    </ul>
    <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Blood Bank Name</th>
                    <th scope="col">District</th>
                    <th scope="col">City</th>
                    <th scope="col">Phone 1</th>
                    <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $bloodBanks = Organization::retreiveAllOrganizations("Blood Bank");
                    if(is_array($bloodBanks) && count($bloodBanks)>0){
                        foreach ($bloodBanks as $bloodBank) {
                            echo '<tr>
                                    <th scope="row"><a href="AdminBloodBankDetails.php?id='.$bloodBank['organizationID'].'">'.$bloodBank['name'].'</a></th>
                                    <td>'.$bloodBank['district'].'</td>
                                    <td>'.$bloodBank['city'].'</td>
                                    <td>'.$bloodBank['phone1'].'</td>
                                    <td><a href="?action=delete&id='.$bloodBank['organizationID'].'">DELETE</a></td>
                                </tr>';
                        }
                    }
                ?>

            </tbody>
    </table>
</div>
<?php
    require_once '../template/AdminTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/AdminTemplate/end.tpl';
?>

