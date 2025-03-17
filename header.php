<header>
    <div class="wrapper">
        <a href="<?php echo $base_url; ?>/index.php">
            <h1><span>Developer</span>Land</h1>
        </a>
        <nav>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="<?php echo $base_url ?>/logout.php">Uitloggen</a>
                <a href="<?php echo $base_url; ?>/tasks/create.php">Takenlijst</a>
            <?php else: ?>
                <a href="<?php echo $base_url; ?>/login.php">Inloggen</a>
            <?php endif; ?>
        </nav>
    </div>
</header>