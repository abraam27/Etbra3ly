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
                    Messages
                </h3>

                <p class="page-breadcrumb">
                    <a href="HospitalHome.php">Home</a> / Messages
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

<section>

        <div class="container">

                <ul class="form-section page-section">
                          <li id="cid_10" class="form-input-wide" data-type="control_head">
                                <div class="form-header-group ">
                                  <div class="header-text httal htvam">
                                        <h1 id="header_10" class="form-header" data-component="header">
                                          Blood Requests
                                        </h1>
                                  </div>
                                </div>
                          </li>
                </ul>
                <table class="table">
                        <thead class="thead-dark">
                                <tr>
                                        <th scope="col">Hospital Name</th>
                                        <th scope="col">Blood Group</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col"># of Bags</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">View Details</th>

                                </tr>
                        
                        </thead>
                        <tbody>
                            <?php
                                $flag = 0;
                                $requests = BloodRequest::retreiveAllBloodRequests($hospital['organizationID']);
                                if(is_array($requests) && count($requests)>0){
                                    foreach ($requests as $request) {
                                        if((strtotime($request['date'])-strtotime(date("d-m-20y")))/(60*60*24) >= 0){
                                            $neededHospitalInfo = Organization::retreiveOrganizationById($request['neededOrganizationID']);
                                            echo '<tr>
                                                    <td scope="row" width="400px">'.$neededHospitalInfo['name'].'</td>
                                                    <td>'.$request['bloodGroup'].'</td>
                                                    <td>'.$request['amount'].'</td>
                                                    <td>'.$request['numberOfBags'].'</td>
                                                    <td>'.$request['date'].'</td>
                                                    <td><a href="HospitalBloodRequestDetails.php?id='.$request['bloodrequestID'].'">VIEW</a></td>
                                                </tr>';
                                            $flag = 1;
                                        }if($flag == 0){
                                            echo '<tr>
                                                    <td colspan="6" style="text-align:center" scope="row"> There is no Blood Requests !!!</td>
                                                </tr>';
                                        }
                                    }
                                }else{
                                    echo '<tr>
                                        <td colspan="6" style="text-align:center" scope="row"> There is no Blood Requests !!!</td>
                                    </tr>';
                                }
                            ?>
                        </tbody>
                </table>
                
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
                                $flag = 0;
                                $donationRequests = Request::retreiveAllRequestsOfOrganization($hospital['organizationID']);
                                if(is_array($donationRequests) && count($donationRequests)>0){
                                    foreach ($donationRequests as $donationRequest) {
                                        if((strtotime($donationRequest['date'])-strtotime(date("d-m-20y")))/(60*60*24) >= 0){
                                            $donor = Donor::retreiveDonorById($donationRequest['donorID']);
                                            echo '<tr>
                                                    <td scope="row" width="400px">'.$donor['firstName'].' '.$donor['lastName'].'</td>
                                                    <td>'.$donor['bloodGroup'].'</td>
                                                    <td>'.$donationRequest['date'].'</td>
                                                    <td><a href="HospitalDonationRequestDetails.php?id='.$donationRequest['requestID'].'">VIEW</a></td>
                                                </tr>';
                                            $flag = 1;
                                        }
                                    }if($flag == 0){
                                        echo '<tr>
                                                <td colspan="4" style="text-align:center" scope="row"> There is no Donation Requests !!!</td>
                                            </tr>';
                                    }
                                }else{
                                    echo '<tr>
                                        <td colspan="6" style="text-align:center" scope="row"> There is no Donation Requests !!!</td>
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
