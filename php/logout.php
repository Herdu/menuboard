<?php
    session_start();

    unset($_SESSION['isLogged']);
    unset($_SESSION['user']);
    unset($_SESSION['isAdmin']);
    header("location: ../index.php");

?>



