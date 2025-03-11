<?php require_once("config/conn.php") ?>
<?php require_once("config/config.php") ?>

<?php
session_start()
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takenlijst DeveloperLand</title>
    <link rel="stylesheet" href="public/style.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>

    <?php require_once('header.php'); ?>
    <main>
        <div class="wrapper">
            <div class="landingPageInfo">
                <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ullamcorper justo at dui dignissim,
                    sit amet auctor eros tempor. Pellentesque risus diam, lacinia et feugiat at, rhoncus eget sem.
                    Pellentesque tincidunt leo vitae pulvinar luctus. Donec pharetra ligula quis quam fermentum auctor.
                    Cras ac dui eu lorem pretium porta sed in lorem. Fusce quis posuere felis. Aliquam ac neque posuere,
                    dapibus metus eget, aliquet elit. Vestibulum iaculis egestas nibh, nec pellentesque nunc tincidunt
                    ut.</h3>
            </div>
            <img src="<?php echo $base_url; ?>/img/logo-big-fill-only.png" alt="logoFill" id="logoFill">
        </div>

    </main>
    <?php require_once('footer.php'); ?>

</body>



</html>