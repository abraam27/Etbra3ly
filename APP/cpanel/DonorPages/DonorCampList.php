<?php
    require_once '../../model/camp.php';
    require_once '../../lib/organization.php';
    require_once '../../lib/donor.php';
    require_once '../template/DonorTemplate/head.tpl';
    $loginDonor = Donor::retreiveDonorById($_SESSION['donorID']);
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
    require_once '../template/DonorTemplate/navbar.tpl';
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
                    <a href="DonorHome.php">Home</a> / Camps
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
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Organizer</th>

                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 1;
                                $camps = Camp::retreiveAllCamps();
                                if(is_array($camps) && count($camps)>0){
                                    foreach ($camps as $camp) {
                                        $hospital = Organization::retreiveOrganizationById($camp['hospitalID']);
                                        echo '<tr>
                                                <th scope="row">'.$count++.'</th>
                                                <td><a href="DonorCampDetials.php?id='.$camp['campID'].'">'.$camp['name'].'</a></td>
                                                <td>'.$camp['district'].'</td>
                                                <td>'.$camp['city'].'</td>
                                                <td>'.$camp['date'].'</td>
                                                <td>'.$camp['time'].'</td>
                                                <td><a href="DonorHospitalDetails.php?id='.$hospital['organizationID'].'">'.$hospital['name'].'</a></td>
                                            </tr>';
                                    }
                                }else{
                                    echo '<tr>
                                            <td colspan="7" style="text-align:center" scope="row"> There is no Camps !!!</td>
                                        </tr>';
                                }
                            ?>
                        </tbody>
                </table>
        </div>
</section>
<?php
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/DonorTemplate/end.tpl';
?>
