<?php

if (isset($_GET['Welcome']) && $_GET['Welcome'] === md5('Accounts')) {
?>
    <div class="modal fade" id="Modal-Account">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Account</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Full_Name">Nama Lengkap</label>
                            <input name="FullName" id="Full_Name" type="text" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <input name="Username" id="Username" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input name="Password" id="Password" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- radio -->
                                <div class="form-group">
                                    <label for="Level3">Login Level</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="Level1" name="Level" value="superadmin">
                                        <label for="Level1" class="custom-control-label">Super Admin</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="Level2" name="Level" value="admin">
                                        <label for="Level2" class="custom-control-label">Admin</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="Level3" name="Level" value="user" checked="">
                                        <label for="Level3" class="custom-control-label">User</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <label>Allow Access</label>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="Access1" name="Access[]" value="ICT">
                                        <label for="Access1" class="custom-control-label">ICT</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="Access2" name="Access[]" value="HRD">
                                        <label for="Access2" class="custom-control-label">HRD</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="Access3" name="Access[]" value="MKT">
                                        <label for="Access3" class="custom-control-label">MKT</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button name="Create-Account" type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php
} else if (isset($_GET['Welcome']) && $_GET['Welcome'] === md5('Devices')) {
?>

    <div class="modal fade" id='modal-device'>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-bold">Add Device</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group text-center">
                                    <input name="Device_Name" type="text" class="form-control text-bold text-center" value="<?= SerialGenerate(); ?>" placeholder="Code ... " readonly="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group text-center">
                                    <select name="Device_Type" class="form-control text-bold">
                                        <option selected disabled value="0" class="text-bold bg-danger">Device Type</option>
                                        <option value="Pc" class="text-bold">Pc</option>
                                        <option value="Laptop" class="text-bold">Laptop</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <select name="Device_Status" class="form-control text-bold  text-center">
                                    <option selected disabled value="" class="text-bold bg-danger">Device Status</option>
                                    <option value="On" class="text-bold">On</option>
                                    <option value="Off" class="text-bold">Off</option>
                                    <option value="On Sale" class="text-bold">On Sale</option>
                                    <option value="Combined Components" class="text-bold">Combined Components</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" id="Choose_User">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">User</label>
                                    <select name="Choose_User_Device" id="Choose_User_Device" class="form-control text-bold  text-center">
                                        <option selected disabled value="" class="text-bold bg-danger">Device User</option>
                                        <option value="Student" class="text-bold">Student</option>
                                        <option value="Management" class="text-bold">Management</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="Choose_Device_User"></div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button name="Create-Device" type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
} else if (isset($_GET['Welcome']) && $_GET['Welcome'] === md5('Devices/Detail')) {
?>



    <div class="modal fade" id='modal-hardware'>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-bold">Add Hardware</h4>
                    <button id="Add-From-Hardware" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button>
                </div>
                <form action="" method="POST">
                    <input name="Device_ID" type="text" value="<?= $Device_ID; ?>" hidden>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Hardware Name</label>
                                    <input name="Hardware_Name[]" type="text" class="form-control form-control-sm text-bold">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Hardware Brand</label>
                                    <input name="Hardware_Brand[]" type="text" class="form-control form-control-sm text-bold">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Hardware Specification</label>
                                    <input name="Hardware_Specification[]" type="text" class="form-control form-control-sm text-bold">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="New-From-Hardware">
                            <!-- <div></div> -->
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button name="Create-Hardware" type="submit" class="btn btn-primary">Create Hardware</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
} else if (isset($_GET['Welcome']) && $_GET['Welcome'] === md5('Maintenances')) {
?>

    <div class="modal fade" id='modal-maintenence'>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-bold">Add Maintenance</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <select name="Device_ID" class="form-control text-bold">
                                    <option value="0" class="text-bold" selected disabled>Choose Device ID</option>
                                    <?php
                                    foreach (query("SELECT * FROM devices ORDER BY device_name ASC") as $ShowDeviceID) {
                                    ?>
                                        <option value="<?= $ShowDeviceID['device_id']; ?>" class="text-bold"><?= $ShowDeviceID['device_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-9">
                                <select name="Activity" class="form-control text-bold">
                                    <option value="0" class="text-bold" selected disabled>Choose Maintenence Activity</option>
                                    <option value="Pemeliharaan Hardware Komputer LAB" class="text-bold">Pemeliharaan Hardware Komputer LAB</option>
                                    <option value="Pemeliharaan Software Aplikasi pada Komputer LAB" class="text-bold">Pemeliharaan Software Aplikasi pada Komputer LAB</option>
                                    <option value="Pemeliharaan Hardware Komputer Karyawan" class="text-bold">Pemeliharaan Hardware Komputer Karyawan</option>
                                    <option value="Pemeliharaan Software Aplikasi pada Komputer Karyawan" class="text-bold">Pemeliharaan Software Aplikasi pada Komputer Karyawan</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea name="Action_Activity" cols="30" rows="10" class="form-control" placeholder="Maintenence Action . . ."></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input name="Replacement_Parts" type="text" class="form-control" placeholder="Replacement Sparepart . . .">
                            </div>
                            <div class="col-sm-6">
                                <input name="Cost" type="number" class="form-control text-bold" value="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <input name="Image_Maintenance" type="file" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button name="Create-Maintenance" type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
} else if (isset($_GET['Welcome']) && $_GET['Welcome'] === md5('Employees')) {
?>

    <div class="modal fade" id='modal_set_email'>
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-bold">Info Email</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body text-center">
                        <?php
                        $Email_Master = mysqli_fetch_array(query("SELECT * FROM company_email WHERE id_email = '1'"));
                        ?>
                        <div id="Show_set_email">
                            <small class="text-bold text-muted">Email yang digunakan</small>
                            <label class="text-bold mt-2 mb-3 text-success text-break" style="width: 265px;"><?= base64_decode($Email_Master['set_email']); ?></label>
                            <button type="button" id="Update_set_email" class="btn btn-primary">Update Now</button>
                        </div>
                        <div id="Form_set_email" hidden>
                            <div class="form-group">
                                <input name="Email" type="email" class="form-control text-bold" placeholder="Set Email ...">
                            </div>
                            <div class="form-group">
                                <input name="Pass_Email" type="password" class="form-control text-bold" placeholder="Set Pass Code ...">
                            </div>
                            <div class="form-group justify-content-between">
                                <button name="Set_Email_Send" type="submit" class="btn btn-success">Save Change</button>
                                <button id="Cencal_Set_Email" type="button" class="btn btn-danger">Cencal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="Modal-Salary">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Account</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Employee">Select Employee</label>
                            <select name="Employee" id="Employee" class="form-control">
                                <option selected disabled class="text-bold text-muted bg-info">None Employee</option>
                                <?php
                                foreach (query("SELECT * FROM profiles") as $Employee) {
                                ?>
                                    <option value="<?= $Employee['id_profile']; ?>" <?php
                                                                                    if ($Employee['full_name'] == "Anonymouse") {
                                                                                        echo 'disabled hidden class="bg-danger disabled color-palette"';
                                                                                    }
                                                                                    ?>><?= $Employee['full_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <table class="table table-striped" id="Table_Slip_Gaji">
                            <tbody id="Gaji_Kotor">
                                <tr>
                                    <td class="text-bold text-muted">Gaji Pokok :</td>
                                    <td><input name="Gaji_Pokok" id="Gaji_Pokok" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Tunjangan Jabatan :</td>
                                    <td><input name="Tunjangan_Jabatan" id="Tunjangan_Jabatan" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Tunjangan Transport (@15.000) :</td>
                                    <td><input name="Tunjangan_Transport" id="Tunjangan_Transport" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Tunjangan Fungsional :</td>
                                    <td><input name="Tunjangan_Fungsional" id="Tunjangan_Fungsional" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Potongan Transport (Izin, Sakit, Perdin) :</td>
                                    <td><input name="Potongan_Transport" id="Potongan_Transport" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>

                            </tbody>
                            <tbody class="bg-danger disabled color-palette">
                                <tr>
                                    <td>
                                        <span class="description text-bold">Total Gaji Kotor</span>
                                    </td>
                                    <td>
                                        <input name="Total_Gaji_Kotor" id="Total_Gaji_Kotor" type="number" class="form-control form-control-sm" value="0">
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td class="text-bold text-muted">Biaya Jabatan :</td>
                                    <td><input name="Biaya_Jabatan" id="Biaya_Jabatan" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Income Per Bulan :</td>
                                    <td><input name="Income_Bulan" id="Income_Bulan" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Income Per Tahun :</td>
                                    <td><input name="Income_Tahun" id="Income_Tahun" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">PTKP :</td>
                                    <td><input name="PTKP" id="PTKP" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">PKP :</td>
                                    <td><input name="PKP" id="PKP" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">PPH 21 Per Bulan :</td>
                                    <td><input name="PPH21_Bulan" id="PPH21_Bulan" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">PPH 21 Per Tahun 5% :</td>
                                    <td><input name="PPH21_Tahun" id="PPH21_Tahun" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                            </tbody>
                            <tbody class="bg-warning disabled color-palette">
                                <tr rowspan="2">
                                    <td>
                                        <span class="description text-bold">Income Setelah Pajak</span>
                                    </td>
                                    <td>
                                        <input name="Income_Setelah_Pajak" id="Income_Setelah_Pajak" type="number" class="form-control form-control-sm" value="0">
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td class="text-bold text-muted">BPJS Kesehatan (0,5%) :</td>
                                    <td><input name="BPJS_Kesehatan" id="BPJS_Kesehatan" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">BPJS Ketenagakerjaan (2%) :</td>
                                    <td><input name="BPJS_Ketenagakerjaan" id="BPJS_Ketenagakerjaan" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                            </tbody>
                            <tbody class="bg-primary disabled color-palette">
                                <tr>
                                    <td>
                                        <span class="description text-bold">Take Home Pay</span>
                                    </td>
                                    <td>
                                        <input name="Take_Home_Pay" id="Take_Home_Pay" type="number" class="form-control form-control-sm" value="0">
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td class="text-bold text-muted">Pembayaran Pinjaman :</td>
                                    <td><input name="Pembayaran_Pinjaman" id="Pembayaran_Pinjaman" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Absen Tanpa Keterangan :</td>
                                    <td><input name="Absen_Tanpa_Keterangan" id="Absen_Tanpa_Keterangan" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Absen Keterlambatan :</td>
                                    <td><input name="Absen_Keterlambatan" id="Absen_Keterlambatan" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Potongan Sanksi :</td>
                                    <td><input name="Potongan_Sanksi" id="Potongan_Sanksi" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">ZIS (2,5%) :</td>
                                    <td><input name="ZIS" id="ZIS" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                            </tbody>
                            <tbody class="bg-success disabled color-palette">
                                <tr>
                                    <td>
                                        <span class="description text-bold">Total Potongan</span>
                                    </td>
                                    <td>
                                        <input name="Total_Potongan" id="Total_Potongan" type="number" class="form-control form-control-sm" value="0">
                                    </td>
                                </tr>
                            </tbody>

                            <tbody class="bg-success disabled color-palette">
                                <tr>
                                    <td>
                                        <span class="description text-bold">Net Salary 2017</span>
                                    </td>
                                    <td>
                                        <input name="Net_Salary" id="Net_Salary" type="number" class="form-control form-control-sm" value="0">
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td class="text-bold text-muted">Uang Makan (@25000):</td>
                                    <td><input name="Uang_Makan" id="Uang_Makan" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Potongan Makan (Izin, Sakit, Perdin) :</td>
                                    <td><input name="Potongan_Uang_Makan" id="Potongan_Uang_Makan" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Tunjangan Lembur :</td>
                                    <td><input name="Tunjangan_Lembur" id="Tunjangan_Lembur" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Tunjangan Bensin :</td>
                                    <td><input name="Tunjangan_Bensin" id="Tunjangan_Bensin" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                            </tbody>

                            <tbody class="bg-orange disabled color-palette">
                                <tr rowspan="2">
                                    <td>
                                        <span class="description text-bold">Gaji yang di terima</span>
                                    </td>
                                    <td>
                                        <input name="Gaji_Diterima" id="Gaji_Diterima" type="number" class="form-control form-control-sm" value="0">
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td class="text-bold text-muted">Izin:</td>
                                    <td><input name="Izin" id="Izin" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Sakit :</td>
                                    <td><input name="Sakit" id="Sakit" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Perdin :</td>
                                    <td><input name="Perdin" id="Perdin" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Cuti :</td>
                                    <td><input name="Cuti" id="Cuti" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-muted">Alpa :</td>
                                    <td><input name="Alpa" id="Alpa" type="number" class="form-control form-control-sm" value="0"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button name="Create-Salary" type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
}
?>