<?php
    require_once '../../model/camp.php';
    require_once '../../lib/gallery.php';
    require_once '../../model/comment.php';
    require_once '../../model/requestforblood.php';
    require_once '../../lib/donor.php';
    require_once '../template/DonorTemplate/head.tpl';
    $loginDonor = Donor::retreiveDonorById($_SESSION['donorID']);
?>
<!-- form style -->
<?php
    require_once '../template/DonorTemplate/navbar.tpl';
?>
<!--  HOME SLIDER BLOCK  -->

<div class="slider-wrap">

    <div id="slider_1" class="owl-carousel owl-theme">

        <div class="item">
            <img src="../template/images/home_1_slider_1.jpg" alt="img">
            <div class="slider-content text-center">
                <div class="container">
                    <div class="slider-contents-info">
                        <h3>Donate blood,save life !</h3>
                        <h2>
                            Donate your blood and
                            <br>
                            Inspires to others
                        </h2>
                        <a href="DonorRegistration.php" class="btn btn-slider">Join With Us <i class="fa fa-long-arrow-right"></i></a>
                    </div><!-- /.slider-content -->
                </div> <!-- end .slider-contents-info  -->
            </div>

        </div>

        <div class="item">
            <img src="../template/images/home_1_slider_1.jpg" alt="img">
            <div class="slider-content text-center">
                <div class="container">

                    <div class="slider-contents-info">
                        <h3>Donate blood,save life !</h3>
                        <h2>
                            Your Donation Can bring
                            <br>
                            smile at others face
                        </h2>
                        <a href="DonorDonationProcess.php" class="btn btn-slider">Donate Now <i class="fa fa-long-arrow-right"></i></a>
                    </div> <!-- end .slider-contents-info  -->
                </div><!-- /.slider-content -->
            </div>
        </div>

        <div class="item">
            <img src="../template/images/home_1_slider_1.jpg" alt="img">
            <div class="slider-content text-center">
                <div class="container">
                    <div class="slider-contents-info">
                        <h3>Exchange blood,save life !</h3>
                        <h2>
                            Donate your blood and
                            <br>
                            Takes Someone blood
                        </h2>
                        <a href="DonorExchangeProcess.php" class="btn btn-slider">Exchange Now  <i class="fa fa-long-arrow-right"></i></a>
                    </div><!-- /.slider-content -->
                </div> <!-- end .slider-contents-info  -->
            </div>

        </div>
    </div>

</div>
<?php
    if(isset($_GET['message']))
    {
        echo '<div class="container greenMessage">
                <p>Your Registration has been Done Successfully <i class="fa fa-smile-o"></i> !</p>
            </div>';
    }
?>
<!-- HIGHLIGHT CTA  -->   

<section class="cta-section-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2>We are helping people</h2>
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

<!--  SECTION DONATION PROCESS -->

<section class="section-content-block section-process">

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading"><span>Donation</span> Process</h2>
                <p class="section-subheading">The donation process from the time you arrive center until the time you leave</p>
            </div> <!-- end .col-sm-10  -->                    

        </div> <!--  end .row  -->

        <div class="row wow fadeInUp">

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="process-layout">

                    <figure class="process-img">

                        <img src="../template/images/process_1.jpg" alt="process" />
                        <div class="step">
                            <h3>1</h3>
                        </div>
                    </figure> <!-- end .process-img  -->

                    <article class="process-info">
                        <h2>Registration</h2>   
                        <p>You need to complete a very simple registration form. Which contains all required contact information to enter in the donation process.</p>
                    </article>

                </div> <!--  end .process-layout -->

            </div> <!--  end .col-lg-3 -->



            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="process-layout">

                    <figure class="process-img">
                        <img src="../template/images/process_2.jpg" alt="process" />
                        <div class="step">
                            <h3>2</h3>
                        </div>
                    </figure> <!-- end .cau<h5 class="step">1</h5>se-img  -->

                    <article class="process-info">                                   
                        <h2>Screening</h2>
                        <p>A drop of blood from your finger will take for simple test to ensure that your blood iron levels are proper enough for donation process.</p>
                    </article>

                </div> <!--  end .process-layout -->

            </div> <!--  end .col-lg-3 -->


            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="process-layout">

                    <figure class="process-img">
                        <img src="../template/images/process_3.jpg" alt="process" />
                        <div class="step">
                            <h3>3</h3>
                        </div>
                    </figure> <!-- end .process-img  -->

                    <article class="process-info">
                        <h2>Donation</h2>
                        <p>After ensuring and passed screening test successfully you will be directed to a donor bed for donation. It will take only 6-10 minutes.</p>
                    </article>

                </div> <!--  end .process-layout -->

            </div> <!--  end .col-lg-3 -->



            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="process-layout">

                    <figure class="process-img">
                        <img src="../template/images/process_4.jpg" alt="process" />
                        <div class="step">
                            <h3>4</h3>
                        </div>
                    </figure> <!-- end .process-img  -->

                    <article class="process-info">
                        <h2>Refreshment</h2>
                        <p>You can also stay in sitting room until you feel strong enough to leave our center. You will receive awesome drink from us in donation zone. </p>
                    </article>

                </div> <!--  end .process-layout -->

            </div> <!--  end .col-lg-3 -->

        </div> <!--  end .row --> 

    </div> <!--  end .container  -->

</section> <!--  end .section-process -->

<!--  SECTION COUNTER   -->

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


<!--  SECTION Current Blood Request   -->

<section class="section-content-block" >

    <div class="container">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">Blood Requests</h2>
                <p class="section-subheading">Request for Blood, People everyday need blood for surgery to make up for what they lost.</p>
            </div> <!-- end .col-sm-12  -->                       

        </div> <!-- end .row  -->


        <div class="row">
            <?php
                $updatedrequests = RequestForBlood::retreiveUpdatedRequests();
                if(is_array($updatedrequests) && count($updatedrequests)>0){
                    foreach ($updatedrequests as $request) {
                        if($request['name'] == NULL){
                            echo '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="event-latest">
                                        <div class="row"> 
                                            <div class="col-lg-12 col-md-7 col-sm-12 col-xs-12">
                                                <div class="event-details">
                                                    <a class="latest-date" href="DonorRequestForBloodDetails.php">Unknown</a>
                                                    <h4 class="event-latest-title">
                                                        <bold style="color:#FE3C47 ; font-family: Dosis, sans-serif ; font-size: 30px">'.$request['bloodGroup'].' <span style="color: black"> | </span> '.$request['amount'].' unit/Bag</bold>
                                                    </h4>
                                                    <p>'.$request['message'].'.</p>
                                                    <div class="event-latest-details">
                                                        <p class="author"><i class="fa fa-calendar" aria-hidden="true" style="padding-right: 5px"></i> '.$request['needBloodDate'].'</p>
                                                        <p class="comments"> <i class="fa fa-map-marker" aria-hidden="true" style="padding-right: 5px"></i>'.$request['needBloodDisrict'].'</p>
                                                        <p class="comments"> <i class="fa fa-phone" aria-hidden="true" style="padding-right: 5px"></i> '.$request['contactNO'].'</p>
                                                    </div>
                                                </div>
                                            </div> <!--  col-sm-7  -->
                                        </div>
                                    </div>
                                </div> <!--  col-sm-6  -->';
                        }else{
                            echo '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="event-latest">
                                        <div class="row"> 
                                            <div class="col-lg-12 col-md-7 col-sm-12 col-xs-12">
                                                <div class="event-details">
                                                    <a class="latest-date" href="DonorRequestForBloodDetails.php">'.$request['name'].'</a>
                                                    <h4 class="event-latest-title">
                                                        <bold style="color:#FE3C47 ; font-family: Dosis, sans-serif ; font-size: 30px">'.$request['bloodGroup'].' <span style="color: black"> | </span> '.$request['amount'].' unit/Bag</bold>
                                                    </h4>
                                                    <p>'.$request['message'].'.</p>
                                                    <div class="event-latest-details">
                                                        <p class="author"><i class="fa fa-calendar" aria-hidden="true" style="padding-right: 5px"></i> '.$request['needBloodDate'].'</p>
                                                        <p class="comments"> <i class="fa fa-map-marker" aria-hidden="true" style="padding-right: 5px"></i> '.$request['needBloodDisrict'].', '.$request['needBloodCity'].'</p>
                                                        <p class="comments"> <i class="fa fa-phone" aria-hidden="true" style="padding-right: 5px"></i> '.$request['contactNO'].'</p>
                                                    </div>
                                                </div>
                                            </div> <!--  col-sm-7  -->
                                        </div>
                                    </div>
                                </div> <!--  col-sm-6  -->';
                        }
                    }
                }
            ?>
            

        </div> <!--  end .row  -->                

        <div class="row">
            <div class="col-sm-12 col-md-4 col-md-offset-4 text-center">
                <a class="btn btn-load-more" href="DonorBloodRequestsList.php">Show All Requests</a>
            </div>
        </div>

    </div> <!--  end .container  --> 

</section>

<!-- SECTION TESTIMONIAL   -->

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

<!--  SECTION CAMPAIGNS   -->

<section class="section-content-block" >

    <div class="container">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">Donation Campaigns</h2>
                <p class="section-subheading">Campaigns to encourage new donors to join and existing to continue to give blood.</p>
            </div> <!-- end .col-sm-12  -->                       

        </div> <!-- end .row  -->
        <?php
            $camps = Camp::retreiveUpdatedCamps();
            foreach ($camps as $camp) {
                $image = Gallery::retreiveFirstImagesOfCamp($camp['campID']);
                echo '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="event-latest">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
                                    <div class="event-latest-thumbnail">
                                        <a href="#">
                                            <img src="../../upload/'.$image.'" alt="">
                                        </a>
                                    </div>
                                </div> <!--  col-sm-5  -->

                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                    <div class="event-details">
                                        <a class="latest-date">'.$camp['date'].'</a>
                                        <h4 class="event-latest-title">
                                            <a href="DonorCampDetails.php">'.$camp['name'].'</a>
                                        </h4>
                                        <p>'.$camp['moreDetails'].'</p>
                                        <div class="event-latest-details">
                                            <a class="author" ><i class="fa fa-clock-o" aria-hidden="true" style="padding-right : 5px"></i>'.$camp['time'].'</a>
                                            <a class="comments" > <i class="fa fa-map-marker" aria-hidden="true" style="padding-right : 5px"></i>'.$camp['district'].', '.$camp['city'].'</a>
                                        </div>
                                    </div>
                                </div> <!--  col-sm-7  -->

                            </div>

                        </div>
                    </div> <!--  col-sm-6  -->';
            }
            
        ?>
            
        <div class="row">
            <div class="col-sm-12 col-md-4 col-md-offset-4 text-center">
                <a class="btn btn-load-more" href="DonorCampsList.php">Show All Campaigns</a>
            </div>
        </div>

    </div> <!--  end .container  --> 

</section>   

<!--  SECTION GALLERY  -->

<section class="section-content-block no-bottom-padding section-secondary-bg">

    <div class="container">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">Photo Gallery</h2>
                <p class="section-subheading">Campaign photos of different parts of world and our prestigious voluntary work</p>
            </div> <!-- end .col-sm-10  -->                      


        </div> <!-- end .row  -->

    </div> <!--  end .container -->

    <div class="container-fluid wow fadeInUp">
        <?php
            $allPhotos = Gallery::retreiveALLImages();
            if(is_array($allPhotos) && count($allPhotos) > 0){
                foreach ($allPhotos as $photoName) {
                    echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-container">

                    <a class="gallery-light-box"  data-gall="myGallery" href="../../upload/'.$photoName.'">

                        <figure class="gallery-img">

                            <img src="../../upload/'.$photoName.'" alt="gallery image" />

                        </figure> <!-- end .gallery-img  -->

                    </a>

                </div><!-- end .col-sm-3  -->';
                }
            }else{
                echo '
                        <p class="container" style="text-align:center" scope="row"> There is no Images !!!</p>
                    ';
            }
            
        ?>
    </div><!-- end .container-fluid  -->

</section> <!-- end .section-content-block  -->
<?php
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/DonorTemplate/end.tpl';
?>
