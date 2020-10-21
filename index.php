<?php
require_once 'app/app_unity.php';
if (!isset($_SESSION['LOAD_SESSION']['Login'])) {
    $page = isset($_GET['Welcome']) ? $_GET['Welcome'] : '';
    switch ($page) {
        case md5('Login'):
            $page = 'view/login/index.php';
            include "$page";
            break;

            // print pdf
            // case md5('Slip_Gaji'):
            //     $page = "document/slip.php";
            //     include "$page";
            //     break;

        default:
            echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Login') . '">';
            exit;
    }
    include_once 'app/config/app_login.php';
} else {
    include_once 'view/html/index.php';
}

require_once 'app/config/app_insert.php';
include_once 'app/config/app_update.php';
