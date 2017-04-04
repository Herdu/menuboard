<?php
session_start();


require_once("db_data.php");



$id = $_POST['index'];
$name = $_POST['name'];
$price = $_POST['price'];




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


        $query = "UPDATE products SET name='$name', price=$price WHERE id=$id;";

        $mysqli->query($query);

        $mysqli->close();

    }



}





header("location: ../board.php");
?>



