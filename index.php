<?php require_once("config/conn.php") ?>
<?php require_once("config/config.php") ?>


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
            <img src="<?php echo $base_url; ?>/img/logo-big-fill-only.png" alt="logoFill" id="logoFill">
        </div>
    </main>
    <?php require_once('footer.php'); ?>

</body>



</html>