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
                                                    if(!is_null($bloodBank['logo'])){
                                                        echo '<a href="BloodBankAccount.php"><img src="../../upload/'.$bloodBank['logo'].'" width="40px" height="40px" style="border-radius: 50% ; margin-top: 5px ; margin-left:15px"/></a>';
                                                    }
                                                ?>

                                                <p  class="label label-pill label-danger count" style="border-radius:50%; margin-right: 5px; font-size: 10px; font-family: 'Dosis', sans-serif; margin-top: 20px ; float: right ; margin-right: 2px"><?php if($countMessages > 0){echo $countMessages;} ?></p> 
                                                <a href="BloodBanklMessages.php"><i class="glyphicon glyphicon-envelope" style="font-size:20px; color: white"></i></a>

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
                            <a class="logo" href="BloodBankHome.php"><img alt="" src="../template/images/logo.png"></a>
                        </div>

                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="BloodBankRequestForBlood.php" style="font-size: 15px ; padding: 10px 9px;">Request For Blood</a>
                                </li>
                                <li>
                                    <a href="BloodBankBloodRequestsList.php" style="font-size: 15px ; padding: 10px 9px;">Blood Requests</a>
                                </li>
                                <li>
                                    <a href="BloodBankDonationRequestsList.php" style="font-size: 15px ; padding: 10px 9px;">Donations</a>
                                </li>
				<li>
                                    <a href="BloodBankExchangeRequestsList.php" style="font-size: 15px ; padding: 10px 9px;">Exchanges</a>
                                </li>
                                <li>
                                    <a href="BloodBankBloodBagList.php" style="font-size: 15px ; padding: 10px 9px;">Blood Bags</a>
                                </li>
                                <li>
                                    <a href="BloodBankDonorList.php" style="font-size: 15px ; padding: 10px 9px;">Donors</a>
                                </li>
                                <li>
                                    <a href="BloodBankContactUS.php" style="font-size: 15px ; padding: 10px 9px;">Contact US</a>
                                </li>
                                <li>
                                    <a href="BloodBankLogout.php" style="font-size: 15px ; padding: 10px 9px;">Sign Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </section>
			
			

        </header> <!-- end main-header  -->