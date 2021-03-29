<?php 
    require_once 'BloodBankSession.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../../lib/organization.php';
    require_once '../template/BloodBankTemplate/head.tpl';
    BloodRequest::updateView($_GET['id']);
    $bloodBank = Organization::retreiveOrganizationById($_SESSION['organizationID']);
    $countMessages = 0;
    $countMessages = Request::countRequests(Request::retreiveAllRequestsOfOrganization($bloodBank['organizationID'])) + BloodRequest::countRequests(BloodRequest::retreiveAllBloodRequests($bloodBank['organizationID']));
?>
<!-- form style -->
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-light.css?3.3.5398"/>
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<?php
    require_once '../template/BloodBankTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Blood Request Details
                </h3>

                <p class="page-breadcrumb">
                    <a href="BloodBankHome.php">Home</a> Blood Request Details
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

<section>
        <div class="container">
            <?php
                if(isset($_GET['id'])){
                    $bloodRequest = BloodRequest::readById($_GET['id']);
                    $neededHospitalInfo = Organization::retreiveOrganizationById($bloodRequest['neededOrganizationID']);
                    echo '<ul class="form-section page-section">
                            <li id="cid_10" class="form-input-wide" data-type="control_head">
                                  <div class="form-header-group ">
                                    <div class="header-text httal htvam">
                                          <h1 id="header_10" class="form-header" data-component="header">
                                            <img src="../../upload/'.$neededHospitalInfo['logo'].'" width="200px" length="200px" style="border-radius: 5%;"/>  '.$neededHospitalInfo['name'].'
                                          </h1>
                                    </div>
                                  </div>
                            </li>
                        </ul>
                        <table class="table">

                                  <tbody>
                                          <tr>
                                                  <th scope="row" width="400px">Phone#1 : </th>
                                                  <td>'.$neededHospitalInfo['phone1'].'</td>
                                          </tr>
                                          <tr>
                                                  <th scope="row">Phone#2 : </th>
                                                  <td>'.$neededHospitalInfo['phone2'].'</td>
                                          </tr>
                                          <tr>
                                                  <th scope="row">Email : </th>
                                                  <td>'.$neededHospitalInfo['email'].'</td>
                                          </tr>
                                          <tr>
                                                  <th scope="row">Address : </th>
                                                  <td>'.$neededHospitalInfo['address'].'</td>
                                          </tr>
                                          <tr>
                                                  <th scope="row">District : </th>
                                                  <td>'.$neededHospitalInfo['district'].'</td>
                                          </tr>
                                          <tr>
                                                  <th scope="row">City : </th>
                                                  <td>'.$neededHospitalInfo['city'].'</td>
                                          </tr>

                                  </tbody>
                          </table>';
                }
                
            ?>
            <ul class="form-section page-section">
                <li id="cid_10" class="form-input-wide" data-type="control_head">
                      <div class="form-header-group ">
                        <div class="header-text httal htvam">
                              <h1 id="header_10" class="form-header" data-component="header">
                                  Request Details
                              </h1>
                        </div>
                      </div>
                </li>
            </ul>
            <table class="table">

                    <tbody>
                        <?php
                            echo '<tr>
                                    <th scope="row" width="400px">Blood Group : </th>
                                    <td>'.$bloodRequest['bloodGroup'].'</td>
                            </tr>
                            <tr>
                                    <th scope="row">Amount : </th>
                                    <td>'.$bloodRequest['amount'].'</td>
                            </tr>
                            <tr>
                                    <th scope="row"># of Bags : </th>
                                    <td>'.$bloodRequest['numberOfBags'].'</td>
                            </tr>
                            <tr>
                                    <th scope="row">Date : </th>
                                    <td>'.$bloodRequest['date'].'</td>
                            </tr>';
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
