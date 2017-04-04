<?php
session_start();


require_once("db_data.php");



$id = $_POST['id'];
$password = $_POST['password'];
$numberOfCategories = $_POST['numberOfCategories'];




if ($_SERVER['REQUEST_METHOD'] == "POST"){


    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if($mysqli->connect_errno)
    {
        echo "failed to connect to mysql: ". $mysqli->connect_error;
    }

    else
    {


        $mysqli->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
        // "SET NAMES `utf8` COLLATE `utf8_polish_ci`"

        $query = "UPDATE users SET numberOfCategories='$numberOfCategories', password='$password' WHERE id=$id;";

        $mysqli->query($query);

        $mysqli->close();

    }



}





header("location: ../admin.php");
?>



