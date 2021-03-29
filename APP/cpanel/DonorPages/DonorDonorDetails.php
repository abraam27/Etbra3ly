<?php
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
                    Donor Details
                </h3>

                <p class="page-breadcrumb">
                    <a href="DonorHome.php">Home</a> / <a href="DonorDonorList.php">Donors</a>
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
		
<section>
        <div class="container">
            <?php
                if(isset($_GET['id'])){
                    $donorID = $_GET['id'];
                    if($donorID == $loginDonor['donorID']){
                        header("location: DonorMyProfile.php");
                        exit();
                    }else{
                        $donor = Donor::retreiveDonorById($donorID);
                        $age = round((strtotime(date("d-m-20y"))-strtotime($donor['dateOfBirth']))/(60*60*24*365));
                        echo '<ul class="form-section page-section">
                                    <li id="cid_10" class="form-input-wide" data-type="control_head">
                                          <div class="form-header-group ">
                                            <div class="header-text httal htvam">
                                                  <h1 id="header_10" class="form-header" data-component="header">
                                                    <img src="../../upload/'.$donor['photo'].'" width="200px" length="200px" style="border-radius: 5%;"/>  '.$donor['firstName'].' '.$donor['middleName'].' '.$donor['lastName'].'
                                                  </h1>
                                            </div>
                                          </div>
                                    </li>
                                </ul>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Birthdate : </th>
                                            <td width="700px">'.$donor['dateOfBirth'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Age : </th>
                                            <td>'.$age.'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phone : </th>
                                            <td>'.$donor['phoneNo'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email : </th>
                                            <td>'.$donor['email'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">District : </th>
                                            <td>'.$donor['district'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">City : </th>
                                            <td>'.$donor['city'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Gender : </th>
                                            <td>'.$donor['gender'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Blood Group : </th>
                                            <td>'.$donor['bloodGroup'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Last Donation Date : </th>
                                            <td>'.$donor['lastDonationDate'].'</td>
                                        </tr>
                                    </tbody>
                            </table>';
                    }
                }
                    
                
            ?>
                



        </div>

</section>
<?php
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- form js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.5398" type="text/javascript"></script>
<?php
    require_once '../template/DonorTemplate/end.tpl';
?>
