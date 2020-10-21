<?php
Flasher::Flash();
?>
<div class="card card-outline card-success">
    <form action="document/Report_Salary.php" id="Report_Salary" method="POST" target="_blank">
        <div class="card-header">
            <div class="card-title mt-1 text-bold text-muted">Daftar Salary Karyawan</div>
            <div class="card-tools" style="width:907px;">
                <div class="float-left" style="margin-top: 5px;">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <input type="text" id="Search_Salary" class="form-control float-right text-bold" placeholder="Search ( Name or Date ) . . .">
                        <div class="input-group-append">
                            <button id="Button_Search_Salary" type="button" class="btn btn-info text-bold"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-sm btn-primary mr-2 text-bold" data-toggle="modal" data-target="#modal_set_email"><i class="fas fa-paper-plane"></i> Set Email</button>
                    <div class="btn-group">
                        <button name="Convert_PDF_All" type="submit" class="btn btn-warning btn-sm text-bold"><i class="fas fa-file-pdf"></i> Convert to PDF</button>
                        <button name="Download_PDF_All" type="submit" class="btn btn-success btn-sm text-bold"><i class="fas fa-download"></i> Download to PDF</button>
                        <button name="Share_PDF_All" id="Share_PDF_All" type="submit" class="btn btn-danger btn-sm text-bold"><i class="fas fa-share"></i> Share to PDF</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary ml-2 text-bold"><i class="fas fa-file"></i> New Salary</button>
                </div>
            </div>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th style="width: 130px;">#</th>
                        <th style="width: 350px;">Name</th>
                        <th>Departement</th>
                        <th style="width: 250px;">Position</th>
                        <th style="width: 200px;">Date Create</th>
                        <th class="text-center" style="width: 190px;">
                            <div class="custom-control custom-checkbox float-left">
                                <input class="custom-control-input" type="checkbox" id="Checked_Salary_Master">
                                <label for="Checked_Salary_Master" class="custom-control-label"></label>
                            </div>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="Body_Salary">
                    <?php
                    $Number = 1;
                    $DateSalaryNow = Month(date('M'));
                    foreach (query("SELECT * FROM salarys JOIN profiles ON salarys.id_profile=profiles.id_profile WHERE salarys.create_time LIKE '%" . $DateSalaryNow . "%'  ORDER BY full_name ASC") as $Employee_Salary) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $Number++; ?></td>
                            <td class="text-bold"><?= $Employee_Salary['full_name']; ?></td>
                            <td><?= $Employee_Salary['departement']; ?></td>
                            <td class="text-center"><?= $Employee_Salary['position']; ?></td>
                            <td class="text-center text-bold"><?= $Employee_Salary['create_time']; ?></td>
                            <td>
                                <div class="input-group">
                                    <div class="custom-control custom-checkbox">
                                        <input name="Checked_Salary[]" value="<?= $Employee_Salary['id_salary']; ?>" class="custom-control-input Checked_Salary" type="checkbox" id="Checked_Salary<?= $Number; ?>">
                                        <label for="Checked_Salary<?= $Number; ?>" class="custom-control-label"></label>
                                    </div>
                                    <a href="document/Report_Salary.php?Convert_PDF&<?= md5('Salary_ID') . "=" . $Employee_Salary['id_salary']; ?>" target="_blank" class="ml-2 text-warning"><i class="far fa-file-pdf"></i></a>
                                    <a href="document/Report_Salary.php?Download_PDF&<?= md5('Salary_ID') . "=" . $Employee_Salary['id_salary']; ?>" class="ml-2 text-success"><i class="fas fa-download"></i></a>
                                    <a href="document/Report_Salary.php?Share_PDF&<?= md5('Salary_ID') . "=" . $Employee_Salary['id_salary']; ?>" class="ml-2 text-primary"><i class="fas fa-share"></i></a>
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
    </form>
</div>