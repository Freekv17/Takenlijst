<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>

    <?php require_once('./header.php') ?>

    <main>

        <div class="wrapper">

            <?php
            if (isset($_GET['msg'])) {
                echo "<div class='msg'>" . $_GET['msg'] . "</div>";
            }
            ?>

            <form action="./backend/loginController.php" method="post">
                <div class="form-group">
                    <label for="fullname">Volledige naam: </label>
                    <input type="text" name="fullname" id="fullname">
                </div>

                <div class="form-group">
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" id="email">
                </div>

                <div class="form-group">
                    <label for="password">Wachtwoord: </label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="form-group">
                    <input type="submit" value="Inloggen">
                </div>
            </form>
        </div>
    </main>

    <?php require_once('./footer.php') ?>

</body>

</html>