<?php
    
     $user = $_POST['userid'];
     $pass = $_POST['accesskey'];

        if($user == "lucifer" && $pass == "alpha"){
            header("Location: home.php");
        }
        else{
            header("Location: error.html");
        }
?>