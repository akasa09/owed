<?php

if(isset($_POST['logout'])){
    session_unset('login_user');
    if (!isset($_SESSION['login_user'])) {
        header('location: ../index.php');
    }
}

?>