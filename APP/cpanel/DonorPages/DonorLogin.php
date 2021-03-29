<!DOCTYPE html>
<html lang="en" >
    <?php
    require_once '../../lib/donor.php';
    require_once '../template/DonorTemplate/head.tpl';

    if(isset($_POST['signin'])){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $donorID = Donor::DonorLogin($name, $password);
        if(is_numeric($donorID)){
            $_SESSION["donorID"] = $donorID;
            // header used  to redirect to another page 
            header("location: DonorHome.php");
            exit();
        }else{
            header("location: DonorLogin.php?message=error when login");
            exit();
        }
    }
?>
    <head>
        <meta charset="UTF-8">
        <title>Login/Logout animation concept</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="../template/css/login.css">


    </head>
    
    <body>

      <div class="cont">
      <div class="demo">
        <div class="login">
          <div class="login__form">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="login__row">
                      <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                      </svg>
                      <input type="text" class="login__input name" placeholder="Email or Username"  name="name"/>
                    </div>
                    <div class="login__row">
                      <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                      </svg>
                      <input type="password" class="login__input pass" placeholder="Password" name="password"/>
                    </div>
                    <button type="sumit" class="login__submit" name="signin" value="signin">Sign in</button>
                </form>
              <p class="login__signup">Don't have an account? &nbsp;<a href="DonorRegistration.php">Sign up</a></p>
          </div>
        </div>

      </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    </body>

</html>
