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
                    <h2>LOG IN</h2>
                    <h2>MAAK ACCOUNT</h2>
                </div>

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

                    <div class="form-group" id="button">
                        <input type="submit" value="INLOGGEN">
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php require_once 'public/resources/views/components/footer.php'; ?>

</body>

</html>