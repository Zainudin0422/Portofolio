<?php
$GET_SESSION_ACCOUNT = $_SESSION['LOAD_SESSION']['Username'];
$LOGOUT_ACCOUNT = query("UPDATE accounts SET status = 'Offline' WHERE username='$GET_SESSION_ACCOUNT'");
if ($LOGOUT_ACCOUNT) {
    session_unset();
    $_SESSION = [];
    session_destroy();
    echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Login') . '">';
}
