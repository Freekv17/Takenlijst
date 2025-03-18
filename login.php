<?php session_start(); ?>

<?php require("./config/config.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takenlijst DeveloperLand</title>
    <link rel="stylesheet" href="./public/css/style.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
</head>

<body>

    <?php require_once "public/resources/views/components/header.php" ?>


    <main class="login">
        <div class="wrapper">
            <div class="loginCard">
                <div class="loginNav">
                    <h2 id="loginTab" class="active">LOG IN</h2>
                    <h2 id="registerTab">MAAK ACCOUNT</h2>
                </div>
                <?php
                if (isset($_GET['msg'])) {
                    echo "<div class='msg'>" . $_GET['msg'] . "</div>";
                }
                ?>
                <form action="./backend/loginController.php" method="post">
                    <input type="hidden" name="action" id="formAction" value="login">

                    <div class="form-group" id="fullname-group">
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
                    <div class="form-group" id="button">
                        <input type="submit" value="INLOGGEN" id="submitButton">
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php require_once "public/resources/views/components/footer.php" ?>

</body>



<!--- inlog/maak account wissel met javascript --->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const loginTab = document.getElementById("loginTab");
        const registerTab = document.getElementById("registerTab");
        const fullnameGroup = document.getElementById("fullname-group");
        const formAction = document.getElementById("formAction");
        const submitButton = document.getElementById("submitButton");

        loginTab.classList.add("active");
        fullnameGroup.style.visibility = "hidden";
        fullnameGroup.style.height = "0";

        loginTab.addEventListener("click", function() {
            formAction.value = "login";
            fullnameGroup.style.visibility = "hidden";
            fullnameGroup.style.height = "0";
            submitButton.value = "INLOGGEN";
            loginTab.classList.add("active");
            registerTab.classList.remove("active");
        });

        registerTab.addEventListener("click", function() {
            formAction.value = "register";
            fullnameGroup.style.visibility = "visible";
            fullnameGroup.style.height = "auto";
            submitButton.value = "ACCOUNT MAKEN";
            registerTab.classList.add("active");
            loginTab.classList.remove("active");
        });
    });
</script>

</html>