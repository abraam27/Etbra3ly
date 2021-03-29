<?php
    require_once 'AdminSession.php';
    require_once '../../model/report.php';
    require_once '../../lib/organization.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in=2;
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
                    Requests For Report
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / <a href="AdminRequestForReportList.php">Report List</a>
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
    <ul class="form-section page-section">
        <li id="cid_10" class="form-input-wide" data-type="control_head">
            <div class="form-header-group ">
              <div class="header-text httal htvam">
                  <h1 id="header_10" class="form-header" data-component="header">
                    Report Details
                  </h1>
              </div>
            </div>
        </li>
    </ul>
    <table class="table">
            <tbody>
                <?php
                    if(isset($_GET['id'])){
                        Report::readReport($_GET['id']);
                        $report = Report::readById($_GET['id']);
                        $foundation = Organization::retreiveOrganizationById($report['foundationID']);
                        echo '<tr>
                                <th scope="row">Report ID : </th>
                                <td>'.$report['reportID'].'</td>
                            </tr>
                            <tr>
                                <th scope="row">Request Title : </th>
                                <td width="550px">'.$report['title'].'</td>
                            </tr>
                            <tr>
                                <th scope="row">Request Details : </th>
                                <td width="550px">'.$report['details'].'</td>
                            </tr>
                            <tr>
                                <th scope="row">Request Deadline : </th>
                                <td width="550px">'.$report['deadline'].'</td>
                            </tr>
                            <tr>
                                <th scope="row">Foundation Name : </th>
                                <td><a href="AdminFoundationDetails.php?id='.$foundation['organizationID'].'">'.$foundation['name'].'</a></td>
                            </tr>';
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

