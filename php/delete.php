<?php
session_start();


require_once("db_data.php");




if ($_SERVER['REQUEST_METHOD'] == "POST"){



    $id = $_POST['index'];

    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if($mysqli->connect_errno)
    {
        echo "failed to connect to mysql: ". $mysqli->connect_error;
    }

    else
    {
        $query = "DELETE FROM products WHERE id=$id;";

        $mysqli->query($query);
        $mysqli->close();
    }

}





header("location: ../board.php");
?>



