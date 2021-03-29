<?php
    require_once 'AdminSession.php';
    require_once '../../lib/organization.php';
    require_once '../../model/report.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in = 0;
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
                    Reports For Report
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / Reports For Blood
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if (isset($_GET['action'] , $_GET['id'])){
        $action = $_GET['action'];
        $reportID = $_GET['id'];
        switch ($action){
            case 'delete':
                if(Report::delete($reportID)){
                    echo '<div class="container greenMessage">
                        <p>The Report has been deleted Successfully <i class="fa fa-smile-o"></i> !</p>
                    </div>';
                }else{
                    echo '<div class="container redMessage">
                        <p>The Report is not deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
                }
            case 'read':
                Report::readReport($reportID);
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
                    Requests For Report
                  </h1>
              </div>
            </div>
        </li>
    </ul>
    <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Request ID</th>
                    <th scope="col">Request Title</th>
                    <th scope="col">Foundation Name</th>
                    <th scope="col">READ</th>
                    <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count=1;
                    $reports = Report::retreiveReportsForAdmin();
                    if(is_array($reports) && count($reports)>0){
                        foreach ($reports as $report) {
                            $foundation = Organization::retreiveOrganizationById($report['foundationID']);
                            echo '<tr>
                                <td>'.$count++.'</td>
                                <td width="550px"><a href="AdminRequestForReportDetails.php?id='.$report['reportID'].'">'.$report['title'].'</a></td>
                                <td><a href="AdminFoundationDetails.php?id='.$foundation['organizationID'].'">'.$foundation['name'].'</a></td>';
                            if($report['view']){
                                echo '<td><a href="?action=read&id='.$report['reportID'].'">READ</a></td>';
                            } else {
                                echo '<td><a href="?action=read&id='.$report['reportID'].'">UNREAD</a></td>';
                            }
                            echo '<td><a href="?action=delete&id='.$report['reportID'].'">DELETE</a></td>
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

