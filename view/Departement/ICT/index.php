<?php
Flasher::Flash();
?>

<div class="card">
    <div class="card-header">
        <div class="card-title text-bold">Accounts</div>

        <div class="card-tools">
            <button type="button" data-toggle="modal" data-target="#Modal-Account" class="btn btn-tool">
                <span class="right badge badge-primary p-2">
                    <i class="fas fa-user-plus"> </i>
                    ADD ACCOUNT
                </span>
            </button>
        </div>

    </div>
    <div class="card-body">





        <div class="row">


            <?php

            foreach (query("SELECT * FROM accounts JOIN profiles ON accounts.id_account = profiles.id_account") as $ShowAccount) {
            ?>

                <div class="col-sm-3" <?php
                                        if ($ShowAccount['full_name'] == 'Anonymouse') {
                                            echo 'hidden';
                                        }
                                        ?>>
                    <div class="card">
                        <div class="card-header">
                            <div class="user-block">
                                <img class="img-circle" src="public/dist/img/user1-128x128.jpg" alt="User Image">
                                <span class="username"><?= $ShowAccount['full_name']; ?></span>
                                <span class="description">
                                    <?php
                                    if ($_SESSION['LOAD_SESSION']['Status'] == $ShowAccount['status']) {
                                        echo '<span class="text-success">' . $ShowAccount['status'] . '</span>';
                                    } else {
                                        echo '<span class="text-danger">' . $ShowAccount['status'] . '</span>';
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="card-tools mt-2">
                                <a href="?Welcome=<?= md5('Account/Detail') ?>&<?= md5('ID_Account') . "=" . $ShowAccount['id_account']; ?>" id="Update" type="submit" class="UpdateData pr-2 text-success">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="pr-1 text-danger Action" id="Delete" data-id="<?= $ShowAccount['id_account']; ?>">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>



        </div>






    </div>
</div>

<?php
include_once 'view/modals/modal_create.php';
include_once 'app/config/app_insert.php';
?>