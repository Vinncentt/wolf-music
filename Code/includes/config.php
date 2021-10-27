<?php 

    ob_start();


    
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }
     
    $timezone = date_default_timezone_set("Europe/London");

    $con = mysqli_connect("localhost", "root", "", "wolf_music" );

    if(mysqli_connect_errno()){
        echo "Faild to connect" . mysqli_connect_errno();
    }

?>