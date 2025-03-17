<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'public/resources/views/components/head.php'; ?>

<body>

    <?php require_once 'public/resources/views/components/header.php'; ?>


    <main class="login">
        <div class="wrapper">
            <?php
            if (isset($_GET['msg'])) {
                echo "<div class='msg'>" . $_GET['msg'] . "</div>";
            }
            ?>
            <div class="loginCard">
                <div class="loginNav">
                    <h2 id="loginTab" class="active">LOG IN</h2>
                    <h2 id="registerTab">MAAK ACCOUNT</h2>
                </div>
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

    <?php require_once 'public/resources/views/components/footer.php'; ?>

</body>



<!--- inlog/maak account wissel met javascript --->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const loginTab = document.getElementById("loginTab");
        const registerTab = document.getElementById("registerTab");
        const fullnameGroup = document.getElementById("fullname-group");
        const formAction = document.getElementById("formAction");
        const submitButton = document.getElementById("submitButton");

        loginTab.classList.add("active");
        fullnameGroup.style.visibility = "hidden";
        fullnameGroup.style.height = "0";

        loginTab.addEventListener("click", function () {
            formAction.value = "login";
            fullnameGroup.style.visibility = "hidden";
            fullnameGroup.style.height = "0";
            submitButton.value = "INLOGGEN";
            loginTab.classList.add("active");
            registerTab.classList.remove("active");
        });

        registerTab.addEventListener("click", function () {
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