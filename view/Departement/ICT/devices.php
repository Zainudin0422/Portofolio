<?php
Flasher::Flash();
?>
<div class="card card-outline card-success">
    <form action="" method="POST" terget="_blank">
        <div class="card-header">
            <div class="card-title text-bold text-muted">Daftar Maintenance</div>
            <div class="card-tools" style="width:907px;">
                <div class="float-left" style="margin-top: 5px;">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <input type="text" id="Search_Salary" class="form-control float-right text-bold" placeholder="Search ( Name PC or Date ) . . .">
                        <div class="input-group-append">
                            <button id="Button_Search_Salary" type="button" class="btn btn-info text-bold"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="btn-group">
                        <button name="Convert_PDF_All" type="submit" class="btn btn-warning btn-sm text-bold"><i class="fas fa-file-pdf"></i> Convert to PDF</button>
                        <button name="Download_PDF_All" type="submit" class="btn btn-success btn-sm text-bold"><i class="fas fa-download"></i> Download to PDF</button>
                        <button name="Share_PDF_All" id="Share_PDF_All" type="submit" class="btn btn-danger btn-sm text-bold"><i class="fas fa-share"></i> Share to PDF</button>
                    </div>
                    <button id="Create-Device" type="button" class="btn btn-sm btn-primary ml-2 text-bold Modal-Show" data-toggle="modal"><i class="fas fa-file"></i> New Device</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th style="width: 100px;">#</th>
                        <th style="width: 130px;">ID Device</th>
                        <th style="width: 130px;">Device Type</th>
                        <th>Device User</th>
                        <th style="width: 350px;">Device Location</th>
                        <th style="width: 200px;">Date Create</th>
                        <th style="width: 190px;">Status</th>
                        <th class="text-center" style="width: 190px;">
                            <div class="custom-control custom-checkbox float-left">
                                <input class="custom-control-input" type="checkbox" id="Checked_Salary_Master">
                                <label for="Checked_Salary_Master" class="custom-control-label"></label>
                            </div>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $Number = 1;
                    foreach (query("SELECT * FROM devices") as $ShowDevice) {
                    ?>
                        <tr class="text-bold">
                            <td class="text-center"><?= $Number; ?></td>
                            <td class="text-center"><?= $ShowDevice['device_name']; ?></td>
                            <td class="text-center"><?= $ShowDevice['device_type']; ?></td>
                            <td><?php if ($ShowDevice['device_user'] === 'Student') {
                                    echo '<i>' . $ShowDevice['device_user'] . '</i>';
                                } else {
                                    echo $ShowDevice['device_user'];
                                } ?></td>
                            <td><?= $ShowDevice['device_location']; ?></td>
                            <td class="text-center"><?= $ShowDevice['date_device']; ?></td>
                            <td <?php
                                if ($ShowDevice['status'] === 'On') {
                                    echo 'class="text-center text-teal disabled color-palette"';
                                } else if ($ShowDevice['status'] === 'Off') {
                                    echo 'class="text-center text-maroon disabled color-palette"';
                                } else if ($ShowDevice['status'] === 'On Sale') {
                                    echo 'class="text-center text-primary disabled color-palette"';
                                } else {
                                    echo 'class="text-center text-info disabled color-palette"';
                                }
                                ?>>
                                <?= $ShowDevice['status']; ?>
                            </td>
                            <td>
                                <div class="input-group">
                                    <!-- <div class="custom-control custom-checkbox">
                                        <input name="Checked_Salary[]" value="<?= $ShowDevice['device_id']; ?>" class="custom-control-input Checked_Salary" type="checkbox" id="Checked_Salary<?= $Number; ?>">
                                        <label for="Checked_Salary<?= $Number; ?>" class="custom-control-label"></label>
                                    </div> -->
                                    <a href="document/Report_Device.php?Convert_PDF&<?= md5('Device_ID') . "=" . $ShowDevice['device_id']; ?>" target="_blank" class="ml-2 text-warning"><i class="far fa-file-pdf"></i></a>
                                    <a href="?Welcome=<?= md5('Devices/Detail') . "&" . md5('Detail_Device') . "=" . $ShowDevice['device_id']; ?>" class="ml-2 text-info"><i class="far fa-eye"></i></a>
                                    <!-- <a href="document/Report_Salary.php?Download_PDF&<?= md5('Salary_ID') . "=" . $ShowDevice['device_id']; ?>" class="ml-2 text-success"><i class="fas fa-download"></i></a>
                                    <a href="document/Report_Salary.php?Share_PDF&<?= md5('Salary_ID') . "=" . $ShowDevice['device_id']; ?>" class="ml-2 text-primary"><i class="fas fa-share"></i></a>
                                    <a href="#" class="ml-2 text-info"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="ml-2 text-danger"><i class="far fa-trash-alt"></i></a> -->
                                </div>
                            </td>
                        </tr>
                    <?php
                        $Number++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</div>