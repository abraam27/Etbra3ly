<?php
    require_once '../../lib/organization.php';
    require_once '../../lib/donor.php';
    require_once '../template/DonorTemplate/head.tpl';
    $loginDonor = Donor::retreiveDonorById($_SESSION['donorID']);
?>
<!-- form style -->
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.5398" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.5398" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=59fb4852cf3bfe589c6c6f21"/>
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-light.css?3.3.5398"/>
<style>
    th,td{
            text-align: center
        }
</style>
<script language="javascript" type="text/javascript">
function doReload(city){
	document.location = '?city=' + city;
}
</script>
<?php
    require_once '../template/DonorTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->

        <section class="page-header" data-stellar-background-ratio="1.2">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 text-center">


                        <h3>
                            Hospitals
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="DonorHome.php">Home</a> / Hospitals 
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->
		
        <section id="AddDonor">
                <div class="container">
                        <ul class="form-section page-section">
                                  <li id="cid_10" class="form-input-wide" data-type="control_head">
                                        <div class="form-header-group ">
                                          <div class="header-text httal htvam">
                                                <h1 id="header_10" class="form-header" data-component="header">
                                                  Hospitals
                                                </h1>
                                          </div>
                                        </div>
                                  </li>
                                  <div class="styled-select slate semi-square left-right-container">
                                    <select name="city" id="city" onChange="doReload(this.value);">
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
                        </ul>
                        <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Hospital Name</th>
                                        <th scope="col">District</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Contact no 1</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_GET['city']) && !is_numeric($_GET['city'])){
                                            $city = $_GET['city'];
                                            $hospitals = Organization::retreiveAllOrganizationsInCity("Hospital", $city);
                                            if(is_array($hospitals) && count($hospitals)>0 )
                                            {
                                                foreach ($hospitals as $hospital) {
                                                    echo '<tr>
                                                            <th scope="row"><a href="DonorHospitalDetails.php?id='.$hospital['organizationID'].'">'.$hospital['name'].'</a></th>
                                                            <td>'.$hospital['district'].'</td>
                                                            <td>'.$hospital['city'].'</td>
                                                            <td>'.$hospital['phone1'].'</td>
                                                        </tr>';
                                                }
                                            }else{
                                                echo '<tr>
                                                        <td colspan="4" style="text-align:center" scope="row"> There is no Hospitals in '.$city.' !!!</td>
                                                    </tr>';
                                            }
                                        }else{
                                            $hospitals = Organization::retreiveAllOrganizations("Hospital");
                                            if(is_array($hospitals) && count($hospitals)>0 )
                                            {
                                                foreach ($hospitals as $hospital) {
                                                    echo '<tr>
                                                            <th scope="row"><a href="DonorHospitalDetails.php?id='.$hospital['organizationID'].'">'.$hospital['name'].'</a></th>
                                                            <td>'.$hospital['district'].'</td>
                                                            <td>'.$hospital['city'].'</td>
                                                            <td>'.$hospital['phone1'].'</td>
                                                        </tr>';
                                                }
                                            }else{
                                                echo '<tr>
                                                        <td colspan="4" style="text-align:center" scope="row"> There is no Hospitals !!!</td>
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
