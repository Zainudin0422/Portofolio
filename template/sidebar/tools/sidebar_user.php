<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="public/dist/img/<?= $_SESSION['LOAD_SESSION']['Image']; ?>" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="?Welcome=<?= md5('Profile') . "&" . md5('ID_Profile') . "=" . $_SESSION['LOAD_SESSION']['ID_Profile']; ?>" class="d-block"><?= $_SESSION['LOAD_SESSION']['FullName']; ?></a>
    </div>
</div>