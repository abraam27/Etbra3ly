<?php
    require_once 'HospitalSession.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../../lib/organization.php';
    require_once '../../model/attendcamp.php';
    require_once '../../model/camp.php';
    require_once '../../lib/donor.php';
    require_once '../template/HospitalTemplate/head.tpl';
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
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-light.css?3.3.5398"/>
<style>
    th,td{
            text-align: center
        }
</style>
<?php
    require_once '../template/HospitalTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<?php
    if(isset($_GET['id'])){
        $campID = $_GET['id'];
        $camp = Camp::readById($campID);
    }
?>
<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    <?php echo 'Donors attend ' . $camp['name'] ?> 
                </h3>

                <p class="page-breadcrumb">
                    <?php echo '<a href="HospitalHome.php">Home</a> / Donors attend ' . $camp['name'] . ' / <a href="HospitalCampDetails.php?id='. $camp['campID'].'">Camp Details</a>' ?>
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

        <section id="CreateCamp">
                <div class="container">
                        <ul class="form-section page-section">
                                  <li id="cid_10" class="form-input-wide" data-type="control_head">
                                        <div class="form-header-group ">
                                          <div class="header-text httal htvam">
                                                <h1 id="header_10" class="form-header" data-component="header">
                                                Donors attend the Camp
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
                                      <th scope="col">City</th>
                                      <th scope="col">Blood Group</th>
                                      <th scope="col">Age</th>
                                      <th scope="col">Contact NO</th>

                              </tr>
                      </thead>
                      <tbody>
                        <?php
                            $Aplus = 0;
                            $Aminus = 0;
                            $Bplus = 0;
                            $Bminus = 0;
                            $Oplus = 0;
                            $Ominus = 0;
                            $ABplus = 0;
                            $ABminus = 0;
                            if(isset($_GET['id'])){
                                $count = 1;
                                $donorIDs = AttendCamp::retreiveAllDonorIDsAttendTheCamp($_GET['id']);
                                if(is_array($donorIDs) && count($donorIDs) > 0){
                                    foreach ($donorIDs as $donorID) {
                                        $donor = Donor::retreiveDonorById($donorID['donorID']);
                                        if($donor['bloodGroup'] == "A+"){
                                            $Aplus++;
                                        }elseif($donor['bloodGroup'] == "A-"){
                                            $Aminus++;
                                        }elseif($donor['bloodGroup'] == "B+"){
                                            $Bplus++;
                                        }elseif($donor['bloodGroup'] == "B-"){
                                            $Bminus++;
                                        }elseif($donor['bloodGroup'] == "O+"){
                                            $Oplus++;
                                        }elseif($donor['bloodGroup'] == "O-"){
                                            $Ominus++;
                                        }elseif($donor['bloodGroup'] == "AB+"){
                                            $ABplus++;
                                        }elseif($donor['bloodGroup'] == "AB-"){
                                            $ABminus++;
                                        }
                                        $age = round((strtotime(date("d-m-20y"))-strtotime($donor['dateOfBirth']))/(60*60*24*365));
                                        
                                        echo '<tr>
                                                <th scope="row">'.$count++.'</th>
                                                <td><a href="HospitalDonorDetails.php?id='.$donor['donorID'].'">'.$donor['firstName'].' '.$donor['middleName'].' '.$donor['lastName'].'</a></td>
                                                <td>'.$donor['city'].'</td>
                                                <td>'.$donor['bloodGroup'].'</td>
                                                <td>'.$age.'</td>
                                                <td>'.$donor['phoneNo'].'</td>
                                            </tr>';
                                    }
                                }else{
                                    echo '<tr>
                                            <td colspan="6" style="text-align:center" scope="row"> There is no Donors !!!</td>
                                        </tr>';
                                }
                            }
                            
                        ?>
                              
                      </tbody>
              </table>
                <ul class="form-section page-section">
                          <li id="cid_10" class="form-input-wide" data-type="control_head">
                                <div class="form-header-group ">
                                  <div class="header-text httal htvam">
                                        <h1 id="header_10" class="form-header" data-component="header">
                                          Donors Number for each Blood Group
                                        </h1>
                                  </div>
                                </div>
                          </li>
                </ul>
                <table class="table">
                        <thead class="thead-dark">
                                <tr>
                                        <th scope="col">A+</th>
                                        <th scope="col">A-</th>
                                        <th scope="col">B+</th>
                                        <th scope="col">B-</th>
                                        <th scope="col">O+</th>
                                        <th scope="col">O-</th>
                                        <th scope="col">AB+</th>
                                        <th scope="col">AB-</th>
                                        <th scope="col">TOTAL</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                echo '<tr>
                                        <td class="counter">'.$Aplus.'</td>
                                        <td class="counter">'.$Aminus.'</td>
                                        <td class="counter">'.$Bplus.'</td>
                                        <td class="counter">'.$Bminus.'</td>
                                        <td class="counter">'.$Oplus.'</td>
                                        <td class="counter">'.$Ominus.'</td>
                                        <td class="counter">'.$ABplus.'</td>
                                        <td class="counter">'.$ABminus.'</td>
                                        <td class="counter">'.($Aplus+$Aminus+$Bplus+$Bminus+$Oplus+$Ominus+$ABplus+$ABminus).'</td>
                                </tr>';
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
