<?php
$ID_Profile = md5('ID_Profile');

$Profiles = "SELECT * FROM profiles WHERE id_profile='$_GET[$ID_Profile]'";
$ShowPerProfile = mysqli_fetch_array(query($Profiles));

$Salarys = "SELECT * FROM salarys JOIN profiles ON salarys.id_profile=profiles.id_profile WHERE profiles.id_profile='$_GET[$ID_Profile]'";


?>

<div class="callout callout-danger">
    <div class="row">
        <div class="col-sm-2 text-center">
            <img class="profile-user-img img-fluid img-circle" src="public/dist/img/<?= $ShowPerProfile['image']; ?>" style="width: 200px ;" alt="User profile picture">
        </div>
        <div class="col-sm-3">

            <h1 class="text-bold mt-4"><?= $ShowPerProfile['full_name']; ?></h1>
            <p class="text-sm mb-4 " style="margin-top: -5px;">
                <dt class="text-muted">Departement ICT - Staff</dt>
            </p>
            <div class="row">
                <div class="col-sm-6">
                    <button class="btn btn-success btn-block">Update Account</button>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-outline-primary btn-block">Update Account</button>
                </div>
            </div>
        </div>
        <div class="col-sm-7 p-3">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Messages</span>
                            <span class="info-box-number">1,410</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Bookmarks</span>
                            <span class="info-box-number">410</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-briefcase"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Lama Bekerja</span>
                            <span class="info-box-number">13,648</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-birthday-cake"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usia / Umur</span>
                            <span class="info-box-number">93,139</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-3">

        <div class="card bg-success">
            <div class="card-header">
                <div class="text-center text-bold"> Absensi Kehadiran</div>
            </div>
            <div class="card-body p-0 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>Izin</th>
                            <th>Sakit</th>
                            <th>Perdin</th>
                            <th>Cuti</th>
                            <th>Alpa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <button class="btn btn-block btn-primary">Save Absensi</button>
            </div>
        </div>

    </div>


    <div class="col-sm-6">
    </div>

    <div class="col-sm-3">

        <div class="card">
            <div class="card-header">
                <div class="card-title text-bold">Info Salary</div>

            </div>
            <form action="document/Report_Salary.php" method="POST">
                <div class="card-body p-2">
                    <?php
                    foreach (query($Salarys) as $ShowSalary) {
                    ?>
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="fas fa-wallet"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Data Salary <?= DateMount($ShowSalary['create_time']); ?></span>
                                    <span class="info-box-number"><?= DateCalender($ShowSalary['create_time']); ?></span>
                                </div>
                                <span class="float-right" style="padding-top: 20px;">
                                    <input type="checkbox" name="All_Check_[]" value="<?= $ShowSalary['id_salary']; ?>">
                                    <a href="document/Report_Salary.php?Report_PDF&<?= md5('ID_Salary') . "=" . $ShowSalary['id_salary']; ?>" target="_blank" class="ml-2 text-warning"><i class="far fa-file-pdf"></i></a>
                                    <a href="document/Report_Salary.php?Download_PDF&<?= md5('ID_Salary') . "=" . $ShowSalary['id_salary']; ?>" class="ml-2 text-success"><i class="fas fa-download"></i></a>
                                </span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-footer text-center">
                    <button name="Multi_Report_PDF_Salary_Per_View" type="submit" class="btn btn-warning">
                        <i class="far fa-file-pdf"></i>
                        CONVERT PDF
                    </button>
                    <button name="Multi_Report_PDF_Salary_Per_Download" type="submit" class="btn btn-success">
                        <i class="fas fa-download"></i>
                        DOWNLOAD PDF
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>