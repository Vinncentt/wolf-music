<?php



if(isset($_POST['loginButton'])){
    //Login button was pressed
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];
    $account = new Account($con);

    //Login function
    $result = $account->login($username, $password);

    if($result['access'] == true && $result['data']['role'] == "user") {
        $_SESSION['role'] = $result['data']['role'];
        header("location:index.php");
    
    }else if($result['access'] == true  && $result['data']['role'] == "admin") {
         $_SESSION['role'] = $result['data']['role'];
        header("location:admin.php");
    }


    // if($result  == true && $result["data"]["role"] == "user"){
    //     $_SESSION['userLoggedIn'] = $username;
    //     $_SESSION['role'] = $result["data"]["role"];
        
    //     header("Location: index.php");

    // }else if($result == true && $result["data"]["role"] == "admin"){
    //     $_SESSION['userLoggedIn'] = $username;
    //     $_SESSION['role'] = $result["data"]["role"];
    //     header("Location: admin.php");
    // }
    

}
