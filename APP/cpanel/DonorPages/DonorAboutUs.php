<?php
    require_once '../../model/comment.php';
    require_once '../../lib/donor.php';
    require_once '../template/DonorTemplate/head.tpl';
    $loginDonor = Donor::retreiveDonorById($_SESSION['donorID']);
?>
<!-- form style -->
<?php
    require_once '../template/DonorTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->

        <section class="page-header" data-stellar-background-ratio="1.2">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 text-center">


                        <h3>
                            About US
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="DonorHome.php">Home</a> / About US
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->
		
<section class="section-counter"  data-stellar-background-ratio="0.3">

    <div class="container wow fadeInUp">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">Our Donors</h2>
                <p class="section-subheading">Please Answeer this Requests for a new life.</p>
            </div> <!-- end .col-sm-12  -->                       

        </div> <!-- end .row  -->

        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">


                    <span class="counter"><?php echo Donor::countDonorsByBloodGroup("A+")?></span>                            
                    <h4>A+</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <span class="counter"><?php echo Donor::countDonorsByBloodGroup("A-")?></span>                            
                    <h4>A-</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <span class="counter"><?php echo Donor::countDonorsByBloodGroup("B+")?></span>                             
                    <h4>B+</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <span class="counter"><?php echo Donor::countDonorsByBloodGroup("B-")?></span>                            
                    <h4>B-</h4>

                </div>

            </div> <!--  end .col-lg-3  -->


            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <span class="counter"><?php echo Donor::countDonorsByBloodGroup("O+")?></span>                            
                    <h4>O+</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <span class="counter"><?php echo Donor::countDonorsByBloodGroup("O-")?></span>                            
                    <h4>O-</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <span class="counter"><?php echo Donor::countDonorsByBloodGroup("AB+")?></span>                             
                    <h4>AB+</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <span class="counter"><?php echo Donor::countDonorsByBloodGroup("AB-")?></span>                            
                    <h4>AB-</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

        </div> <!-- end row  -->


    </div> <!--  end .container  -->

</section> <!--  end .section-counter -->

		
<!-- CLIENT TESTIMONIAL SECTION  -->

        <section class="section-content-block section-client-testimonial">

            <div class="container"> 

                <div class="testimonial-container text-center">

                    <?php
                        $comments = Comment::retreiveUpdatedComments();
                        if(is_array($comments) && count($comments)>0){
                            foreach ($comments as $comment) {
                                $donor = Donor::retreiveDonorById($comment['donorID']);
                                echo '<div class="col-md-10 col-md-offset-1 col-sm-12">

                                        <div class="testimony-layout-1">
                                            <h3 class="people-quote">Donor Opinion</h3>
                                            <p class="testimony-text">
                                                <i class="fa fa-quote-left" aria-hidden="true"></i> 
                                                '.$comment['comment'].' 
                                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                                            </p>

                                            <h6>'.$donor['firstName'].' '.$donor['middleName'].' '.$donor['lastName'].'</h6>
                                            <span>'.$donor['district'].', '.$donor['city'].'</span>

                                        </div> <!-- end .testimony-layout-1  -->

                                    </div> <!--  end col-md-10  -->';
                            }
                        }
                    ?>

                </div>  <!--  end .row  -->   

            </div> <!-- end .container  -->

        </section> <!--  end .section-client-testimonial --> 


        <!-- HIGHLIGHT CTA  -->   

        <section class="cta-section-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2>We are helping people from 40 years</h2>
                        <p>
                            You can give blood at any of our blood donation Center or Hospital in Egypt.                            
                        </p>
                    </div> <!--  end .col-md-8  -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <a class="btn btn-cta-1" href="DonorRequestForBlood.php">REQUEST FOR BLOOD</a>
                    </div> <!--  end .col-md-4  -->
                </div> <!--  end .row  -->
            </div>
        </section> 
<?php
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/DonorTemplate/end.tpl';
?>
