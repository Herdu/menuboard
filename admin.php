<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>panel zarządzania</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/board.css">

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


    <div class="form-container">
        <form action="database/addUser.php" method="post" >
            <br />
            <h2>Dodaj użytkownika</h2>
            Login: <input  type="text" name="login" required />
            <br />Hasło: <input  type="text" name="password"  required />
            <br /><input type="hidden" name="role" value="0" />
            <input type="submit" value="Dodaj"  name="submit" />
        </form>
    </div>

    <div class="form-container">
        <form action="database/addUser.php" method="post" class="alert">
            <br />
            <h2>Dodaj administratora</h2>
            Login: <input  type="text" name="login" required />
            <br />  Hasło: <input  type="text" name="password"  required />
            <br /><input type="hidden" name="role" value="2" />
            <input type="submit" value="Dodaj"  name="submit" />
        </form>
    </div>



    <br />
    <h2>Użytkownicy:</h2>

    <table class="admin-table">
        <tr>
            <td>Id</td> <td>Login</td> <td>Hasło</td><td>Uprawnienia</td><td></td><td></td>
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
                    echo "<td>". $row['id']. "</td><td class='alert'>". $row['login'] ."</td><td>". $row['password']."</td><td>". $row['permissions']."</td>";

                }

                else
                {
                    echo "<tr>";
                    echo "<td>". $row['id']. "</td><td>". $row['login'] ."</td><td>". $row['password']."</td><td>". $row['permissions']."</td>";

                }


                echo "<td>";
                if ($row['login'] != $_SESSION['user'])
                {
                    echo "<form method='post' action='database/deleteUser.php'>";
                    echo "<input type='hidden' name='id' value='{$row['id']}' '>";
                    echo "<input type='submit' value='delete'>";
                    echo "</form>";
                }

                echo "</td>";

                echo "<td>";

                if ($row['login'] != $_SESSION['user'])
                {
                    echo "<form method='post' action='database/updateUser.php'>";
                    echo "<input type='hidden' name='id' value='{$row['id']}' '>";
                    echo "<input type='submit' value='update'>";
                    echo "</form>";
                }

                echo "</td>";


                echo "</tr>";
            }

        }


        ?>

    </table>




</main>



<script src="https://use.fontawesome.com/20166a2bda.js"></script>
<script src="script/board.js"></script>
</body>
</html>