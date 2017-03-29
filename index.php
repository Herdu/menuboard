<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Menuboard</title>
    <link rel="stylesheet" href="style/index.css">

    <link rel="stylesheet" href="style/style.css">

</head>

<?php

    session_start();

?>



<body>

<header>
    <a href="http://lokalmedia.pl/"><img src="img/logo.png"></a>
</header>

<main>
    <form action="php/login.php" method="POST">
        <h1>Menuboard</h1>
        <h2>panel zarządzania</h2>

        <label for="fname">Login</label>
        <input type="text" name="login" placeholder="login..." required />

        <label for="lname">Hasło</label>
        <input type="password"  name="password" placeholder="hasło..." required />


        <input type="submit" value="Zaloguj">

        <?php
            if (isset($_SESSION['wrong_login_data']))
                echo '<span class="warning">Niepoprawne dane logowania! </span>';
        ?>

    </form>

</main>

<footer>
    <p>Wszystkie prawa zastrzeżone. Copyright by Lokal Media 2017.</p>
</footer>

</body>
</html>