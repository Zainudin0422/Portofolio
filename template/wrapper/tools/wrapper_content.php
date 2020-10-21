<?php
$page = isset($_GET['Welcome']) ? $_GET['Welcome'] : '';
switch ($page) {
    case md5('Dashboard'):
        $page = "view/Dashboard/index.php";
        include "$page";
        break;

        // My Profile Per Account
    case md5('Profile'):
        $page = "view/Dashboard/profile.php";
        include "$page";
        break;

    case md5('Accounts'):
        $page = "view/Departement/ICT/index.php";
        include "$page";
        break;

    case md5('Account/Detail'):
        $page = "view/Departement/ICT/detail_account.php";
        include "$page";
        break;

    case md5('Devices'):
        $page = "view/Departement/ICT/devices.php";
        include "$page";
        break;

    case md5('Devices/Detail'):
        $page = "view/Departement/ICT/detail_devices.php";
        include "$page";
        break;

    case md5('Maintenances'):
        $page = "view/Departement/ICT/maintenances.php";
        include "$page";
        break;

    case md5('Employees'):
        $page = "view/Departement/HRD/index.php";
        include "$page";
        break;

    case md5('Logout'):
        $page = "app/config/app_logout.php";
        include "$page";
        break;

    default:
        echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Dashboard') . '">';
        break;
}

// include_once 'view/modals/modal_create.php';
include_once 'view/modals/modal_default.php';
