<?php
    require_once 'AdminSession.php';
    require_once '../../model/message.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in=0;
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.6489" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.6489" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.6489" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
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
                    Messages
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / Messages
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
                        Messages
                      </h1>
                </div>
              </div>
        </li>
    </ul>
    <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count =1;
                    $messages = Message::retreiveAllMessagesforAdmin();
                    if(is_array($messages) && count($messages)>0){
                        foreach ($messages as $message) {
                            echo '<tr>
                                    <th scope="row">'.$count++.'</th>
                                    <td  width="200px">'.$message['name'].'</td>
                                    <td>'.$message['email'].'</td>
                                    <td>'.$message['subject'].'</td>
                                    <td width="300px">'.$message['message'].'</td>
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

