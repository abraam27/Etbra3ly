<?php
    require_once 'BloodBankSession.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../../lib/organization.php';
    require_once '../../lib/donor.php';
    require_once '../../lib/process.php';
    require_once '../../lib/request.php';
    require_once '../template/BloodBankTemplate/head.tpl';
    $bloodBank = Organization::retreiveOrganizationById($_SESSION['organizationID']);
    $countMessages = 0;
    $countMessages = Request::countRequests(Request::retreiveAllRequestsOfOrganization($bloodBank['organizationID'])) + BloodRequest::countRequests(BloodRequest::retreiveAllBloodRequests($bloodBank['organizationID']));
?>
<!--form Style-->
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-light.css?3.3.5398"/>
<style>
    th,td{
            text-align: center
        }
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
                    Donors
                </h3>

                <p class="page-breadcrumb">
                    <a href="BloodBankHome.php">Home</a> / Donors / <a href="BloodBankAddDonor.php">Add Donor</a>
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if(isset($_GET['action'],$_GET['id'])){
        $action = $_GET['action'];
        $donorID = $_GET['id'];
        if(Process::deleteDonorById($donorID)){
            if(Request::deleteDonorById($donorID)){
                if(Donor::deleteDonorById($donorID)){
                    echo '<div class="container greenMessage">
                            <p>The Donor has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
                        </div>';
                }else{
                    echo '<div class="container redMessage">
                            <p>The Donor is not deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
                        </div>';
                }
            }else{
                echo '<div class="container redMessage">
                        <p>The Donor is not deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
            }
        }else{
            echo '<div class="container redMessage">
                    <p>The Donor is not deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
                </div>';
        }
        
    }
?>
        <section>
                <div class="container">
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
                                                <th scope="col">Donor Name</th>
                                                <th scope="col">Blood Group</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Last Donation Date</th>
                                                <th scope="col">DELETE</th>

                                        </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        $donors = Donor::retreiveAllDonorsByBloodBankID($bloodBank['organizationID']);
                                        if(is_array($donors) && count($donors)>0){
                                            foreach ($donors as $donor) {
                                            $toDayDate = date("d-m-20y");
                                            $donorBirthDate = $donor['dateOfBirth'];
                                            $age = round((strtotime($toDayDate)-strtotime($donorBirthDate))/(60*60*24*365));;
                                            echo '<tr>
                                                <th scope="row"><a href="BloodBankDonorDetails.php?id='.$donor['donorID'].'" > '.$donor['firstName'].' '.$donor['middleName'].' </a></th>
                                                <td>'.$donor['bloodGroup'].'</td>
                                                <td>'.$age.'</td>
                                                <td>'.$donor['lastDonationDate'].'</td>
                                                <td><a href="?action=delete&id='.$donor['donorID'].'" >DELETE</a></td>
                                            </tr>';
                                            }
                                        }else{
                                            echo '<tr>
                                                    <td colspan="5" style="text-align:center" scope="row"> There is no Blood Bags !!!</td>
                                                </tr>';
                                        }
                                        
                                        
                                    ?>
                                </tbody>
                        </table>
                </div>
        </section>
<?php
    require_once '../template/BloodBankTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/BloodBankTemplate/end.tpl';
?>
