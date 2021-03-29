</head>
<body> 

    <div id="preloader">
        <span class="margin-bottom"><img src="../template/images/loader.gif" alt="" /></span>
    </div>

    <!--  HEADER -->

    <header class="main-header clearfix" data-sticky_header="true">

        <div class="top-bar clearfix">

            <div class="container">
                <div class="left-container">

                        <p>Welcome to blood donation center.</p>

                                    </div>
                                    <div class="right-container">
                                            <div class="left-right-container">
                                                <div >
                                                    <div class="top-bar-social">
                                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                                    </div>   
                                                </div>
                                            </div>
                                            <div class="right-right-container">
                                                <?php
                                                    if(is_numeric($_SESSION['donorID']))
                                                    {
                                                        if(!is_null($loginDonor['photo'])){
                                                            echo '<a href="DonorMyProfile.php"><img src="../../upload/'.$loginDonor['photo'].'" width="40px" height="40px" style="border-radius: 50% ; margin-top: 5px ; margin-left:15px"/></a>';
                                                        }
                                                    }else{
                                                        echo '<a href="DonorLogin.php"> LOGIN </a>';
                                                    }
                                                ?>
                                                
                                            </div>
                                    </div>

            </div> <!--  end .container -->

        </div> <!--  end .top-bar  -->

        <section class="header-wrapper navgiation-wrapper">

            <div class="navbar navbar-default">			
                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="logo" href="DonorHome.php"><img alt="" src="../template/images/logo.png"></a>
                    </div>

                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="drop">
                                <a href="DonorDonorList.php">Find Donors</a>
                            </li>
                            <li>
                                <a href="DonorBloodBankList.php">Blood Banks</a>
                            </li>
                            <li>
                                <a href="DonorHospitalList.php">Hospitals</a>
                            </li>
                            <li>
                                <a href="DonorCampList.php">Camps</a>
                            </li>
                            <li>
                                <a href="DonorFAQs.php">FAQs</a>
                            </li>
                            <li>
                                <a href="DonorAboutUs.php">About US</a>
                            </li>
                            <li>
                                <a href="DonorContactUS.php">Contact US</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </section>

    </header> <!-- end main-header  -->