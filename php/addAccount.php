<?php
session_start();


require_once("db_data.php");




if ($_SERVER['REQUEST_METHOD'] == "POST"){



    $permissions = $_POST['permissions'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if($mysqli->connect_errno)
    {
        echo "failed to connect to mysql: ". $mysqli->connect_error;
    }

    else
    {

        $mysqli->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
        // "SET NAMES `utf8` COLLATE `utf8_polish_ci`"

        $query = "INSERT INTO `users`( `login`, `password`, `permissions`) VALUES ('{$login}','{$password}','{$permissions}')";

        if (!($mysqli->query($query))){
            echo $mysqli->error;
    }



        $mysqli->close();
    }

}





header("location: ../admin.php");
?>



