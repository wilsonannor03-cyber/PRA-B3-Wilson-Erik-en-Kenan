<?php require_once __DIR__.'/../../../config/config.php'; ?>
<?php require_once __DIR__.'/../../../config/conn.php'; ?>
 
<header class="site-header">
    <div class="page-title">
        <a href="<?php echo $base_url; ?>/index.php">
            <img src="<?php echo $base_url; ?>/img/icon.png">
        </a>
        <a href="<?php echo $base_url; ?>/index.php">
            <h1>Takenbord Developerland</h1>
        </a>
    </div>
    <div class="header-actions">
 
        <a href="<?php echo $base_url; ?>/inloggen.php">
            <button id="login-btn">Log in</button>
        </a>
        <a href="<?php echo $base_url; ?>/resources/views/tasks/create.php" class="create-link">
            + Nieuwe taak
        </a>
    </div>
</header>