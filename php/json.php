<?php


if ($_SERVER['REQUEST_METHOD'] == "GET"){



    require_once("db_data.php");

    $id =  $_GET['id'];

    $menu = array();

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

            $category = array();


            for ($i=0; $i<$numberOfCategories; $i++)
            {



                $query = 'SELECT * FROM products where owner ="'.$login.'" and category ='.($i+1);
                $res = $mysqli->query($query);


                while($row = $res->fetch_assoc())
                {
                    $myAssoc = array(
                        'name'=> $row['name'],
                        'price'=> (number_format((float)$row['price'], 2, '.', ''))." zł"
                        );

                    $category[]= $myAssoc;

                }

                $menu['category'.$i] =  $category;
            }


        }
        $menu = array("menu"=>$menu);

        $json = json_encode($menu ,JSON_PRETTY_PRINT );

        $mysqli->close();
    }



    echo $json;

}
?>

