<?php
session_start();
require_once "app/App.php";
require_once "app/controllers/BaseController.php";
require_once "app/configs/database.php";
require_once "app/midleware/AuthMidleware.php";
$midleware = new AuthMidleware(["contact/index"]);
$app = new App($conn, $midleware);
