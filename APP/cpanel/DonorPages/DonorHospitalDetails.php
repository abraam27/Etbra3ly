<?php
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

<?php
    require_once '../template/DonorTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->

        <section class="page-header" data-stellar-background-ratio="1.2">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 text-center">


                        <h3>
                            Hospital Details
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="DonorHome.php">Home</a> / <a href="DonorHospitalList.php">Hospitals</a>
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->
		
        <section id="">
                <div class="container">
                    <?php
                        if(isset($_GET['id'])){
                            $hospitalID = $_GET['id'];
                            $hospital = Organization::retreiveOrganizationById($hospitalID);
                            echo '<ul class="form-section page-section">
                                    <li id="cid_10" class="form-input-wide" data-type="control_head">
                                          <div class="form-header-group ">
                                            <div class="header-text httal htvam">
                                                  <h1 id="header_10" class="form-header" data-component="header">
                                                    <img src="../../upload/'.$hospital['logo'].'" width="200px" length="200px" style="border-radius: 5%;"/>  '.$hospital['name'].'
                                                  </h1>
                                            </div>
                                          </div>
                                    </li>
                                </ul>
                                <table class="table">

                                        <tbody>
                                                <tr>
                                                        <th scope="row">Phone#1 : </th>
                                                        <td width="700px">'.$hospital['phone1'].'</td>
                                                </tr>
                                                <tr>
                                                        <th scope="row">Phone#2 : </th>
                                                        <td>'.$hospital['phone2'].'</td>
                                                </tr>
                                                <tr>
                                                        <th scope="row">Email : </th>
                                                        <td>'.$hospital['email'].'</td>
                                                </tr>
                                                <tr>
                                                        <th scope="row">Address : </th>
                                                        <td>'.$hospital['address'].'</td>
                                                </tr>
                                                <tr>
                                                        <th scope="row">District : </th>
                                                        <td>'.$hospital['district'].'</td>
                                                </tr>
                                                <tr>
                                                        <th scope="row">City : </th>
                                                        <td>'.$hospital['city'].'</td>
                                                </tr>

                                        </tbody>
                                </table>';
                        }
                    ?>
                </div>

        </section>
<?php
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/DonorTemplate/end.tpl';
?>
