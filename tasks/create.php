<?php require_once("../config/conn.php"); ?>
<?php require_once("../config/config.php"); ?>
<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<?php require_once '../public/resources/views/components/head.php'; ?>

<body>

    <?php
    if (!isset($_SESSION['user_id'])) {
        $msg = 'Je moet eerst inloggen';
        header("Location: ../login.php?msg=$msg");
        exit;
    }
    ?>

    <?php require_once 'public/resources/views/components/header.php'; ?>

    <main>

        <div class="wrapper">
            <form action="../backend/tasksController.php" method="POST">
                <input type="hidden" name="action" value="create">

                <div class="form-group">
                    <label for="titel">Titel: </label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="beschrijving">Beschrijving: </label>
                    <input type="text" name="beschrijving" id="beschrijving">
                </div>
                <div class="form-group">
                    <label for="afdeling">Afdeling: </label>
                    <select name="department" id="department">
                        <option value="personeel">personeel</option>
                        <option value="horeca">horeca</option>
                        <option value="techniek">techniek</option>
                        <option value="inkoop">inkoop</option>
                        <option value="klantenservice">klantenservice</option>
                        <option value="groen">groen</option>
                        <option value="attracties">attracties</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Maak task!">
                </div>
            </form>
        </div>
    </main>


    <?php require_once 'public/resources/views/components/footer.php'; ?>

</body>

</html>