<?php
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

    $account = new Account($con); //Account object
    


    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    function getInputValue($name){
        if (isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }
?>



<html>
<head>
    <title>Welcome to Ur-Listening</title>

    <link rel="stylesheet" href="assets/css/register.css">
     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>
    <?php 

        if(isset($_POST['registerButton'])){
            echo "<script>
                        $(document).ready(function(){
                            $('#loginForm').hide();
                            $('#registerForm').show();
                        });
                    </script>";
        }
        else{
            echo "<script>
                        $(document).ready(function(){
                            $('#loginForm').show();
                            $('#registerForm').hide();
                        });
                    </script>";
        }
    ?>

    

    <div id="background">
        <div id="loginContainer">
            <!-- Left side -->
            <div id="inputContainer">
                <!-- Login form -->
                <form action="register.php" id="loginForm" method="POST">
                    <h2>Login to your account</h2>
                    <p>
                        
                        <label for="loginUsername">Username</label>
                        <input type="text" id="loginUsername" name="loginUsername" placeholder="e.g. calvertLewin" value="<?php getInputValue('loginUsername'); ?>" required>
                        
                    </p>
                    
                    <p>
                        <label for="loginpassword">Password</label>
                        <input type="password" id="loginPassword" name="loginPassword" required>
                    </p>

                    <?php echo $account->getError(Constants::$loginFailed); ?>
                    
                    <button type="submit" name="loginButton">LOG IN</button>

                    <div id="hasAccountText">
                        
                        <a href="#"><span id="hideLogin">Don't have an account yet? Signup here.</span></a>
                    </div>
                </form>
                <!-- Register form -->
                <form action="register.php" id="registerForm" method="POST">
                    <h2>Create your free account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$usernameCharacters); ?>
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="e.g. calvertLewin" value="<?php getInputValue('username'); ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <label for="firstName">Fist name</label>
                        <input type="text" id="firstName" name="firstName" placeholder="e.g. Calvert" value="<?php getInputValue('firstName'); ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                        <label for="lastName">Last name</label>
                        <input type="text" id="lastName" name="lastName" placeholder="e.g. Lewin" value="<?php getInputValue('lastName'); ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>  
                        <?php echo $account->getError(Constants::$emailTaken); ?>              
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="e.g. calvertlewin@email.com" value="<?php getInputValue('email'); ?>" required>
                    </p>

                    <p>
                        <label for="email2">Confirm email</label>
                        <input type="email" id="email2" name="email2" placeholder="e.g. calvertlewin@email.com" value="<?php getInputValue('email2'); ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                        <?php echo $account->getError(Constants::$passwordNotAlphaNumeric); ?>
                        <?php echo $account->getError(Constants::$passwordCharacters); ?>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Your password" required>
                    </p>

                    <p>
                        <label for="password2">Confirm password</label>
                        <input type="password" id="password2" name="password2" placeholder="Your chosen password" required>
                    </p>
                    
                    <button type="submit" name="registerButton">SIGN UP</button>

                    <div class="hasAccountText">
                        
                        <a href=""><span id="hideRegister">Already have an account? Log in here.</span></a>
                    </div>
                </form>

            </div>

            <!-- Right side -->
            <div id="loginText">
                <h1>Get great music, right now</h1>
                <h2>Listen to loads of songs for free</h2>
                <ul>
                    <li>Discover music you fall in love with</li>
                    <li>Create your own playlists</li>
                    <li>Follow artists to keep up to date</li>
                </ul>
            </div>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</body>
</html>