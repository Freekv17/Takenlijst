<?php
require_once '../Takenlijst/config/config.php';
session_start();
session_destroy();
header("Location: $base_url/index.php");
exit;
