<header>
    <div class="wrapper">
        <a href="index.php">
            <h1><span>DEVELOPER</span>LAND</h1>
        </a>
        <nav>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="<?php echo $base_url ?>/logout.php">UITLOGGEN</a>
                <a href="<?php echo $base_url; ?>/tasks/index.php">TAKENLIJST</a>
            <?php else: ?>
                <a href="<?php echo $base_url; ?>/login.php">INLOGGEN</a>
            <?php endif; ?>
        </nav>
    </div>
</header>