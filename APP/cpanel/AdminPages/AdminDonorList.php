<?php
    require_once 'AdminSession.php';
    require_once '../../lib/donor.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in=1;
?>
<!-- form style -->
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-light.css?3.3.5398"/>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5398" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
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
                    Donors
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / Donors
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if(isset($_GET['id'],$_GET['action'])){
        $donorID = $_GET['id'];
        $action = $_GET['action'];
        switch ($action){
            case 'delete':
                if(Donor::deleteDonorById($donorID)){
                    echo '<div class="container greenMessage">
                            <p>The Donor has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
                        </div>';
                }else{
                    echo '<div class="container redMessage">
                            <p>The Donor is not Deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
                        </div>';
                }
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
                              Donors
                            </h1>
                      </div>
                    </div>
              </li>
    </ul>
    <table class="table">
            <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Donor Name</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Contact no</th>
                        <th scope="col">City</th>
                        <th scope="col">Status</th>
                        <th scope="col">DELETE</th>
                    </tr>
            </thead>
            <tbody>
                <?php
                    $count=1;
                    $donors = Donor::retreiveAllDonors();
                    if(is_array($donors) && count($donors)>0){
                        foreach ($donors as $donor) {
                            $duration = (strtotime(date("d-m-20y"))-strtotime($donor['lastDonationDate']))/(60*60*24);
                            echo '<tr>
                                    <td>'.$count++.'</td>
                                    <th scope="row"><a href="AdminDonorDetails.php?id='.$donor['donorID'].'">'.$donor['firstName'].' '.$donor['middleName'].' '.$donor['lastName'].'</a></th>
                                    <td>'.$donor['bloodGroup'].'</td>
                                    <td>'.$donor['phoneNo'].'</td>
                                    <td>'.$donor['city'].'</td>';
                            if($duration > 90){
                                echo '<td>AVAILABLE</td>';
                            } else {
                                echo '<td>UNAVAILABLE</td>';
                            }
                            echo '<td><a href="?action=delete&id='.$donor['donorID'].'">DELETE</a></td>
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

