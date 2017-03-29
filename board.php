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
</header>

<main>
    <section class="horizontal-center">
        <div >
            <span>Witaj, <span><?php echo $_SESSION['user']?></span></span><a href="php/logout.php"><button>wyloguj</button></a>
        </div>
    </section>

    <section id="categories">

    </section>


</main>

<footer>
    <p>Wszystkie prawa zastrzeżone. Copyright by Lokal Media 2017.</p>
</footer>



<script src="script/board.js"></script>
</body>
</html>