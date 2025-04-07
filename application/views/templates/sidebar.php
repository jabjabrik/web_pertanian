<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/logo/logopemkab.png') ?>" height="45" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">RDDK Tani</div>
    </a>

    <hr class="sidebar-divider" />
    <?php if ($this->session->userdata('role') != 'masyarakat') : ?>
        <li class="mb-3 nav-item <?= $title == 'Dashboard' ? 'active' : '' ?>">
            <a class="nav-link pb-0" href="<?= base_url('dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    <?php endif ?>
    <li class="mb-3 nav-item <?= $title == 'Informasi' ? 'active' : '' ?>">
        <a class="nav-link pb-0" href="<?= base_url(); ?>">
            <i class="fas fa-fw fa-info"></i>
            <span>Informasi</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />
    <?php if ($this->session->userdata('role') != 'masyarakat') : ?>

        <div class="sidebar-heading">
            Master
        </div>

        <li class="nav-item <?= $title == 'Petani' ? 'active' : '' ?>">
            <a class="nav-link pb-0" href="<?= base_url('petani'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Petani</span>
            </a>
        </li>
        <?php if ($this->session->userdata('role') == 'desa') : ?>
            <li class="nav-item <?= $title == 'User' ? 'active' : '' ?>">
                <a class="nav-link pb-0" href="<?= base_url('user'); ?>">
                    <i class="bi bi-people-fill"></i>
                    <span>User</span>
                </a>
            </li>
        <?php endif ?>

        <hr class="sidebar-divider mt-3">
        <div class="sidebar-heading">
            Transaksi
        </div>

        <li class="nav-item <?= $title == 'Subsidi Pupuk' ? 'active' : '' ?>">
            <a class="nav-link pb-0" href="<?= base_url('subsidi'); ?>">
                <i class="fas fa-fw fa-tree"></i>
                <span>Subsidi Pupuk</span>
            </a>
        </li>

        <hr class="sidebar-divider mt-3">
    <?php endif ?>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
</ul>