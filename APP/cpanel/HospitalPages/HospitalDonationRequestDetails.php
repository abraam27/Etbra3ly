<?php
    require_once 'HospitalSession.php';
    require_once '../../lib/donor.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../../lib/organization.php';
    require_once '../template/HospitalTemplate/head.tpl';
    Request::UpdateRequestView($_GET['id']);
    $hospital = Organization::retreiveOrganizationById($_SESSION['organizationID']);
    $countMessages = 0;
    $countMessages = Request::countRequests(Request::retreiveAllRequestsOfOrganization($hospital['organizationID'])) + BloodRequest::countRequests(BloodRequest::retreiveAllBloodRequests($hospital['organizationID']));
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5398" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-light.css?3.3.5398"/>
<?php
    require_once '../template/HospitalTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->

<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Donation Request Details
                </h3>

                <p class="page-breadcrumb">
                    <a href="HospitalHome.php">Home</a> / <a href="HospitalDonationRequestsList.php">Donation Requests List</a> / <a href="HospitalAddDonationProcess.php?id=<?php echo $_GET['id']?>">Add Donation Process</a> / <a href="HospitalDonationRequestsList.php?id=<?php echo $_GET['id']?>">Delete Donation Request</a>
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
                                          Donation Request Details
                                        </h1>
                                  </div>
                                </div>
                          </li>
                </ul>
                <table class="table">
                    <tbody>
                        <?php
                            if(isset($_GET['id'])){
                                $request = Request::retreiveRequestByID($_GET['id']);
                                $donor = Donor::retreiveDonorById($request['donorID']);
                                echo '<tr>
                                        <th scope="row">Donor Name : </th>
                                        <td><a href="HospitalDonorDetails.php?id='.$donor['donorID'].'">'.$donor['firstName'].' '.$donor['middleName'].' '.$donor['lastName'].'</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Donor Blood Group :</th>
                                        <td>'.$donor['bloodGroup'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Donor District :</th>
                                        <td>'.$donor['district'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Donor City :</th>
                                        <td>'.$donor['city'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Donation Date :</th>
                                        <td>'.$request['date'].'</td>
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
