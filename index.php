<?php require_once("config/conn.php") ?>
<?php require_once("config/config.php") ?>

<?php
session_start()
    ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'public/resources/views/components/head.php'; ?>

<body>
    <?php require_once 'public/resources/views/components/header.php'; ?>

    <main>
        <div class="wrapper index">
            <img src="<?php echo $base_url; ?>/public/img/logo-big-v2.png" alt="logoV2" id="logoV2">
            <div class="landingPageInfo">
                <h2>Welkom bij DeveloperLand Takenlijst, de tool om taken in het attractiepark efficiënt te
                    beheren. Plan, organiseer en volg de voortgang met een heldere indeling. Zo
                    houd je moeiteloos overzicht en werk je samen aan succes!</h2>
            </div>

        </div>

    </main>
    <?php require_once 'public/resources/views/components/footer.php'; ?>

</body>



</html>