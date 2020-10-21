<?php
Flasher::Flash();
$ID_Account = md5('ID_Account');
$ID_Real = $_GET[$ID_Account];
$Detail_Account = mysqli_fetch_array(query("SELECT * FROM accounts JOIN profiles ON accounts.id_account = profiles.id_account WHERE accounts.id_account='$ID_Real'"));


?>

<div class="callout callout-danger">
    <div class="row">
        <div class="col-sm-2 text-center">
            <img class="profile-user-img img-fluid img-circle" src="public/dist/img/<?= $Detail_Account['image']; ?>" style="width: 200px ;" alt="User profile picture">
        </div>
        <div class="col-sm-3">

            <h1 class="text-bold mt-4"><?= $Detail_Account['full_name']; ?></h1>
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


<div class="card">
    <div class="card-header">
        <div class="card-title text-bold">Detail Account</div>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>

    </div>
    <div class="card-body">



        <div class="row">
            <!-- <div class="col-sm-2">
                <div class="card card-primary">
                    <div class="card-header"></div>
                    <div class="card-body text-center">



                    </div>
                    <div class="card-footer p-0">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input name="AccountParams" value="<?= $Detail_Account['id_account'] . "," . $Detail_Account['full_name']; ?>" type="text" hidden>
                            <div id="Profile-Image" class="input-group">
                                <div class="custom-file">
                                    <input name="Image" type="file" class="custom-file-input" id="Image">
                                    <label class="custom-file-label" for="Image"><?= $Detail_Account['image']; ?></label>
                                </div>
                            </div>
                            <button name="btn-img" id="btn-img" type="submit" class="btn btn-primary btn-block" hidden>Save Image</button>
                        </form>

                    </div>
                </div>
            </div> -->
            <div class="col-sm-9">


                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <div class="card-title text-bold">Biodata</div>
                    </div>
                    <div class="card-body">


                        <div class="row">
                            <div class="col-sm-3">

                                <div class="card">
                                    <div class="card-body text-center">
                                        <img id="Show_Image" class="img-fluid pad" src="" style="width: 200px;" alt="Auto Crop Image">
                                    </div>
                                    <div class="card-footer">
                                        <div id="Profile-Image" class="input-group">
                                            <div class="custom-file">
                                                <input name="Upload_Image" id="Upload_Image" type="file" class="custom-file-input">
                                                <label for="Upload_Image" class="custom-file-label"><?= $Detail_Account['image']; ?></label>
                                            </div>
                                        </div>
                                        <!-- <button name="btn-img" id="btn-img" type="submit" class="btn btn-primary btn-block" hidden>Save Image</button> -->
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-9">

                                <div class="form-group row">
                                    <label for="FullName" class="col-sm-2 col-form-label text-right">Nama Lengkap :</label>
                                    <div class="col-sm-10">
                                        <input name="FullName" id="FullName" type="email" class="form-control" placeholder="Nama lengkap anda . . .">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Address" class="col-sm-2 col-form-label text-right">Tmpt, Tgl Lahir :</label>
                                    <div class="col-sm-10">
                                        <div class="row">

                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Tempat Lahir anda . . .">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>
                                        <!-- <input type="text" class="form-control text-bold" value="<?= $Detail_Account['username']; ?>">
                                            <span class="input-group-append">
                                                <div class="input-group">
                                                    <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
                                                </div>
                                            </span> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Address" class="col-sm-2 col-form-label text-right">Alamat :</label>
                                    <div class="col-sm-10">
                                        <textarea name="Address" id="Address" class="form-control" cols="30" rows="3" placeholder="Alamat anda . . ."></textarea>
                                    </div>
                                </div>









                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label>Nama Lengkap</label>
                            <div class="input-group">
                                <input type="text" readonly class="form-control text-bold" value="<?= $Detail_Account['full_name']; ?>">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-primary">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Gaji Pokok</label>
                            <div class="input-group">
                                <input type="text" readonly class="form-control text-bold" value="Rp. <?= $Detail_Account['price']; ?>">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-primary">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </span>
                            </div>
                        </div> -->


                    </div>
                </div>


            </div>
            <div class="col-sm-3">


                <div class="card card-outline card-danger">
                    <div class="card-header">
                        <div class="card-title text-bold">Account</div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Username</label>
                            <div class="input-group">
                                <input type="text" readonly class="form-control text-bold" value="<?= $Detail_Account['username']; ?>">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-primary">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <input type="password" readonly class="form-control text-bold" value="<?= $Detail_Account['password']; ?>">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-primary">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>








    </div>
</div>

<?php
include_once 'view/modals/modal_update.php';
include_once 'app/config/app_update.php';
?>