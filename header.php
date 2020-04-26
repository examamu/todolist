<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['logout']) === TRUE) {
        unset($_SESSION['user_id']);
        header('Location:./login.php');
    }
}


include('./view/header_view.php');
?>