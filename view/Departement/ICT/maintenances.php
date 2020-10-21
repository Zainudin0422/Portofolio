<?php
Flasher::Flash();
?>
<div class="card card-outline card-success">
    <form action="document/Report_Maintenance.php" method="POST" target="_blank">
        <div class="card-header">
            <div class="card-title text-bold text-muted">Daftar Maintenance</div>
            <div class="card-tools" style="width:840px;">
                <div class="float-left" style="margin-top: 5px;">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <input type="text" id="Search_Maintenance" class="form-control float-right text-bold" placeholder="Search ( Name PC or Date ) . . .">
                        <div class="input-group-append">
                            <button id="Button_Search_Salary" type="button" class="btn btn-info text-bold"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="btn-group">
                        <button name="Convert_PDF_All" id="Convert_PDF" type="submit" class="btn btn-warning btn-sm text-bold"><i class="fas fa-file-pdf"></i> Convert to PDF</button>
                        <button name="Download_PDF_All" id="Download_PDF" type="submit" class="btn btn-success btn-sm text-bold"><i class="fas fa-download"></i> Download to PDF</button>
                        <button name="Share_PDF_All" id="Share_PDF_All" type="submit" class="btn btn-danger btn-sm text-bold"><i class="fas fa-share"></i> Share to PDF</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary ml-2 text-bold" data-toggle="modal" data-target="#modal-maintenence"><i class="fas fa-file"></i> New Maintenance</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th style="width: 70px;">#</th>
                        <th style="width: 120px;">Name Device</th>
                        <th style="width: 290px;">Maintenence Activity</th>
                        <th>Maintenence Action</th>
                        <th style="width: 200px;">Replacement Sparepart</th>
                        <th style="width: 120px;">Cost</th>
                        <th style="width: 170px;">Date Create</th>
                        <th class="text-center" style="width: 200px;">
                            <div class="custom-control custom-checkbox float-left">
                                <input class="custom-control-input" type="checkbox" id="Checked_Maintenance_Master">
                                <label for="Checked_Maintenance_Master" class="custom-control-label"></label>
                            </div>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="Body_Maintenance">
                    <?php
                    $Number = 1;
                    $DateSalaryNow = Month(date('M'));
                    foreach (query("SELECT * FROM maintenances JOIN devices ON maintenances.device_id=devices.device_id WHERE maintenances.date_maintenance lIKE '%" . $DateSalaryNow . "%'") as $ShowMaintenance) {
                    ?>
                        <tr>
                            <td class="text-center text-bold"><?= $Number; ?></td>
                            <td class=" text-center text-bold"><?= $ShowMaintenance['device_name']; ?></td>
                            <td><?= $ShowMaintenance['activity']; ?></td>
                            <td><?= $ShowMaintenance['action_activity']; ?></td>
                            <td><?= $ShowMaintenance['replacement_parts']; ?></td>
                            <td class="text-bold"><span class="text-left">Rp.</span> <span class="float-right"><?= IndoRupiah($ShowMaintenance['cost']); ?></span></td>
                            <td class="text-center text-bold"><?= $ShowMaintenance['date_maintenance']; ?></td>
                            <td>
                                <div class="input-group">
                                    <div class="custom-control custom-checkbox">
                                        <input name="Checked_Maintenance[]" value="<?= $ShowMaintenance['maintenance_id']; ?>" class="custom-control-input Checked_Maintenance" type="checkbox" id="Checked_Maintenance<?= $Number; ?>">
                                        <label for="Checked_Maintenance<?= $Number; ?>" class="custom-control-label"></label>
                                    </div>
                                    <a href="document/Report_Maintenance.php?Convert_PDF&<?= md5('Maintenance_ID') . "=" . $ShowMaintenance['maintenance_id']; ?>" target="_blank" class="ml-2 text-primary"><i class="fas fa-eye"></i></a>
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
    </form>
</div>