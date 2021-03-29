<?php
    require_once 'AdminSession.php';
    require_once '../../model/event.php';
    require_once '../../lib/organization.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in=2;
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.6111" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.6111" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.6111" />
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
                    Events
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / Event Details
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
                            Event Details
                          </h1>
                    </div>
                  </div>
            </li>
        </ul>
        <table class="table">

                <tbody>
                    <?php
                        if(isset($_GET['id'])){
                            Event::readEvent($_GET['id']);
                            $event = Event::readById($_GET['id']);
                            $foundation = Organization::retreiveOrganizationById($event['foundationID']);
                            echo '<tr>
                                    <th scope="row">Event Title : </th>
                                    <td>'.$event['title'].'</td>
                                </tr>
                                <tr>
                                    <th scope="row">Event Content : </th>
                                    <td>'.$event['content'].'</td>
                                </tr>
                                <tr>
                                    <th scope="row">Event Address : </th>
                                    <td>'.$event['address'].'</td>
                                </tr>
                                <tr>
                                    <th scope="row">Event district : </th>
                                    <td>'.$event['district'].'</td>
                                </tr>
                                <tr>
                                    <th scope="row">Event city : </th>
                                    <td>'.$event['city'].'</td>
                                </tr>
                                <tr>
                                    <th scope="row">Event date : </th>
                                    <td>'.$event['date'].'</td>
                                </tr>
                                <tr>
                                    <th scope="row">Event time : </th>
                                    <td>'.$event['time'].'</td>
                                </tr>
                                <tr>
                                    <th scope="row">More Details : </th>
                                    <td width="550px">'.$event['moreDetails'].'</td>
                                </tr>
                                <tr>
                                    <th scope="row">Foundation Name : </th>
                                    <td><a href="AdminFoundationDetails.php?id='.$event['foundationID'].'">'.$foundation['name'].'</a></td>
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

