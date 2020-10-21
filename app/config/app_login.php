<?php
if (isset($_POST['Login'])) {
    $Username = $_POST['Username'];
    $Password = md5($_POST['Password']);
    $SELECT_QUERY = "SELECT * FROM accounts JOIN profiles ON accounts.id_account = profiles.id_account WHERE accounts.username='$Username' && accounts.password='$Password'";
    $UPADTE_QUERY = "UPDATE accounts SET status='Online' WHERE username='$Username' && password='$Password'";


    $SELECT_ACCOUNT = mysqli_num_rows(query($SELECT_QUERY));
    if ($SELECT_ACCOUNT > 0) {
        $CREATE_SESSION = mysqli_fetch_array(query($SELECT_QUERY));
        $ARRAY_SESSION = array(
            'ID_Profile' => $CREATE_SESSION['id_profile'],
            'FullName' => $CREATE_SESSION['full_name'],
            'Username' => $CREATE_SESSION['username'],
            'Level' => $CREATE_SESSION['level'],
            'Image' => $CREATE_SESSION['image'],
            'Status' => 'Online',
            'Login' => true
        );
        $_SESSION['LOAD_SESSION'] = $ARRAY_SESSION;

        if (isset($_SESSION['LOAD_SESSION']['Login'])) {
            $UPDATE_ACCOUNT = query($UPADTE_QUERY);
            echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Dashboard') . '">';
        }
    } else {
        echo "Salah Login";
        echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Login') . '">';
    }
}
