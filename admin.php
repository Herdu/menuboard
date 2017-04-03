<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>panel administracyjny</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/admin.css">

</head>

<?php
    session_start();

?>

<body>

<header>
    <a href="http://lokalmedia.pl/"><img src="img/logo.png"></a>

    <div >
        <span>Witaj, <span><?php echo $_SESSION['user']?></span></span><a href="php/logout.php"><button>wyloguj</button></a>
    </div>
</header>

<main>


    <div>
        <form method="post" action="php/addAccount.php">
            <br />
            <h2>Dodaj użytkownika</h2>
            Login: <input  type="text" name="login" required />
            <br />Hasło: <input  type="text" name="password"  required />
            <br /><input type="hidden" name="role" value="0" />
            <input type="hidden" value="user"  name="permissions" />
            <input type="submit" value="Dodaj"  name="submit" />
        </form>
    </div>

    <div>
        <form method="post" action="php/addAccount.php">
            <br />
            <h2>Dodaj administratora</h2>
            Login: <input  type="text" name="login" required />
            <br />  Hasło: <input  type="text" name="password"  required />
            <br /><input type="hidden" name="role" value="2" />
            <input type="hidden" value="admin"  name="permissions" />
            <input type="submit" value="Dodaj"  name="submit" />
        </form>
    </div>


    <br />
    <h2>Użytkownicy:</h2>

    <table>
        <tr>
            <td>Id</td> <td>Login</td> <td>Hasło</td><td>Uprawnienia</td><td>Liczba kategorii</td><td>URL do StudioPro</td><td></td>
        </tr>
        <?php

        require_once("php/db_data.php");


        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if($mysqli->connect_errno)
        {
            echo "failed to connect to mysql: ". $mysqli->connect_error;
        }

        else
        {


            $query = "select * from users";

            $res = $mysqli->query($query);


            while($row = $res->fetch_assoc())
            {
                if ($row['login'] == $_SESSION['user'])
                {
                    echo "<tr class='special-row'>";

                }

                else
                {
                    echo "<tr>";

                }

                echo "<td>";
                echo $row['id'];
                echo "</td><td>";
                echo $row['login'];
                echo "</td><td>";


                echo "<form method='post' action='php/updateUser.php' class='admin-form'>";
                echo "<input type='text' name='password' value='{$row['password']}' >";
                echo "</td><td>";
                echo $row['permissions'];
                echo "</td><td>";
                echo "<input type='hidden' name='id' value='{$row['id']}' >";
                echo "<input type='text' name='numberOfCategories' value='{$row['numberOfCategories']}' >";
                 echo '<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"tabindex="-1" />';

                echo "</form>";

                echo "</td>";


                echo "<td>";
                if ($row['permissions'] != 'admin')
                    echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/menuboard/php/json.php?id={$row['id']}";
                echo "</td>";

                echo "<td>";

                    echo "<form method='post' action='php/deleteUser.php'>";
                    echo "<input type='hidden' name='id' value='{$row['id']}' '>";
                    echo "<input type='submit' value='delete'>";
                    echo "</form>";

                echo "</td>";
                echo "<td></td><td></td>";



                echo "</tr>";

            }

        }


        ?>

    </table>




</main>



</body>
</html>