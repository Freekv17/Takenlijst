<?php require_once("../config/conn.php") ?>
<?php require_once("../config/config.php") ?>
<?php
session_start()
    ?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'public/resources/views/components/head.php'; ?>

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
        <a href="<?php echo $base_url ?>/tasks/create.php">Maak nieuwe taak</a>
        <a href="<?php echo $base_url ?>/tasks/done.php">Taken die klaar zijn</a>

    </main>


    <?php require_once 'public/resources/views/components/footer.php'; ?>
</body>



</html>