<?php
    require_once '../../lib/donor.php';
    require_once '../template/DonorTemplate/head.tpl';
    $loginDonor = Donor::retreiveDonorById($_SESSION['donorID']);
?>
<!-- form style -->
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-light.css?3.3.5398"/>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5398" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<style>
    th,td{
            text-align: center
        }
</style>
<?php
    require_once '../template/DonorTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->

<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Donors
                </h3>

                <p class="page-breadcrumb">
                    <a href="DonorHome.php">Home</a> / Donors 
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

<section>
        <div class="container">
                <ul class="form-section page-section">
                    <li id="cid_10" class="form-input-wide" data-type="control_head">
                          <div class="form-header-group ">
                            <div class="header-text httal htvam">
                                  <h1 id="header_10" class="form-header" data-component="header">
                                    Donors
                                  </h1>
                            </div>
                          </div>
                    </li>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
                        <div class="semi-square" style="float:right">
                            <button class="button button4" type="submit" name="search" value="search"><i class="fa fa-search"></i> Search</button>
                        </div>
                        <div class="styled-select slate semi-square left-right-container">
                          <select name="city">
                              <?php
                                  if(isset($_GET['city']) && $_GET['city'] != 1){
                                      if($_GET['city']){
                                          echo '<option value="'.$_GET['city'].'">'.$_GET['city'].'</option>';
                                          echo '<option value="1">ALL</option>';
                                      }else{
                                          echo '<option value="1">Search By City</option>';
                                      }
                                  }else{
                                      echo '<option value="1">Search By City</option>';
                                  }
                              ?>
                              <option value="Cairo">Cairo</option>
                              <option value="Alexandria">Alexandria</option>
                              <option value="Gizeh">Gizeh</option>
                              <option value="Shubra El-Kheima">Shubra El-Kheima</option>
                              <option value="Port Said">Port Said</option>
                              <option value="Suez">Suez</option>
                              <option value="Luxor">Luxor</option>
                              <option value="El-Mansura">El-Mansura</option>
                              <option value="El-Mahalla El-Kubra">El-Mahalla El-Kubra</option>
                              <option value="Tanta">Tanta</option>
                              <option value="Asyut">Asyut</option>
                              <option value="Ismailia">Ismailia</option>
                              <option value="Fayyum">Fayyum</option>
                              <option value="Zagazig">Zagazig</option>
                              <option value="Aswan">Aswan</option>
                              <option value="Damietta">Damietta</option>
                              <option value="Damanhur">Damanhur</option>
                              <option value="El-Minya">El-Minya</option>
                              <option value="Beni Suef">Beni Suef</option>
                              <option value="Qena">Qena</option>
                              <option value="Sohag">Sohag</option>
                              <option value="Hurghada">Hurghada</option>
                              <option value="6th of October City">6th of October City</option>
                              <option value="Shibin El Kom">Shibin El Kom</option>
                              <option value="Banha">Banha</option>
                              <option value="Kafr el-Sheikh">Kafr el-Sheikh</option>
                              <option value="Arish">Arish</option>
                              <option value="Mallawi">Mallawi</option>
                              <option value="10th of Ramadan City">10th of Ramadan City</option>
                              <option value="Bilbais">Bilbais</option>
                              <option value="Marsa Matruh">Marsa Matruh</option>
                              <option value="Idfu">Idfu</option>
                              <option value="Mit Ghamr">Mit Ghamr</option>
                              <option value="Al-Hamidiyya">Al-Hamidiyya</option>
                              <option value="Desouk">Desouk</option>
                              <option value="Qalyub">Qalyub</option>
                              <option value="Abu Kabir">Abu Kabir</option>
                              <option value="Kafr el-Dawwar">Kafr el-Dawwar</option>
                              <option value="Girga">Girga</option>
                              <option value="Akhmim">Akhmim</option>
                              <option value="Akhmim">Matareya</option>
                          </select>
                        </div>
                        <div class="right-container">
                          <div class="styled-select slate semi-square left-right-container" >
                            <select  name="bloodGroup">
                                <?php
                                    if(isset($_GET['bloodGroup'])  && $_GET['bloodGroup'] != 1){
                                        if($_GET['bloodGroup']){
                                            echo '<option value="'.$_GET['bloodGroup'].'">'.$_GET['bloodGroup'].'</option>';
                                            echo '<option value="1">ALL</option>';
                                        }else{
                                            echo '<option value="1">Search By blood Group </option>';
                                        }
                                        
                                    }else{
                                        echo '<option value="1">Search By blood Group </option>';
                                    }
                                ?>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                          </div>
                        </div>
                    </form>
                </ul>
                <table class="table">
                        <thead class="thead-dark">
                                <tr>
                                        <th scope="col">Donor Name</th>
                                        <th scope="col">Blood Group</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Contact no</th>
                                        <th scope="col">District</th>
                                        <th scope="col">City</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_GET['search'])){
                                    if(is_numeric($_GET['city']) && is_numeric($_GET['bloodGroup'])){
                                        $flag = 0;
                                        $donors = Donor::retreiveAllDonors();
                                        if(is_array($donors) && count($donors)>0){
                                            foreach ($donors as $donor) {
                                                $age = round((strtotime(date("d-m-20y"))-strtotime("24-06-2018"))/(60*60*24*365));
                                                if((strtotime(date("d-m-20y"))-strtotime($donor['lastDonationDate']))/(60*60*24) > 90){
                                                    $flag = 1;
                                                    echo '<tr>
                                                    <th scope="row"><a href="DonorDonorDetails.php?id='.$donor['donorID'].'">'.$donor['firstName'].' '.$donor['middleName'].' '.$donor['lastName'].'</a></th>
                                                    <td>'.$donor['bloodGroup'].'</td>
                                                    <td>'.$age.'</td>
                                                    <td>'.$donor['phoneNo'].'</td>
                                                    <td>'.$donor['district'].'</td>
                                                    <td>'.$donor['city'].'</td>
                                                </tr>';
                                                }
                                            }if($flag == 0){
                                                echo '<tr>
                                                        <td colspan="6" style="text-align:center" scope="row"> There is no Donors Available !!!</td>
                                                    </tr>';
                                            }
                                        }else{
                                            echo '<tr>
                                                    <td colspan="6" style="text-align:center" scope="row"> There is no Donors Available !!!</td>
                                                </tr>';
                                        }
                                    }elseif(is_numeric($_GET['city'])){
                                        $flag = 0;
                                        $donors = Donor::retreiveAllDonorsByBloodGroup($_GET['bloodGroup']);
                                        if(is_array($donors) && count($donors)>0){
                                            foreach ($donors as $donor) {
                                                $age = round((strtotime(date("d-m-20y"))-strtotime("24-06-2018"))/(60*60*24*365));
                                                if((strtotime(date("d-m-20y"))-strtotime($donor['lastDonationDate']))/(60*60*24) > 90){
                                                    $flag = 1;
                                                    echo '<tr>
                                                    <th scope="row"><a href="DonorDonorDetails.php?id='.$donor['donorID'].'">'.$donor['firstName'].' '.$donor['middleName'].' '.$donor['lastName'].'</a></th>
                                                    <td>'.$donor['bloodGroup'].'</td>
                                                    <td>'.$age.'</td>
                                                    <td>'.$donor['phoneNo'].'</td>
                                                    <td>'.$donor['district'].'</td>
                                                    <td>'.$donor['city'].'</td>
                                                </tr>';
                                                }
                                            }if($flag == 0){
                                                echo '<tr>
                                                        <td colspan="6" style="text-align:center" scope="row"> There is no Donors Available !!!</td>
                                                    </tr>';
                                            }
                                        }else{
                                            echo '<tr>
                                                    <td colspan="6" style="text-align:center" scope="row"> There is no Donors Available with Blood Group '.$_GET['bloodGroup'].' !!!</td>
                                                </tr>';
                                        }
                                    }elseif(is_numeric($_GET['bloodGroup'])){
                                        $flag = 0;
                                        $donors = Donor::retreiveAllDonorsByCity($_GET['city']);
                                        if(is_array($donors) && count($donors)>0){
                                            foreach ($donors as $donor) {
                                                $age = round((strtotime(date("d-m-20y"))-strtotime("24-06-2018"))/(60*60*24*365));
                                                if((strtotime(date("d-m-20y"))-strtotime($donor['lastDonationDate']))/(60*60*24) > 90){
                                                    $flag = 1;
                                                    echo '<tr>
                                                    <th scope="row"><a href="DonorDonorDetails.php?id='.$donor['donorID'].'">'.$donor['firstName'].' '.$donor['middleName'].' '.$donor['lastName'].'</a></th>
                                                    <td>'.$donor['bloodGroup'].'</td>
                                                    <td>'.$age.'</td>
                                                    <td>'.$donor['phoneNo'].'</td>
                                                    <td>'.$donor['district'].'</td>
                                                    <td>'.$donor['city'].'</td>
                                                </tr>';
                                                }
                                            }if($flag == 0){
                                                echo '<tr>
                                                        <td colspan="6" style="text-align:center" scope="row"> There is no Donors Available !!!</td>
                                                    </tr>';
                                            }
                                        }else{
                                            echo '<tr>
                                                    <td colspan="6" style="text-align:center" scope="row"> There is no Donors Available in '.$_GET['city'].' !!!</td>
                                                </tr>';
                                        }
                                    }else{
                                        $flag = 0;
                                        $donors = Donor::retreiveAllDonorsByBloodGroupAndCity($_GET['bloodGroup'], $_GET['city']);
                                        if(is_array($donors) && count($donors)>0){
                                            foreach ($donors as $donor) {
                                                $age = round((strtotime(date("d-m-20y"))-strtotime("24-06-2018"))/(60*60*24*365));
                                                if((strtotime(date("d-m-20y"))-strtotime($donor['lastDonationDate']))/(60*60*24) > 90){
                                                    $flag = 1;
                                                    echo '<tr>
                                                    <th scope="row"><a href="DonorDonorDetails.php?id='.$donor['donorID'].'">'.$donor['firstName'].' '.$donor['middleName'].' '.$donor['lastName'].'</a></th>
                                                    <td>'.$donor['bloodGroup'].'</td>
                                                    <td>'.$age.'</td>
                                                    <td>'.$donor['phoneNo'].'</td>
                                                    <td>'.$donor['district'].'</td>
                                                    <td>'.$donor['city'].'</td>
                                                </tr>';
                                                }
                                            }if($flag == 0){
                                                echo '<tr>
                                                        <td colspan="6" style="text-align:center" scope="row"> There is no Donors Available !!!</td>
                                                    </tr>';
                                            }
                                        }else{
                                            echo '<tr>
                                                    <td colspan="6" style="text-align:center" scope="row"> There is no Donors Available with Blood Group '.$_GET['bloodGroup'].' in '.$_GET['city'].' !!!</td>
                                                </tr>';
                                        }
                                    }
                                }else{
                                    $flag = 0 ;
                                    $donors = Donor::retreiveAllDonors();
                                    if(is_array($donors) && count($donors)>0){
                                        foreach ($donors as $donor) {
                                            $age = round((strtotime(date("d-m-20y"))-strtotime("24-06-2018"))/(60*60*24*365));
                                            if((strtotime(date("d-m-20y"))-strtotime($donor['lastDonationDate']))/(60*60*24) > 90){
                                                $flag = 1;
                                                echo '<tr>
                                                <th scope="row"><a href="DonorDonorDetails.php?id='.$donor['donorID'].'">'.$donor['firstName'].' '.$donor['middleName'].' '.$donor['lastName'].'</a></th>
                                                <td>'.$donor['bloodGroup'].'</td>
                                                <td>'.$age.'</td>
                                                <td>'.$donor['phoneNo'].'</td>
                                                <td>'.$donor['district'].'</td>
                                                <td>'.$donor['city'].'</td>
                                            </tr>';
                                            }
                                        }if($flag == 0){
                                            echo '<tr>
                                                    <td colspan="6" style="text-align:center" scope="row"> There is no Donors Available !!!</td>
                                                </tr>';
                                        }
                                    }else{
                                        echo '<tr>
                                                <td colspan="6" style="text-align:center" scope="row"> There is no Donors Available !!!</td>
                                            </tr>';
                                    }
                                }
                                
                            ?>
                        </tbody>
                </table>

        </div>
</section>
<?php
    require_once '../template/DonorTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/DonorTemplate/end.tpl';
?>
