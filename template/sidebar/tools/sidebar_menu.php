<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    Departement (ICT)
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="?Welcome=<?= md5('Accounts'); ?>" class="nav-link">
                        <i class="fas fa-user-lock nav-icon"></i>
                        <p>Accounts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?Welcome=<?= md5('Devices'); ?>" class="nav-link">
                        <i class="fas fa-desktop nav-icon"></i>
                        <p>Devices</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?Welcome=<?= md5('Maintenances'); ?>" class="nav-link">
                        <i class="fas fa-tools nav-icon"></i>
                        <p>Maintenances</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    Departement (HRD)
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="?Welcome=<?= md5('Employees'); ?>" class="nav-link">
                        <i class="fas fa-user-tie nav-icon"></i>
                        <p>Employees</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?Welcome=<?= md5('Employees'); ?>" class="nav-link">
                        <i class="fas fa-wallet nav-icon"></i>
                        <p>Salary</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>