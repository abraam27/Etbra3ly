<?php
    require_once 'AdminSession.php';
    require_once '../../../lib/donor.php';
    require_once '../../../model/comment.php';
    require_once '../AdminTemplate/head.tpl';
    $in=2;
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
    require_once '../AdminTemplate/head2.tpl';
?>

<!-- header -->
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Comments
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / Comments
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if (isset($_GET['action'] , $_GET['id'])){
        $action = $_GET['action'];
        $commentID = $_GET['id'];
        switch ($action){
            case 'delete':
                if(Comment::delete($commentID)){
                    echo '<div class="container greenMessage">
                            <p>The Comment has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
                        </div>';
                }else{
                    echo '<div class="container redMessage">
                            <p>The Comment is not Deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
                        </div>';
                }
            case 'show':
                Comment::showComments($commentID);
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
                              Comments
                            </h1>
                      </div>
                    </div>
              </li>
    </ul>
    <table class="table">
            <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Donor Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">SHOW</th>
                        <th scope="col">DELETE</th>
                    </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                    $comments = Comment::retreiveCommentsForAdmin();
                    if(is_array($comments) && count($comments)>0){
                        foreach ($comments as $comment) {
                            $donor = Donor::retreiveDonorById($comment['donorID']);
                            echo '<tr>
                                    <th scope="row">'.$count++.'</th>
                                    <td width="400px">'.$comment['comment'].'</td>
                                    <td width="120px"><a href="AdminDonorDetails.php?id=">'.$donor['firstName'].' '.$donor['lastName'].'</a></td>
                                    <td width="100px">'.$comment['date'].'</td>';
                            if($comment['visible']){
                                echo '<td><a href="?action=show&id='.$comment['commentID'].'">VISIBLE</a></td>';
                            }else{
                                echo '<td>INVISIBLE</td>';
                            }
                            echo '<td><a href="?action=delete&id='.$comment['commentID'].'">DELETE</a></td>
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

