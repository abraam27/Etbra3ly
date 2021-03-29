<?php
    require_once 'AdminSession.php';
    require_once '../../lib/organization.php';
    require_once '../../model/bloodbag.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in=1;
?>
<!-- form style -->
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-light.css?3.3.5398"/>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5398" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5398" />
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
                    Hospitals
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / Hospital Details
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
            $hospital = Organization::retreiveOrganizationById($_GET['id']);
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
                                          <td>'.$hospital['phone1'].'</td>
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
                                          <td width="600px">'.$hospital['address'].'</td>
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
    <ul class="form-section page-section">
                <li id="cid_10" class="form-input-wide" data-type="control_head">
                      <div class="form-header-group ">
                        <div class="header-text httal htvam">
                              <h1 id="header_10" class="form-header" data-component="header">
                                Blood Bags
                              </h1>
                        </div>
                      </div>
                </li>
      </ul>
      <table class="table">
              <thead class="thead-dark">
                      <tr>
                              <th scope="col" width="200px"></th>
                              <th scope="col">A+</th>
                              <th scope="col">A-</th>
                              <th scope="col">B+</th>
                              <th scope="col">B-</th>
                              <th scope="col">O+</th>
                              <th scope="col">O-</th>
                              <th scope="col">AB+</th>
                              <th scope="col">AB-</th>

                      </tr>
              </thead>
              <tbody>
                  <?php
                      $Aplus = BloodBag::retrieveAllBloodBagsOfOrganizationByGroup($hospital['organizationID'], "A+");
                      $Aminus = BloodBag::retrieveAllBloodBagsOfOrganizationByGroup($hospital['organizationID'], "A-");
                      $Bplus = BloodBag::retrieveAllBloodBagsOfOrganizationByGroup($hospital['organizationID'], "B+");
                      $Bminus = BloodBag::retrieveAllBloodBagsOfOrganizationByGroup($hospital['organizationID'], "B-");
                      $Oplus = BloodBag::retrieveAllBloodBagsOfOrganizationByGroup($hospital['organizationID'], "O+");
                      $Ominus = BloodBag::retrieveAllBloodBagsOfOrganizationByGroup($hospital['organizationID'], "O-");
                      $ABplus = BloodBag::retrieveAllBloodBagsOfOrganizationByGroup($hospital['organizationID'], "AB+");
                      $ABminus= BloodBag::retrieveAllBloodBagsOfOrganizationByGroup($hospital['organizationID'], "AB-");
                      echo '<tr>
                              <th scope="row">The Group\'s No</th>
                              <td class="counter">'.count($Aplus).'</td>
                              <td class="counter">'.count($Aminus).'</td>
                              <td class="counter">'.count($Bplus).'</td>
                              <td class="counter">'.count($Bminus).'</td>
                              <td class="counter">'.count($Oplus).'</td>
                              <td class="counter">'.count($Ominus).'</td>
                              <td class="counter">'.count($ABplus).'</td>
                              <td class="counter">'.count($ABminus).'</td>
                      </tr>
                      <tr>
                              <th scope="row">The Group\'s Needed</th>';
                      if(count($Aplus)<10){
                          echo '<td class="counter">'.(10-count($Aplus)).'</td>';
                      } else {
                          echo '<td class="counter">0</td>';
                      }if(count($Aminus)<10){
                          echo '<td class="counter">'.(10-count($Aminus)).'</td>';
                      } else {
                          echo '<td class="counter">0</td>';
                      }if(count($Bplus)<10){
                          echo '<td class="counter">'.(10-count($Bplus)).'</td>';
                      } else {
                          echo '<td class="counter">0</td>';
                      }if(count($Bminus)<10){
                          echo '<td class="counter">'.(10-count($Bminus)).'</td>';
                      } else {
                          echo '<td class="counter">0</td>';
                      }if(count($Oplus)<10){
                          echo '<td class="counter">'.(10-count($Oplus)).'</td>';
                      } else {
                          echo '<td class="counter">0</td>';
                      }if(count($Ominus)<10){
                          echo '<td class="counter">'.(10-count($Ominus)).'</td>';
                      } else {
                          echo '<td class="counter">0</td>';
                      }if(count($ABplus)<10){
                          echo '<td class="counter">'.(10-count($ABplus)).'</td>';
                      } else {
                          echo '<td class="counter">0</td>';
                      }if(count($ABminus)<10){
                          echo '<td class="counter">'.(10-count($ABminus)).'</td>';
                      } else {
                          echo '<td class="counter">0</td>';
                      }
                      echo '</tr>
                          <tr>
                              <th scope="row">The Group\'s Wasted</th>';
                      $countAplus = 0;
                      foreach ($Aplus as $bag) {
                          if(round((strtotime(date("d-m-20y"))-strtotime($bag['expiryDate']))/(60*60*24)) < 4){
                              $countAplus++;
                          }
                      }
                      echo '<td class="counter">'.$countAplus.'</td>';
                      $countAminus = 0;
                      foreach ($Aminus as $bag) {
                          if(round((strtotime(date("d-m-20y"))-strtotime($bag['expiryDate']))/(60*60*24)) < 4){
                              $countAminus++;
                          }
                      }
                      echo '<td class="counter">'.$countAminus.'</td>';
                      $countBplus = 0;
                      foreach ($Bplus as $bag) {
                          if(round((strtotime(date("d-m-20y"))-strtotime($bag['expiryDate']))/(60*60*24)) < 4){
                              $countBplus++;
                          }
                      }
                      echo '<td class="counter">'.$countBplus.'</td>';
                      $countBminus = 0;
                      foreach ($Bminus as $bag) {
                          if(round((strtotime(date("d-m-20y"))-strtotime($bag['expiryDate']))/(60*60*24)) < 4){
                              $countBminus++;
                          }
                      }
                      echo '<td class="counter">'.$countBminus.'</td>';
                      $countOplus = 0;
                      foreach ($Oplus as $bag) {
                          if(round((strtotime(date("d-m-20y"))-strtotime($bag['expiryDate']))/(60*60*24)) < 4){
                              $countOplus++;
                          }
                      }
                      echo '<td class="counter">'.$countOplus.'</td>';
                      $countOminus = 0;
                      foreach ($Ominus as $bag) {
                          if(round((strtotime(date("d-m-20y"))-strtotime($bag['expiryDate']))/(60*60*24)) < 4){
                              $countOminus++;
                          }
                      }
                      echo '<td class="counter">'.$countOminus.'</td>';
                      $countABplus = 0;
                      foreach ($ABplus as $bag) {
                          if(round((strtotime(date("d-m-20y"))-strtotime($bag['expiryDate']))/(60*60*24)) < 4){
                              $countABplus++;
                          }
                      }
                      echo '<td class="counter">'.$countABplus.'</td>';
                      $countABminus = 0;
                      foreach ($ABminus as $bag) {
                          if(round((strtotime(date("d-m-20y"))-strtotime($bag['expiryDate']))/(60*60*24)) < 4){
                              $countABminus++;
                          }
                      }
                      echo '<td class="counter">'.$countABminus.'</td>
                          </tr>';

                  ?>

              </tbody>
      </table>
</div>
<?php
    require_once '../template/AdminTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/AdminTemplate/end.tpl';
?>

