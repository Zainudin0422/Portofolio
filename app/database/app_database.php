<?php
if (!session_id()) {
    session_start();
}

// zone time
date_default_timezone_set('Asia/Jakarta');

// access database
define('DB_DATA', 'management_app');
// access host
define('DB_NAME', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');

$Connection = new mysqli(DB_NAME, DB_USER, DB_PASS, DB_DATA);
if (!$Connection) {
    die(`<b style="text-align: center;">Database Not Found</b>`);
}

function query($query)
{
    global $Connection;
    return mysqli_query($Connection, $query);
}

$Email_Master = mysqli_fetch_array(query("SELECT * FROM company_email WHERE id_email = '1'"));

define('SEND_FROM_EMAIL', base64_decode($Email_Master['set_email']));
define('SEND_FROM_PASS', base64_decode($Email_Master['set_password']));
