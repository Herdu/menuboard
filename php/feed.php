<?php

    header('Content-type: application/xml');


if ($_SERVER['REQUEST_METHOD'] == "GET"){

    echo '<?xml version="1.0"?>';
    echo '<menu>';


    require_once("db_data.php");

    $id =  $_GET['id'];


    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if($mysqli->connect_errno)
    {
        echo "failed to connect to mysql: ". $mysqli->connect_error;
    }

    else
    {
        $query = "SELECT * FROM users where id=$id";
        $res = $mysqli->query($query);

        if ($row = $res->fetch_assoc())
        {
            $login = $row['login'];
            $numberOfCategories = $row['numberOfCategories'];


            for ($i=0; $i<$numberOfCategories; $i++)
            {
                echo '<category>';


                $query = 'SELECT * FROM products where owner ="'.$login.'" and category ='.($i+1);
                $res = $mysqli->query($query);


                while($row = $res->fetch_assoc())
                {
                    echo '<item>';

                    echo '<name>';
                    echo $row['name'];
                    echo '</name>';

                    echo '<price>';
                    echo $row['price']." zł";
                    echo '</price>';
                    echo '</item>';
                }

                echo '</category>';

            }


        }


        $mysqli->close();
    }



    echo '</menu>';

}
