<?php

if(isset($_POST['loginButton'])){
    //Login button was pressed
    $username = $_POST[('loginUsername')];
    $password = $_POST[('loginPassword')];

    //Login function
    $result = $account->login($username, $password);
    if($result["status"] == true && $result["data"]["role"] == "user"){
        $_SESSION['userLoggedIn'] = $username;
        $_SESSION['role'] = $result["data"]["role"];
        
        header("Location: index.php");

    }else if($result["status"] == true && $result["data"]["role"] == "admin"){
        $_SESSION['userLoggedIn'] = $username;
        $_SESSION['role'] = $result["data"]["role"];
        header("Location: admin.php");
    }
    

}

?>