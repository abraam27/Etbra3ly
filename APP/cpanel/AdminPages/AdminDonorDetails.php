<?php
    require_once 'AdminSession.php';
    require_once '../../lib/donor.php';
    require_once '../../lib/organization.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in=1;
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5968" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5968" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5968" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<?php
    require_once '../template/AdminTemplate/head2.tpl';
?>
<!-- header -->
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Donors
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / Donor Details
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    require_once '../template/AdminTemplate/navbar.tpl';
?>
<!-- content -->
<div class="well">
    <?php
        if(isset($_GET['id'])){
            $donor = Donor::retreiveDonorById($_GET['id']);
            $bloodBank = Organization::retreiveOrganizationById($donor['bloodBankID']);
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
                                  <th scope="row">SSN : </th>
                                  <td width="550px">'.$donor['SSN'].'</td>
                          </tr>
                          <tr>
                                  <th scope="row">Birthdate : </th>
                                  <td>'.$donor['dateOfBirth'].'</td>
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
                          </tr>';
                          if(is_numeric($bloodBank['organizationID'])){
                              echo '<tr>
                                            <th scope="row">Blood bank : </th>
                                            <td><a href="AdminBloodBankDetails.php?id='.$bloodBank['organizationID'].'">'.$bloodBank['name'].'</a></td>
                                    </tr>';
                          }else{
                              echo '<tr>
                                            <th scope="row">Blood bank : </th>
                                            <td> - </td>
                                    </tr>';
                          }
                          
              echo'</tbody>
          </table>';
        }
    ?>
</div>
<?php
    require_once '../template/AdminTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/AdminTemplate/end.tpl';
?>

