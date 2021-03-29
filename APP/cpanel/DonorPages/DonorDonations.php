<?php
    require_once 'DonorSession.php';
    require_once '../../lib/process.php';
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
    require_once '../template/DonorTemplate/navbarAccount.tpl';
?>
<!--  PAGE HEADING -->

        <section class="page-header" data-stellar-background-ratio="1.2">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 text-center">


                        <h3>
                            My Donations
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="DonorHome.php">Home</a> / Donations
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->
		
		
		
	<section>
			<div class="container">
<!-- right list -->
<?php
    require_once '../template/DonorTemplate/verticalList.tpl';
?>
<!--  Content -->	
                            <div class="left-container-donor-account">
                                <section>
                                        <ul class="form-section page-section">
                                                  <li id="cid_10" class="form-input-wide" data-type="control_head">
                                                        <div class="form-header-group ">
                                                          <div class="header-text httal htvam">
                                                                <h1 id="header_10" class="form-header" data-component="header">
                                                                  Donations
                                                                </h1>
                                                          </div>
                                                        </div>
                                                  </li>
                                        </ul>
                                        <table class="table">
                                                <thead class="thead-dark">
                                                        <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Process</th>
                                                                <th scope="col">Place</th>
                                                                <th scope="col">Type</th>

                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $count = 1;
                                                        $processes = Process::retrieveProcessesByDonorID($loginDonor['donorID']);
                                                        //print_r($processes);
                                                        if(is_array($processes) && count($processes)>0){
                                                            foreach ($processes as $process) {
                                                                $place = Organization::retreiveOrganizationById($process['organizationID']);
                                                                echo '<tr>
                                                                        <th scope="row">'.$count++.'</th>
                                                                        <td>'.$process['date'].'</td>
                                                                        <td>'.$process['processType'].'</td>
                                                                        <td><a href="DonorHospitalDetails.php?id='.$place['organizationID'].'">'.$place['name'].'</a></td>
                                                                        <td>'.$place['type'].'</td>
                                                                    </tr>';
                                                            }
                                                            
                                                        }else{
                                                            echo '<tr>
                                                                <td colspan="5" style="text-align:center" scope="row"> There is no Donations !!!</td>
                                                            </tr>';
                                                        }
                                                    ?>
                                                </tbody>
                                        </table>

                                </section>
                            </div>
				
							
			</div>
		</section>
<?php
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
    require_once '../template/DonorTemplate/end.tpl';
?>