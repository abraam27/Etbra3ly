<section>
			
    <div class="container">
        <div class="row" style="margin:50px 0px">
                <div class="col-sm-3 col-md-3">
                        <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="glyphicon fa fa-user">
                                            </i>Account</a>
                                        </h4>
                                    </div>
                                    <?php
                                        if($in == 1){
                                            echo '<div id="collapseOne" class="panel-collapse collapse in">';
                                        }else{
                                            echo '<div id="collapseOne" class="panel-collapse collapse">';
                                        }
                                    ?>
                                        <div class="panel-body">
                                            <table class="table">
                                                <tr>
                                                    <td style="float: left">
                                                        <i class="glyphicon fa fa-heart"></i><a href="AdminDonorList.php">Donors</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float: left">
                                                        <i class="glyphicon fa fa-hospital-o"></i><a href="AdminHospitalList.php">Hospitals</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float: left">
                                                        <i class="glyphicon fa fa-bank"></i><a href="AdminBloodBankList.php">Blood Banks</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float: left">
                                                        <i class="glyphicon fa fa-building"></i><a href="AdminFoundationList.php">Foundations</a>
                                                        <!--<span class="badge">42</span>-->
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="glyphicon glyphicon-folder-close" style="color:black">
                                            </i>Content</a>
                                        </h4>
                                    </div>
                                    <?php
                                        if($in == 2){
                                            echo '<div id="collapseTwo" class="panel-collapse collapse in">';
                                        }else{
                                            echo '<div id="collapseTwo" class="panel-collapse collapse">';
                                        }
                                    ?>
                                        <div class="panel-body">
                                            <table class="table">
                                                <tr>
                                                    <td style="float: left">
                                                        <i class="glyphicon fa fa-tint"></i><a href="AdminBloodBagsList.php">Blood Bags</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float: left">
                                                        <i class="glyphicon glyphicon-heart"></i><a href="AdminRequestForBloodList.php">Requests for Blood</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float: left">
                                                        <i class="glyphicon fa fa-comments"></i><a href="AdminCommentList.php">Comments</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float: left">
                                                        <i class="glyphicon glyphicon-map-marker"></i><a href="AdminCampList.php">Camps</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float: left">
                                                        <i class="glyphicon fa fa-bullhorn"></i><a href="AdminEventList.php">Events</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="" data-parent="" href="AdminMessagesList.php"><i class="glyphicon glyphicon-envelope">
                                            </i>Messages</a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="" data-parent="" href="AdminRequestForReportList.php"><i class="glyphicon glyphicon-file">
                                                </i>Reports</a>
                                            </h4>
                                        </div>
                                </div>
                        </div>
                </div>
    <div class="col-sm-9 col-md-9">