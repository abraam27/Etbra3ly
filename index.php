<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'gptest');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    $dbh =  new PDO('mysql:host='.DB_HOST.';dbname=' .DB_NAME , DB_USER, DB_PASS);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        echo 012/4;
        //print_r(dirname(__FILE__.DIRECTORY_SEPARATOR));
        //define("PROJECT_PATH", dirname(__FILE__).DIRECTORY_SEPARATOR);
//        $message = "The mail message was sent with the following mail";
//        $headers = "From: abraamaj27@gmail.com";
//        mail("abraamaj27@gmail.com", "Testing", $message, $headers);
//        echo "Test message is sent to youremail@gmail.com....<BR/>";
        //mail("gabraam27@gamil.com", "Donation", "ya 3adra");
        //echo round((strtotime(date("d-m-20y"))-strtotime("27-11-1996"))/(60*60*24*365));
        //echo substr("05:00 PM", 6 , 2);
        //echo date("d-m-20y");
        //echo ceil(6/3);
        ?>
    </body>
</html>
