<?php
    require_once 'HospitalSession.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../../lib/organization.php';
    require_once '../../model/camp.php';
    require_once '../../model/attendcamp.php';
    require_once '../../lib/gallery.php';
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
                    Camps
                </h3>

                <p class="page-breadcrumb">
                    <a href="HospitalHome.php">Home</a> / Camps / <a href="HospitalCreateCamp.php">Create Camp</a>
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if(isset($_GET['id'])){
        $campID = $_GET['id'];
        if(AttendCamp::deleteCampDonors($campID)){
            if(Gallery::deleteAllImagesMyCampID($campID)){
                if(Camp::delete($campID)){
                    echo '<div class="container greenMessage">
                        <p>The Camp has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
                    </div>';
                } else {
                    echo '<div class="container redMessage">
                        <p>The Camp did not delete <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
                }
            } else {
                echo '<div class="container redMessage">
                        <p>Gallary of The Camp did not delete <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
            }
        } else {
            echo '<div class="container redMessage">
                    <p>Donors attend The Camp did not delete <i class="fa fa-frown-o"></i> Please try Again !</p>
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
                                          Camps
                                        </h1>
                                  </div>
                                </div>
                          </li>
                </ul>
                <table class="table">
                        <thead class="thead-dark">
                                <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Camp Name</th>
                                        <th scope="col">District</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Donors Number</th>
                                        <th scope="col">View Details</th>

                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 1;
                                $camps = Camp::retreiveTheHospitalCamps($hospital['organizationID']);
                                if(is_array($camps) && count($camps) > 0){
                                    foreach ($camps as $camp) {
                                        $donorIDs = AttendCamp::retreiveAllDonorIDsAttendTheCamp($camp['campID']);
                                        echo '<tr>
                                                <th scope="row">'.$count++.'</th>
                                                <td>'.$camp['name'].'</td>
                                                <td>'.$camp['city'].'</td>
                                                <td>'.$camp['district'].'</td>
                                                <td class="counter">'. count($donorIDs).'</td>
                                                <td><a href="HospitalCampDetails.php?id='.$camp['campID'].'">VIEW</a></td>
                                            </tr>';
                                    }
                                }else{
                                    echo '<tr>
                                        <td colspan="6" style="text-align:center" scope="row"> There is no Camps !!!</td>
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
