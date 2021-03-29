<?php
    require_once 'BloodBankSession.php';
    require_once '../../lib/request.php';
    require_once '../../model/bloodrequest.php';
    require_once '../../lib/organization.php';
    require_once '../../model/message.php';
    require_once '../template/BloodBankTemplate/head.tpl';
    $bloodBank = Organization::retreiveOrganizationById($_SESSION['organizationID']);
    $countMessages = 0;
    $countMessages = Request::countRequests(Request::retreiveAllRequestsOfOrganization($bloodBank['organizationID'])) + BloodRequest::countRequests(BloodRequest::retreiveAllBloodRequests($bloodBank['organizationID']));
?>
<!-- form style -->
<?php
    require_once '../template/BloodBankTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->

<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Contact US
                </h3>

                <p class="page-breadcrumb">
                    <a href="BloodBankHome.php">Home</a> / Contact US
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

<?php
    if(isset($_POST['send'])){
        //collect data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $message = new Message($name, $email, $subject, $message);
        if(is_numeric($message->add())){
            echo '<div class="container greenMessage">
                    <p>Your Message has been sent Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
        }else{
            echo '<div class="container redMessage">
                    <p>Your Message not send <i class="fa fa-frown-o"></i> Please try Again !</p>
		</div>';
        }
    }
?>

<!--  MAIN CONTENT  -->

<section class="section-content-block section-contact-block no-bottom-padding">

    <div class="container">

        <div class="row">

            <div class ="col-md-12">
                <h2 class="contact-title">Contact us</h2>                           
            </div>               

            <div class="col-md-3">

                <ul class="contact-info">
                    <li>
                        <span class="icon-container"><i class="fa fa-home"></i></span>
                        <address>3100 C/A Mouchak,Sylhet,UK</address>
                    </li>
                </ul>                        

            </div>

            <div class="col-md-3">

                <ul class="contact-info">

                    <li>
                        <span class="icon-container"><i class="fa fa-phone"></i></span>
                        <address><a href="#">+093-120-525-9162</a></address>
                    </li>

                </ul>                        

            </div>

            <div class="col-md-3">
                <ul class="contact-info">
                    <li>
                        <span class="icon-container"><i class="fa fa-envelope"></i></span>
                        <address><a href="mailto:">query@yourdomain.com</a></address>
                    </li>
                </ul>                        

            </div>

            <div class="col-md-3">

                <ul class="contact-info">
                    <li>
                        <span class="icon-container"><i class="fa fa-globe"></i></span>
                        <address><a href="#">www.yourdomain.com</a></address>
                    </li>
                </ul>                        

            </div>                    

        </div> 

    </div>

</section>

<section class="section-content-block section-contact-block">

    <div class="container">

        <div class="row">

            <div class="col-sm-6 wow fadeInLeft">

                <div class="contact-form-block">

                    <h2 class="contact-title">Say hello to us</h2>

                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >

                        <div class="form-group">
                            <input type="text" class="form-control" id="user_name" name="name" value="<?php echo $bloodBank['name'];?>" placeholder="Name" data-msg="Please Write Your Name" />
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" id="user_email" name="email" value="<?php echo $bloodBank['email'];?>" placeholder="Email" data-msg="Please Write Your Valid Email" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email_subject" name="subject" placeholder="Subject" data-msg="Please Write Your Message Subject" />
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="message" id="email_message" placeholder="Message" data-msg="Please Write Your Message" ></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-custom" name="send" value="send">Send Now</button>
                        </div>

                    </form>

                </div> <!-- end .contact-form-block  -->

            </div> <!--  end col-sm-6  -->



        </div> <!-- end row  -->

    </div> <!--  end .container -->

</section> <!-- end .section-content-block  -->
<?php
    require_once '../template/BloodBankTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/BloodBankTemplate/end.tpl';
?>
