<?php
if (isset($_POST['Set_Email_Send'])) {

    $Email = base64_encode($_POST['Email']);
    $Password = base64_encode($_POST['Pass_Email']);
    $Query = "UPDATE company_email SET set_email ='$Email',set_password='$Password'";
    if (query($Query)) {
        Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>', 'UPDATE DATA SUCCESS', 'success');
        echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Employees') . '">';
    } else {
        Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>, Mohon coba kembali!!!', 'UPDATE DATA FAILED', 'danger');
        echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Employees') . '">';
    }
} else if (isset($_POST['btn-img'])) {
    $Params = explode(",", $_POST['AccountParams']);

    $Image = $_FILES['Image']['name'];
    $Image_temp = $_FILES['Image']['tmp_name'];

    $Location = 'public/dist/img/' . $Image;

    $Query = "UPDATE profiles SET image='$Image' WHERE id_account='$Params[0]'";

    if (query($Query)) {
        if (move_uploaded_file($Image_temp, $Location)) {
            Flasher::SetFlash('Terimakasih, sudah mengupdate data!!!', 'Input Data Berhasil', 'success');
            echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Account/Detail') . "&" . md5('ID_Account') . "=" . base64_encode($Params[0]) . '">';
        } else {
            Flasher::SetFlash('Image tidak bisa di upload', 'Input Data Gagal', 'danger');
            echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Account/Detail') . "&" . md5('ID_Account') . "=" . base64_encode($Params[0]) . '">';
        }
    } else {
        Flasher::SetFlash('Maaf data di tolak server', 'Input Data Gagal', 'danger');
        echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Account/Detail') . "&" . md5('ID_Account') . "=" . base64_encode($Params[0]) . '">';
    }
}
