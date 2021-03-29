<?php
    require_once 'AdminSession.php';
    require_once '../../model/requestforblood.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in=0;
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
    require_once '../template/AdminTemplate/head2.tpl';
?>

<!-- header -->
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Requests For Blood
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / Requests For Blood
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if (isset($_GET['action'] , $_GET['id'])){
        $action = $_GET['action'];
        $requestforbloodID = $_GET['id'];
        switch ($action){
            case 'delete':
                if(RequestForBlood::delete($requestforbloodID)){
                    echo '<div class="container greenMessage">
                        <p>The Blood Request has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
                    </div>';
                }else{
                    echo '<div class="container redMessage">
                        <p>The Blood Request is not Deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
                }
            case 'show':
                RequestForBlood::showBloodRequests($requestforbloodID);
        }
    }
?>
<?php
    require_once '../template/AdminTemplate/navbar.tpl';
?>
<!-- content -->
<div class="well">
    <ul class="form-section page-section">
        <li id="cid_10" class="form-input-wide" data-type="control_head">
          <div class="form-header-group ">
            <div class="header-text httal htvam">
              <h1 id="header_10" class="form-header" data-component="header">
                Requests For Blood
              </h1>
            </div>
          </div>
        </li>
    </ul>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Needed Blood Name</th>
                <th scope="col">Blood Group</th>
                <th scope="col">Account</th>
                <th scope="col">Donation Date</th>
                <th scope="col">SHOW</th>
                <th scope="col">DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $count = 1;
                $requestsForBlood = RequestForBlood::retreiveRequestsForAdmin();
                if(is_array($requestsForBlood) && count($requestsForBlood)>0){
                    foreach ($requestsForBlood as $requestForBlood) {
                        echo '<tr>
                                <td>'.$count++.'</td>
                                <td>'.$requestForBlood['name'].'</td>
                                <td>'.$requestForBlood['bloodGroup'].'</td>
                                <td>'.$requestForBlood['amount'].'</td>
                                <td>'.$requestForBlood['needBloodDate'].'</td>';
                        if($requestForBlood['visible']){
                            echo '<td><a href="?action=show&id='.$requestForBlood['requestforbloodID'].'">VISIBLE</a></td>';
                        }else{
                            echo '<td><a href="?action=show&id='.$requestForBlood['requestforbloodID'].'">INVISIBLE</a></td>';
                        }
                        echo '<td><a href="?action=delete&id='.$requestForBlood['requestforbloodID'].'">DELETE</a></td>
                        </tr>';
                    }
                }
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

