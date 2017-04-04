<?php

    require_once('db_data.php');

    $numberOfCategories = $_SESSION['numberOfCategories'];







$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if($mysqli->connect_errno)
{
    echo "failed to connect to mysql: ". $mysqli->connect_error;
}
else
{

     $mysqli->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
     // "SET NAMES `utf8` COLLATE `utf8_polish_ci`"


    for ($i=0; $i< $numberOfCategories; $i++)
    {
        echo '<div class="category">';
        echo '<span>Kategoria '. ($i + 1) .'</span>';
        echo '<table>';

        $query = "SELECT * FROM products where owner= '{$_SESSION['user']}' and category=($i+1)";
        $res = $mysqli->query($query);



        if (!$res)
            echo "query error";
        while ($row = $res->fetch_assoc())
        {


            echo '<tr>';


            echo '<td>';
            echo '<form action="php/update.php" method="POST">';
            echo '<input class="item-name" type="text" name="name" value="'.$row['name'].'" />';
            echo '<input type="hidden" name="index" value="'.$row['id'].'" />';

            echo '<input class="item-price" name="price" type="text" value="'.$row['price'].'" />';
            echo  '<button type="submit" class="item-update" title="aktualizuj informacje o tym produkcie"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';


            echo '</form>';
            echo '<form action="php/delete.php" method="POST">';
            echo '<input type="hidden" name="index" value="'.$row['id'].'" />';
            echo  '<button type="submit" class="item-delete" title="usuń produkt"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
            echo '</form>';


            echo '</td>';

            echo '<td>';

            echo '</td>';

            echo '</tr>';


        }

        echo '<tr>';


        echo '</tr>';

        echo '</table>';

        echo '<form action="php/add.php" method="POST">';
        echo '<input type="hidden" name="category" value="'.($i+1).'" />';
        echo '<input type="submit" value="Dodaj pozycję" />';
        echo '</form>';

        echo '</div>';
    }



    $query = "SELECT * FROM products where owner= '{$_SESSION['user']}'";
    $res = $mysqli->query($query);
    if (!$res)
        echo "query error";




    if ($row = $res->fetch_assoc())
    {

    }



    $mysqli->close();
}