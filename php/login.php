<?php

    session_start();

    $login =  $_POST['login'];

    $password =  $_POST['password'];

    unset($_SESSION['wrong_login_data']);

    require('db_data.php');


    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if($mysqli->connect_errno)
    {
        echo "failed to connect to mysql: ". $mysqli->connect_error;
    }
    else
    {

        $query = "SELECT * FROM users where login = '$login'  and password='$password'";
        $res = $mysqli->query($query);
        if (!$res)
            echo "query error";

        if ($row = $res->fetch_assoc())
        {
            //login success
            $_SESSION['user'] = $login;
            $_SESSION['isLogged'] = true;
            if ($row['permissions'] == 'admin')
            {
                $_SESSION['isAdmin'] = true;
                header("location: ../admin.php");
            }
            else
            {
                header("location: ../board.php");
            }



        }
        else
        {
            $_SESSION['wrong_login_data'] = true;
            header("location: ../index.php");
        }



        $mysqli->close();
    }










?>


