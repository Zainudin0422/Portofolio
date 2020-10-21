<?php
$Device_ID = $_GET[$Device = md5('Detail_Device')];
?>
<div class="card card-outline card-success">
    <div class="card-header">
        <div class="card-title text-bold text-muted">Detail Device</div>
        <div class="card-tools" style="width:907px;">
            <div class="float-left" style="margin-top: 5px;">
                <!-- sajdjhhjasd     -->
            </div>
            <div class="text-right">
                <div class="btn-group">
                    <button name="Convert_PDF_All" type="submit" class="btn btn-warning btn-sm text-bold"><i class="fas fa-file-pdf"></i> Convert to PDF</button>
                    <button name="Download_PDF_All" type="submit" class="btn btn-success btn-sm text-bold"><i class="fas fa-download"></i> Download to PDF</button>
                    <button name="Share_PDF_All" id="Share_PDF_All" type="submit" class="btn btn-danger btn-sm text-bold"><i class="fas fa-share"></i> Share to PDF</button>
                </div>
                <button type="button" class="btn btn-sm btn-primary ml-2 text-bold" data-toggle="modal" data-target="#modal-device"><i class="fas fa-file"></i> New Device</button>
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

                </tr>
            </thead>
            <tbody>
                <?php

                $Number = 1;
                foreach (query("SELECT * FROM devices WHERE device_id='$Device_ID'") as $ShowDetailDevice) {
                ?>
                    <tr class="text-bold">
                        <td class="text-center"><?= $Number; ?></td>
                        <td class="text-center"><?= $ShowDetailDevice['device_name']; ?></td>
                        <td class="text-center"><?= $ShowDetailDevice['device_type']; ?></td>
                        <td><?php if ($ShowDetailDevice['device_user'] === 'Student') {
                                echo '<i>' . $ShowDetailDevice['device_user'] . '</i>';
                            } else {
                                echo $ShowDetailDevice['device_user'];
                            } ?></td>
                        <td><?= $ShowDetailDevice['device_location']; ?></td>
                        <td class="text-center"><?= $ShowDetailDevice['date_device']; ?></td>
                        <td <?php
                            if ($ShowDetailDevice['status'] === 'On') {
                                echo 'class="text-center text-teal disabled color-palette"';
                            } else if ($ShowDetailDevice['status'] === 'Off') {
                                echo 'class="text-center text-maroon disabled color-palette"';
                            } else if ($ShowDetailDevice['status'] === 'On Sale') {
                                echo 'class="text-center text-primary disabled color-palette"';
                            } else {
                                echo 'class="text-center text-info disabled color-palette"';
                            }
                            ?>>
                            <?= $ShowDetailDevice['status']; ?>
                        </td>
                    </tr>
                <?php
                    $Number++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-bold text-muted">Detail Hardware</div>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm btn-primary ml-2 text-bold" data-toggle="modal" data-target="#modal-hardware"><i class="fas fa-file"></i> New Hardware</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr class="text-center" style="font-size: 12px;">
                            <th>Hardware Name</th>
                            <th>Hardware Merk</th>
                            <th>Hardware Specification</th>
                            <th style="width: 70px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (query("SELECT * FROM hardwares WHERE device_id='$Device_ID'") as $ShowDetailHardware) {
                        ?>
                            <tr style="font-size: 12px;">
                                <td><?= $ShowDetailHardware['hardware_name'] ?></td>
                                <td><?= $ShowDetailHardware['hardware_brand'] ?></td>
                                <td><?= $ShowDetailHardware['hardware_specification'] ?></td>
                                <td class="text-center">
                                    <div class="input-group">
                                        <a href="#" class="ml-2 text-info"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="ml-2 text-danger"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-bold text-muted">Detail Maintenance</div>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm btn-primary ml-2 text-bold" data-toggle="modal" data-target="#modal-hardware"><i class="fas fa-file"></i> New Hardware</button>
                </div>
            </div>
            <div class="card-body p-0 table-responsive">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 290px;">Maintenence Activity</th>
                            <th>Maintenence Action</th>
                            <th style="width: 200px;">Replacement Sparepart</th>
                            <th style="width: 120px;">Cost</th>
                            <th style="width: 170px;">Date Create</th>
                            <th class="text-center" style="width: 130px;">
                                <div class="custom-control custom-checkbox float-left">
                                    <input class="custom-control-input" type="checkbox" id="Checked_Maintenance_Master">
                                    <label for="Checked_Maintenance_Master" class="custom-control-label"></label>
                                </div>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Number = 1;
                        $DateSalaryNow = Month(date('M'));
                        foreach (query("SELECT * FROM maintenances JOIN devices ON maintenances.device_id=devices.device_id WHERE maintenances.device_id='$Device_ID'") as $ShowMaintenance) {
                        ?>
                            <tr>
                                <td><?= $ShowMaintenance['activity']; ?></td>
                                <td><?= $ShowMaintenance['action_activity']; ?></td>
                                <td><?= $ShowMaintenance['replacement_parts']; ?></td>
                                <td class="text-bold"><span class="text-left">Rp.</span> <span class="float-right"><?= IndoRupiah($ShowMaintenance['cost']); ?></span></td>
                                <td class="text-center text-bold"><?= $ShowMaintenance['date_maintenance']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <a href="#" class="ml-2 text-info"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="ml-2 text-danger"><i class="far fa-trash-alt"></i></a>
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
        </div>
    </div>
</div>