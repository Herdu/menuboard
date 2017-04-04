<?php
session_start();


require_once("db_data.php");




if ($_SERVER['REQUEST_METHOD'] == "POST"){



    $category = $_POST['category'];

    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if($mysqli->connect_errno)
    {
        echo "failed to connect to mysql: ". $mysqli->connect_error;
    }

    else
    {

        $mysqli->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
        // "SET NAMES `utf8` COLLATE `utf8_polish_ci`"



        $query = "INSERT INTO `products`( `name`, `price`, `owner`, `category`) VALUES ('nazwa','0.00','{$_SESSION['user']}', $category)";

        $mysqli->query($query);
        $mysqli->close();
    }

}





header("location: ../board.php");
?>



