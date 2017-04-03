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

    <section id="categories">
        <?php
            require_once("php/getContent.php");
        ?>
    </section>


</main>



<script src="https://use.fontawesome.com/20166a2bda.js"></script>
<script src="script/board.js"></script>
</body>
</html>