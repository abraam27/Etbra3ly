<?php
    require_once 'BloodBankSession.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../../lib/organization.php';
    require_once '../../lib/donor.php';
    require_once '../../model/bloodbag.php';
    require_once '../../lib/process.php';
    require_once '../template/BloodBankTemplate/head.tpl';
    $bloodBank = Organization::retreiveOrganizationById($_SESSION['organizationID']);
    $countMessages = 0;
    $countMessages = Request::countRequests(Request::retreiveAllRequestsOfOrganization($bloodBank['organizationID'])) + BloodRequest::countRequests(BloodRequest::retreiveAllBloodRequests($bloodBank['organizationID']));
?>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5398" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<style>
    th,td{
            text-align: center
        }
</style>
<script language="javascript" type="text/javascript">
function doReload(bloodGroup){
	document.location = '?bloodGroup=' + bloodGroup;
}
</script>
<?php
    require_once '../template/BloodBankTemplate/navbar.tpl';
?>
<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Blood Bags
                </h3>

                <p class="page-breadcrumb">
                    <a href="BloodBankHome.php">Home</a> / Blood Bags 
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

<section>
    <?php
        if(isset($_GET['action'],$_GET['id'])){
            //collect data
            $bloodBagID = $_GET['id'];
            $outDate = date("d-m-20y");
            if(BloodBag::deleteBloodBagByID($bloodBagID, $outDate)){
                echo '<div class="container greenMessage">
                        <p>The Bloog Bag # '.$bloodBagID.' has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
                    </div>';
            } else {
                echo '<div class="container redMessage">
                        <p>The Blood Bag is not Deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
            }
        }
    ?>
        <div class="container">
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
                    <div class="styled-select slate semi-square left-right-container">
                        <select name="bloodGroup" id="bloodGroup" onChange="doReload(this.value);">
                          <?php
                                if(isset($_GET['bloodGroup'])  && $_GET['bloodGroup'] != 1){
                                    if($_GET['bloodGroup']){
                                        echo '<option value="'.$_GET['bloodGroup'].'">'.$_GET['bloodGroup'].'</option>';
                                        echo '<option value="1">ALL</option>';
                                    }else{
                                        echo '<option value="1">Search By blood Group </option>';
                                    }

                                }else{
                                    echo '<option value="1">Search By blood Group </option>';
                                }
                            ?>
                            <option value="A%2B">A+</option>
                            <option value="A-">A-</option>
                            <option value="B%2B">B+</option>
                            <option value="B-">B-</option>
                            <option value="O%2B">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB%2B">AB+</option>
                            <option value="AB-">AB-</option>
                      </select>
                    </div>
                </ul>
                <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Blood Bag #</th>
                                <th scope="col">Blood Bag ID</th>
                                <th scope="col">Blood Group</th>
                                <th scope="col">Size</th>
                                <th scope="col">Collection Date</th>
                                <th scope="col">Expiry Date</th>
                                <th scope="col">Outdated</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $count = 1;
                            if(isset($_GET['bloodGroup']) && !is_numeric($_GET['bloodGroup'])){
                                $bloodGroup = $_GET['bloodGroup'];
                                $bloodBags = BloodBag::retrieveAllBloodBagsOfOrganizationByGroup($bloodBank['organizationID'], $bloodGroup);
                                if(is_array($bloodBags) && count($bloodBags) > 0){
                                    foreach ($bloodBags as $bloodBag) {
                                        $bloodBagID = $bloodBag['bloodBagID'];
                                        echo '
                                                <tr>
                                                    <th>'.$count++.'</th>
                                                    <td align="center">'.$bloodBag['bloodBagID'].'</td>
                                                    <td>'.$bloodBag['bloodGroup'].'</td>
                                                    <td>'.$bloodBag['amount'].'</td>
                                                    <td>'.$bloodBag['collectionDate'].'</td>
                                                    <td>'.$bloodBag['expiryDate'].'</td>';
                                                    if((strtotime($bloodBag['expiryDate'])-strtotime(date("d-m-20y")))/(60*60*24) <= 0){
                                                        echo '<td>OUT</td>';
                                                    }else{
                                                        echo '<td> - </td>';
                                                    }
                                                    echo '<td><a href="?action=delete&id='.$bloodBag['bloodBagID'].'">DELETE</a></td>
                                                </tr>
                                            ';
                                    }
                                }else{
                                    echo '<tr>
                                        <td colspan="8" style="text-align:center" scope="row"> There is no Blood Bags !!!</td>
                                    </tr>';
                                }
                            }else{
                                $bloodBags = BloodBag::retrieveAllBloodBagsOfOrganization($bloodBank['organizationID']);
                                if(is_array($bloodBags) && count($bloodBags) > 0){
                                    foreach ($bloodBags as $bloodBag) {
                                        $bloodBagID = $bloodBag['bloodBagID'];
                                        echo '
                                                <tr>
                                                    <th>'.$count++.'</th>
                                                    <td>'.$bloodBag['bloodBagID'].'</td>
                                                    <td>'.$bloodBag['bloodGroup'].'</td>
                                                    <td>'.$bloodBag['amount'].'</td>
                                                    <td>'.$bloodBag['collectionDate'].'</td>
                                                    <td>'.$bloodBag['expiryDate'].'</td>';
                                                    if((strtotime($bloodBag['expiryDate'])-strtotime(date("d-m-20y")))/(60*60*24) <= 0){
                                                        echo '<td>OUT</td>';
                                                    }else{
                                                        echo '<td> - </td>';
                                                    }
                                                    echo '<td><a href="?action=delete&id='.$bloodBag['bloodBagID'].'">DELETE</a></td>
                                                </tr>
                                            ';
                                    }
                                }else{
                                    echo '<tr>
                                        <td colspan="8" style="text-align:center" scope="row"> There is no Blood Bags !!!</td>
                                    </tr>';
                                }
                            }
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
