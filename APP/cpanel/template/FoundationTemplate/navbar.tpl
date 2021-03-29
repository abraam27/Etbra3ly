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
                                                if(!is_null($foundation['logo'])){
                                                    echo '<a href="FoundationAccount.php"><img src="../../upload/'.$foundation['logo'].'" width="40px" height="40px" style="border-radius: 50% ; margin-top: 5px ; margin-left:15px"/></a>';
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
                            <a class="logo" href="FoundationCreateEvent.php"><img alt="" src="../template/images/logo.png"></a>
                        </div>

                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="drop">
                                    <a href="FoundationCreateEvent.php">Create Event</a>
                                </li>
                                <li>
                                     <a href="FoundationRequestForReport.php">Request For Report</a>
                                </li>
                                <li>
                                    <a href="FoundationContactUs.php">Contact US</a>
                                </li>
                                <li>
                                    <a href="FoundationLogout.php">Sign Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </section>
			
			

        </header> <!-- end main-header  -->
        