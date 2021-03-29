<?php
    require_once 'AdminSession.php';
    require_once '../../lib/organization.php';
    require_once '../../model/camp.php';
    require_once '../../lib/gallery.php';
    require_once '../template/AdminTemplate/head.tpl';
    $in=2;
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
                    Camp Details
                </h3>

                <p class="page-breadcrumb">
                    <a href="AdminMessagesList.php">Home</a> / <a href="AdminCampList.php">Camps</a>
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
                  Camps
                </h1>
            </div>
          </div>
        </li>
    </ul>
    <table class="table">
        <tbody>
            <?php
                if(isset($_GET['id'])){
                    $camp = Camp::readById($_GET['id']);
                    $hospital = Organization::retreiveOrganizationById($camp['hospitalID']);
                    echo '<tr>
                            <th scope="row">Camp Name : </th>
                            <td>'.$camp['name'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Camp Location :</th>
                            <td>'.$camp['address'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Camp District :</th>
                            <td>'.$camp['district'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Camp City :</th>
                            <td>'.$camp['city'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Camp Date :</th>
                            <td>'.$camp['date'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Camp Time :</th>
                            <td>'.$camp['time'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">More Details :</th>
                            <td width="550px">'.$camp['moreDetails'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Organizer :</th>
                            <td><a href="DonorHospitalDetails.php?id='.$hospital['organizationID'].'" >'.$hospital['name'].'</a></td>
                        </tr>';
                }
            ?>
            
        </tbody>
    </table>
    <!--  SECTION GALLERY  -->

    <section class="section-content-block no-bottom-padding section-secondary-bg">

        <div class="container">

            <div class="row section-heading-wrapper">

                <div class="col-md-8 col-sm-12 text-center">
                    <h2 class="section-heading">Photo Gallery</h2>
                    <p class="section-subheading">Campaign photos of different parts of world and our prestigious voluntary work</p>
                </div> <!-- end .col-sm-10  -->                      


            </div> <!-- end .row  -->

        </div> <!--  end .container -->

        <div class="container-fluid wow fadeInUp">

            <div class="row no-padding-gallery">
                <?php
                    if(isset($_GET['id'])){
                        $images = Gallery::retreiveAllImagesByIdCamp($_GET['id']);
                        if(is_array($images) && count($images) > 0){
                            foreach ($images as $imageName) {
                                echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-container">

                                        <a class="gallery-light-box"  data-gall="myGallery" href="../../upload/'.$imageName.'">

                                            <figure class="gallery-img" ">

                                                <img src="../../upload/'.$imageName.'" alt="gallery image" height="317px"/>

                                            </figure> <!-- end .gallery-img  -->

                                        </a>

                                    </div><!-- end .col-sm-3  -->';
                            }
                        }
                    }
                ?>

        </div> <!-- end .row  -->

    </div><!-- end .container-fluid  -->

    </section> <!-- end .section-content-block  -->
</div>  
<?php
    require_once '../template/AdminTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/AdminTemplate/end.tpl';
?>

