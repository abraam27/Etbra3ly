<?php
    require_once 'HospitalSession.php';
    require_once '../../lib/organization.php';
    require_once '../../lib/donor.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../template/HospitalTemplate/head.tpl';
    $hospital = Organization::retreiveOrganizationById($_SESSION['organizationID']);
    $countMessages = 0;
    $countMessages = Request::countRequests(Request::retreiveAllRequestsOfOrganization($hospital['organizationID'])) + BloodRequest::countRequests(BloodRequest::retreiveAllBloodRequests($hospital['organizationID']));
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5968" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5968" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5968" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<style>
    th,td{
            text-align: center
        }
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
                    Donation Requests
                </h3>

                <p class="page-breadcrumb">
                    <a href="HospitalHome.php">Home</a> / Donation Requests
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if(isset($_GET['id'])){
        $requestID = $_GET['id'];
        if(Request::deleteRequestByID($requestID)){
            echo '<div class="container greenMessage">
                    <p>The Donation Request has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
                </div>';
        }else{
            echo '<div class="container redMessage">
                    <p>The Donation Request is not deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
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
                                          Donation Requests
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
                                        <th scope="col">Date</th>
                                        <th scope="col">View Details</th>

                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                $donationRequests = Request::retreiveAllRequestsOfOrganization($hospital['organizationID'],1);
                                if(is_array($donationRequests) && count($donationRequests)>0){
                                    foreach ($donationRequests as $donationRequest) {
                                        $donor = Donor::retreiveDonorById($donationRequest['donorID']);
                                        echo '<tr>
                                                <td scope="row" width="400px">'.$donor['firstName'].' '.$donor['lastName'].'</td>
                                                <td>'.$donor['bloodGroup'].'</td>
                                                <td>'.$donationRequest['date'].'</td>
                                                <td><a href="HospitalDonationRequestDetails.php?id='.$donationRequest['requestID'].'">VIEW</a></td>
                                            </tr>';
                                    }
                                }else{
                                    echo '<tr>
                                        <td colspan="4" style="text-align:center" scope="row"> There is no Donation Requests !!!</td>
                                    </tr>';
                                }
                            ?>
                        </tbody>
                </table>
        </div>

</section>
<?php
    require_once '../template/HospitalTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/HospitalTemplate/end.tpl';
?>
