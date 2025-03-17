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
        <div class="wrapper">
            <div class="landingPageInfo">
                <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ullamcorper justo at dui dignissim,
                    sit amet auctor eros tempor. Pellentesque risus diam, lacinia et feugiat at, rhoncus eget sem.
                    Pellentesque tincidunt leo vitae pulvinar luctus. Donec pharetra ligula quis quam fermentum auctor.
                    Cras ac dui eu lorem pretium porta sed in lorem. Fusce quis posuere felis. Aliquam ac neque posuere,
                    dapibus metus eget, aliquet elit. Vestibulum iaculis egestas nibh, nec pellentesque nunc tincidunt
                    ut.</h2>
            </div>
            <a href="#">
                <img src="<?php echo $base_url; ?>/public/img/logo-big-v2.png" alt="logoV2" id="logoV2">
            </a>
        </div>

    </main>
    <?php require_once 'public/resources/views/components/footer.php'; ?>

</body>



</html>