<?php

    class Account {
        private $con;
        private $errorArray;

        public function __construct($con){
            $this->con = $con;
            $this->errorArray = array();
        }

        public function login($usn, $pss){
            $pss = md5($pss);

            $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$usn' AND password='$pss'");
            
            if(mysqli_num_rows($query) == 1){
                $row = $query->fetch_assoc();
                
                return array("status"=>true, "data"=>$row);
                

            }
            else{
                array_push($this->errorArray, Constants::$loginFailed);
                return false;
            }

        }

        public function register($usn, $fn, $ln, $em, $em2, $pss, $pss2 ){
            $this->validateUsername($usn);
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pss, $pss2);

            if (empty($this->errorArray) == true) {
                
                return $this->insertUserDetails($usn, $fn, $ln, $em, $pss);
                
            }

            else{
                return false;
            }
        }

        public function getError($error){
            if(!in_array($error, $this->errorArray)){
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function insertUserDetails($usn, $fn, $ln, $em, $pss){
            $encryptedPw = md5($pss);
            $profilePic = "assets/images/profile-pics/random-pic.png";
            $date = date("Y-m-d");
            $role = "user";

            $result= mysqli_query($this->con, "INSERT INTO users VALUES ('', '$usn', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic', '$role')");
            return $result;
        }

        private function validateUsername($usn){
            if(strlen($usn) > 25 || strlen($usn) < 5){ 
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }

            //check if to username exists
            $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$usn'");
            if(mysqli_num_rows($checkUsernameQuery) != 0){
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }
        }

        private function validateFirstName($fn){
            if(strlen($fn ) > 25 || strlen($fn) < 2){ 
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
            }
        }
        private function validateLastName($ls){
            if(strlen($ls) > 25 || strlen($ls) < 2){ 
                array_push($this->errorArray, Constants::$lastNameCharacters);
                return;
            }
        }

        private function validateEmails($em, $em2){
            if($em != $em2){
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }

            if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }

            // Check that email hasn't already been used
            $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
            if(mysqli_num_rows($checkEmailQuery) != 0){
                array_push($this->errorArray, Constants::$emailTaken);
                return;
            }
            
        }

        private function validatePasswords($pss, $pss2){
            if($pss != $pss2){
                array_push($this->errorArray, Constants::$passwordsDoNotMatch);
                return;
            }
            
            if(preg_match('/[^A-Za-z0-9]/', $pss)){
                array_push($this->errorArray, Constants::$passwordNotAlphaNumeric);
                return;
            }

            if(strlen($pss) > 30 || strlen($pss2) < 5){ 
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }
        }
    }

?>