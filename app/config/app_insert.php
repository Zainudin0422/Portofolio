<?php

if (isset($_POST['Create-Account'])) {
    $FullName = $_POST['FullName'];
    $Username = $_POST['Username'];
    $Password = md5($_POST['Password']);

    $Level = $_POST['Level'];
    $Access = implode(",", $_POST['Access']);

    $SELECT_QUERY = "SELECT * FROM accounts WHERE username='$Username'";
    $INSERT_QUERY_A = "INSERT INTO accounts (username,password,status,level) VALUES('$Username','$Password','Offline','$Level')";


    $Num_Rows = mysqli_num_rows(query($SELECT_QUERY));

    if ($Num_Rows > 0) {
        Flasher::SetFlash('Username tidak bisa di gunakan', 'Input Data Gagal', 'danger');
        echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Accounts') . '">';
    } else {
        if (query($INSERT_QUERY_A)) {
            $SELECT_ACCOUNT_id = mysqli_fetch_array(query($SELECT_QUERY));
            $INSERT_QUERY_P = query("INSERT INTO profiles (id_account,full_name) VALUES('$SELECT_ACCOUNT_id[id_account]','$FullName')");
            if ($INSERT_QUERY_P) {
                Flasher::SetFlash('Username bisa di gunakan untuk login', 'Input Data Berhasil', 'success');
                echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Accounts') . '">';
            } else {
                Flasher::SetFlash('Batabase menolak', 'Input Data Gagal', 'danger');
                echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Accounts') . '">';
            }
        }
    }
} else if (isset($_POST['Create-Device'])) {
    echo 'OK';
    // $Device_Name = $_POST['Device_Name'];
    // $Device_Type = $_POST['Device_Type'];

    // $Device_User = $_POST['Device_User'];
    // $Device_User_Location = $_POST['Device_User_Location'];

    // $Date_Now = DateCalender(date('Y-M-d'));

    // $Device_Status = $_POST['Device_Status'];

    // if ($_POST['Choose_User_Device'] === 'Student') {
    //     if (query("INSERT INTO devices (device_name,device_type,device_user,device_location,date_device,status) VALUES ('$Device_Name','$Device_Type','$Device_User','Ruang $Device_User_Location','$Date_Now','$Device_Status')")) {
    //         Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>', 'INSERT DATA SUCCESS', 'success');
    //         echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Devices') . '">';
    //     } else {
    //         Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>, Mohon coba kembali!!!', 'INSERT DATA FAILED', 'danger');
    //         echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Devices') . '">';
    //     }
    // } else if ($_POST['Choose_User_Device'] === 'Management') {
    //     if (query("INSERT INTO devices (device_name,device_type,device_user,device_location,date_device,status) VALUES ('$Device_Name','$Device_Type','$Device_User','Ruang $Device_User_Location','$Date_Now','$Device_Status')")) {
    // Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>', 'INSERT DATA SUCCESS', 'success');
    //         echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Devices') . '">';
    //     } else {
    //         Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>, Mohon coba kembali!!!', 'INSERT DATA FAILED', 'danger');
    //         echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Devices') . '">';
    //     }
    // }
} else if (isset($_POST['Create-Hardware'])) {
    $Device_ID = $_POST['Device_ID'];
    for ($x = 0; $x < count($_POST['Hardware_Name']); $x++) {
        $Hardware_Name = $_POST['Hardware_Name'][$x];
        $Hardware_Brand = $_POST['Hardware_Brand'][$x];
        $Hardware_Specification = $_POST['Hardware_Specification'][$x];
        $Query = "INSERT INTO hardwares (device_id,	hardware_name,hardware_brand,hardware_specification) VALUES('$Device_ID','$Hardware_Name','$Hardware_Brand','$Hardware_Specification')";
        if (query($Query)) {
            Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>', 'INSERT DATA SUCCESS', 'success');
            echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Devices') . '">';
        } else {
            Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>, Mohon coba kembali!!!', 'INSERT DATA FAILED', 'danger');
            echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Devices') . '">';
        }
    }
} else if (isset($_POST['Create-Maintenance'])) {

    function ResizeImage($ResultType, $Width, $Height)
    {
        $ResizeWidth = 200;
        $ResizeHeight = 200;
        $ImageLayer = imagecreatetruecolor($ResizeWidth, $ResizeHeight);
        imagecopyresampled($ImageLayer, $ResultType, 0, 0, 0, 0, $ResizeWidth, $ResizeHeight, $Width, $Height);
        return $ImageLayer;
    }

    $ImageProses = 0;
    if (is_array($_FILES)) {
        $Tmp_name = $_FILES['Image_Maintenance']['tmp_name'];
        $File_Ext = pathinfo($_FILES['Image_Maintenance']['name'], PATHINFO_EXTENSION);

        $SourceProperties = getimagesize($Tmp_name);
        $SourceNewName  = time();
        $LocationFile = 'public/dist/img/';

        $UploadWidth    = $SourceProperties[0];
        $UploadHeight   = $SourceProperties[1];
        $UploadType     = $SourceProperties[2];

        switch ($UploadType) {
            case IMAGETYPE_JPEG:
                $ResultType = imagecreatefromjpeg($Tmp_name);
                $ImageLayer = ResizeImage($ResultType, $UploadWidth, $UploadHeight);
                imagejpeg($ImageLayer, $LocationFile . "Maintenance_" . $SourceNewName . "." . $File_Ext);
                break;

            case IMAGETYPE_GIF:
                $ResultType = imagecreatefromgif($Tmp_name);
                $ImageLayer = ResizeImage($ResultType, $UploadWidth, $UploadHeight);
                imagegif($ImageLayer, $LocationFile . "Maintenance_" . $SourceNewName . "." . $File_Ext);
                break;

            case IMAGETYPE_PNG:
                $ResultType = imagecreatefrompng($Tmp_name);
                $ImageLayer = ResizeImage($ResultType, $UploadWidth, $UploadHeight);
                imagepng($ImageLayer, $LocationFile . "Maintenance_" . $SourceNewName . "." . $File_Ext);
                break;

            default:
                $ImageProses = 0;
                break;
        }
        move_uploaded_file($file, $LocationFile . "Maintenance_" . $SourceNewName . "." . $File_Ext);
        $ImageProses = 1;
    }

    if ($ImageProses == 1) {
        $Device_ID = $_POST['Device_ID'];
        $Activity = $_POST['Activity'];
        $Action_Activity = $_POST['Action_Activity'];
        $Replacement_Parts = $_POST['Replacement_Parts'];
        $Cost = $_POST['Cost'];

        $DateNow = DateCalender(date('Y-M-d'));

        if ($Device_ID === 0) {
            Flasher::SetFlash('Check all form input', 'INSERT DATA FAILED', 'danger');
            echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Maintenances') . '">';
        } else {
            if (query("INSERT INTO maintenances SET device_id='$Device_ID', activity='$Activity', action_activity='$Action_Activity', replacement_parts='$Replacement_Parts', cost='$Cost', date_maintenance='$DateNow',image='Maintenance_$SourceNewName.$File_Ext'")) {
                Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>', 'INSERT DATA SUCCESS', 'success');
                echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Maintenances') . '">';
            } else {
                Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>, Mohon coba kembali!!!', 'INSERT DATA FAILED', 'danger');
                echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Maintenances') . '">';
            }
        }
    } else {
        Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>, Mohon coba kembali!!!', 'INSERT DATA FAILED', 'danger');
        echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Maintenances') . '">';
    }
} else if (isset($_POST['Create-Salary'])) {
    $Id_Employee = $_POST['Employee'];
    $Gaji_Pokok = $_POST['Gaji_Pokok'];
    $Tunjangan_Jabatan = $_POST['Tunjangan_Jabatan'];
    $Tunjangan_Transport = $_POST['Tunjangan_Transport'];
    $Tunjangan_Fungsional = $_POST['Tunjangan_Fungsional'];
    $Potongan_Transport = $_POST['Potongan_Transport'];

    $Total_Gaji_Kotor = $_POST['Total_Gaji_Kotor'];

    $Biaya_Jabatan = $_POST['Biaya_Jabatan'];
    $Income_Bulan = $_POST['Income_Bulan'];
    $Income_Tahun = $_POST['Income_Tahun'];
    $PTKP = $_POST['PTKP'];
    $PKP = $_POST['PKP'];
    $PPH21_Bulan = $_POST['PPH21_Bulan'];
    $PPH21_Tahun = $_POST['PPH21_Tahun'];

    $Income_Setelah_Pajak = $_POST['Income_Setelah_Pajak'];

    $BPJS_Kesehatan = $_POST['BPJS_Kesehatan'];
    $BPJS_Ketenagakerjaan = $_POST['BPJS_Ketenagakerjaan'];

    $Take_Home_Pay = $_POST['Take_Home_Pay'];

    $Pembayaran_Pinjaman = $_POST['Pembayaran_Pinjaman'];
    $Absen_Tanpa_Keterangan = $_POST['Absen_Tanpa_Keterangan'];
    $Absen_Keterlambatan = $_POST['Absen_Keterlambatan'];
    $Potongan_Sanksi = $_POST['Potongan_Sanksi'];
    $ZIS = $_POST['ZIS'];

    $Total_Potongan = $_POST['Total_Potongan'];

    $Net_Salary = $_POST['Net_Salary'];

    $Uang_Makan = $_POST['Uang_Makan'];
    $Potongan_Uang_Makan = $_POST['Potongan_Uang_Makan'];
    $Tunjangan_Lembur = $_POST['Tunjangan_Lembur'];
    $Tunjangan_Bensin = $_POST['Tunjangan_Bensin'];

    $Gaji_Diterima = $_POST['Gaji_Diterima'];

    $Izin = $_POST['Izin'];
    $Sakit = $_POST['Sakit'];
    $Perdin = $_POST['Perdin'];
    $Cuti = $_POST['Cuti'];
    $Alpa = $_POST['Alpa'];

    $Date_Now = DateCalender(date('Y-m-d'));


    $Query_Employee_Salery = "INSERT INTO salarys SET 
        id_profile='$Id_Employee',
        create_time='$Date_Now',
        gaji_pokok='$Gaji_Pokok',
        tunjangan_jabatan='$Tunjangan_Jabatan',
        tunjangan_transport='$Tunjangan_Transport',
        tunjangan_fungsional='$Tunjangan_Fungsional',
        potongan_transport='$Potongan_Transport',
        total_gaji_kotor='$Total_Gaji_Kotor',
        
        biaya_jabatan='$Biaya_Jabatan',
        income_per_bulan='$Income_Bulan',
        income_per_tahun='$Income_Tahun',
        ptkp='$PTKP',
        pkp='$PKP',
        pph_21_per_bulan='$PPH21_Bulan',
        pph_21_per_tahun='$PPH21_Tahun',

        income_setelah_pajak='$Income_Setelah_Pajak',

        bpjs_kesehatan='$BPJS_Kesehatan',
        bpjs_ketenagakerjaan='$BPJS_Ketenagakerjaan',
        take_home_pay='$Take_Home_Pay',
        pembayaran_pinjaman='$Pembayaran_Pinjaman',
        potongan_absen_tanpa_keterangan='$Absen_Tanpa_Keterangan',
        potongan_absen_keterlambatan='$Absen_Keterlambatan',
        potongan_sanksi='$Potongan_Sanksi',
        zis='$ZIS',
        total_potongan='$Total_Potongan',

        net_salary='$Net_Salary',
        
        uang_makan='$Uang_Makan',
        potongan_uang_makan='$Potongan_Uang_Makan',
        tunjangan_lembur='$Tunjangan_Lembur',
        tunjangan_bensin='$Tunjangan_Bensin',
        gaji_diterima='$Gaji_Diterima',

        izin='$Izin',
        sakit='$Sakit',
        perdin='$Perdin',
        cuti='$Cuti',
        alpa='$Alpa'";

    if ($Id_Employee == 0) {
        Flasher::SetFlash('Check all form input', 'INSERT DATA FAILED', 'danger');
        echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Employees') . '">';
    } else {
        if (query($Query_Employee_Salery)) {
            Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>', 'INSERT DATA SUCCESS', 'success');
            echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Employees') . '">';
        } else {
            Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>, Mohon coba kembali!!!', 'INSERT DATA FAILED', 'danger');
            echo '<meta http-equiv="refresh" content="0; url=?Welcome=' . md5('Employees') . '">';
        }
    }
}
