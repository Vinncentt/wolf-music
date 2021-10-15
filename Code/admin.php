<?php 
    if($_SESSION['role'] != 'admin'){
        header("Location: index.php");
    }

    

?>


<h1>THIS is ADMIN PAGE AZBI</h1>